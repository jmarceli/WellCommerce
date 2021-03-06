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
 * Class AddressTrait
 *
 * @package WellCommerce\Bundle\CoreBundle\Entity\Behaviours
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
trait AddressTrait {

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="street_no", type="string", length=255, nullable=true)
     */
    private $streetNo;

    /**
     * @var string
     *
     * @ORM\Column(name="flat_no", type="string", length=255, nullable=true)
     */
    private $flatNo;

    /**
     * @var string
     *
     * @ORM\Column(name="post_code", type="string", length=255, nullable=true)
     */
    private $postCode;

    /**
     * @var string
     *
     * @ORM\Column(name="province", type="string", length=255, nullable=true)
     */
    private $province;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=3, nullable=true)
     */
    private $country;

    /**
     * Set street.
     *
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street.
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set streetNo.
     *
     * @param string $streetNo
     */
    public function setStreetNo($streetNo)
    {
        $this->streetNo = $streetNo;

        return $this;
    }

    /**
     * Get streetNo.
     *
     * @return string
     */
    public function getStreetNo()
    {
        return $this->streetNo;
    }

    /**
     * Set flatNo.
     *
     * @param string $flatNo
     */
    public function setFlatNo($flatNo)
    {
        $this->flatNo = $flatNo;

        return $this;
    }

    /**
     * Get flatNo.
     *
     * @return string
     */
    public function getFlatNo()
    {
        return $this->flatNo;
    }

    /**
     * Set postCode.
     *
     * @param string $postCode
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get postCode.
     *
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set city.
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set province.
     *
     * @param string $province
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province.
     *
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set country.
     *
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }
} 