<?php
namespace Klapuch\Snappie;

use Tester;

final class SuitedSnapshot implements Snapshot {
	private $root;
	private $test;
	private $method;

	public function __construct(
		\SplFileInfo $root,
		Tester\TestCase $test,
		$method
	) {
		$this->root = $root;
		$this->test = $test;
		$this->method = $method;
	}

	public function compare(Format $format) {
		(new FirstSnapshot(
			new TesterSnapshot(
				new FullFilename(
					new FilenameByClass(
						new FilenameWithExtension(
							new IncrementalFilename(
								new CustomFilename($this->method),
								$this->test,
								$this->method
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