<?php
namespace Klapuch\Snappie;

use Tester;

final class CustomFilename implements Filename {
	private $test;
	private $method;

	public function __construct(Tester\TestCase $test, $method) {
		$this->test = $test;
		$this->method = $method;
	}

	public function path() {
		return sprintf(
			'%s__%s',
			str_replace(
				['\\'],
				'_',
				(new \ReflectionClass($this->test))->getName()
			),
			$this->method
		);
	}
}