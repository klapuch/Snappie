<?php
/**
 * @testCase
 */
namespace Klapuch\Snappie\Unit;

use Tester;
use Tester\Assert;
use Klapuch\Snappie;

require __DIR__ . '/../bootstrap.php';

class XmlTest extends Tester\TestCase {
	public function testPrettifiedXml() {
		Assert::same(
			<<<XML
<?xml version="1.0"?>
<films>
  <name>South Park</name>
</films>

XML
			,
			(new Snappie\Xml(
				'<?xml version="1.0"?><films><name>South Park</name></films>'
			))->serialization()
		);
	}
}
(new XmlTest)->run();
