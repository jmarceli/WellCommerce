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

namespace WellCommerce\Bundle\CoreBundle\DataGrid\Manager;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Translation\TranslatorInterface;
use WellCommerce\Bundle\CoreBundle\DataGrid\Column\ColumnCollection;
use WellCommerce\Bundle\CoreBundle\DataGrid\Loader\LoaderInterface;
use WellCommerce\Bundle\CoreBundle\DataGrid\Options\OptionsInterface;
use WellCommerce\Bundle\CoreBundle\Helper\Image\ImageHelperInterface;
use WellCommerce\Bundle\CoreBundle\Helper\Redirect\RedirectHelperInterface;

/**
 * Class DataGridManager
 *
 * @package WellCommerce\Bundle\CoreBundle\DataGrid\Manager
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class DataGridManager implements DataGridManagerInterface
{
    protected $columnCollection;
    protected $options;
    protected $loader;
    protected $eventDispatcher;
    protected $router;
    protected $xajaxManager;
    protected $translator;
    protected $redirectHelper;
    protected $imageHelper;

    /**
     * Constructor
     *
     * @param ColumnCollection         $columnCollection
     * @param OptionsInterface         $options
     * @param LoaderInterface          $loader
     * @param EventDispatcherInterface $eventDispatcher
     * @param RouterInterface          $router
     * @param TranslatorInterface      $translator
     * @param RedirectHelperInterface  $redirectHelper
     */
    public function __construct(
        ColumnCollection $columnCollection,
        OptionsInterface $options,
        LoaderInterface $loader,
        EventDispatcherInterface $eventDispatcher,
        RouterInterface $router,
        TranslatorInterface $translator,
        RedirectHelperInterface $redirectHelper,
        ImageHelperInterface $imageHelper
    ) {
        $this->columnCollection = $columnCollection;
        $this->options          = $options;
        $this->loader           = $loader;
        $this->eventDispatcher  = $eventDispatcher;
        $this->router           = $router;
        $this->translator       = $translator;
        $this->redirectHelper   = $redirectHelper;
        $this->imageHelper      = $imageHelper;
    }

    /**
     * {@inheritdoc}
     */
    public function getColumnCollection()
    {
        return $this->columnCollection;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * {@inheritdoc}
     */
    public function getLoader()
    {
        return $this->loader;
    }

    /**
     * {@inheritdoc}
     */
    public function getEventDispatcher()
    {
        return $this->eventDispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * {@inheritdoc}
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * {@inheritdoc}
     */
    public function translate($message)
    {
        return $this->translator->trans($message, [], 'admin');
    }

    /**
     * {@inheritdoc}
     */
    public function getRouteForAction($action)
    {
        return $this->redirectHelper->getActionForCurrentController($action);
    }

    /**
     * {@inheritdoc}
     */
    public function getImage($path, $filter, array $config = [])
    {
        return $this->imageHelper->getImage($path, $filter, $config);
    }
} 