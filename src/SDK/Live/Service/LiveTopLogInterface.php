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

namespace Eelly\SDK\Live\Service;

/**
 * 直播间置顶记录相关接口
 *
 * @author sunanzhi<sunanzhi@hotmail.com>
 */
interface LiveTopLogInterface
{
    /**
     * 获取正在置顶位置的直播间
     *
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2019.3.26
     */
    public function getNowInTop():array;

    /**
     * 获取正在排队的直播间
     *
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2019.3.26
     */
    public function getNowInQueue():array;

    /**
     * 获取直播排队时间
     *
     * @param integer $liveId 直播间id 默认0看位置 否则看当前直播id的进行获取等待时间
     * @return integer
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2019.3.26
     */
    public function getWaitCountDown(int $liveId = 0):int;

    /**
     * 判断当前预约是否需要预约
     *
     * @return boolean
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2019.3.26
     */
    public function checkCanInQueue():bool;

    /**
     * 添加置顶记录
     *
     * > data 数据说明
     * 
     * key | type | desc
     * --- | ---- | ----
     * storeId | int | 店铺id
     * liveId | int | 直播间id
     * times | int | 赠送或消耗次数 区分正负
     * topNumber | int | 置顶位置数量
     * topTime | int | 置顶可用时间
     * startTime | int | 置顶开始时间
     * expireTime | int | 置顶失效时间
     * remark | string | 备注
     * 
     * @param array $data
     * @return boolean
     */
    public function add(array $data):bool;

    /**
     * 置顶卡消耗记录
     * 
     * > extend 数据说明
     * 
     * key | type | desc
     * --- | ---- | ----
     * limit | int | 每页限制数量 服务端默认 20
     * page | int | 页码 服务端默认 1
     * 
     * > 返回数据说明
     * 
     * key | type | desc
     * --- | ---- | ---
     * fist | int | 第一页
     * before | int | 后一页
     * last | int | 最后一页
     * next | int | 下一页
     * totalPages | int | 全部页码
     * totalItems | int | 全部数据量
     * limit | int | 每页限制数量
     * items | array | 数据
     * extra | array | 额外数据
     * 
     * > items 数据说明
     * 
     * key | type | desc
     * --- | ---- | ----
     * storeId | int | 店铺id
     * times | int | 使用的次数 有正负区分
     * remark | string | 备注
     * createdTime | int | 创建时间戳
     * 
     * > extra 数据说明
     * 
     * key | type | desc
     * --- | ---- | ----
     * allTopCard | int | 全部置顶卡数量
     * useCard | int | 已使用置顶卡数量
     * remainingCard | int | 剩余置顶卡数量
     *
     * @param integer $storeId 店铺id
     * @param array $extend 拓展使用
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2019.3.26
     */
    public function getLiveTopLog(int $storeId, array $extend = []):array;

    /**
     * 后台直播推荐记录列表
     *
     * @param array     $condition
     * @param string    $field
     * @return array
     *
     * @author zhangyangxun
     * @since 2019-03-30
     */
    public function getLogListAdmin(array $condition, string $field = 'adminList'): array;
}