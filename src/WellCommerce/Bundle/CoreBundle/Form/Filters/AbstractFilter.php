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

namespace WellCommerce\Bundle\CoreBundle\Form\Filters;

use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * Class AbstractFilter
 *
 * @package WellCommerce\Bundle\CoreBundle\Form
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
abstract class AbstractFilter extends ContainerAware
{
    /**
     * @var array
     */
    private $options;

    /**
     * {@inheritdoc}
     */
    public function setOptions(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * {@inheritdoc}
     */
    public function filter($values)
    {
        if (is_array($values)) {
            foreach ($values as &$value) {
                $value = $this->filter($value);
            }
        } else {
            $values = $this->filterValue($values);
        }

        return $values;
    }

    /**
     * {@inheritdoc}
     */
    protected function filterValue($value)
    {
        return $value;
    }

}
