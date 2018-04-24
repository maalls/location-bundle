<?php 

namespace Maalls\LocationBundle\Tests\Lib;

use Maalls\LocationBundle\Lib\IpApi;
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
        
        $this->assertEquals("Tokyo", $rsp->city);

        /*
        class stdClass#23 (14) {
            public $as =>
            string(37) "AS4713 NTT Communications Corporation"
            public $city =>
            string(5) "Tokyo"
            public $country =>
            string(5) "Japan"
            public $countryCode =>
            string(2) "JP"
            public $isp =>
            string(3) "NTT"
            public $lat =>
            double(35.685)
            public $lon =>
            double(139.7514)
            public $org =>
            string(3) "NTT"
            public $query =>
            string(12) "153.156.41.1"
            public $region =>
            string(2) "13"
            public $regionName =>
            string(5) "Tokyo"
            public $status =>
            string(7) "success"
            public $timezone =>
            string(10) "Asia/Tokyo"
            public $zip =>
            string(8) "102-0082"
        }
        */
    }
}