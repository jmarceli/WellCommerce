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
namespace WellCommerce\Plugin\Product\Model;

use WellCommerce\Core\Component\Model\AbstractModel;

/**
 * Class ProductCategory
 *
 * @package WellCommerce\Plugin\Producer\Model
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductCategory extends AbstractModel
{
    protected $table = 'product_category';
    protected $fillable = ['product_id', 'category_id'];

    /**
     * Relation with producer table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('WellCommerce\Core\Model\Product');
    }

    /**
     * Relation with shop table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('WellCommerce\Core\Model\Category');
    }

    /**
     * {@inheritdoc}
     */
    public function getValidationXmlMapping()
    {
        return __DIR__ . '/../Resources/config/validation.xml';
    }
}