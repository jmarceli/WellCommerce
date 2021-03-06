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

namespace WellCommerce\Bundle\CoreBundle\DataGrid\Configuration\EventHandler;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use WellCommerce\Bundle\CoreBundle\DataGrid\Configuration\OptionInterface;

/**
 * Class ClickRowEventHandler
 *
 * @package WellCommerce\Bundle\CoreBundle\DataGrid\Configuration\EventHandler
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ClickRowEventHandler extends AbstractEventHandler implements EventHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function getFunctionName()
    {
        return 'click_row';
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'function',
            'callback',
            'row_action',
            'context_action',
            'route'
        ]);

        $resolver->setDefaults([
            'function'       => OptionInterface::GF_NULL,
            'callback'       => OptionInterface::GF_NULL,
            'row_action'     => false,
            'context_action' => false,
            'route'          => false,
        ]);

        $resolver->setAllowedTypes([
            'function'       => ['string', 'int'],
            'callback'       => ['string', 'int'],
            'row_action'     => ['bool', 'string'],
            'context_action' => ['bool'],
            'route'          => ['bool', 'string'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getJavascriptFunction()
    {
        return "
        function {$this->options['function']}(dg, id) {
            return window.location.href = Routing.generate('{$this->options['route']}', {id: id});
        }";
    }
}