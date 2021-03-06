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
namespace WellCommerce\Bundle\CoreBundle\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class RepositoryEvent
 *
 * @package WellCommerce\Bundle\CoreBundle\Event
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class RepositoryEvent extends Event
{
    /**
     * Passed model
     *
     * @var object
     */
    private $model;

    /**
     * Passed data
     *
     * @var array
     */
    private $data;

    /**
     * Constructor
     *
     * @param object $model
     * @param array  $data
     */
    public function __construct($model, array $data = [])
    {
        $this->model = $model;
        $this->data  = $data;
    }

    /**
     * Returns passed model object
     *
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Returns event data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Sets event data
     *
     * @param array $data
     */
    public function setData(array $data = [])
    {
        $this->data = $data;
    }
}