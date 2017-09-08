<?php
/**
 * @testCase
 */
namespace Klapuch\Snappie\Unit;

use Tester;
use Tester\Assert;
use Klapuch\Snappie;

require __DIR__ . '/../bootstrap.php';

class FullFilenameTest extends Tester\TestCase {
	public function testConcatenatingFilenameWithFullPath() {
		Assert::same(
			'/tmp/filename.xml',
			(new Snappie\FullFilename(
				new Snappie\FakeFilename('filename.xml'),
				new \SplFileInfo('/tmp')
			))->path()
		);
	}

	public function testStrippingTrailingSlashes() {
		Assert::same(
			'/tmp/filename.xml',
			(new Snappie\FullFilename(
				new Snappie\FakeFilename('filename.xml'),
				new \SplFileInfo('/tmp//')
			))->path()
		);
	}
}
(new FullFilenameTest)->run();
