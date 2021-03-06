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
namespace WellCommerce\Bundle\ProductBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use WellCommerce\Bundle\AdminMenuBundle\Builder\AdminMenuItem;
use WellCommerce\Bundle\AdminMenuBundle\Event\AdminMenuInitEvent;
use WellCommerce\Bundle\CoreBundle\Event\AdminMenuEvent;
use WellCommerce\Bundle\CoreBundle\EventListener\AbstractEventSubscriber;

/**
 * Class ProductSubscriber
 *
 * @package WellCommerce\Bundle\ProductBundle\EventListener
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductSubscriber extends AbstractEventSubscriber
{
    /**
     * Adds new admin menu items to collection
     *
     * @param AdminMenuEvent $event
     */
    public function onAdminMenuInitEvent(AdminMenuEvent $event)
    {
        $builder = $event->getBuilder();

        $builder->add(new AdminMenuItem([
            'id'         => 'product',
            'name'       => $this->translator->trans('menu.catalog.product'),
            'link'       => $this->router->generate('admin.product.index'),
            'path'       => '[menu][catalog][product]',
            'sort_order' => 30
        ]));

        $builder->add(new AdminMenuItem([
            'id'         => 'product_status',
            'name'       => $this->translator->trans('menu.catalog.product_status'),
            'link'       => $this->router->generate('admin.product_status.index'),
            'path'       => '[menu][catalog][product_status]',
            'sort_order' => 40
        ]));
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            AdminMenuInitEvent::ADMIN_MENU_INIT_EVENT => 'onAdminMenuInitEvent'
        ];
    }
}