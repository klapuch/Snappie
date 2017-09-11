<?php
namespace Klapuch\Snappie;

use Tester;

final class SuitedSnapshot implements Snapshot {
	private $location;
	private $test;
	private $method;

	public function __construct(
		\SplFileInfo $location,
		Tester\TestCase $test,
		$method
	) {
		$this->location = $location;
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
					$this->location
				)
			),
			new FullFilename(
				new FilenameByClass(
					new CustomFilename(''),
					$this->test
				),
				$this->location
			)
		))->compare($format);
	}
}