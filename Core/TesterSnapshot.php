<?php
namespace Klapuch\Snappie;

use Tester;

final class TesterSnapshot implements Snapshot {
	private $filename;

	public function __construct(Filename $filename) {
		$this->filename = $filename;
	}

	public function compare(Format $format) {
		$this->assert(
			new \SplFileInfo($this->filename->path()),
			rtrim($format->serialization(), PHP_EOL) . PHP_EOL
		);
	}

	private function assert(\SplFileInfo $actual, $expected) {
		if (!$actual->isFile())
			file_put_contents($actual->getPathname(), $expected);
		Tester\Assert::same(
			file_get_contents($actual->getPathname()),
			$expected
		);
	}
}