<?php 

namespace Usn\IpLocationBundle\Util;

use AppBundle\Util\IpApi;
use PHPUnit\Framework\TestCase;

class IpApiTest extends TestCase
{
    public function testGet()
    {
        //$calc = new Calculator();
        //$result = $calc->add(30, 12);

        // assert that your calculator added the numbers correctly!
        
        $api = new IpApi();

        $rsp = $api->get("153.156.41.1");
        var_dump($rsp);
        exit;
        $this->assertEquals(42, $result);
    }
}