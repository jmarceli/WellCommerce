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

namespace WellCommerce\Bundle\CoreBundle\DataSet;

use Symfony\Component\DependencyInjection\ContainerInterface;
use WellCommerce\Bundle\CoreBundle\DataSet\QueryBuilder\QueryBuilderInterface;
use WellCommerce\Bundle\CoreBundle\DataSet\Column\ColumnCollection;
use WellCommerce\Bundle\CoreBundle\DataSet\Request\RequestInterface;
use WellCommerce\Bundle\CoreBundle\Repository\RepositoryInterface;

/**
 * Class AbstractDataSet
 *
 * @package WellCommerce\Bundle\CoreBundle\DataSet
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
abstract class AbstractDataSet
{
    private $identifier;

    /**
     * @var \WellCommerce\Bundle\CoreBundle\DataSet\Column\ColumnCollection
     */
    protected $columns;
    private $queryBuilder;
    private $request;

    /**
     * Constructor
     *
     * @param ContainerInterface  $container
     * @param RepositoryInterface $repository
     * @param LoaderInterface     $loader
     */
    public function __construct(ContainerInterface $container, LoaderIn $loader)
    {
        $this->container  = $container;
        $this->repository = $repository;
        $this->loader     = $loader;
    }

    /**
     * {@inheritdoc}
     */
    public function setColumns(ColumnCollection $columns)
    {
        $this->columns = $columns;
    }

    /**
     * {@inheritdoc}
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * {@inheritdoc}
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * {@inheritdoc}
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * {@inheritdoc}
     */
    public function setQueryBuilder(QueryBuilderInterface $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function getQueryBuilder()
    {
        return $this->queryBuilder;
    }

    public function getRows()
    {

    }

    public function getTotal()
    {

    }

    public function getCacheKey()
    {

    }

    public function isCacheEnabled()
    {

    }

    public function getTtl()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function setCurrentRequest(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentRequest()
    {
        return $this->request;
    }
}