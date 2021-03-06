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

namespace Eelly\SDK\Tim\Service;

/**
 * IM消息逻辑接口层
 *
 * @author eellytools<localhost.shell@gmail.com>
 */
interface MsgSenderInterface
{
    /**
     * 发送单聊消息
     *
     * @internal
     *
     * @param array       $from         ['uid'=>0,'type'=>4]
     * @param array       $to           [['uid'=>148086,'type'=>1]]
     * @param string      $msgType
     * @param array       $msgContent
     * @param array|null  $offlinePushInfo
     * @param array|null  $extension ['syncOtherMachine' => 0, 'msgLifeTime' => 0, 'msgRandom' => 0, 'msgTimeStamp' => 0]
     * @return bool
     * @see https://cloud.tencent.com/document/product/269/2282
     *
     * @author zhangyangxun
     * @since 2019-03-20
     */
    public function sendMessage(array $from, array $to, string $msgType, array $msgContent, array $offlinePushInfo = null, array $extension = null): bool ;
}