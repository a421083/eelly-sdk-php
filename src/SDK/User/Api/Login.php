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

namespace Eelly\SDK\User\Api;

use Eelly\DTO\UidDTO;
use Eelly\SDK\EellyClient;

/**
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Login
{
    /**
     * 添加登陆历史.
     *
     * @param string $domain 登陆平台 例：www.account.com www.eelly.com www.manage.com etc
     * @param UidDTO $user   登陆的用户id
     *
     * @return bool
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     *
     * @since 2018.7.23
     */
    public function addHistory(string $domain, UidDTO $user = null): bool
    {
        return EellyClient::request('user/login', 'addHistory', true, $domain, $user);
    }

    /**
     * 添加登陆历史.
     *
     * @param string $domain 登陆平台 例：www.account.com www.eelly.com www.manage.com etc
     * @param UidDTO $user   登陆的用户id
     *
     * @return bool
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     *
     * @since 2018.7.23
     */
    public function addHistoryAsync(string $domain, UidDTO $user = null)
    {
        return EellyClient::request('user/login', 'addHistory', false, $domain, $user);
    }

    /**
     * 获取登陆历史.
     *
     * @param UidDTO $user 登陆的用户id
     *
     * @return array
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function getHistory(UidDTO $user = null): array
    {
        return EellyClient::request('user/login', 'getHistory', true, $user);
    }

    /**
     * 获取登陆历史.
     *
     * @param UidDTO $user 登陆的用户id
     *
     * @return array
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function getHistoryAsync(UidDTO $user = null)
    {
        return EellyClient::request('user/login', 'getHistory', false, $user);
    }

    /**
     * 记录用户设备号.
     *
     * @param int    $userId     用户id
     * @param string $device     设备号
     * @param array  $conditions 拓展
     *
     * @return bool
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     *
     * @since 2019.4.26
     */
    public function addUserDeviceLog(int $userId, string $device, array $conditions = []): bool
    {
        return EellyClient::request('user/login', 'addUserDeviceLog', true, $userId, $device, $conditions);
    }

    /**
     * @param UidDTO|null $uidDTO
     *
     * @return array
     */
    public function getUserInfo(UidDTO $uidDTO = null): array
    {
        return EellyClient::request('user/login', __FUNCTION__, true);
    }

    /**
     * @param UidDTO|null $uidDTO
     *
     * @return array
     */
    public function getUserInfoForWeb(UidDTO $uidDTO = null): array
    {
        return EellyClient::request('user/login', __FUNCTION__, true);
    }

    /**
     * @param int $uid
     * @param int $type
     *
     * @throws \Exception
     *
     * @return array
     */
    public static function getTimInfo(int $uid, int $type)
    {
        return EellyClient::requestJson('user/login', __FUNCTION__, ['uid' => $uid, 'type' => $type]);
    }

    /**
     * 根据用户id获取设备号信息
     *
     * @param int $userId
     * @return array
     *
     * @author wechan
     * @since 2019年08月22日
     */
    public function getUserDeviceByUserId(int $userId):array
    {
        return EellyClient::requestJson('user/login', __FUNCTION__, ['userId' => $userId]);
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
