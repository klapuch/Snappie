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

	public function testSingleJson() {
		$this->assertJson(['username' => 'Dom']);
	}

	public function testMultipleAsserts() {
		$this->assertJson(['username' => 'Dom']);
		$this->assertJson(['username' => 'You']);
	}

	public function testSingleXml() {
		$this->assertXml('<?xml version="1.0" encoding="utf-8"?><film/>');
	}

	public function testCombinedFormats() {
		$this->assertJson(['username' => 'Dom']);
		$this->assertXml('<?xml version="1.0" encoding="utf-8"?><film/>');
	}

	/**
	 * @dataProvider jsons
	 */
	public function testDataProviders(array $input) {
		$this->assertJson($input);
	}

	protected function jsons() {
		return [
			[['username' => 'Dom']],
			[['username' => 'You']],
		];
	}
}
(new Test)->run();
