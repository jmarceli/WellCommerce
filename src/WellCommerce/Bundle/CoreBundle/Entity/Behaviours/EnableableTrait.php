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

namespace WellCommerce\Bundle\CoreBundle\Entity\Behaviours;

/**
 * Class EnableableTrait
 *
 * @package WellCommerce\Bundle\CoreBundle\Entity\Behaviours
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
trait EnableableTrait
{
    /**
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    public function getEnabled()
    {
        return $this->enabled;
    }

    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }
} 