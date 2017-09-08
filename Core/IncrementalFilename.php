<?php
namespace Klapuch\Snappie;

use Tester;

final class IncrementalFilename implements Filename {
	private static $calls = [];
	private $origin;
	private $class;
	private $method;

	public function __construct(
		Filename $origin,
		Tester\TestCase $class,
		$method
	) {
		$this->origin = $origin;
		$this->class = $class;
		$this->method = $method;
	}

	public function path() {
		$annotations = Tester\Helpers::parseDocComment(
			(new \ReflectionMethod($this->class, $this->method))->getDocComment()
		);
		if (isset($annotations['dataprovider'])) {
			return sprintf(
				'%s_%02d',
				$this->origin->path(),
				$this->increment(spl_object_hash($this->class) . $this->method)
			);
		}
		return $this->origin->path();
	}

	private function increment($key) {
		if (!isset(static::$calls[$key]))
			static::$calls[$key] = 0;
		return ++static::$calls[$key];
	}
}