<?php
declare(strict_types=1);
/**
 * PHP version 5.5
 *
 * @copyright  Copyright (c) 2012-2015 EELLY Inc. (http://www.eelly.com)
 * @link       http://www.eelly.com
 * @license    衣联网版权所有
 */


namespace Eelly\SDK\Live\Service;


/**
 * 直播店铺设置逻辑层.
 *
 * @author  肖俊明<xiaojunming@eelly.net>
 * @since 2018年07月12日
 */
interface LiveStoreSettingsInterface
{
    /**
     * 获取店铺的直播展示标志.
     *
     * @param int $storeId 店铺ID
     *
     * @return int
     * @requestExample({"storeId":148086})
     * @returnExample({15})
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年07月09日
     */
    public function getShowFlagByStoreId(int $storeId): int;

    /**
     * 修改展示场次.
     *
     * @param array $liveIds  直播ID
     * @param int   $showFlag 修改为的值
     * @param int   $type     1表示修改直播，其他都是修改店铺下的所有直播
     * @param integer $isRobot 是否开启机器人留言：0 关闭 1 开启  
     * @param array $extends 拓展字段
     *
     * @return bool
     *
     * @requestExample({liveIds":[148086,148087],"showFlag":15,"type":1})
     * @returnExample({true})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年07月11日
     */
    public function updateShowFlagData(array $liveIds, int $showFlag = 15, int $type = 1, int $isRobot = 0, array $extends = []): bool;

    /**
     * 获取店铺的.
     *
     * @param int   $showFlag 修改为的值
     *
     * @return bool
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @requestExample({"showFlag":15})
     * @returnExample({156298,2140195})
     *
     * @since 2018年07月11日
     */
    public function getStoreIds(int $showFlag = 15): array;

    /**
     * 后台获取列表
     *
     * @param array $condition
     * @return array
     * @author zhangyangxun
     * @since 2019-03-05
     */
    public function getManageList(array $condition): array;
}