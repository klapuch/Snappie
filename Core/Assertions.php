<?php
namespace Klapuch\Snappie;

trait Assertions {
	private $method;
	private $location;
	private static $directory = '__snapshots__';

	public function setUp() {
		parent::setUp();
		$this->location = new \SplFileInfo(
			(new \SplFileInfo(
				(new \ReflectionClass($this))->getFileName()
			))->getPath()
			. DIRECTORY_SEPARATOR
			. static::$directory
		);
	}

	public function runTest($method, array $args = null) {
		$this->method = $method;
		parent::runTest($method, $args);
	}

	public function assertJson($json) {
		$this->assert(new Json($json));
	}

	public function assertXml($xml) {
		$this->assert(new Xml($xml));
	}

	private function assert(Format $format) {
		(new FirstSnapshot(
			new TesterSnapshot(
				new FullFilename(
					new FilenameWithExtension(
						new IncrementalFilename(
							new CustomFilename($this, $this->method),
							$this,
							$this->method
						),
						$format
					),
					$this->location
				)
			),
			$this->location
		))->compare($format);
	}
}