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
namespace WellCommerce\Bundle\LayoutBundle\Form;

use Symfony\Component\Finder\Finder;
use WellCommerce\Bundle\CoreBundle\Form\AbstractForm;
use WellCommerce\Bundle\CoreBundle\Form\Builder\FormBuilderInterface;
use WellCommerce\Bundle\CoreBundle\Form\DataTransformer\EntityToIdentifierTransformer;
use WellCommerce\Bundle\CoreBundle\Form\FormInterface;

/**
 * Class LayoutBoxForm
 *
 * @package WellCommerce\LayoutBox\Form
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class LayoutBoxForm extends AbstractForm implements FormInterface
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $form = $builder->init($options);

        $requiredData = $form->addChild($builder->getElement('fieldset', [
            'name'  => 'required_data',
            'label' => $this->trans('Required data')
        ]));

        $languageData = $requiredData->addChild($builder->getElement('fieldset_language', [
            'name'  => 'translations',
            'label' => $this->trans('form.required_data.language_data.label')
        ]));

        $languageData->addChild($builder->getElement('text_field', [
            'name'  => 'name',
            'label' => $this->trans('Name'),
            'rules' => [
                $builder->getRule('required', [
                    'message' => $this->trans('Name is required')
                ]),
            ]
        ]));

        $requiredData->addChild($builder->getElement('select', [
            'name'        => 'boxType',
            'label'       => $this->trans('Box type'),
            'options'     => $this->get('layout_box_type.repository')->getCollectionToSelect('type'),
            'transformer' => new EntityToIdentifierTransformer($this->get('layout_box_type.repository'))
        ]));

        $form->addFilter('no_code');
        $form->addFilter('trim');
        $form->addFilter('secure');

        return $form;
    }
}
