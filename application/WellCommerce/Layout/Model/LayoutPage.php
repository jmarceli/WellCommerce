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
namespace WellCommerce\Layout\Model;

use WellCommerce\Core\Model\AbstractModel;
use WellCommerce\Core\Model\ModelInterface;

/**
 * Class LayoutPage
 *
 * @package WellCommerce\Layout\Model
 * @author  Adam Piotrowski <adam@gekosale.com>
 */
class LayoutPage extends AbstractModel implements ModelInterface
{
    protected $table = 'layout_page';
    protected $fillable = ['id', 'name'];

    /**
     * Relation with layout_page_column table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function column()
    {
        return $this->hasMany(__NAMESPACE__ . '\LayoutPageColumn');
    }

    /**
     * {@inheritdoc}
     */
    public function getValidationXmlMapping()
    {
        return __DIR__ . '/../Resources/config/validation.xml';
    }
}