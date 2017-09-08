<?php
/**
 * @testCase
 */
namespace Klapuch\Snappie\Unit;

use Tester;
use Tester\Assert;
use Klapuch\Snappie;

require __DIR__ . '/../bootstrap.php';

class JsonTest extends Tester\TestCase {
	public function testPrettifiedJson() {
		Assert::same(
			<<<JSON
{
    "name": "Dom"
}
JSON
			,
			(new Snappie\Json(['name' => 'Dom']))->serialization()
		);
	}
}
(new JsonTest)->run();
