<?php

namespace Bootcamp\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BootcampUserBundle extends Bundle
{
     public function getParent()
    {
        return 'FOSUserBundle';
    }
}
