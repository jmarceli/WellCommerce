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

namespace WellCommerce\Bundle\CoreBundle\DataGrid\Loader;

use Doctrine\ORM\Tools\Pagination\Paginator;
use WellCommerce\Bundle\CoreBundle\DataGrid\DataGridInterface;

/**
 * Class Loader
 *
 * @package WellCommerce\Bundle\CoreBundle\DataGrid\Loader
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class Loader implements LoaderInterface
{
    /**
     * String transformers
     *
     * @var array
     */
    private $transformers = ["\r" => '\r', "\n" => '\n'];

    /**
     * @var DataGridInterface
     */
    private $dataGrid;

    /**
     * @var \WellCommerce\Bundle\CoreBundle\DataGrid\Column\ColumnCollection
     */
    private $columns;

    public function getSelectClause()
    {
        $columns = [];
        foreach ($this->columns as $column) {
            $columns[] = $column->getSource();
        }

        return implode(', ', $columns);
    }

    public function loadResults()
    {
        $request       = $this->dataGrid->getCurrentRequest();
        $this->columns = $this->dataGrid->getColumns();
        $queryBuilder  = $this->dataGrid->getQueryBuilder();
        $orderBy       = $this->columns->get($request->getOrderBy())->getSource();

        $queryBuilder->select($this->getSelectClause());
        $queryBuilder->addOrderBy($orderBy, $request->getOrderDir());
        $queryBuilder->setFirstResult($request->getStartingFrom());
        $queryBuilder->setMaxResults($request->getLimit());
        $query = $queryBuilder->getQuery();

        $query->useResultCache(true, 3600, $this->dataGrid->getIdentifier());
        $result = $query->getArrayResult();
        $total  = count($result);

        return [
            'data_id'       => $request->getId(),
            'rows_num'      => $total,
            'starting_from' => $request->getStartingFrom(),
            'total'         => $total,
            'filtered'      => $total,
            'rows'          => $this->processResults($result)
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getResults(DataGridInterface $dataGrid)
    {
        $this->dataGrid = $dataGrid;

        return $this->loadResults();
    }

    /**
     * {@inheritdoc}
     */
    public function processResults($rows)
    {
        $rowData = [];
        foreach ($rows as $row) {
            $columns = [];
            foreach ($row as $param => $value) {
                $processFunction = $this->columns->get($param)->getProcessFunction();
                if (null != $processFunction) {
                    $value = call_user_func($processFunction, $value);
                }

                $columns[$param] = $this->transform($value);
            }
            $rowData[] = $columns;
        }

        return $rowData;
    }

    public function transform($value)
    {
        return strtr(addslashes($value), $this->transformers);
    }
}