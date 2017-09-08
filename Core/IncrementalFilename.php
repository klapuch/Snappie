<?php
namespace Klapuch\Snappie;

use Tester;

final class IncrementalFilename implements Filename {
	private static $calls = [];
	private $origin;
	private $test;
	private $method;

	public function __construct(
		Filename $origin,
		Tester\TestCase $test,
		$method
	) {
		$this->origin = $origin;
		$this->test = $test;
		$this->method = $method;
	}

	public function path() {
		return sprintf(
			'%s_%02d',
			$this->origin->path(),
			$this->increment(spl_object_hash($this->test) . $this->method)
		);
	}

	private function increment($key) {
		if (!isset(static::$calls[$key]))
			static::$calls[$key] = 0;
		return ++static::$calls[$key];
	}
}