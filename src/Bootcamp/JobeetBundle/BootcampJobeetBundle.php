<?php

namespace Bootcamp\JobeetBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BootcampJobeetBundle extends Bundle
{
     public function getParent()
    {
        return 'FOSUserBundle';
    }
}
