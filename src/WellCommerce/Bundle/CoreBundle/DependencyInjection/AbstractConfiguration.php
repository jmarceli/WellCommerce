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

namespace WellCommerce\Bundle\CoreBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\DependencyInjection\Extension\ConfigurationExtensionInterface;

/**
 * Class AbstractConfiguration
 *
 * @package WellCommerce\Bundle\CoreBundle\DependencyInjection
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
abstract class AbstractConfiguration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        return new TreeBuilder();
    }
} 