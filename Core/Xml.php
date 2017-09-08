<?php
namespace Klapuch\Snappie;

class Xml implements Format {
	private $input;

	public function __construct($input) {
		$this->input = $input;
	}

	public function extension() {
		return 'xml';
	}

	public function serialization() {
		$dom = new \DOMDocument('1.0', 'UTF-8');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($this->input);
		return $dom->saveXML();
	}
}