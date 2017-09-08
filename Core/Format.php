<?php
namespace Klapuch\Snappie;

interface Format {
	/**
	 * Extension of a file without leading dot
	 * @return string
	 */
	public function extension();

	/**
	 * Serialized data in the format
	 * @return string
	 */
	public function serialization();
}