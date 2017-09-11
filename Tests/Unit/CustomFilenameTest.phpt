<?php
/**
 * @testCase
 */
namespace Klapuch\Snappie\Unit;

use Tester;
use Tester\Assert;
use Klapuch\Snappie;

require __DIR__ . '/../bootstrap.php';

class CustomFilenameTest extends Tester\TestCase {
	public function testPassedAsItIs() {
		Assert::same(
			'someMethod',
			(new Snappie\CustomFilename('someMethod'))->path()
		);
	}
}
(new CustomFilenameTest)->run();
