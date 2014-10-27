<?php

namespace ApigilityXml\View\Model;

use ApigilityXml\Serializer\Adapter\Xml as XmlSerializer;
use Traversable;
use Zend\Stdlib\ArrayUtils;
use Zend\View\Model\ViewModel;

/**
 * Class XmlModel
 * @package ApigilityXml\View\Model
 */
class XmlModel extends ViewModel
{
    /**
     * XML probably won't need to be captured into
     * a parent container by default.
     *
     * @var string
     */
    protected $captureTo = null;

    /**
     * XML is usually terminal
     *
     * @var bool
     */
    protected $terminate = true;

    /**
     * Serialize to XML
     *
     * @return string
     */
    public function serialize()
    {
        $variables = $this->getVariables();


        if ($variables instanceof Traversable) {
            $variables = ArrayUtils::iteratorToArray($variables);
        }

        $payload = $variables['payload'];
        $collection = $payload->entity->getCollection();
        $serializer = new XmlSerializer();
        $xml = $serializer->serialize($collection);

        return $xml;
    }
}