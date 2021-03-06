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

namespace WellCommerce\Bundle\UserBundle\Behat;

use WellCommerce\Bundle\CoreBundle\Behat\CoreContext;

/**
 * Class UserContext
 *
 * @package WellCommerce\Bundle\UserBundle\Behat
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class UserContext extends CoreContext
{
    /**
     * @Given I am on the index page
     */
    public function iAmOnTheIndexPage()
    {
        $this->getSession()->visit($this->generateUrl('admin.user.index'));
    }
}