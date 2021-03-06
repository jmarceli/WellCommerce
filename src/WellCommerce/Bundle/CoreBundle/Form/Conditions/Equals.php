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

namespace WellCommerce\Bundle\CoreBundle\Form\Conditions;

/**
 * Class Equals
 *
 * @package WellCommerce\Bundle\CoreBundle\Form\Conditions
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class Equals extends AbstractCondition implements ConditionInterface
{
    /**
     * {@inheritdoc}
     */
    public function evaluate($value)
    {
        if ($this->_argument instanceof ConditionInterface) {
            return false;
        }
        if (is_array($this->_argument)) {
            return in_array($value, $this->_argument);
        }

        return ($value == $this->_argument);
    }

}