<?php

declare(strict_types=1);

/*
 * This file is part of eelly package.
 *
 * (c) eelly.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eelly\SDK\EellyOldCode\Api\Store;

use Eelly\SDK\EellyClient;

/**
 * Class Store.
 *
 *  modules/Store/Service/GeneralizeService.php
 *
 * @author hehui<hehui@eelly.net>
 */
class Generalize
{
    /**
     * 判断pr_id是否属于推广增值服务
     *
     * @param  int    $prId
     * @return int    $gsublId   购买日志ID
     */
    public function isGeneralizePrId($prId)
    {
        return EellyClient::request('eellyOldCode/store/generalize', __FUNCTION__, true, $prId);
    }
}
