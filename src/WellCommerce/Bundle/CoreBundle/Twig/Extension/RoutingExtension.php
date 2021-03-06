<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\CoreBundle\Twig\Extension;

use Symfony\Component\Routing\Router;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RoutingExtension
 *
 * Provides additional routing functions in Twig
 *
 * @package WellCommerce\Bundle\CoreBundle\Twig\Extension
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class RoutingExtension extends \Twig_Extension
{

    private $router;
    private $request;
    private $generator;

    public function __construct(Router $router, Request $request)
    {
        $this->router    = $router;
        $this->request   = $request;
        $this->generator = $router->getGenerator();
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('url', array(
                $this,
                'getUrl'
            ), array(
                'is_safe_callback' => array(
                    $this,
                    'isUrlGenerationSafe'
                )
            )),
            new \Twig_SimpleFunction('path', array(
                $this,
                'getPath'
            ), array(
                'is_safe_callback' => array(
                    $this,
                    'isUrlGenerationSafe'
                )
            ))
        );
    }

    public function getPath($name, $parameters = array(), $relative = false)
    {
        if (!isset($parameters['_locale'])) {
            $parameters['_locale'] = $this->request->attributes->get('_locale');
        }

        return $this->generator->generate($name, $parameters, $relative ? UrlGeneratorInterface::RELATIVE_PATH : UrlGeneratorInterface::ABSOLUTE_PATH);
    }

    public function getUrl($name, $parameters = array(), $schemeRelative = false)
    {
        return $this->generator->generate($name, $parameters, $schemeRelative ? UrlGeneratorInterface::NETWORK_PATH : UrlGeneratorInterface::ABSOLUTE_URL);
    }

    public function isUrlGenerationSafe(\Twig_Node $argsNode)
    {
        // support named arguments
        $paramsNode
            = $argsNode->hasNode('parameters') ? $argsNode->getNode('parameters') : ($argsNode->hasNode(1) ? $argsNode->getNode(1) : null);

        if (null === $paramsNode || $paramsNode instanceof \Twig_Node_Expression_Array && count($paramsNode) <= 2 && (!$paramsNode->hasNode(1) || $paramsNode->getNode(1) instanceof \Twig_Node_Expression_Constant)) {
            return array(
                'html'
            );
        }

        return array();
    }

    public function getName()
    {
        return 'routing';
    }
}
