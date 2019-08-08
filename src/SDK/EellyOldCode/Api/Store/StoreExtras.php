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
 * Class StoreExtras.
 *
 *  modules/Store/Service/StoreExtrasService.php
 *
 * @author zhangyingdi<zhangyingdi@eelly.net>
 */
class StoreExtras
{
    /**
     * 获取店铺扩展信息.
     *
     * @service
     * > 数据说明
     *   key | value
     *   --------------------|--------------------
     *   status              |    状态码:200
     *   info                |    提示信息
     *                       |    200: 成功
     *   retval              |    $retval
     *
     * > $retval 数组说
     * key | value
     *   --------------------|--------------------
     *   store_id            |    int    店铺id
     *   credit_value        |    int 积分值
     *   added_credit        |    int 附加信用值
     *   praise_rate         |    float 卖家好评率
     *   goods_count         |    int 商品总数
     *   orders_count        |    int 订单总数
     *   arbite_sum          |    int 裁仲次数
     *   packet_url          |    string 数据包下载地址
     *   watermark_set       |    string 水印设置
     *   street_addr         |    string 街道地址
     *   goods_level         |    int 商品档次
     *   store_vip_type      |    int 店铺vip类型 0.普通 1.白银 2.白金 3.黄金 4.钻石
     *
     * @param int    $storeId
     * @param string $filedScope
     *
     * @return array
     *
     * @author 范世军<fanshijun@eelly.net>
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since  2019.05.24
     */
    public function getInfo($storeId, $filedScope = 'base')
    {
        return EellyClient::request('eellyOldCode/store/storeExtras', __FUNCTION__, true, $storeId, $filedScope);
    }

    /**
     * 批量获取店铺扩展指定字段的数据.
     *
     * @param array  $storeIds
     * @param string $fields
     * @param array  $storeIds
     * @param string $fields
     *
     * @return array
     *
     * > 数据说明
     *   key | value
     *   --------------------|--------------------
     *   store_id            |    string
     */
    public function getStoresExtraDataByStoreIds(array $storeIds, $fields)
    {
        return EellyClient::requestJson('store/storeExtras', __FUNCTION__, [
            'storeIds' => $storeIds,
            'fields'   => $fields,
        ]);
    }

    /**
     * 更新店铺额外数据
     *
     * @param array $data 要更新的数据
     * @param array $storeIds 店铺id
     * @return void
     */
    public function saveStoreExtrasData(array $data, array $storeIds)
    {
        return EellyClient::request('eellyOldCode/store/storeExtras', __FUNCTION__, true, $data, $storeIds);
    }
}
