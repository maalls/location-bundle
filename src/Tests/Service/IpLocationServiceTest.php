<?php 

namespace Maalls\LocationBundle\Tests\Service;

use Maalls\LocationBundle\Lib\IpApi;
use Maalls\LocationBundle\Tests\KernelTestCase as TestCase;
use Maalls\LocationBundle\Service\IpLocationService;
use Maalls\LocationBundle\Entity\IpLocation;

class IpLocationServiceTest extends TestCase
{
    public function testGetLocation()
    {

        $api = new IpApi();
        $repository = $this->em->getRepository(IpLocation::class);

        $service = new IpLocationService($api, $repository);

        $location = $service->getLocation("153.156.41.1");

        $this->assertEquals("Japan", $location->getCountry());
        
    }
}