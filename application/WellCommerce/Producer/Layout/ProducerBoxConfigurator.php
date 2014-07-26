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

namespace WellCommerce\Producer\Layout;

use WellCommerce\Core\Layout\Box\LayoutBoxConfigurator;
use WellCommerce\Core\Layout\Box\LayoutBoxConfiguratorInterface;

/**
 * Class ProducerBoxConfigurator
 *
 * @package WellCommerce\Producer\Layout
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProducerBoxConfigurator extends LayoutBoxConfigurator implements LayoutBoxConfiguratorInterface
{
    public $name = 'ProducerBox';
}