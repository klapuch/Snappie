<?php
/**
 * @testCase
 */
namespace Klapuch\Snappie\Unit;

use Tester;
use Tester\Assert;
use Klapuch\Snappie;

require __DIR__ . '/../bootstrap.php';

class FilenameByClass extends Tester\TestCase {
	public function testClassAsFilename() {
		Assert::same(
			'FilenameByClass/something.txt',
			(new Snappie\FilenameByClass(
				new Snappie\FakeFilename('something.txt'),
				$this
			))->path()
		);
	}
}
(new FilenameByClass)->run();
