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

use Eelly\SDK\EellyClient;

/**
 * Class UserInfo.
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class UserInfo
{
    /**
     * 获取一条用户信息.
     *
     * @param int $userId 用户id
     *
     * @return array
     *
     *@author hehui<runphp@dingtalk.com>
     */
    public function getOne(int $userId, int $mark = 3): array
    {
        return EellyClient::requestJson('user/userInfo', __FUNCTION__, ['userId' => $userId, 'mark' => $mark]);
    }

    /**
     * 获取一条用户信息.
     *
     * @param int $userId 用户id
     *
     * @return array
     *
     *@author hehui<runphp@dingtalk.com>
     */
    public function getOneAsync(int $userId)
    {
        return EellyClient::requestJson('user/userInfo', 'getOne', ['userId' => $userId, 'mark' => $mark], false);
    }

    /**
     * 获取多条用户信息.
     *
     * @param array $userIds 用户id列表
     *
     * @return array
     *
     * @author hehui<runphp@dingtalk.com>
     */
    public function getList(array $userIds): array
    {
        return EellyClient::request('user/userInfo', 'getList', true, $userIds);
    }

    /**
     * 获取多条用户信息.
     *
     * @param array $userIds 用户id列表
     *
     * @return array
     *
     * @author hehui<runphp@dingtalk.com>
     */
    public function getListAsync(array $userIds)
    {
        return EellyClient::request('user/userInfo', 'getList', false, $userIds);
    }

    /**
     * 获取申请提现的用户的信息.
     *
     * @param array $userIds
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2018-11-21
     */
    public function getWithdrawUserInfo(array $userIds): array
    {
        return EellyClient::request('user/userInfo', 'getWithdrawUserInfo', true, $userIds);
    }

    /**
     * 获取申请提现的用户的信息.
     *
     * @param array $userIds
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2018-11-21
     */
    public function getWithdrawUserInfoAsync(array $userIds)
    {
        return EellyClient::request('user/userInfo', 'getWithdrawUserInfo', false, $userIds);
    }

    /**
     * 根据条件批量获取用户信息.
     *
     * @param array  $condition
     * @param string $fieldScope
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2018-12-04
     *
     * @internal
     */
    public function getListByCondition(array $condition, string $fieldScope): array
    {
        return EellyClient::request('user/userInfo', 'getListByCondition', true, $condition, $fieldScope);
    }

    /**
     * 根据条件批量获取用户信息.
     *
     * @param array  $condition
     * @param string $fieldScope
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2018-12-04
     *
     * @internal
     */
    public function getListByConditionAsync(array $condition, string $fieldScope)
    {
        return EellyClient::request('user/userInfo', 'getListByCondition', false, $condition, $fieldScope);
    }

    /**
     * 分页获取会员列表.
     *
     * @param array  $condition
     * @param string $fieldScope
     * @param int    $page
     * @param int    $limit
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2018-12-05
     *
     * @internal
     */
    public function getUserListPage(array $condition, string $fieldScope, int $page = 1, int $limit = 10): array
    {
        return EellyClient::request('user/userInfo', 'getUserListPage', true, $condition, $fieldScope, $page, $limit);
    }

    /**
     * 分页获取会员列表.
     *
     * @param array  $condition
     * @param string $fieldScope
     * @param int    $page
     * @param int    $limit
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2018-12-05
     *
     * @internal
     */
    public function getUserListPageAsync(array $condition, string $fieldScope, int $page = 1, int $limit = 10)
    {
        return EellyClient::request('user/userInfo', 'getUserListPage', false, $condition, $fieldScope, $page, $limit);
    }

    public static function getUids(int $uid = 1, int $limit = 1000): array
    {
        return EellyClient::requestJson('user/userInfo', __FUNCTION__, [
            'uid'   => $uid,
            'limit' => $limit,
        ]);
    }

    public static function checkImUserInfo(int $uid, array $data): bool
    {
        return EellyClient::requestJson('user/userInfo', __FUNCTION__, ['uid' => $uid, 'data' => $data]);
    }
    
    public static function getUserNameByUids(array $userIds): array
    {
        return EellyClient::requestJson('user/userInfo', __FUNCTION__, ['userIds' => $userIds]);
    }

    public static function getAdminListByUserIds(array $userIds): array
    {
        return EellyClient::requestJson('user/userInfo', __FUNCTION__, ['userIds' => $userIds]);
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
