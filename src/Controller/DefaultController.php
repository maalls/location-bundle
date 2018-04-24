<?php

namespace Usn\IpLocationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UsnIpLocationBundle:Default:index.html.twig');
    }
}
