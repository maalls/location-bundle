<?php

namespace Maalls\LocationBundle\Service;

use Maalls\LocationBundle\Lib\IpApi;
use Maalls\LocationBundle\Repository\IpLocationRepository;

class IpLocationService {

    protected $api;

    public function __construct(IpApi $api, IpLocationRepository $repository)
    {

        $this->api = $api;
        $this->repository = $repository;

    }

    public function getLocation($ip) {

        
        $location = $this->repository->findOneBy(["ip" => $ip]);

        if(!$location) {

            $count = $em->repository->createQueryBuilder("i")
                ->select('count(i.id)')
                ->where("i.created_at > :created_at")
                ->setParameter("created_at", date("Y-m-d H:i:s", time() - 30))
                ->getQuery()
                ->getSingleScalarResult();

            if($count > 75) {

                sleep(1);

            }

            try {

                $rsp = $this->api->get($ip);

            }
            catch(\Exception $e) {

                throw $e;

            }
      

            if(isset($rsp->country)) {

                $location = new \Usn\IpLocationBundle\Entity\IpLocation();
                $location->setIp($ip);
                $location->setCountry($rsp->country);
                $location->setJson(json_encode($rsp));
                $location->setCreatedAt(new \Datetime());

                $em->persist($location);
                $em->flush();

            }

        }

        return $location;
        
    }

}