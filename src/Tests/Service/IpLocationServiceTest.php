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

        $this->truncateAll();
        $api = new IpApi();
        
        $service = new IpLocationService($api, $this->em);

        $ip = "153.156.41.1";
        $location = $service->getLocation($ip);

        $this->assertEquals("Japan", $location->getCountry());

        $location = $this->em->getRepository(IpLocation::class)->findOneBy(["ip" => $ip]);

        $this->assertEquals("Japan", $location->getCountry());
        
    }
}