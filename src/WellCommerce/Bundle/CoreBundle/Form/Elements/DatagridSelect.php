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

namespace WellCommerce\Bundle\CoreBundle\Form\Elements;

/**
 * Class DatagridSelect
 *
 * @package WellCommerce\Bundle\CoreBundle\Form\Elements
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class DatagridSelect extends Select implements ElementInterface
{

    public $datagrid;

    protected $_jsFunction;

    const SORT_DIR_ASC  = 1;
    const SORT_DIR_DESC = 2;

    const ALIGN_LEFT   = 1;
    const ALIGN_CENTER = 2;
    const ALIGN_RIGHT  = 3;

    const FILTER_NONE        = 0;
    const FILTER_INPUT       = 1;
    const FILTER_BETWEEN     = 2;
    const FILTER_SELECT      = 3;
    const FILTER_AUTOSUGGEST = 4;

    const WIDTH_AUTO = 0;

    public function __construct($attributes)
    {
        parent::__construct($attributes);
        if (!isset($this->attributes['key'])) {
            throw new Exception("Datagrid key (attribute: key) not set for field '{$this->attributes['name']}'.");
        }
        if (!isset($this->attributes['columns'])) {
            throw new Exception("Datagrid columns (attribute: columns) not set for field '{$this->attributes['name']}'.");
        }
        if (!isset($this->attributes['datagrid_init_function']) || !is_callable($this->attributes['datagrid_init_function'])) {
            throw new Exception("Datagrid initialization function not set (attribute: datagrid_init_function) for field '{$this->attributes['name']}'. Hint: check whether the method you have specified is public.");
        }
        $this->_jsFunction               = 'LoadRecords_' . $this->_id;
        $this->attributes['jsfunction'] = 'xajax_' . $this->_jsFunction;
        App::getRegistry()->xajax->registerFunction(array(
            $this->_jsFunction,
            $this,
            'loadRecords_' . $this->_id
        ));
    }

    protected function prepareAttributesJs()
    {
        $attributes = Array(
            $this->formatAttributeJs('name', 'sName'),
            $this->formatAttributeJs('label', 'sLabel'),
            $this->formatAttributeJs('comment', 'sComment'),
            $this->formatAttributeJs('error', 'sError'),
            $this->formatAttributeJs('jsfunction', 'fLoadRecords', ElementInterface::TYPE_FUNCTION),
            $this->formatAttributeJs('key', 'sKey'),
            $this->formatAttributeJs('columns', 'aoColumns', ElementInterface::TYPE_OBJECT),
            $this->formatAttributeJs('selected_columns', 'aoSelectedColumns', ElementInterface::TYPE_OBJECT),
            $this->formatRepeatableJs(),
            $this->formatRulesJs(),
            $this->formatDependencyJs(),
        );

        return $attributes;
    }

    public function loadRecords($request, $processFunction)
    {
        return $this->getDatagrid()->getData($request, $processFunction);
    }

    public function getDatagrid()
    {
        if ($this->datagrid == null) {
            $this->datagrid = App::getModel('datagrid/datagrid');
            call_user_func($this->attributes['datagrid_init_function'], $this->datagrid);
        }

        return $this->datagrid;
    }

    public function __call($name, $args)
    {
        if (substr($name, 0, 11) == 'loadRecords') {
            return call_user_func(Array(
                $this,
                'loadRecords'
            ), $args[0], $args[1]);
        }
    }

}
