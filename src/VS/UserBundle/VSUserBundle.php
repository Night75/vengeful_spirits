<?php

namespace VS\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VSUserBundle extends Bundle
{
	public function getParent()
    {
        return 'SonataUserBundle';
    }
}
