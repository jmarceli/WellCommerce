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

namespace WellCommerce\Bundle\MediaBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\File;
use WellCommerce\Bundle\CoreBundle\Controller\Admin\AbstractAdminController;
use WellCommerce\Bundle\MediaBundle\Entity\Media;

/**
 * Class MediaController
 *
 * @package WellCommerce\Bundle\MediaBundle\Controller
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 *
 * @Template()
 */
class MediaController extends AbstractAdminController
{
    /**
     * Uploads and saves the file
     *
     * @param Request $request
     *
     * @return array|JsonResponse
     */
    public function addAction(Request $request)
    {
        $file     = $request->files->get('file');
        $uploader = $this->get('file_uploader');

        try {
            $media     = $uploader->upload($file, 'images');
            $thumbnail = $this->get('liip_imagine.cache.manager')->getBrowserPath($media->getPath(), 'medium');

            $response = [
                'sId'        => $media->getId(),
                'sThumb'     => $thumbnail,
                'sFilename'  => $media->getName(),
                'sExtension' => $media->getExtension(),
                'sFileType'  => $media->getMime()
            ];

        } catch (\Exception $e) {

            $response = [
                'sError'   => $this->trans('uploader.error'),
                'sMessage' => $this->trans($e->getMessage()),
            ];
        }

        return new JsonResponse($response);
    }
}
