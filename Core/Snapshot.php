<?php
namespace Klapuch\Snappie;

interface Snapshot {
	/**
	 * Compare snapshots
	 * @param $format \Klapuch\Snappie\Format
	 * @return void
	 */
	public function compare(Format $format);
}