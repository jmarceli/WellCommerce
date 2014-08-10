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
namespace WellCommerce\Bundle\UnitBundle\Repository;

use WellCommerce\Bundle\CoreBundle\DataGrid\Repository\DataGridRepositoryInterface;
use WellCommerce\Bundle\CoreBundle\Repository\AbstractEntityRepository;

/**
 * Class UnitRepository
 *
 * @package WellCommerce\Bundle\UnitBundle\Repository
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class UnitRepository extends AbstractEntityRepository implements DataGridRepositoryInterface, UnitRepositoryInterface
{

}