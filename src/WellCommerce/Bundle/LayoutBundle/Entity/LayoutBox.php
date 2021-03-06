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

namespace WellCommerce\Bundle\LayoutBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use WellCommerce\Bundle\CoreBundle\Entity\Behaviours\EnableableTrait;

/**
 * LayoutBox
 *
 * @ORM\Table("layout_box")
 * @ORM\Entity(repositoryClass="WellCommerce\Bundle\LayoutBundle\Repository\LayoutBoxRepository")
 */
class LayoutBox
{
    use ORMBehaviors\Timestampable\Timestampable;
    use ORMBehaviors\Translatable\Translatable;
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
     * @ORM\ManyToOne(targetEntity="WellCommerce\Bundle\LayoutBundle\Entity\LayoutBoxType")
     * @ORM\JoinColumn(name="layout_box_type_id", referencedColumnName="id", onDelete="SET NULL")
     * @ORM\OrderBy({"type" = "ASC"})
     */
    private $boxType;

    /**
     * @var string
     *
     * @ORM\Column(name="settings", type="json_array", nullable=true)
     */
    private $settings;

    /**
     * @var string
     *
     * @ORM\Column(name="visibility", type="integer", nullable=true, options={"default":1})
     */
    private $visibility;

    /**
     * @ORM\Column(name="show_header", type="boolean", nullable=true, options={"default":1})
     */
    private $showHeader;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \WellCommerce\Bundle\LayoutBundle\Entity\LayoutBoxType
     */
    public function getBoxType()
    {
        return $this->boxType;
    }

    public function setBoxType(LayoutBoxType $boxType)
    {
        $this->boxType = $boxType;
    }

    public function getVisibility()
    {
        return $this->visibility;
    }

    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }

    public function getShowHeader()
    {
        return $this->showHeader;
    }

    public function setShowHeader($showHeader)
    {
        $this->showHeader = $showHeader;
    }

    public function getSettings()
    {
        return $this->settings;
    }

    public function setSettings($settings)
    {
        $this->settings = $settings;
    }
}
