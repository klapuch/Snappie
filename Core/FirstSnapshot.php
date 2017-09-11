<?php
namespace Klapuch\Snappie;

final class FirstSnapshot implements Snapshot {
	private $origin;
	private $filename;

	public function __construct(Snapshot $origin, Filename $filename) {
		$this->origin = $origin;
		$this->filename = $filename;
	}

	public function compare(Format $format) {
		@mkdir($this->filename->path(), 0777, true); // @ - directory may exists
		$this->origin->compare($format);
		if (!current(glob(sprintf('%s/*', $this->filename->path()))))
			@rmdir($this->filename->path()); // @ - directory may not exists
	}
}