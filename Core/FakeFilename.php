<?php
namespace Klapuch\Snappie;

final class FakeFilename implements Filename {
	private $path;

	public function __construct($path = null) {
		$this->path = $path;
	}

	public function path() {
		return new \SplFileInfo($this->path);
	}
}