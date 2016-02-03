<?php

namespace Mjm\KrumoBundle\Twig\Extension;

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
        return 'mjm_krumo_twig_extension';
    }

    public function krumo($obj, $cascade = array())
    {
        ob_start();
        require_once(__DIR__ . '/../../../../../krumo/class.krumo.php');
	if ($cascade)
            \krumo::cascade($cascade);

        krumo($obj);
	if ($cascade)
            \krumo::cascade(null);

        return ob_get_clean();
    }


    public function getFilters()
    {
        return array('krumo' => new \Twig_SimpleFilter('krumo', array($this, 'krumo'), array('is_safe' => array('html'))));
    }

    public function getFunctions()
    {
        return array('krumo' => new \Twig_SimpleFunction('krumo', array($this, 'krumo'), array('is_safe' => array('html'))));
    }
}
