<?php
/**
 * @testCase
 */
namespace Klapuch\Snappie\Unit;

use Tester;
use Tester\Assert;
use Klapuch\Snappie;

require __DIR__ . '/../bootstrap.php';

class FilenameWithExtensionTest extends Tester\TestCase {
	public function testAppendingExtension() {
		Assert::equal(
			new \SplFileInfo('filename.xml'),
			(new Snappie\FilenameWithExtension(
				new Snappie\FakeFilename('filename'),
				new Snappie\FakeFormat('xml')
			))->path()
		);
	}

	public function testRemovingLeadingDot() {
		Assert::equal(
			new \SplFileInfo('filename.xml'),
			(new Snappie\FilenameWithExtension(
				new Snappie\FakeFilename('filename'),
				new Snappie\FakeFormat('.xml')
			))->path()
		);
	}
}
(new FilenameWithExtensionTest)->run();
