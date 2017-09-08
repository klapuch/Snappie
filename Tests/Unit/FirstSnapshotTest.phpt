<?php
/**
 * @testCase
 */
namespace Klapuch\Snappie\Unit;

use Tester;
use Tester\Assert;
use Klapuch\Snappie;

require __DIR__ . '/../bootstrap.php';

class FirstSnapshotTest extends Tester\TestCase {
	/**
	 * @var \SplFileInfo
	 */
	private $snapshots;

	protected function setUp() {
		parent::setUp();
		$this->snapshots = new \SplFileInfo(__DIR__ . '/../Temporary/__snapshots__');
		Tester\Environment::lock('fs', __DIR__ . '/../Temporary');
		Tester\Helpers::purge($this->snapshots->getPathname());
		@rmdir($this->snapshots->getPathname());
	}

	public function testCreatingDirectoryOnFirstRun() {
		Assert::false($this->snapshots->isDir());
		(new Snappie\FirstSnapshot(
			new Snappie\FakeSnapshot(
				new \SplFileInfo($this->snapshots->getPathname() . '/test.txt')
			),
			$this->snapshots
		))->compare(new Snappie\FakeFormat('abc'));
		Assert::true($this->snapshots->isDir());
	}

	public function testNoResultingDirectoryOnNoSnapshots() {
		Assert::false($this->snapshots->isDir());
		(new Snappie\FirstSnapshot(
			new Snappie\FakeSnapshot(),
			$this->snapshots
		))->compare(new Snappie\FakeFormat());
		Assert::false($this->snapshots->isDir());
	}

	public function testMultipleRunningWithoutRemovingFiles() {
		(new Snappie\FirstSnapshot(
			new Snappie\FakeSnapshot(
				new \SplFileInfo($this->snapshots->getPathname() . '/test.txt')
			),
			$this->snapshots
		))->compare(new Snappie\FakeFormat('abc'));
		(new Snappie\FirstSnapshot(
			new Snappie\FakeSnapshot(
				new \SplFileInfo($this->snapshots->getPathname() . '/test2.txt')
			),
			$this->snapshots
		))->compare(new Snappie\FakeFormat('def'));
		Assert::count(
			2,
			glob(sprintf('%s/*', $this->snapshots->getPathname()))
		);
	}
}
(new FirstSnapshotTest)->run();
