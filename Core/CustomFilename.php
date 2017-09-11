<?php
namespace Klapuch\Snappie;

final class CustomFilename implements Filename {
	private $method;

	public function __construct($method) {
		$this->method = $method;
	}

	public function path() {
		return $this->method;
	}
}