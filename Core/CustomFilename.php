<?php
namespace Klapuch\Snappie;

use Tester;

final class CustomFilename implements Filename {
	private $class;
	private $method;

	public function __construct(Tester\TestCase $class, $method) {
		$this->class = $class;
		$this->method = $method;
	}

	public function path() {
		return sprintf(
			'%s__%s',
			str_replace(
				['\\'],
				'_',
				(new \ReflectionClass($this->class))->getName()
			),
			$this->method
		);
	}
}