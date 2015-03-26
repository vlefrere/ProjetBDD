<?php

namespace StudentBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class StudentBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
