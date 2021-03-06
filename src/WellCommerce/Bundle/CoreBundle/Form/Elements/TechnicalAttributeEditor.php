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
 * Class TechnicalAttributeEditor
 *
 * @package WellCommerce\Bundle\CoreBundle\Form\Elements
 * @author  Adam Piotrowski <adam@wellcommerce.org>s
 */
class TechnicalAttributeEditor extends AbstractField implements ElementInterface
{

    public function __construct($attributes)
    {
        $attributes['attributes'] = App::getModel('technicaldata')->getTechnicalDataFull();
        parent::__construct($attributes);

        App::getRegistry()->xajaxInterface->registerFunction(array(
            'deleteAttribute',
            $this,
            'deleteAttribute'
        ));

        App::getRegistry()->xajaxInterface->registerFunction(array(
            'renameAttribute',
            $this,
            'renameAttribute'
        ));

        App::getRegistry()->xajaxInterface->registerFunction(array(
            'renameValue',
            $this,
            'renameValue'
        ));

        $this->attributes['deleteAttributeFunction'] = 'xajax_deleteAttribute';
        $this->attributes['renameAttributeFunction'] = 'xajax_renameAttribute';
        $this->attributes['renameValueFunction']     = 'xajax_renameValue';
    }

    public function renameAttribute($request)
    {
        App::getModel('technicaldata')->renameAttribute($request['id'], $request['name'], $request['languageid']);

        return $request;
    }

    public function renameValue($request)
    {
        App::getModel('technicaldata')->renameValue($request['id'], $request['name'], $request['languageid']);

        return $request;
    }

    public function deleteAttribute($request)
    {
        App::getModel('technicaldata')->DeleteDataGroup($request['id'], $request['set_id']);

        return Array(
            'status' => true
        );
    }

    public function prepareAttributesJs()
    {
        $attributes = Array(
            $this->formatAttributeJs('name', 'sName'),
            $this->formatAttributeJs('label', 'sLabel'),
            $this->formatAttributeJs('comment', 'sComment'),
            $this->formatAttributeJs('error', 'sError'),
            $this->formatAttributeJs('set', 'sSetId'),
            $this->formatAttributeJs('attributes', 'aoAttributes', ElementInterface::TYPE_OBJECT),
            $this->formatAttributeJs('onAfterDelete', 'fOnAfterDelete', ElementInterface::TYPE_FUNCTION),
            $this->formatAttributeJs('deleteAttributeFunction', 'fDeleteAttribute', ElementInterface::TYPE_FUNCTION),
            $this->formatAttributeJs('renameAttributeFunction', 'fRenameAttribute', ElementInterface::TYPE_FUNCTION),
            $this->formatAttributeJs('renameValueFunction', 'fRenameValue', ElementInterface::TYPE_FUNCTION),
            $this->formatRepeatableJs(),
            $this->formatRulesJs(),
            $this->formatDependencyJs(),
        );

        return $attributes;
    }
}
