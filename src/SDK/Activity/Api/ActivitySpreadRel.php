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

namespace Eelly\SDK\Activity\Api;

use Eelly\SDK\EellyClient;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class ActivitySpreadRel
{
    /**
     * 添加推广关系
     *
     * @param int $userId 用户id
     * @param int $spreadId 直接上级用户ID
     * @return bool
     *
     * @author wechan
     * @since 2019年07月25日
     */
    public function addSpreadRel(int $userId, int $spreadId):bool
    {
        return EellyClient::requestJson('activity/activitySpreadRel', __FUNCTION__, [
            'userId' => $userId,
            'spreadId' => $spreadId,
        ]);
    }

    /**
     * 推送推广站内信
     *
     * @param int $type 站内信类型 1.新增粉丝系统消息 2.支付成功资金消息 3.确认收货系统消息
     * @param array $data 请求参数
     *
     * @author wechan
     * @since 2019年07月30日
     */
    public function sendSpreadUserAppInfo(int $type, array $data)
    {
        return EellyClient::requestJson('activity/activitySpreadRel', __FUNCTION__, [
            'type' => $type,
            'data' => $data,
        ]);
    }

    public function preparePosterAsync(int $userId)
    {
        EellyClient::requestJson('activity/activitySpreadRel', __FUNCTION__, ['userId' => $userId]);
    }

    /**
     * @return self
     */
    public static function getInstance(): self
    {
        static $instance;
        if (null === $instance) {
            $instance = new self();
        }

        return $instance;
    }
}