<?php
namespace Klapuch\Snappie;

final class FullFilename implements Filename {
	private $origin;
	private $snapshots;

	public function __construct(Filename $origin, \SplFileInfo $snapshots) {
		$this->origin = $origin;
		$this->snapshots = $snapshots;
	}

	public function path() {
		return $this->snapshots->getPathname()
			. DIRECTORY_SEPARATOR
			. $this->origin->path();
	}
}