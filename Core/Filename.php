<?php
namespace Klapuch\Snappie;

interface Filename {
	/**
	 * Path to the filename
	 * @see https://en.wikipedia.org/wiki/Filename for allowed formats
	 * @return \SplFileInfo
	 */
	public function path();
}