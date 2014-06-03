<?php

namespace ApigilityXml;

use Zend\Mvc\MvcEvent;

/**
 * ZF2 module
 */
class Module
{
    /**
     * Retrieve autoloader configuration
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array('Zend\Loader\StandardAutoloader' => array('namespaces' => array(
            __NAMESPACE__ => __DIR__ . '/src/',
        )));
    }

    /**
     * Retrieve module configuration
     *
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * @param MvcEvent $mvcEvent
     */
    public function onBootstrap(MvcEvent $mvcEvent)
    {
        $app = $mvcEvent->getApplication();
        $app->getEventManager()->attach('render', array($this, 'registerXmlStrategy'), 100);
    }

    public function registerXmlStrategy($e)
    {
        $app          = $e->getTarget();
        $locator      = $app->getServiceManager();
        $view         = $locator->get('Zend\View\View');
        $xmlStrategy  = $locator->get('ApigilityXml\View\Strategy\XmlStrategy');

        // Attach strategy, which is a listener aggregate, at high priority
        $view->getEventManager()->attach($xmlStrategy, 100);
    }
}
