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
namespace WellCommerce\Product\DataGrid;

use Illuminate\Database\Capsule\Manager;
use Symfony\Component\Routing\Route;
use WellCommerce\Core\DataGrid\AbstractDataGrid;
use WellCommerce\Core\DataGrid\Collection\RoutesCollection;
use WellCommerce\Core\DataGrid\Column\ColumnCollection;
use WellCommerce\Core\DataGrid\Column\ColumnInterface;
use WellCommerce\Core\DataGrid\Column\DataGridColumn;
use WellCommerce\Core\DataGrid\DataGridInterface;
use WellCommerce\Core\DataGrid\DataGridOptions;
use WellCommerce\Core\DataGrid\DataGridOptionsInterface;

/**
 * Class ProductDataGrid
 *
 * @package WellCommerce\Product\DataGrid
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductDataGrid extends AbstractDataGrid implements DataGridInterface
{
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function getRoutes(RoutesCollection $collection)
    {
        $collection->add([
            'index' => $this->generateUrl('admin.product.index'),
            'edit'  => $this->generateUrl('admin.product.edit')
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function configure(DataGridOptions $options)
    {
        $updateFunction = $this->getXajaxManager()->registerFunction(['update_' . $this->getId(), $this, 'updateRow']);

        $options->addEventHandler(DataGridOptionsInterface::DATAGRID_EVENT_LOAD, 'loadProduct');
        $options->addEventHandler(DataGridOptionsInterface::DATAGRID_EVENT_PROCESS, 'processProduct');
        $options->addEventHandler(DataGridOptionsInterface::DATAGRID_EVENT_UPDATE_ROW, $updateFunction);

        $options->addFilter('producer_id', $this->get('producer.repository')->getAllProducerToFilter());
    }

    /**
     * {@inheritdoc}
     */
    public function initColumns(ColumnCollection $collection)
    {
        $collection->add(new DataGridColumn([
            'id'         => 'id',
            'source'     => 'product.id',
            'caption'    => $this->trans('Id'),
            'sorting'    => [
                'default_order' => ColumnInterface::SORT_DIR_DESC
            ],
            'appearance' => [
                'width'   => 90,
                'visible' => false
            ],
            'filter'     => [
                'type' => ColumnInterface::FILTER_BETWEEN
            ]
        ]));

        $collection->add(new DataGridColumn([
            'id'         => 'name',
            'source'     => 'product_translation.name',
            'caption'    => $this->trans('Name'),
            'appearance' => [
                'width' => 170,
                'align' => ColumnInterface::ALIGN_LEFT
            ],
            'filter'     => [
                'type' => ColumnInterface::FILTER_INPUT
            ]
        ]));

        $collection->add(new DataGridColumn([
            'id'               => 'preview',
            'source'           => 'product.photo_id',
            'caption'          => $this->trans('Thumb'),
            'sorting'          => [
                'default_order' => ColumnInterface::SORT_DIR_DESC
            ],
            'appearance'       => [
                'width'   => 90,
                'visible' => false
            ],
            'process_function' => function ($id) {
                    if ((int)$id == 0) {
                        return '';
                    }

                    return $this->getImageGallery()->getImageUrl($id, 100, 100);
                }
        ]));

        $collection->add(new DataGridColumn([
            'id'         => 'sku',
            'source'     => 'product.sku',
            'caption'    => $this->trans('SKU'),
            'editable'   => true,
            'appearance' => [
                'width' => 20,
            ],
            'filter'     => [
                'type' => ColumnInterface::FILTER_INPUT
            ]
        ]));

        $collection->add(new DataGridColumn([
            'id'         => 'category_id',
            'source'     => 'product_category.category_id',
            'caption'    => $this->trans('Category id'),
            'appearance' => [
                'width'   => 120,
                'visible' => false
            ],
            'filter'     => [
                'type' => ColumnInterface::FILTER_INPUT
            ]
        ]));

        $collection->add(new DataGridColumn([
            'id'         => 'category',
            'source'     => 'GROUP_CONCAT(DISTINCT SUBSTRING(CONCAT(\' \', category_translation.name), 1))',
            'caption'    => $this->trans('Category'),
            'appearance' => [
                'width' => 120,
            ],
            'filter'     => [
                'type' => ColumnInterface::FILTER_INPUT
            ],
            'aggregated' => true
        ]));

        $collection->add(new DataGridColumn([
            'id'         => 'producer_id',
            'source'     => 'product.producer_id',
            'caption'    => $this->trans('Producer'),
            'selectable' => true,
            'appearance' => [
                'width' => 120,
            ],
            'filter'     => [
                'type' => ColumnInterface::FILTER_SELECT
            ]
        ]));

        $collection->add(new DataGridColumn([
            'id'         => 'ean',
            'source'     => 'product.ean',
            'caption'    => $this->trans('EAN'),
            'editable'   => true,
            'appearance' => [
                'width' => 60,
            ],
            'filter'     => [
                'type' => ColumnInterface::FILTER_INPUT
            ]
        ]));

        $collection->add(new DataGridColumn([
            'id'         => 'sell_price',
            'source'     => 'product.sell_price',
            'caption'    => $this->trans('Price net'),
            'editable'   => true,
            'appearance' => [
                'width'   => 40,
                'visible' => false
            ],
            'filter'     => [
                'type' => ColumnInterface::FILTER_BETWEEN
            ],
        ]));

        $collection->add(new DataGridColumn([
            'id'         => 'sell_price_gross',
            'source'     => 'ROUND(product.sell_price * (1 + (tax.value / 100)), 2)',
            'caption'    => $this->trans('Price gross'),
            'editable'   => true,
            'appearance' => [
                'width' => 40,
            ],
            'filter'     => [
                'type' => ColumnInterface::FILTER_BETWEEN
            ],
            'aggregated' => true
        ]));

        $collection->add(new DataGridColumn([
            'id'         => 'stock',
            'source'     => 'product.stock',
            'caption'    => $this->trans('Stock'),
            'editable'   => true,
            'appearance' => [
                'width' => 40,
            ],
            'filter'     => [
                'type' => ColumnInterface::FILTER_BETWEEN
            ]
        ]));

        $collection->add(new DataGridColumn([
            'id'         => 'hierarchy',
            'source'     => 'product.hierarchy',
            'caption'    => $this->trans('Hierarchy'),
            'editable'   => true,
            'appearance' => [
                'width' => 40,
            ],
            'filter'     => [
                'type' => ColumnInterface::FILTER_BETWEEN
            ]
        ]));

        $collection->add(new DataGridColumn([
            'id'         => 'weight',
            'source'     => 'product.weight',
            'caption'    => $this->trans('Weight'),
            'editable'   => true,
            'appearance' => [
                'width' => 40,
            ],
            'filter'     => [
                'type' => ColumnInterface::FILTER_BETWEEN
            ]
        ]));
    }

    /**
     * {@inheritdoc}
     */
    public function setQuery(Manager $manager)
    {
        $this->query = $manager->table('product');
        $this->query->leftJoin('product_translation', 'product_translation.product_id', '=', 'product.id');
        $this->query->leftJoin('product_category', 'product_category.product_id', '=', 'product.id');
        $this->query->leftJoin('category_translation', 'category_translation.category_id', '=', 'product_category.category_id');
        $this->query->leftJoin('tax', 'product.tax_id', '=', 'tax.id');
        $this->query->groupBy('product.id');
    }
}