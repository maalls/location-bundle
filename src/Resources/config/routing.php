<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('usn_ip_location_homepage', new Route('/', array(
    '_controller' => 'UsnIpLocationBundle:Default:index',
)));

return $collection;
