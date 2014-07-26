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

namespace WellCommerce\Layout\Repository;

/**
 * Interface LayoutBoxRepositoryInterface
 *
 * @package WellCommerce\Layout\Repository
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface LayoutBoxRepositoryInterface
{
    const POST_DELETE_EVENT = 'layout_box.repository.post_delete';
    const PRE_SAVE_EVENT    = 'layout_box.repository.pre_save';
    const POST_SAVE_EVENT   = 'layout_box.repository.post_save';

    /**
     * Returns all boxes as a collection
     *
     * @return mixed
     */
    public function all();

    /**
     * Returns single LayoutBox model
     *
     * @param $id
     *
     * @return mixed
     */
    public function find($id);

    /**
     * Saves new or existing LayoutBox model
     *
     * @param array $data
     * @param null  $id
     *
     * @return mixed
     */
    public function save(array $data, $id = null);

    /**
     * Deletes LayoutBox model
     *
     * @param $id
     *
     * @return mixed
     */
    public function delete($id);
}