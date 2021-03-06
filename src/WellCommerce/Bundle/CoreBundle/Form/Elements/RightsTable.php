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

namespace WellCommerce\Bundle\CoreBundle\Form\Elements;

/**
 * Class RightsTable
 *
 * @package WellCommerce\Bundle\CoreBundle\Form\Elements
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class RightsTable extends AbstractField implements ElementInterface
{

    public function populate($value)
    {
        if (is_array($this->_value)) {
            foreach ($this->_value as $c => &$cV) {
                foreach ($cV as $a => &$aV) {
                    if (isset($value[$c][$a]) && $value[$c][$a]) {
                        $aV = 1;
                    } else {
                        $aV = 0;
                    }
                }
            }
        } else {
            $this->_value = [];
        }
        if (is_array($value)) {
            foreach ($value as $c => $cV2) {
                if (!isset($this->_value[$c])) {
                    $this->_value[$c] = $cV2;
                }
            }
        }
    }

    public function prepareAttributesJs()
    {
        return [
            $this->formatAttributeJs('name', 'sName'),
            $this->formatAttributeJs('label', 'sLabel'),
            $this->formatAttributeJs('comment', 'sComment'),
            $this->formatAttributeJs('error', 'sError'),
            $this->formatAttributeJs('controllers', 'asControllers', ElementInterface::TYPE_OBJECT),
            $this->formatAttributeJs('actions', 'asActions', ElementInterface::TYPE_OBJECT),
            $this->formatRulesJs(),
            $this->formatDependencyJs(),
        ];
    }
}
