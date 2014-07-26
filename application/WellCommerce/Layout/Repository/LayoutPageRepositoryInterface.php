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
 * Interface LayoutPageRepositoryInterface
 *
 * @package WellCommerce\Layout\Repository
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface LayoutPageRepositoryInterface
{
    const POST_DELETE_EVENT = 'layout_page.repository.post_delete';
    const PRE_SAVE_EVENT    = 'layout_page.repository.pre_save';
    const POST_SAVE_EVENT   = 'layout_page.repository.post_save';

    /**
     * Returns all themes as a collection
     *
     * @return mixed
     */
    public function all();

    /**
     * Returns single LayoutPage model
     *
     * @param $id
     *
     * @return mixed
     */
    public function find($id);

    /**
     * Returns all pages bound to particular theme
     *
     * @param int $id Theme id
     *
     * @return mixed
     */
    public function findPagesByThemeId($id);

    /**
     * Saves new or existing LayoutPage model
     *
     * @param array $data
     * @param null  $id
     *
     * @return mixed
     */
    public function save(array $data, $id = null);

    /**
     * Deletes LayoutPage model
     *
     * @param $id
     *
     * @return mixed
     */
    public function delete($id);

    /**
     * Returns Collection as ke-value pairs ready to use in selects
     *
     * @return mixed
     */
    public function getAllLayoutPageToSelect();
}