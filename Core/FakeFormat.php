<?php
namespace Klapuch\Snappie;

final class FakeFormat implements Format {
	private $extension;
	private $serialization;

	public function __construct($extension = null, $serialization = null) {
		$this->extension = $extension;
		$this->serialization = $serialization;
	}

	public function extension() {
		return $this->extension;
	}

	public function serialization() {
		return $this->serialization;
	}
}