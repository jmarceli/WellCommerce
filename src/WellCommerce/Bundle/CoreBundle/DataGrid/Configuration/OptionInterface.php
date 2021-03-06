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

namespace WellCommerce\Bundle\CoreBundle\DataGrid\Configuration;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Interface OptionInterface
 *
 * @package WellCommerce\Bundle\CoreBundle\DataGrid\Configuration
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface OptionInterface
{
    const GF_NULL             = -9999;
    const ACTION_EDIT         = 'GF_Datagrid.ACTION_EDIT';
    const ACTION_DELETE       = 'GF_Datagrid.ACTION_DELETE';
    const ACTION_DELETE_GROUP = 'GF_Datagrid.ACTION_DELETE_GROUP';
    const ACTION_VIEW         = 'GF_Datagrid.ACTION_VIEW';
    const TYPE_NUMBER         = 'integer';
    const TYPE_STRING         = 'string';
    const TYPE_BOOLEAN        = 'boolean';

    /**
     * Every component must contain configuration for its options
     *
     * @param OptionsResolverInterface $resolver
     *
     * @return mixed
     */
    public function configureOptions(OptionsResolverInterface $resolver);
} 