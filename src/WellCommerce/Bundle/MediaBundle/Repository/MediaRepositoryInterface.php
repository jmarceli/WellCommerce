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

namespace WellCommerce\Bundle\MediaBundle\Repository;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use WellCommerce\Bundle\CoreBundle\DataGrid\Repository\DataGridAwareRepositoryInterface;
use WellCommerce\Bundle\CoreBundle\Repository\RepositoryInterface;

/**
 * Interface LocaleRepositoryInterface
 *
 * @package WellCommerce\Bundle\MediaBundle\Repository
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface MediaRepositoryInterface extends RepositoryInterface, DataGridAwareRepositoryInterface
{
    /**
     * Saves uploaded file info
     *
     * @param UploadedFile $file
     * @param              $dir
     *
     * @return mixed
     */
    public function save(UploadedFile $file, $dir);
} 