<?php
namespace Klapuch\Snappie;

use Tester;

final class FilenameByClass implements Filename {
	private $origin;
	private $test;

	public function __construct(Filename $origin, Tester\TestCase $test) {
		$this->origin = $origin;
		$this->test = $test;
	}

	public function path() {
		$parts = explode('\\', (new \ReflectionClass($this->test))->getName());
		return new \SplFileInfo(
			sprintf('%s/%s', end($parts), $this->origin->path())
		);
	}
}