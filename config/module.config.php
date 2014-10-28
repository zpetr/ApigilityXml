<?php

return array(
    'zf-content-negotiation' => array(
        // This is an array of controller service names pointing to one of:
        // - a named selector (see below)
        // - an array of specific selectors, in the same format as for the
        //   selectors key
        'controllers' => array(),

        // This is an array of named selectors. Each selector consists of a
        // view model type pointing to the Accept mediatypes that will trigger
        // selection of that view model; see the documentation on the
        // AcceptableViewModelSelector plugin for details on the format:
        // http://zf2.readthedocs.org/en/latest/modules/zend.mvc.plugins.html?highlight=acceptableviewmodelselector#acceptableviewmodelselector-plugin
        'selectors'   => array(
            'Xml' => array(
                'ApigilityXml\View\Model\XmlModel' => array(
                    'application/xml',
                    'application/*+xml',
                ),
            ),
        ),

        // Array of controller service name => allowed accept header pairs.
        // The allowed content type may be a string, or an array of strings.
        'accept_whitelist' => array(),

        // Array of controller service name => allowed content type pairs.
        // The allowed content type may be a string, or an array of strings.
        'content_type_whitelist' => array(),
    ),
    'service_manager' => array(
        'factories' => array(
            'xmlStrategy' => function(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator) {
                    $renderer = new \ApigilityXml\View\Renderer\XmlRenderer();
                    return new \ApigilityXml\View\Strategy\XmlStrategy($renderer);
                },
        )
    )
);
