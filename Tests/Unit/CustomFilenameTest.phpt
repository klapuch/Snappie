<?php
/**
 * @testCase
 */
namespace Klapuch\Snappie\Unit;

use Tester;
use Tester\Assert;
use Klapuch\Snappie;

require __DIR__ . '/../bootstrap.php';

class CustomFilenameTest extends Tester\TestCase {
	public function testNamespacesToOldStyle() {
		Assert::same(
			'Klapuch_Snappie_Unit_CustomFilenameTest__someMethod',
			(new Snappie\CustomFilename($this, 'someMethod'))->path()
		);
	}

	public function testFilenameSupportedByAllFilesystems() {
		Assert::noError(function() {
			$filename = (new Snappie\CustomFilename($this, 'someMethod'))->path();
			touch($filename);
			unlink($filename);
		});
	}
}
(new CustomFilenameTest)->run();
