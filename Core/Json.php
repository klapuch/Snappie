<?php
namespace Klapuch\Snappie;

use Nette\Utils;

class Json implements Format {
	private $input;

	public function __construct($input) {
		$this->input = $input;
	}

	public function extension() {
		return 'json';
	}

	public function serialization() {
		return Utils\Json::encode($this->input, Utils\Json::PRETTY);
	}
}