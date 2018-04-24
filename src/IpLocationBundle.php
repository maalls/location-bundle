<?php

namespace Maalls\LocationBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Maalls\LocationBundle\DependencyInjection\MaallsLocationExtension;
class IpLocationBundle extends Bundle
{

    public function getContainerExtension()
    {
        return new MaallsLocationExtension();
    }
}
