<?php

namespace Gedmo\IpTraceable;

use Doctrine\Common\EventManager;
use Tool\BaseTestCaseORM;
use IpTraceable\Fixture\WithoutInterface;

/**
 * These are tests for IpTraceable behavior
 *
 * @author  Pierre-Charles Bertineau <pc.bertineau@alterphp.com>
 * @link    http://www.gediminasm.org
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class NoInterfaceTest extends BaseTestCaseORM {
    const TEST_IP = '34.234.1.10';
    const FIXTURE = "IpTraceable\\Fixture\\WithoutInterface";

    protected function setUp()
    {
        parent::setUp();

        $evm                 = new EventManager();
        $ipTraceableListener = new IpTraceableListener();
        $ipTraceableListener->setIpValue(self::TEST_IP);
        $evm->addEventSubscriber($ipTraceableListener);

        $this->getMockSqliteEntityManager($evm);
    }

    public function testIpTraceableNoInterface()
    {
        $test = new WithoutInterface();
        $test->setTitle('Test');

        $this->em->persist($test);
        $this->em->flush();
        $this->em->clear();

        $test = $this->em->getRepository(self::FIXTURE)->findOneByTitle('Test');
        $this->assertEquals(self::TEST_IP, $test->getCreated());
        $this->assertEquals(self::TEST_IP, $test->getUpdated());
    }

    protected function getUsedEntityFixtures()
    {
        return array(
            self::FIXTURE,
        );
    }
}
