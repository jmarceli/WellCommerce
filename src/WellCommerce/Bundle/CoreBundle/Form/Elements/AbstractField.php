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

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\PropertyAccess\PropertyPath;

/**
 * Class AbstractField
 *
 * @package WellCommerce\Bundle\CoreBundle\Form\Elements
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class AbstractField extends AbstractNode
{
    protected $_value = '';

    public function validate($resource)
    {
        $violations = $this->getValidator()->validatePropertyValue($resource, $this->getName(), $this->_value);
        $result     = true;

        if ($violations->count()) {
            $errorMessages = [];
            foreach ($violations as $violation) {
                $errorMessages[] = $violation->getMessage();
            }
            $this->attributes['error'] = implode('.', $errorMessages);
            $result                    = false;
        }

        return $result;
    }

    public function populate($value)
    {
        $value        = $this->filter($value);
        $this->_value = $value;
    }

    public function getValue()
    {
        if (!isset($this->_value)) {
            return null;
        }

        return $this->_value;
    }

    /**
     * Returns formatted rules string
     *
     * @return string
     */
    protected function formatRulesJs()
    {
        $rules = [];

        /**
         * @var $rule \WellCommerce\Bundle\CoreBundle\Form\Rules\RuleInterface
         */
        foreach ($this->attributes['rules'] as $rule) {
            $rules[] = $rule->render();
        }

        return 'aoRules: [' . implode(', ', $rules) . ']';
    }

    /**
     * {@inheritdoc}
     */
    public function setPropertyPath()
    {
        $this->attributes['property_path'] = new PropertyPath($this->getName());
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaults($defaultData, $isNewResource)
    {
        $accessor = $this->getPropertyAccessor();

        if (null !== $this->getPropertyPath() && $accessor->isReadable($defaultData, $this->getPropertyPath())) {

            if ($isNewResource) {
                $value = $this->attributes['default'];
            } else {
                $value = $accessor->getValue($defaultData, $this->getPropertyPath());

                if ($this->hasTransformer()) {
                    $value = $this->getTransformer()->transform($value);
                }
            }

            $this->populate($value);
        }
    }

    protected function getDefaultValue()
    {
        if (isset($this->attributes['default'])) {
            return $this->attributes['default'];
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function handleRequest($data)
    {
        $accessor = $this->getPropertyAccessor();
        if (null !== $this->getPropertyPath() && $accessor->isReadable($data, $this->getPropertyPath())) {
            $value = $this->getValue();
            if ($this->hasTransformer()) {
                $value = $this->getTransformer()->reverseTransform($value);
            }
            $accessor->setValue($data, $this->getName(), $value);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureAttributes(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired([
            'name',
            'label',
        ]);

        $resolver->setOptional([
            'comment',
            'error',
            'default',
            'dependencies',
            'rules',
            'filters',
            'property_path',
            'transformer'
        ]);

        $resolver->setDefaults([
            'default'       => null,
            'dependencies'  => [],
            'filters'       => [],
            'rules'         => [],
            'property_path' => null,
            'transformer'   => null
        ]);

        $resolver->setAllowedTypes([
            'name'          => 'string',
            'label'         => 'string',
            'comment'       => 'string',
            'error'         => 'string',
            'default'       => ['string', 'integer', 'null'],
            'dependencies'  => 'array',
            'filters'       => 'array',
            'rules'         => 'array',
            'property_path' => ['null', 'Symfony\Component\PropertyAccess\PropertyPath'],
            'transformer'   => ['null', 'WellCommerce\Bundle\CoreBundle\Form\DataTransformer\DataTransformerInterface'],
        ]);
    }
}
