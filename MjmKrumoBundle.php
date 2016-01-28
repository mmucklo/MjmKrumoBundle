<?php

namespace Mjm\KrumoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MjmKrumoBundle
    extends Bundle
{
    public function __construct()
    {
        require_once(__DIR__ . '/../../../krumo/class.krumo.php');
    }
}
