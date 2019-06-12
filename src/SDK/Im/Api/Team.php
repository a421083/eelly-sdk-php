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
use Eelly\SDK\Im\Service\TeamInterface;
use Eelly\SDK\Im\Service\UidDTO;

/**
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Team implements TeamInterface
{
    public static function getBuyerTeamIndex(int $tid): array
    {
        return EellyClient::requestJson('im/team', __FUNCTION__, ['tid' => $tid]);
    }

    /**
     * 获取主播粉丝群列表信息.
     *
     * ###返回数据说明
     *
     * 字段|类型|说明
     * --------|-------|--------------
     * totalMember | int | 已进群人数
     * teams | array | 群列表
     * teams[]['tid'] | int | 群id
     * teams[]['logo'] | string | 群头像
     * teams[]['title'] | string | 标题
     * teams[]['subTitle'] | string | 进群条件
     * teams[]['status'] | int | 状态: 0:未进群 1:已进群 2:人满
     *
     * @param int         $storeId 店铺id
     * @param int         $page    分页
     * @param int         $limit   每页显示数量, 默认20
     * @param UidDTO|null $uidDTO  登录用户
     *
     * @returnExample({"totalMember":0,"teams":[{"tid":"123","logo":"https:\/\/img09.eelly.com","title":"bobo1972-官方直播①群","subTitle":"潜规则","status":0}]})
     *
     * @author wechan
     *
     * @since 2019年04月18日
     */
    public function getFansGroup(int $storeId, int $page = 1, int $limit = 20, UidDTO $uidDTO = null): array
    {
        return EellyClient::request('im/team', 'getFansGroup', true, $storeId, $page, $limit, $uidDTO);
    }

    /**
     * 获取主播粉丝群列表信息.
     *
     * ###返回数据说明
     *
     * 字段|类型|说明
     * --------|-------|--------------
     * totalMember | int | 已进群人数
     * teams | array | 群列表
     * teams[]['tid'] | int | 群id
     * teams[]['logo'] | string | 群头像
     * teams[]['title'] | string | 标题
     * teams[]['subTitle'] | string | 进群条件
     * teams[]['status'] | int | 状态: 0:未进群 1:已进群 2:人满
     *
     * @param int         $storeId 店铺id
     * @param int         $page    分页
     * @param int         $limit   每页显示数量, 默认20
     * @param UidDTO|null $uidDTO  登录用户
     *
     * @returnExample({"totalMember":0,"teams":[{"tid":"123","logo":"https:\/\/img09.eelly.com","title":"bobo1972-官方直播①群","subTitle":"潜规则","status":0}]})
     *
     * @author wechan
     *
     * @since 2019年04月18日
     */
    public function getFansGroupAsync(int $storeId, int $page = 1, int $limit = 20, UidDTO $uidDTO = null)
    {
        return EellyClient::request('im/team', 'getFansGroup', false, $storeId, $page, $limit, $uidDTO);
    }

    /**
     * 买家进群事件.
     *
     * @param int    $tid    群id
     * @param UidDTO $uidDTO 用户登录信息
     *
     * @returnExample({"result":1})
     *
     * 字段|类型|说明
     * --------|-------|--------------
     * result | int | 结果: 1.成功 0.失败
     *
     * @author wechan
     *
     * @since 2019年04月19日
     */
    public function buyerJoinGroup(int $tid, UidDTO $uidDTO = null): array
    {
        return EellyClient::request('im/team', 'buyerJoinGroup', true, $tid, $uidDTO);
    }

    /**
     * 买家进群事件.
     *
     * @param int    $tid    群id
     * @param UidDTO $uidDTO 用户登录信息
     *
     * @returnExample({"result":1})
     *
     * 字段|类型|说明
     * --------|-------|--------------
     * result | int | 结果: 1.成功 0.失败
     *
     * @author wechan
     *
     * @since 2019年04月19日
     */
    public function buyerJoinGroupAsync(int $tid, UidDTO $uidDTO = null)
    {
        return EellyClient::request('im/team', 'buyerJoinGroup', false, $tid, $uidDTO);
    }

    /**
     * 账号拥有的群个数.
     *
     * @internal
     *
     * @param int $userId
     * @param int $type
     *
     * @return int
     *
     * @author zhangyangxun
     *
     * @since 2019-04-23
     */
    public function getTeamNumOwnedInternal(int $userId, int $type): int
    {
        return EellyClient::request('im/team', 'getTeamNumOwnedInternal', true, $userId, $type);
    }

    /**
     * 账号拥有的群个数.
     *
     * @internal
     *
     * @param int $userId
     * @param int $type
     *
     * @return int
     *
     * @author zhangyangxun
     *
     * @since 2019-04-23
     */
    public function getTeamNumOwnedInternalAsync(int $userId, int $type)
    {
        return EellyClient::request('im/team', 'getTeamNumOwnedInternal', false, $userId, $type);
    }

    /**
     * 买家进群事件.
     *
     * @param int $tid    群id
     * @param int $userId 用户id
     * @param int $itmId  IM群成员ID
     *
     * @returnExample({"result":1})
     *
     * 字段|类型|说明
     * --------|-------|--------------
     * result | int | 结果: 1.成功 0.失败
     *
     * @author wechan
     *
     * @since 2019年05月06日
     */
    public function afterBuyerJoin(int $tid, int $userId, int $itmId): array
    {
        return EellyClient::request('im/team', 'afterBuyerJoin', true, $tid, $userId, $itmId);
    }

    /**
     * 买家进群事件.
     *
     * @param int $tid    群id
     * @param int $userId 用户id
     * @param int $itmId  IM群成员ID
     *
     * @returnExample({"result":1})
     *
     * 字段|类型|说明
     * --------|-------|--------------
     * result | int | 结果: 1.成功 0.失败
     *
     * @author wechan
     *
     * @since 2019年05月06日
     */
    public function afterBuyerJoinAsync(int $tid, int $userId, int $itmId)
    {
        return EellyClient::request('im/team', 'afterBuyerJoin', false, $tid, $userId, $itmId);
    }

    /**
     * 分页取店主群.
     *
     * @param array $condition
     * @param int   $page
     * @param int   $limit
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019/5/23
     */
    public function getBuyerTeams(array $condition = [], int $page = 1, int $limit = 20): array
    {
        return EellyClient::request('im/team', 'getBuyerTeams', true, $condition, $page, $limit);
    }

    /**
     * 分页取店主群.
     *
     * @param array $condition
     * @param int   $page
     * @param int   $limit
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019/5/23
     */
    public function getBuyerTeamsAsync(array $condition = [], int $page = 1, int $limit = 20)
    {
        return EellyClient::request('im/team', 'getBuyerTeams', false, $condition, $page, $limit);
    }

    /**
     * 统计店主群.
     *
     * @param array $condition
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019/5/23
     */
    public function getBuyerTeamStat(array $condition = []): array
    {
        return EellyClient::request('im/team', 'getBuyerTeamStat', true, $condition);
    }

    /**
     * 统计店主群.
     *
     * @param array $condition
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019/5/23
     */
    public function getBuyerTeamStatAsync(array $condition = [])
    {
        return EellyClient::request('im/team', 'getBuyerTeamStat', false, $condition);
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
