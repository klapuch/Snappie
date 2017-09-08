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
	public function testIncrementingOnEachCallForDataProvider() {
		$filename = new Snappie\IncrementalFilename(
			new Snappie\FakeFilename('test'),
			new Test(),
			'testOne'
		);
		Assert::same('test_01', $filename->path());
		Assert::same('test_02', $filename->path());
		Assert::same('test_03', $filename->path());
	}

	public function testNoIncrementForMethodWithoutDataProvider() {
		$filename = new Snappie\IncrementalFilename(
			new Snappie\FakeFilename('test'),
			new Test(),
			'testTwo'
		);
		Assert::same('test', $filename->path());
		Assert::same('test', $filename->path());
	}
}
class Test extends Tester\TestCase {
	/**
	 * @dataProvider
	 */
	public function testOne() {

	}

	public function testTwo() {

	}
}
(new IncrementalFilenameTest)->run();
