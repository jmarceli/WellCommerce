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

namespace WellCommerce\Bundle\LocaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Locale
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WellCommerce\Bundle\LocaleBundle\Repository\LocaleRepository")
 */
class Locale
{
    use ORMBehaviors\Timestampable\Timestampable;
    use ORMBehaviors\Blameable\Blameable;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=12)
     */
    private $code;

    /**
     * @ORM\ManyToMany(targetEntity="WellCommerce\Bundle\ShopBundle\Entity\Shop", mappedBy="locales")
     */
    private $shops;

    /**
     * Get id.
    
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code.
    
     *
     * @param string $code
     *
     * @return Locale
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code.
    
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}

