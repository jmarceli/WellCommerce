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
 * Class UpdateRowEventHandler
 *
 * @package WellCommerce\Bundle\CoreBundle\DataGrid\Configuration\EventHandler
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class UpdateRowEventHandler extends AbstractEventHandler implements EventHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function getFunctionName()
    {
        return 'update_row';
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'function',
            'route',
        ]);

        $resolver->setDefaults([
            'function' => OptionInterface::GF_NULL,
            'route'    => OptionInterface::GF_NULL,
        ]);

        $resolver->setAllowedTypes([
            'function' => ['string'],
            'route'    => ['string'],
        ]);
    }

    public function getJavascriptFunction()
    {
        return "
        function {$this->options['function']}(sId, oRow, sColumn, sPreviousValue) {
            var oRequest = {
                id:        sId,
                product:   oRow,
                column:    sColumn,
                previous:  sPreviousValue,
            };

            DataGrid.MakeRequest(Routing.generate('{$this->options['route']}'), oRequest, function(oData){
                if(oData.success){
                   GMessage(oRow.name + ' successfully saved');
                   DataGrid.LoadData();
                   DataGrid.ClearSelection();
                }

                if(oData.error){
                    GError(oData.error);
                    DataGrid.ClearSelection();
                }
            });
        }";
    }
}