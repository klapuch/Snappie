<?php
namespace Klapuch\Snappie;

final class FirstSnapshot implements Snapshot {
	private $origin;
	private $location;

	public function __construct(Snapshot $origin, \SplFileInfo $location) {
		$this->origin = $origin;
		$this->location = $location;
	}

	public function compare(Format $format) {
		@mkdir($this->location->getPathname()); // @ - directory may exists
		$this->origin->compare($format);
		if (!current(glob(sprintf('%s/*', $this->location->getPathname()))))
			@rmdir($this->location->getPathname()); // @ - directory may not exists
	}
}