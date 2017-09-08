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
		(new SuitedSnapshot($this->location, $this, $this->method))->compare($json);
	}

	public function assertXml($xml) {
		(new SuitedSnapshot($this->location, $this, $this->method))->compare($xml);
	}
}