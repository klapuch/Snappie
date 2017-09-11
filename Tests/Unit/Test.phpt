<?php
/**
 * @testCase
 */
namespace Klapuch\Snappie\Unit;

use Tester;
use Klapuch\Snappie;

require __DIR__ . '/../bootstrap.php';

class Test extends Tester\TestCase {
	use Snappie\Assertions;

	public function testPassedMethodName() {
		$this->assertJson(['username' => 'Dom']);
	}
}
(new Test)->run();
