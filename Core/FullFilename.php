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
		return new \SplFileInfo(
			sprintf(
				'%s/%s',
				$this->snapshots->getPathname(),
				$this->origin->path()
			)
		);
	}
}