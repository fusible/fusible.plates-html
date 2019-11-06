<?php

namespace Fusible\PlatesHtml;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;
use Aura\Html\HelperLocatorFactory;
use Aura\Html\HelperLocator;

class HtmlHelper implements ExtensionInterface
{
    protected $helper;

    public function register(Engine $engine)
    {
        $engine->registerFunction('html', [$this, 'getHelper']);
    }

    public function getHelper() : HelperLocator
    {
        if (! $this->helper) {
            $this->helper = $this->newHelper();
        }
        return $this->helper;
    }

    public function newHelper() : HelperLocator
    {
        $factory = new HelperLocatorFactory();
        return $factory->newInstance();
    }
}
