<?php
namespace Klapuch\Snappie;

final class FilenameWithExtension implements Filename {
	private $origin;
	private $format;

	public function __construct(Filename $origin, Format $format) {
		$this->origin = $origin;
		$this->format = $format;
	}

	public function path() {
		return new \SplFileInfo(
			sprintf(
				'%s.%s',
				$this->origin->path(),
				trim($this->format->extension(), '.')
			)
		);
	}
}