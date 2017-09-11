<?php
/**
 * @testCase
 */
namespace Klapuch\Snappie\Unit;

use Tester;
use Tester\Assert;
use Klapuch\Snappie;

require __DIR__ . '/../bootstrap.php';

class IncrementalFilenameTest extends Tester\TestCase {
	public function testIncrementingForMultipleSameCalls() {
		$filename = new Snappie\IncrementalFilename(
			new Snappie\FakeFilename('test'),
			$this,
			'testSomething'
		);
		Assert::equal(new \SplFileInfo('test_01'), $filename->path());
		Assert::equal(new \SplFileInfo('test_02'), $filename->path());
	}
}
(new IncrementalFilenameTest)->run();
