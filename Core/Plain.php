<?php
namespace Klapuch\Snappie;

class Plain implements Format {
	private $input;
	private $extension;

	public function __construct($input, $extension) {
		$this->input = $input;
		$this->extension = $extension;
	}

	public function extension() {
		return $this->extension;
	}

	public function serialization() {
		return $this->input;
	}
}