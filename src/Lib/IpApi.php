<?php

namespace Usn\IpLocationBundle\Lib;

class IpApi {

    public function get($ip) {

        $url = "http://ip-api.com/json/" . $ip;
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true
        ]);

        $rsp = curl_exec($ch);

        $json = json_decode($rsp);

        return $json;
        

    }

}