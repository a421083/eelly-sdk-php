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

namespace Eelly\SDK\Im\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\Im\Service\TeamDetailInterface;

/**
 * @author shadonTools<localhost.shell@gmail.com>
 */
class TeamDetail implements TeamDetailInterface
{
    /**
     * 更新群会话设置.
     *
     * @internal
     *
     * @param string $tid
     * @param int    $userId
     * @param int    $userType
     * @param int    $attr     1.置顶 2.免打扰
     * @param int    $value
     *
     * @return bool
     *
     * @author zhangyangxun
     */
    public function updateTeamDetailInternal(string $tid, int $userId, int $userType, int $attr, int $value): bool
    {
        return EellyClient::request('im/teamDetail', 'updateTeamDetailInternal', true, $tid, $userId, $userType, $attr, $value);
    }

    /**
     * 更新群会话设置.
     *
     * @internal
     *
     * @param string $tid
     * @param int    $userId
     * @param int    $userType
     * @param int    $attr     1.置顶 2.免打扰
     * @param int    $value
     *
     * @return bool
     *
     * @author zhangyangxun
     */
    public function updateTeamDetailInternalAsync(string $tid, int $userId, int $userType, int $attr, int $value)
    {
        return EellyClient::request('im/teamDetail', 'updateTeamDetailInternal', false, $tid, $userId, $userType, $attr, $value);
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
