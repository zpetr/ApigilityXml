<?php

namespace ApigilityXml\View\Renderer;

use ApigilityXml\View\Model\XmlModel;
use Zend\View\Model\ModelInterface;
use Zend\View\Renderer\RendererInterface;
use Zend\View\Resolver\ResolverInterface;
use Zend\View\Exception;

/**
 * Class XmlRenderer
 * @package ApigilityXml\View\Renderer
 */
class XmlRenderer implements RendererInterface
{
    protected $resolver;

    /**
     * Return the template engine object, if any
     *
     * If using a third-party template engine, such as Smarty, patTemplate,
     * phplib, etc, return the template engine object. Useful for calling
     * methods on these objects, such as for setting filters, modifiers, etc.
     *
     * @return mixed
     */
    public function getEngine()
    {
        return $this;
    }

    /**
     * Set the resolver used to map a template name to a resource the renderer may consume.
     *
     * @param  ResolverInterface $resolver
     * @return RendererInterface
     */
    public function setResolver(ResolverInterface $resolver)
    {
        $this->resolver = $resolver;
    }

    /**
     * Render values as XML
     *
     * @param  string|ModelInterface $nameOrModel The script/resource process, or a view model
     * @param  null|array|\ArrayAccess $values Values to use during rendering
     * @return string The script output.
     */
    public function render($nameOrModel, $values = null)
    {
        if ($nameOrModel instanceof XmlModel) {
            return $nameOrModel->serialize();
        }

        // use case 3: Both $nameOrModel and $values are populated
        throw new Exception\DomainException(sprintf(
            '%s: Do not know how to handle operation when both $nameOrModel and $values are populated',
            __METHOD__
        ));
    }
}