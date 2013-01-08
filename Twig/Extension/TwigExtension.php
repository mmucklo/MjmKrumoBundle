<?php

namespace Oodle\KrumoBundle\Twig\Extension;

class TwigExtension
    extends \Twig_Extension
{
    public function setKrumoConfig($config)
    {
        require_once(__DIR__ . '/../../../../../krumo/class.krumo.php');
        \krumo::setConfig($config);
    }

    public function getName()
    {
        return 'oodle_krumo_twig_extension';
    }

    public function krumo($obj)
    {
        ob_start();
        require_once(__DIR__ . '/../../../../../krumo/class.krumo.php');
        krumo($obj);
        return ob_get_clean();
    }


    public function getFilters()
    {
        return array('krumo' => new \Twig_Filter_Method($this, 'krumo', array('is_safe' => array('html'))));
    }
}
