<?php
namespace Klapuch\Snappie;

final class FakeSnapshot implements Snapshot {
	private $filename;

	public function __construct(\SplFileInfo $filename = null) {
		$this->filename = $filename;
	}

	public function compare(Format $format) {
		if ($this->filename !== null) {
			file_put_contents(
				$this->filename->getPathname(),
				$format->serialization()
			);
		}
	}
}