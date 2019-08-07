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

namespace Eelly\SDK\Order\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\Order\Service\OrderStatInterface;

/**
 * @author shadonTools<localhost.shell@gmail.com>
 */
class OrderStat implements OrderStatInterface
{
    /**
     * 统计卖家n天内订单.
     *
     * @internal
     *
     * @param array  $sellerIds 店铺ID数组
     * @param int    $day       n天内
     * @param array  $status    订单状态，默认全部
     * @param string $mode      统计内容，num 订单总数 amount 订单总金额
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019-04-22
     */
    public function getSellerOrderStatDay(array $sellerIds, int $day, array $status = [], string $mode): array
    {
        return EellyClient::request('order/orderStat', 'getSellerOrderStatDay', true, $sellerIds, $day, $status, $mode);
    }

    /**
     * 统计卖家n天内订单.
     *
     * @internal
     *
     * @param array  $sellerIds 店铺ID数组
     * @param int    $day       n天内
     * @param array  $status    订单状态，默认全部
     * @param string $mode      统计内容，num 订单总数 amount 订单总金额
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019-04-22
     */
    public function getSellerOrderStatDayAsync(array $sellerIds, int $day, array $status = [], string $mode)
    {
        return EellyClient::request('order/orderStat', 'getSellerOrderStatDay', false, $sellerIds, $day, $status, $mode);
    }

    /**
     * 统计多个买家在一个店铺的订单总数(付款、完成.etc).
     *
     * @internal
     *
     * @param array $buyerIds
     * @param int   $sellerId
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019-04-23
     */
    public function countBuyersOrder(array $buyerIds, int $sellerId): array
    {
        return EellyClient::request('order/orderStat', 'countBuyersOrder', true, $buyerIds, $sellerId);
    }

    /**
     * 统计多个买家在一个店铺的订单总数(付款、完成.etc).
     *
     * @internal
     *
     * @param array $buyerIds
     * @param int   $sellerId
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019-04-23
     */
    public function countBuyersOrderAsync(array $buyerIds, int $sellerId)
    {
        return EellyClient::request('order/orderStat', 'countBuyersOrder', false, $buyerIds, $sellerId);
    }

    /**
     * 获取n天内某店铺的订单统计，按买家分组.
     *
     * @param int   $day
     * @param int   $sellerId
     * @param array $buyerIds
     * @param array $extend
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019/5/9
     */
    public function statSellerOrderDayBefore(int $day, int $sellerId, array $buyerIds, array $extend = []): array
    {
        return EellyClient::request('order/orderStat', 'statSellerOrderDayBefore', true, $day, $sellerId, $buyerIds, $extend);
    }

    /**
     * 获取n天内某店铺的订单统计，按买家分组.
     *
     * @param int   $day
     * @param int   $sellerId
     * @param array $buyerIds
     * @param array $extend
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019/5/9
     */
    public function statSellerOrderDayBeforeAsync(int $day, int $sellerId, array $buyerIds, array $extend = [])
    {
        return EellyClient::request('order/orderStat', 'statSellerOrderDayBefore', false, $day, $sellerId, $buyerIds, $extend);
    }

    /**
     * @param array $condition
     * @param array $extend
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019/5/16
     */
    public function statOrderForPayScore(array $condition, array $extend = []): array
    {
        return EellyClient::request('order/orderStat', 'statOrderForPayScore', true, $condition, $extend);
    }

    /**
     * @param array $condition
     * @param array $extend
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019/5/16
     */
    public function statOrderForPayScoreAsync(array $condition, array $extend = [])
    {
        return EellyClient::request('order/orderStat', 'statOrderForPayScore', false, $condition, $extend);
    }

    /**
     * 统计一个店铺多个买家的支付订单(支付了就算).
     *
     * @param array $condition
     * @param array $extend
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019/5/16
     */
    public function statPayedOrder(array $condition, array $extend = []): array
    {
        return EellyClient::request('order/orderStat', 'statPayedOrder', true, $condition, $extend);
    }

    /**
     * 统计一个店铺多个买家的支付订单(支付了就算).
     *
     * @param array $condition
     * @param array $extend
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019/5/16
     */
    public function statPayedOrderAsync(array $condition, array $extend = [])
    {
        return EellyClient::request('order/orderStat', 'statPayedOrder', false, $condition, $extend);
    }

    /**
     * 统计一个店铺多个买家的完成订单.
     *
     * @param array $condition
     * @param array $extend
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019/5/16
     */
    public function statFinishedOrder(array $condition, array $extend = []): array
    {
        return EellyClient::request('order/orderStat', 'statFinishedOrder', true, $condition, $extend);
    }

    /**
     * 统计一个店铺多个买家的完成订单.
     *
     * @param array $condition
     * @param array $extend
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019/5/16
     */
    public function statFinishedOrderAsync(array $condition, array $extend = [])
    {
        return EellyClient::request('order/orderStat', 'statFinishedOrder', false, $condition, $extend);
    }

    /**
     * 分页取店铺昨日支付转化分订单.
     *
     * @param int $sellerId
     * @param int $page
     * @param int $limit
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019/5/17
     */
    public function getOrderYesterdayForPayScore(int $sellerId, int $page, int $limit): array
    {
        return EellyClient::request('order/orderStat', 'getOrderYesterdayForPayScore', true, $sellerId, $page, $limit);
    }

    /**
     * 分页取店铺昨日支付转化分订单.
     *
     * @param int $sellerId
     * @param int $page
     * @param int $limit
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2019/5/17
     */
    public function getOrderYesterdayForPayScoreAsync(int $sellerId, int $page, int $limit)
    {
        return EellyClient::request('order/orderStat', 'getOrderYesterdayForPayScore', false, $sellerId, $page, $limit);
    }

    public static function paySuccessOrders(array $buyerIds, array $sellerIds): array
    {
        return EellyClient::requestJson('order/orderStat', __FUNCTION__, ['buyerIds' => $buyerIds, 'sellerIds' => $sellerIds]);
    }

    public static function getBuyerOrderStatCurrentMonth(array $buyerIds): array
    {
        return EellyClient::requestJson('order/orderStat', __FUNCTION__, ['buyerIds' => $buyerIds]);
    }

    public static function getBuyerOrderStat(array $buyerIds): array
    {
        return EellyClient::requestJson('order/orderStat', __FUNCTION__, ['buyerIds' => $buyerIds]);
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
