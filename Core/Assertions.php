<?php
namespace Klapuch\Snappie;

trait Assertions {
	private $method;
	private $root;
	private static $directory = '__snapshots__';

	public function setUp() {
		parent::setUp();
		$this->root = new \SplFileInfo(
			(new \SplFileInfo(
				(new \ReflectionClass($this))->getFileName()
			))->getPath()
			. DIRECTORY_SEPARATOR
			. static::$directory
		);
	}

	public function runTest(string $method, array $args = null): void {
		$this->method = $method;
		parent::runTest($method, $args);
	}

	public function assertJson($json, $prefix = '') {
		(new SuitedSnapshot(
			$this->root,
			$this,
			$this->method,
			$prefix
		))->compare(new Json($json));
	}

	public function assertXml($xml, $prefix = '') {
		(new SuitedSnapshot(
			$this->root,
			$this,
			$this->method,
			$prefix
		))->compare(new Xml($xml));
	}

	public function assertPlain($text, $extension, $prefix = '') {
		(new SuitedSnapshot(
			$this->root,
			$this,
			$this->method,
			$prefix
		))->compare(new Plain($text, $extension));
	}
}