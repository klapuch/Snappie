<?php
namespace Klapuch\Snappie;

use Tester;

final class SuitedSnapshot implements Snapshot {
	private $root;
	private $test;
	private $method;
	private $prefix;

	public function __construct(
		\SplFileInfo $root,
		Tester\TestCase $test,
		$method,
		$prefix = ''
	) {
		$this->root = $root;
		$this->test = $test;
		$this->method = $method;
		$this->prefix = $prefix;
	}

	public function compare(Format $format) {
		(new FirstSnapshot(
			new TesterSnapshot(
				new FullFilename(
					new FilenameByClass(
						new FilenameWithExtension(
							new IncrementalFilename(
								new CustomFilename($this->prefix . $this->method),
								$this->test,
								$this->prefix . $this->method
							),
							$format
						),
						$this->test
					),
					$this->root
				)
			),
			new FullFilename(
				new FilenameByClass(
					new CustomFilename(''),
					$this->test
				),
				$this->root
			)
		))->compare($format);
	}
}