<?php

namespace Maalls\LocationBundle\Service;

use Maalls\LocationBundle\Lib\IpApi;
use Maalls\LocationBundle\Repository\IpLocationRepository;
use Maalls\LocationBundle\Entity\IpLocation;

class IpLocationService {

    protected $api;

    public function __construct(IpApi $api, \Doctrine\ORM\EntityManagerInterface $em)
    {

        $this->api = $api;
        $this->em = $em;
        $this->repository = $em->getRepository(IpLocation::class);

    }

    public function getLocation($ip) {

        
        $location = $this->repository->findOneBy(["ip" => $ip]);

        if(!$location) {

            $count = $this->repository->createQueryBuilder("i")
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

                $location = new IpLocation();
                $location->setIp($ip);
                $location->setCountry($rsp->country);
                $location->setJson(json_encode($rsp));
                $location->setCreatedAt(new \Datetime());

                $this->em->persist($location);
                $this->em->flush();

            }

        }

        return $location;
        
    }

}