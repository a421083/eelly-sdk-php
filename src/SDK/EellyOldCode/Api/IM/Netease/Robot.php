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

namespace Eelly\SDK\EellyOldCode\Api\IM\Netease;

use Eelly\SDK\EellyClient;

class Robot
{
    public static function addRobotToChatRoom(int $liveId, int $number): void
    {
        EellyClient::requestJson('eellyOldCode/IM/Netease/Robot', __FUNCTION__, [
            'liveId' => $liveId, 'number' => $number,
        ]);
    }

    public static function removeChatRoomRobot(int $liveId): void
    {
        EellyClient::requestJson('eellyOldCode/IM/Netease/Robot', __FUNCTION__, ['liveId' => $liveId]);
    }

    public static function resetChatRoomRobot(): void
    {
        // 批量更新机器人状态
        EellyClient::requestJson('eellyOldCode/IM/Netease/Robot', __FUNCTION__);
    }

    public static function getRobotByNeteaseUsername($neteaseUsername): void
    {
        EellyClient::requestJson('eellyOldCode/IM/Netease/Robot', __FUNCTION__, ['neteaseUsername' => $neteaseUsername]);
    }
}
