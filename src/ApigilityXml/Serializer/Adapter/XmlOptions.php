<?php

namespace ApigilityXml\Serializer\Adapter;

use Zend\Serializer\Exception;
use Zend\Serializer\Adapter\AdapterOptions;

class XmlOptions extends AdapterOptions
{
    /**
     * @var int
     */
    protected $rootNode = 'root';

    /**
     * @return int
     */
    public function getRootNode()
    {
        return $this->rootNode;
    }

    /**
     * @param int $rootNode
     */
    public function setRootNode($rootNode)
    {
        $this->rootNode = $rootNode;
    }
}
