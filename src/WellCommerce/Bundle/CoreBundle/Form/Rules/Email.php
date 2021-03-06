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

namespace WellCommerce\Bundle\CoreBundle\Form\Rules;

/**
 * Class Email
 *
 * Checks if field value is valid e-mail
 *
 * @package WellCommerce\Bundle\CoreBundle\Form\Rules
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class Email extends Format implements RuleInterface
{

    public function __construct($errorMsg)
    {
        parent::__construct($errorMsg, '/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.(?:[A-Z]{2}|com|org|net|gov|mil|biz|info|mobi|name|aero|jobs|museum|pro)$/i');
    }

    public function checkValue($value)
    {
        if (strlen($value) == 0) {
            return true;
        }

        return (preg_match($this->_format, $value) == 1);
    }

    public function render()
    {
        $errorMsg = addslashes($this->_errorMsg);

        return "{sType: '{$this->getType()}', sErrorMessage: '{$errorMsg}'}";
    }

}
