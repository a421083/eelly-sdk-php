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
use Eelly\SDK\Order\Service\OrderInterface;
use Eelly\DTO\UidDTO;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Order
{
    /**
     * 新增订单
     * 新增订单信息.
     *
     * @param array             $orderData                  订单数据
     * @param int               $orderData["0"]["storeId"]  店铺id
     * @param array             $orderData["0"]["goodsIds"] 商品数据
     * @param int               $addrId                     用户地址id
     * @param \Eelly\DTO\UidDTO $user                       登录用户信息
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return bool 新增结果
     * @requestExample({
     *     "orderData":[
     *         {
     *             "storeId":1,
     *             "goodsIds":[1, 2, 3]
     *         }
     *     ],
     *     "addrId":3
     * })
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月25日
     */
    public function addOrder(array $orderData, int $addrId, UidDTO $user = null): bool
    {
        return EellyClient::request('order/order', 'addOrder', true, $orderData, $addrId, $user);
    }

    /**
     * 新增订单
     * 新增订单信息.
     *
     * @param array             $orderData                  订单数据
     * @param int               $orderData["0"]["storeId"]  店铺id
     * @param array             $orderData["0"]["goodsIds"] 商品数据
     * @param int               $addrId                     用户地址id
     * @param \Eelly\DTO\UidDTO $user                       登录用户信息
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return bool 新增结果
     * @requestExample({
     *     "orderData":[
     *         {
     *             "storeId":1,
     *             "goodsIds":[1, 2, 3]
     *         }
     *     ],
     *     "addrId":3
     * })
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月25日
     */
    public function addOrderAsync(array $orderData, int $addrId, UidDTO $user = null)
    {
        return EellyClient::request('order/order', 'addOrder', false, $orderData, $addrId, $user);
    }

    /**
     * 修改订单
     * 修改订单信息.
     *
     * @param array             $orderData                订单数据
     * @param int               $orderData["orderId"]     订单id
     * @param int               $orderData["updateType"]  修改类型 1修改订单金额 2修改订单运费
     * @param int               $orderData["updateValue"] 修改的值
     * @param \Eelly\DTO\UidDTO $user                     登录用户信息
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return bool 修改结果
     * @requestExample({
     *     "orderData":{
     *         "orderId":1,
     *         "updateType":1,
     *         "updateValue":12
     *     }
     * })
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月25日
     */
    public function updateOrder(array $orderData, UidDTO $user = null): bool
    {
        return EellyClient::request('order/order', 'updateOrder', true, $orderData, $user);
    }

    /**
     * 修改订单
     * 修改订单信息.
     *
     * @param array             $orderData                订单数据
     * @param int               $orderData["orderId"]     订单id
     * @param int               $orderData["updateType"]  修改类型 1修改订单金额 2修改订单运费
     * @param int               $orderData["updateValue"] 修改的值
     * @param \Eelly\DTO\UidDTO $user                     登录用户信息
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return bool 修改结果
     * @requestExample({
     *     "orderData":{
     *         "orderId":1,
     *         "updateType":1,
     *         "updateValue":12
     *     }
     * })
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月25日
     */
    public function updateOrderAsync(array $orderData, UidDTO $user = null)
    {
        return EellyClient::request('order/order', 'updateOrder', false, $orderData, $user);
    }

    /**
     * 删除订单
     * 删除订单.
     *
     * @param int               $orderId 订单id
     * @param \Eelly\DTO\UidDTO $user    登录用户信息
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return bool 删除结果
     * @requestExample({
     *     "orderId":1
     * })
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月25日
     */
    public function deleteOrder(int $orderId, UidDTO $user = null): bool
    {
        return EellyClient::request('order/order', 'deleteOrder', true, $orderId, $user);
    }

    /**
     * 删除订单
     * 删除订单.
     *
     * @param int               $orderId 订单id
     * @param \Eelly\DTO\UidDTO $user    登录用户信息
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return bool 删除结果
     * @requestExample({
     *     "orderId":1
     * })
     * @returnExample(true)
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月25日
     */
    public function deleteOrderAsync(int $orderId, UidDTO $user = null)
    {
        return EellyClient::request('order/order', 'deleteOrder', false, $orderId, $user);
    }

    /**
     * 获取订单信息
     * 获取订单信息.
     *
     * @param int $orderId 订单id
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return array 订单信息
     * @requestExample({
     *     "orderId":1
     * })
     * @returnExample({
     *     "orderId":1,
     *     "orderSn":"xxxxxxx",
     *     "orderAmount":123,
     *     "freight":123,
     *     "commission":0,
     *     "discountAmount":0,
     *     "logisticsName":"配送方式",
     *     "createdTime":"1970-01-01 01:01:01",
     *     "sellerInfo":{
     *         "storeName":"店铺名称",
     *         "sellerName":"卖家名称",
     *         "phone":"13xxxxxxxx"
     *     },
     *     "buyerInfo":{
     *         "nickname":"买家昵称",
     *         "consignee":"收货人",
     *         "address":"收货地址",
     *         "phone":"13xxxxxxxx"
     *     },
     *     "goodsInfo":[
     *         {
     *             "goodsId":1,
     *             "goodsImage":"http://image.eelly.test/abc.jpg",
     *             "goodsName":"商品名称",
     *             "goodsNumber":"货号",
     *             "singlePrice":"123",
     *             "specInfo":[
     *                 {
     *                     "color":"颜色",
     *                     "size":"尺码",
     *                     "price":123,
     *                     "quantity":1
     *                 }
     *             ],
     *             "goodsCount":2,
     *             "totalPrice":10.00
     *         }
     *     ]
     * })
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月25日
     */
    public function getOrderInfo(int $orderId): array
    {
        return EellyClient::request('order/order', 'getOrderInfo', true, $orderId);
    }

    /**
     * 获取订单信息
     * 获取订单信息.
     *
     * @param int $orderId 订单id
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return array 订单信息
     * @requestExample({
     *     "orderId":1
     * })
     * @returnExample({
     *     "orderId":1,
     *     "orderSn":"xxxxxxx",
     *     "orderAmount":123,
     *     "freight":123,
     *     "commission":0,
     *     "discountAmount":0,
     *     "logisticsName":"配送方式",
     *     "createdTime":"1970-01-01 01:01:01",
     *     "sellerInfo":{
     *         "storeName":"店铺名称",
     *         "sellerName":"卖家名称",
     *         "phone":"13xxxxxxxx"
     *     },
     *     "buyerInfo":{
     *         "nickname":"买家昵称",
     *         "consignee":"收货人",
     *         "address":"收货地址",
     *         "phone":"13xxxxxxxx"
     *     },
     *     "goodsInfo":[
     *         {
     *             "goodsId":1,
     *             "goodsImage":"http://image.eelly.test/abc.jpg",
     *             "goodsName":"商品名称",
     *             "goodsNumber":"货号",
     *             "singlePrice":"123",
     *             "specInfo":[
     *                 {
     *                     "color":"颜色",
     *                     "size":"尺码",
     *                     "price":123,
     *                     "quantity":1
     *                 }
     *             ],
     *             "goodsCount":2,
     *             "totalPrice":10.00
     *         }
     *     ]
     * })
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since 2017年10月25日
     */
    public function getOrderInfoAsync(int $orderId)
    {
        return EellyClient::request('order/order', 'getOrderInfo', false, $orderId);
    }

    /**
     * 通过order sn 获取订单信息.
     *
     * @param string $orderSn order sn
     *
     * @return array
     */
    public function getOrderInfoByOrderSn(string $orderSn): array
    {
        return EellyClient::request('order/order', 'getOrderInfoByOrderSn', true, $orderSn);
    }

    /**
     * 通过order sn 获取订单信息.
     *
     * @param string $orderSn order sn
     *
     * @return array
     */
    public function getOrderInfoByOrderSnAsync(string $orderSn)
    {
        return EellyClient::request('order/order', 'getOrderInfoByOrderSn', false, $orderSn);
    }

    /**
     * 校验是否能否能快速支付.
     *
     * @param int $orderId 订单ID
     *
     * @return bool 能返回true,不能返回false
     * @requestExample({"orderId":5000001})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年01月05日
     * @Validation(
     * @OperatorValidator(0, {message:"非法的订单id",operator:[gt,0]})
     * )
     */
    public function checkIsFast(int $orderId): bool
    {
        return EellyClient::request('order/order', 'checkIsFast', true, $orderId);
    }

    /**
     * 校验是否能否能快速支付.
     *
     * @param int $orderId 订单ID
     *
     * @return bool 能返回true,不能返回false
     * @requestExample({"orderId":5000001})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年01月05日
     * @Validation(
     * @OperatorValidator(0, {message:"非法的订单id",operator:[gt,0]})
     * )
     */
    public function checkIsFastAsync(int $orderId)
    {
        return EellyClient::request('order/order', 'checkIsFast', false, $orderId);
    }

    /**
     * 更新订单标识.
     *
     * @param int $orderId   订单ID
     * @param int $extension 订单标识：0 普通订单 1 分销订单 2 包销订单(买家) 4 自营订单 8 云店订单 16 厂+订单 32 省邮区订单 64 包销期订单(卖家) 128 即时到帐订单（支付成功立即结算卖家）
     *
     * @return bool
     * @requestExample({"orderId":5000001,"extension":128})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年01月05日
     * @Validation(
     * @OperatorValidator(0, {message:"非法的订单id",operator:[gt,0]}),
     * @OperatorValidator(1, {message:"非法的订单标识",operator:[gte,0]})
     * )
     */
    public function updateOrderExtension(int $orderId, int $extension = 0): bool
    {
        return EellyClient::request('order/order', 'updateOrderExtension', true, $orderId, $extension);
    }

    /**
     * 更新订单标识.
     *
     * @param int $orderId   订单ID
     * @param int $extension 订单标识：0 普通订单 1 分销订单 2 包销订单(买家) 4 自营订单 8 云店订单 16 厂+订单 32 省邮区订单 64 包销期订单(卖家) 128 即时到帐订单（支付成功立即结算卖家）
     *
     * @return bool
     * @requestExample({"orderId":5000001,"extension":128})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年01月05日
     * @Validation(
     * @OperatorValidator(0, {message:"非法的订单id",operator:[gt,0]}),
     * @OperatorValidator(1, {message:"非法的订单标识",operator:[gte,0]})
     * )
     */
    public function updateOrderExtensionAsync(int $orderId, int $extension = 0)
    {
        return EellyClient::request('order/order', 'updateOrderExtension', false, $orderId, $extension);
    }

    /**
     * 添加询价下单记录.
     *
     * @param array  $data               询价下单数据
     * @param int    $data['refType']    订单类型标识：0 店铺商品订单 1 询价商品订单
     * @param int    $data['sellerId']   卖家id
     * @param string $data['sellerName'] 卖家名称
     * @param int    $data['buyerId']    买家id
     * @param string $data['buyerName']  买家名称
     * @param int    $data['extension']  订单标识：0 普通订单 1 分销订单 2 包销订单(买家) 4 自营订单 8 云店订单 16 厂+订单 32 省邮区订单 64 包销期订单(卖家) 128 即时到帐订单（支付成功立即结算卖家）
     * @param int    $data['freight']    订单运费
     * @param int    $data['fromFlag']   订单来源
     * @param string $data['remark']     备注
     *
     * @return bool
     *
     * @requestExample({
     *     "refType":3,
     *     "sellerId":148086,
     *     "sellerName":"molimoq",
     *     "buyerId":1234,
     *     "buyerName":"buyer",
     *     "extension" :0,
     *     "freight" : 10,
     *     "fromFlag":3,
     *     "remark":""
     * })
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.01.08
     */
    public function addEnquiryOrder(array $data): int
    {
        return EellyClient::request('order/order', 'addEnquiryOrder', true, $data);
    }

    /**
     * 添加询价下单记录.
     *
     * @param array  $data               询价下单数据
     * @param int    $data['refType']    订单类型标识：0 店铺商品订单 1 询价商品订单
     * @param int    $data['sellerId']   卖家id
     * @param string $data['sellerName'] 卖家名称
     * @param int    $data['buyerId']    买家id
     * @param string $data['buyerName']  买家名称
     * @param int    $data['extension']  订单标识：0 普通订单 1 分销订单 2 包销订单(买家) 4 自营订单 8 云店订单 16 厂+订单 32 省邮区订单 64 包销期订单(卖家) 128 即时到帐订单（支付成功立即结算卖家）
     * @param int    $data['freight']    订单运费
     * @param int    $data['fromFlag']   订单来源
     * @param string $data['remark']     备注
     *
     * @return bool
     *
     * @requestExample({
     *     "refType":3,
     *     "sellerId":148086,
     *     "sellerName":"molimoq",
     *     "buyerId":1234,
     *     "buyerName":"buyer",
     *     "extension" :0,
     *     "freight" : 10,
     *     "fromFlag":3,
     *     "remark":""
     * })
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.01.08
     */
    public function addEnquiryOrderAsync(array $data)
    {
        return EellyClient::request('order/order', 'addEnquiryOrder', false, $data);
    }

    /**
     * 获取物流信息.
     *
     * @param string $trackingNo 物流好
     * @param string $express    物流公司
     *
     * @return bool
     * @requestExample({"trackingNo":"1202516745301","express":"auto"})
     * @returnExample({{
     *  "number": "1202237859178",
     *  "type": "YUNDA",
     *  "name": "韵达",
     *  "letter": "Y",
     *  "tel": "95546",
     * "list": [{
     *     "time": "2017-01-07 16:05:38",
     *    "status": "湖南省炎陵县公司快件已被 已签收 签收"
     *  },
     *  {
     *  "time": "2017-01-07 16:02:43",
     *  "status": "湖南省炎陵县公司快件已被 已签收 签收"
     *  }],
     * "deliverystatus": "3",
     * "issign": "1"
     * }})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年04月09日
     * @Validation(
     * @PresenceOf(0, {message:"非法的物流号"})
     * )
     *
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * ---------------|-------|--------------
     * number         |string |订单号
     * type           |string |要查询的快递公司代码
     * name           |string |物流公司名称
     * letter         |string |
     * tel            |string |电话号码
     * list           |array  |物流动态
     * list["time"]   |string |动态时间
     * list["status"] |string |动态状态
     * deliverystatus |string |快递单当前的状态
     * 0：在途，即货物处于运输过程中；
     * 1：揽件，货物已由快递公司揽收并且产生了第一条跟踪信息；
     * 2：疑难，货物寄送过程出了问题；
     * 3：签收，收件人已签收；
     * 4：退签，即货物由于用户拒签、超区等原因退回，而且发件人已经签收；
     * 5：派件，即快递正在进行同城派件；
     * 6：退回，货物正处于退回发件人的途中；
     * issign         |string |
     */
    public function getExpressByTrackingNo(string $trackingNo, string $express = 'auto'): array
    {
        return EellyClient::request('order/order', 'getExpressByTrackingNo', true, $trackingNo, $express);
    }

    /**
     * 获取物流信息.
     *
     * @param string $trackingNo 物流好
     * @param string $express    物流公司
     *
     * @return bool
     * @requestExample({"trackingNo":"1202516745301","express":"auto"})
     * @returnExample({{
     *  "number": "1202237859178",
     *  "type": "YUNDA",
     *  "name": "韵达",
     *  "letter": "Y",
     *  "tel": "95546",
     * "list": [{
     *     "time": "2017-01-07 16:05:38",
     *    "status": "湖南省炎陵县公司快件已被 已签收 签收"
     *  },
     *  {
     *  "time": "2017-01-07 16:02:43",
     *  "status": "湖南省炎陵县公司快件已被 已签收 签收"
     *  }],
     * "deliverystatus": "3",
     * "issign": "1"
     * }})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年04月09日
     * @Validation(
     * @PresenceOf(0, {message:"非法的物流号"})
     * )
     *
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * ---------------|-------|--------------
     * number         |string |订单号
     * type           |string |要查询的快递公司代码
     * name           |string |物流公司名称
     * letter         |string |
     * tel            |string |电话号码
     * list           |array  |物流动态
     * list["time"]   |string |动态时间
     * list["status"] |string |动态状态
     * deliverystatus |string |快递单当前的状态
     * 0：在途，即货物处于运输过程中；
     * 1：揽件，货物已由快递公司揽收并且产生了第一条跟踪信息；
     * 2：疑难，货物寄送过程出了问题；
     * 3：签收，收件人已签收；
     * 4：退签，即货物由于用户拒签、超区等原因退回，而且发件人已经签收；
     * 5：派件，即快递正在进行同城派件；
     * 6：退回，货物正处于退回发件人的途中；
     * issign         |string |
     */
    public function getExpressByTrackingNoAsync(string $trackingNo, string $express = 'auto')
    {
        return EellyClient::request('order/order', 'getExpressByTrackingNo', false, $trackingNo, $express);
    }

    /**
     * 新增订单和发起支付.
     *
     * @param array $orderData 订单信息
     * @param array $userInfo  用户信息
     * @param array $memoInfo  额外信息
     * @requestExample({
     * "orderData":[
     * {
     * "storeId":1,
     * "goodsIds":[1, 2]
     * }
     * ],
     * "addrId":3
     * })
     * @returnExample(true)
     *
     * @return array
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年04月19日
     */
    public function addMallOrderAndPay(array $orderData, array $userInfo, array $memoInfo = []): array
    {
        return EellyClient::request('order/order', 'addMallOrderAndPay', true, $orderData, $userInfo, $memoInfo);
    }

    /**
     * 新增订单和发起支付.
     *
     * @param array $orderData 订单信息
     * @param array $userInfo  用户信息
     * @param array $memoInfo  额外信息
     * @requestExample({
     * "orderData":[
     * {
     * "storeId":1,
     * "goodsIds":[1, 2]
     * }
     * ],
     * "addrId":3
     * })
     * @returnExample(true)
     *
     * @return array
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年04月19日
     */
    public function addMallOrderAndPayAsync(array $orderData, array $userInfo, array $memoInfo = [])
    {
        return EellyClient::request('order/order', 'addMallOrderAndPay', false, $orderData, $userInfo, $memoInfo);
    }

    /**
     * 回调订单支付.
     *
     * @param string $billNo 衣联交易号
     * @requestExample({"billNo":"1711114177786cvA2s"})
     * @returnExample(true)
     *
     * @return bool
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月05日
     * @Validation(
     * @PresenceOf(0,{message:"数据不能为空"})
     * )
     */
    public function setOrderPay(string $billNo): bool
    {
        return EellyClient::request('order/order', 'setOrderPay', true, $billNo);
    }

    /**
     * 回调订单支付.
     *
     * @param string $billNo 衣联交易号
     * @requestExample({"billNo":"1711114177786cvA2s"})
     * @returnExample(true)
     *
     * @return bool
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月05日
     * @Validation(
     * @PresenceOf(0,{message:"数据不能为空"})
     * )
     */
    public function setOrderPayAsync(string $billNo)
    {
        return EellyClient::request('order/order', 'setOrderPay', false, $billNo);
    }

    /**
     * 需要自动结算货款.
     *
     * @return array
     * @requestExample()
     * @returnExample([{"orderId":"116","orderSn":"1810837219","sellerId":"1762613","buyerId":"2108403","payTime":"1524130597","orderAmount":"19800","freight":"1","commission":"0","applyAmount":null,"returnAmount":null,"applyFreight":null,"returnFreight":null}])
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月05日
     */
    public function getNeedConfirmedList(): array
    {
        return EellyClient::request('order/order', 'getNeedConfirmedList', true);
    }

    /**
     * 需要自动结算货款.
     *
     * @return array
     * @requestExample()
     * @returnExample([{"orderId":"116","orderSn":"1810837219","sellerId":"1762613","buyerId":"2108403","payTime":"1524130597","orderAmount":"19800","freight":"1","commission":"0","applyAmount":null,"returnAmount":null,"applyFreight":null,"returnFreight":null}])
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月05日
     */
    public function getNeedConfirmedListAsync()
    {
        return EellyClient::request('order/order', 'getNeedConfirmedList', false);
    }

    /**
     * 自动确认成功.
     *
     * @param int $orderId 订单ID
     *
     * @return bool
     * @requestExample({"orderId":116})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月05日
     */
    public function operateFinishOrder(int $orderId): bool
    {
        return EellyClient::request('order/order', 'operateFinishOrder', true, $orderId);
    }

    /**
     * 自动确认成功.
     *
     * @param int $orderId 订单ID
     *
     * @return bool
     * @requestExample({"orderId":116})
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月05日
     */
    public function operateFinishOrderAsync(int $orderId)
    {
        return EellyClient::request('order/order', 'operateFinishOrder', false, $orderId);
    }

    /**
     * 订单存在的情况下发起的支付.
     *
     * @param array  $orderSns 多个订单Id
     * @param string $openId   微信唯一标识
     *
     * @return array
     * @requestExample({"orderSns":[1810802172,1810892762]})
     * @returnExample({"platform":"wechatPayJs","billNo":"1804206f3430600Gbl","data":{"appId":"wx4570a3e7921ad847","package":"prepay_id=wx20092504076787ea261301530251393671","nonceStr":"ce40cc6e4eb37b4c6a5aed1af2bb0274","timeStamp":"1524187504","signType":"MD5","paySign":"079FC612EDF4E4D589334F41F15616C2"},"orderSn":[1810802172,1810892762]})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年04月20日
     */
    public function orderGoPay(array $orderSns, $type = 'wxSmall', $openId = ''): array
    {
        return EellyClient::request('order/order', 'orderGoPay', true, $orderSns, $type, $openId);
    }

    /**
     * 订单存在的情况下发起的支付.
     *
     * @param array  $orderSns 多个订单Id
     * @param string $openId   微信唯一标识
     *
     * @return array
     * @requestExample({"orderSns":[1810802172,1810892762]})
     * @returnExample({"platform":"wechatPayJs","billNo":"1804206f3430600Gbl","data":{"appId":"wx4570a3e7921ad847","package":"prepay_id=wx20092504076787ea261301530251393671","nonceStr":"ce40cc6e4eb37b4c6a5aed1af2bb0274","timeStamp":"1524187504","signType":"MD5","paySign":"079FC612EDF4E4D589334F41F15616C2"},"orderSn":[1810802172,1810892762]})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年04月20日
     */
    public function orderGoPayAsync(array $orderSns, $type = 'wxSmall', $openId = '')
    {
        return EellyClient::request('order/order', 'orderGoPay', false, $orderSns, $type, $openId);
    }

    /**
     * 根据订单id，获取订单相关信息.
     *
     * @param int $orderId 订单id
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return array
     * @requestExample({"orderId":5000214})
     * @returnExample({"orderId":5000214,"orderSn":1813399100,"sellerId":148086,"buyerId":1762254,"buyerName":"test","orderAmount":1400,"created_time":1526292190})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.05.15
     */
    public function getOrderData(int $orderId): array
    {
        return EellyClient::request('order/order', 'getOrderData', true, $orderId);
    }

    /**
     * 根据订单id，获取订单相关信息.
     *
     * @param int $orderId 订单id
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return array
     * @requestExample({"orderId":5000214})
     * @returnExample({"orderId":5000214,"orderSn":1813399100,"sellerId":148086,"buyerId":1762254,"buyerName":"test","orderAmount":1400,"created_time":1526292190})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.05.15
     */
    public function getOrderDataAsync(int $orderId)
    {
        return EellyClient::request('order/order', 'getOrderData', false, $orderId);
    }

    /**
     * 根据传过来的订单ID跟值，更新消息通知标识的值
     *
     * @param int $orderId    订单id
     * @param int $noticeFlag 消息通知标识的值
     *
     * @return bool
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.05.18
     */
    public function updateOrderNoticeFlag(int $orderId, int $noticeFlag): bool
    {
        return EellyClient::request('order/order', 'updateOrderNoticeFlag', true, $orderId, $noticeFlag);
    }

    /**
     * 根据传过来的订单ID跟值，更新消息通知标识的值
     *
     * @param int $orderId    订单id
     * @param int $noticeFlag 消息通知标识的值
     *
     * @return bool
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.05.18
     */
    public function updateOrderNoticeFlagAsync(int $orderId, int $noticeFlag)
    {
        return EellyClient::request('order/order', 'updateOrderNoticeFlag', false, $orderId, $noticeFlag);
    }

    /**
     * 获取管理后台的数据列表.
     *
     * @param array  $data    查询条件
     * @param int    $page    第几页
     * @param int    $limit   查询条数
     * @param string $orderBy
     *
     * @return array
     * @requestExample({"data":["storeId":148086,"extension":1]})
     * @returnExample({
     *   "items": [
     *       {
     *           "orderId": "5000205",
     *           "orderSn": "1813016929",
     *           "extension": "0",
     *           "batchNumber": "0",
     *           "chunkNumber": "0",
     *           "sellerId": "148086",
     *           "sellerName": "莫琼小店",
     *           "buyerId": "2108403",
     *           "buyerName": "yl_jn003778(yl_jn003778)",
     *           "osId": "15",
     *           "payTime": "0",
     *           "shipTime": "0",
     *           "delayTime": "0",
     *           "frozenTime": "0",
     *           "finishedTime": "0",
     *           "orderAmount": "4800",
     *           "freight": "1800",
     *           "commission": "0",
     *           "returnFlag": "0",
     *           "evaluateFlag": "0",
     *           "deleteFlag": "0",
     *           "fromFlag": "3",
     *           "createdTime": "1526024934",
     *           "updateTime": "2018-05-15 20:28:59"
     *       },
     *       {
     *           "orderId": "5000204",
     *           "orderSn": "1813035805",
     *           "extension": "0",
     *           "batchNumber": "0",
     *           "chunkNumber": "0",
     *           "sellerId": "148086",
     *           "sellerName": "莫琼小店",
     *           "buyerId": "2108403",
     *           "buyerName": "yl_jn003778(yl_jn003778)",
     *           "osId": "15",
     *           "payTime": "0",
     *           "shipTime": "0",
     *           "delayTime": "259200",
     *           "frozenTime": "0",
     *           "finishedTime": "0",
     *           "orderAmount": "3800",
     *           "freight": "1100",
     *           "commission": "0",
     *           "returnFlag": "0",
     *           "evaluateFlag": "0",
     *           "deleteFlag": "0",
     *           "fromFlag": "3",
     *           "createdTime": "1526024871",
     *           "updateTime": "2018-05-15 20:28:59"
     *       }
     *   ],
     *   "page": {
     *       "totalPages": 54,
     *       "totalItems": 107,
     *       "current": 1,
     *       "limit": 2
     *   }
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月15日
     */
    public function getManageOrder(array $data, int $page = 1, int $limit = 10, string $orderBy = 'created_time DESC'): array
    {
        return EellyClient::request('order/order', 'getManageOrder', true, $data, $page, $limit, $orderBy);
    }

    /**
     * 获取管理后台的数据列表.
     *
     * @param array  $data    查询条件
     * @param int    $page    第几页
     * @param int    $limit   查询条数
     * @param string $orderBy
     *
     * @return array
     * @requestExample({"data":["storeId":148086,"extension":1]})
     * @returnExample({
     *   "items": [
     *       {
     *           "orderId": "5000205",
     *           "orderSn": "1813016929",
     *           "extension": "0",
     *           "batchNumber": "0",
     *           "chunkNumber": "0",
     *           "sellerId": "148086",
     *           "sellerName": "莫琼小店",
     *           "buyerId": "2108403",
     *           "buyerName": "yl_jn003778(yl_jn003778)",
     *           "osId": "15",
     *           "payTime": "0",
     *           "shipTime": "0",
     *           "delayTime": "0",
     *           "frozenTime": "0",
     *           "finishedTime": "0",
     *           "orderAmount": "4800",
     *           "freight": "1800",
     *           "commission": "0",
     *           "returnFlag": "0",
     *           "evaluateFlag": "0",
     *           "deleteFlag": "0",
     *           "fromFlag": "3",
     *           "createdTime": "1526024934",
     *           "updateTime": "2018-05-15 20:28:59"
     *       },
     *       {
     *           "orderId": "5000204",
     *           "orderSn": "1813035805",
     *           "extension": "0",
     *           "batchNumber": "0",
     *           "chunkNumber": "0",
     *           "sellerId": "148086",
     *           "sellerName": "莫琼小店",
     *           "buyerId": "2108403",
     *           "buyerName": "yl_jn003778(yl_jn003778)",
     *           "osId": "15",
     *           "payTime": "0",
     *           "shipTime": "0",
     *           "delayTime": "259200",
     *           "frozenTime": "0",
     *           "finishedTime": "0",
     *           "orderAmount": "3800",
     *           "freight": "1100",
     *           "commission": "0",
     *           "returnFlag": "0",
     *           "evaluateFlag": "0",
     *           "deleteFlag": "0",
     *           "fromFlag": "3",
     *           "createdTime": "1526024871",
     *           "updateTime": "2018-05-15 20:28:59"
     *       }
     *   ],
     *   "page": {
     *       "totalPages": 54,
     *       "totalItems": 107,
     *       "current": 1,
     *       "limit": 2
     *   }
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月15日
     */
    public function getManageOrderAsync(array $data, int $page = 1, int $limit = 10, string $orderBy = 'created_time DESC')
    {
        return EellyClient::request('order/order', 'getManageOrder', false, $data, $page, $limit, $orderBy);
    }

    /**
     * 获取管理后台统计数据.
     *
     * @param array $data 查询条件
     *
     * @return array
     * @requestExample({"data":["storeId":148086,"extension":1]})
     * @returnExample({
     *   "total": "36808",
     *   "totalAmount": "716691664",
     *   "totalGoods": "896767",
     *   "totalReturnAmount": "554528",
     *   "spillCount": "0",
     *   "spillAmount": "0",
     *   "spillGoods": "0",
     *   "spillReturnAmount": "0"
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月15日
     */
    public function getManageOrderStat(array $data): array
    {
        return EellyClient::request('order/order', 'getManageOrderStat', true, $data);
    }

    /**
     * 获取管理后台统计数据.
     *
     * @param array $data 查询条件
     *
     * @return array
     * @requestExample({"data":["storeId":148086,"extension":1]})
     * @returnExample({
     *   "total": "36808",
     *   "totalAmount": "716691664",
     *   "totalGoods": "896767",
     *   "totalReturnAmount": "554528",
     *   "spillCount": "0",
     *   "spillAmount": "0",
     *   "spillGoods": "0",
     *   "spillReturnAmount": "0"
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月15日
     */
    public function getManageOrderStatAsync(array $data)
    {
        return EellyClient::request('order/order', 'getManageOrderStat', false, $data);
    }

    /**
     * 获取订单详情.
     *
     * @param int $orderId 订单ID
     *
     * @return array
     * @requestExample({"orderId":161})
     * @returnExample({
     *  "orderId": "161",
     *  "orderSn": "1811635308",
     *  "orderAmount": "2",
     *  "remark": "",
     *  "createdTime": "1524830823",
     *  "payTime": "0",
     *  "buyerId": "2108403",
     *  "freight": "1",
     *  "osId": "15",
     *  "extension": "0",
     *  "finishedTime": "0",
     *  "buyerName": "juju12",
     *  "sellerName": "莫琼小店",
     *  "regionName": "山西省 晋城市 沁水县",
     *  "address": "2222",
     *  "invoiceNo": "",
     *  "consignee": "蓝厨卫",
     *  "mobile": "11113131313",
     *  "invoiceName": "",
     *  "returnAmount": null,
     *  "likeTime": "1524899508",
     *  "goodsList": [
     *      {
     *          "ogId": "20000216",
     *          "orderId": "161",
     *          "goodsId": "1450168344",
     *          "gsId": "195022196",
     *          "price": "1",
     *          "quantity": "2",
     *          "goodsName": "【莫琼小店】 2018新款 针织衫/毛衣  包邮",
     *          "goodsImage": "https://img01.eelly.test/G02/M00/00/03/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *          "goodsNumber": "2",
     *          "spec": "颜色:如图色,尺码:均码",
     *          "createdTime": "1524830823",
     *          "updateTime": "2018-05-02 15:17:18"
     *      },
     *      {
     *          "ogId": "20000472",
     *          "orderId": "161",
     *          "goodsId": "1450168344",
     *          "gsId": "195022196",
     *          "price": "1",
     *          "quantity": "2",
     *          "goodsName": "【莫琼小店】 2018新款 针织衫/毛衣  包邮",
     *          "goodsImage": "https://img01.eelly.test/G02/M00/00/03/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *          "goodsNumber": "2",
     *          "spec": "颜色:如图色,尺码:均码",
     *          "createdTime": "1524830823",
     *          "updateTime": "2018-05-02 15:17:18"
     *      },
     *      {
     *          "ogId": "20000473",
     *          "orderId": "161",
     *          "goodsId": "1450168344",
     *          "gsId": "195022196",
     *          "price": "1",
     *          "quantity": "2",
     *          "goodsName": "【莫琼小店】 2018新款 针织衫/毛衣  包邮",
     *          "goodsImage": "https://img01.eelly.test/G02/M00/00/03/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *          "goodsNumber": "2",
     *          "spec": "颜色:如图色,尺码:均码",
     *          "createdTime": "1524830823",
     *          "updateTime": "2018-05-02 15:17:18"
     *      }
     *  ],
     *"orderLog": [
     *  {
     *      "olId": "428",
     *      "orderId": "161",
     *      "type": "0",
     *      "handleId": "0",
     *      "handleName": "系统管理员",
     *      "fromOsId": "2",
     *      "toOsId": "15",
     *      "remark": "买家24小时内未支付",
     *      "createdTime": "1525851517",
     *      "updateTime": "2018-05-09 15:38:32"
     *  },
     *  {
     *      "olId": "162",
     *      "orderId": "161",
     *      "type": "0",
     *      "handleId": "0",
     *      "handleName": "",
     *      "fromOsId": "0",
     *      "toOsId": "1",
     *      "remark": "新下单",
     *      "createdTime": "1524830823",
     *      "updateTime": "2018-04-27 20:06:57"
     *  }
     * ]
     *})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月17日
     */
    public function getManageOderInfo(int $orderId): array
    {
        return EellyClient::request('order/order', 'getManageOderInfo', true, $orderId);
    }

    /**
     * 获取订单详情.
     *
     * @param int $orderId 订单ID
     *
     * @return array
     * @requestExample({"orderId":161})
     * @returnExample({
     *  "orderId": "161",
     *  "orderSn": "1811635308",
     *  "orderAmount": "2",
     *  "remark": "",
     *  "createdTime": "1524830823",
     *  "payTime": "0",
     *  "buyerId": "2108403",
     *  "freight": "1",
     *  "osId": "15",
     *  "extension": "0",
     *  "finishedTime": "0",
     *  "buyerName": "juju12",
     *  "sellerName": "莫琼小店",
     *  "regionName": "山西省 晋城市 沁水县",
     *  "address": "2222",
     *  "invoiceNo": "",
     *  "consignee": "蓝厨卫",
     *  "mobile": "11113131313",
     *  "invoiceName": "",
     *  "returnAmount": null,
     *  "likeTime": "1524899508",
     *  "goodsList": [
     *      {
     *          "ogId": "20000216",
     *          "orderId": "161",
     *          "goodsId": "1450168344",
     *          "gsId": "195022196",
     *          "price": "1",
     *          "quantity": "2",
     *          "goodsName": "【莫琼小店】 2018新款 针织衫/毛衣  包邮",
     *          "goodsImage": "https://img01.eelly.test/G02/M00/00/03/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *          "goodsNumber": "2",
     *          "spec": "颜色:如图色,尺码:均码",
     *          "createdTime": "1524830823",
     *          "updateTime": "2018-05-02 15:17:18"
     *      },
     *      {
     *          "ogId": "20000472",
     *          "orderId": "161",
     *          "goodsId": "1450168344",
     *          "gsId": "195022196",
     *          "price": "1",
     *          "quantity": "2",
     *          "goodsName": "【莫琼小店】 2018新款 针织衫/毛衣  包邮",
     *          "goodsImage": "https://img01.eelly.test/G02/M00/00/03/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *          "goodsNumber": "2",
     *          "spec": "颜色:如图色,尺码:均码",
     *          "createdTime": "1524830823",
     *          "updateTime": "2018-05-02 15:17:18"
     *      },
     *      {
     *          "ogId": "20000473",
     *          "orderId": "161",
     *          "goodsId": "1450168344",
     *          "gsId": "195022196",
     *          "price": "1",
     *          "quantity": "2",
     *          "goodsName": "【莫琼小店】 2018新款 针织衫/毛衣  包邮",
     *          "goodsImage": "https://img01.eelly.test/G02/M00/00/03/small_ooYBAFqzVV2ICEGRAAER2psay8IAAABggBWRl0AARHy759.jpg",
     *          "goodsNumber": "2",
     *          "spec": "颜色:如图色,尺码:均码",
     *          "createdTime": "1524830823",
     *          "updateTime": "2018-05-02 15:17:18"
     *      }
     *  ],
     *"orderLog": [
     *  {
     *      "olId": "428",
     *      "orderId": "161",
     *      "type": "0",
     *      "handleId": "0",
     *      "handleName": "系统管理员",
     *      "fromOsId": "2",
     *      "toOsId": "15",
     *      "remark": "买家24小时内未支付",
     *      "createdTime": "1525851517",
     *      "updateTime": "2018-05-09 15:38:32"
     *  },
     *  {
     *      "olId": "162",
     *      "orderId": "161",
     *      "type": "0",
     *      "handleId": "0",
     *      "handleName": "",
     *      "fromOsId": "0",
     *      "toOsId": "1",
     *      "remark": "新下单",
     *      "createdTime": "1524830823",
     *      "updateTime": "2018-04-27 20:06:57"
     *  }
     * ]
     *})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年05月17日
     */
    public function getManageOderInfoAsync(int $orderId)
    {
        return EellyClient::request('order/order', 'getManageOderInfo', false, $orderId);
    }

    /**
     * 获取店铺的成交订单数，下单就算成交一笔，取消的订单也算入成交数,由商城迁移过来的.
     * ### 返回数据说明.
     *
     * 字段|类型|说明
     * --------------------|-------|--------------
     * 148086              |array  |列表下标
     * 148086["sellerId"]  |string |店铺ID
     * 148086["addNum"]    |string |下单数
     * 148086["addAmount"] |string |下单金额
     * 148086["payAmount"] |string |支付金额
     * 148086["payNum"]    |string |支付数
     *
     *
     * @param array $storeIds  店铺id数组
     * @param int   $startTime 开始时间
     * @param int   $endTime   结束时间
     *
     * @requestExample({"storeIds":[148086],'startTime':1514739600,'endTime':1527746679})
     * @returnExample({
     *   "148086": {
     *       "sellerId": "148086",
     *       "addNum": "236",
     *       "addAmount": "2889732",
     *       "payAmount": "14359",
     *       "payNum": "77"
     *   }
     *})
     *
     * @return array
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since  2018年05月31日
     */
    public function getOrderCountsByStoreId(array $storeIds, int $startTime = 0, int $endTime = 0): array
    {
        return EellyClient::request('order/order', 'getOrderCountsByStoreId', true, $storeIds, $startTime, $endTime);
    }

    /**
     * 获取店铺的成交订单数，下单就算成交一笔，取消的订单也算入成交数,由商城迁移过来的.
     * ### 返回数据说明.
     *
     * 字段|类型|说明
     * --------------------|-------|--------------
     * 148086              |array  |列表下标
     * 148086["sellerId"]  |string |店铺ID
     * 148086["addNum"]    |string |下单数
     * 148086["addAmount"] |string |下单金额
     * 148086["payAmount"] |string |支付金额
     * 148086["payNum"]    |string |支付数
     *
     *
     * @param array $storeIds  店铺id数组
     * @param int   $startTime 开始时间
     * @param int   $endTime   结束时间
     *
     * @requestExample({"storeIds":[148086],'startTime':1514739600,'endTime':1527746679})
     * @returnExample({
     *   "148086": {
     *       "sellerId": "148086",
     *       "addNum": "236",
     *       "addAmount": "2889732",
     *       "payAmount": "14359",
     *       "payNum": "77"
     *   }
     *})
     *
     * @return array
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since  2018年05月31日
     */
    public function getOrderCountsByStoreIdAsync(array $storeIds, int $startTime = 0, int $endTime = 0)
    {
        return EellyClient::request('order/order', 'getOrderCountsByStoreId', false, $storeIds, $startTime, $endTime);
    }

    /**
     * 获取各卖家未发货订单数量.
     *
     * @param int $page  当前页数
     * @param int $limit 每页数量
     *
     * @return array
     *
     * @requestExample({"page": 1, "limit": 1000})
     * @returnExample({
     *     "148086": {"orderCount": 8, "sellerId": 148086}
     * })
     *
     * @author zhangyangxun
     *
     * @since 2018-08-08
     */
    public function getUnshippedInfo(int $page = 1, int $limit = 10): array
    {
        return EellyClient::request('order/order', 'getUnshippedInfo', true, $page, $limit);
    }

    /**
     * 获取各卖家未发货订单数量.
     *
     * @param int $page  当前页数
     * @param int $limit 每页数量
     *
     * @return array
     *
     * @requestExample({"page": 1, "limit": 1000})
     * @returnExample({
     *     "148086": {"orderCount": 8, "sellerId": 148086}
     * })
     *
     * @author zhangyangxun
     *
     * @since 2018-08-08
     */
    public function getUnshippedInfoAsync(int $page = 1, int $limit = 10)
    {
        return EellyClient::request('order/order', 'getUnshippedInfo', false, $page, $limit);
    }

    /**
     *  购物车确认下单列表.
     *
     * ### 请求参数
     * 字段名 | 类型 |描述
     * ---|---|---
     * data | array |请求参数
     * array $data['isFrom'] | int | 下单类型 1.购物车下单 2.立即下单
     * $data['goods'] | array | 商品信息(立即下单必传,购物车下单传空)
     * $data['goods'][0]['goodsId'] | int | 选中的商品ID
     * $data['goods'][0]['storeId'] | int | 选中的店铺ID
     * $data['goods'][0]['isSpelling'] | int | 是否拼团商品
     * $data['goods'][0]['spec'] | array | 选中的商品规格
     * $data['uniqueIds'][] | array | 购物车商品主键id (购物车下单必传,立即下单传空)
     * >请求数据说明
     * >data['goods']['spec'] 商品规格字段数据说明
     * >字段名 | 类型 |描述
     * >--- | ---- | -----
     * >quantity | int | 购买数量
     * >spId | int | 规格ID
     * > ---
     *
     * ### 返回结果
     * 字段名 | 类型 |描述
     * ---|---|---
     * defaultAddress | array | 默认收货地址
     * storeOrderGoods | array | 用户下单数据
     * freePostCard | array  |包邮卡信息
     *
     * >返回数据说明
     *
     * >defaultAddress 默认收货地址返回字段说明
     *
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >addrId | int | 收货地址id
     * >userName | string | 收货人名称
     * >telNumber | string | 收货人电话
     * >detailInfo | string | 收货人详细地址
     * >default | int | 是否为默认收货地址
     * >regionId | int | 地区id
     *
     * >storeOrderGoods 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >storeId | int | 店铺id
     * >storeName | int | 店铺名
     * >creditValue | int | 信誉值
     * >totalQuantity | int | 总件数
     * >totalWeight | int | 商品总重量
     * >goodsInfo | array | 商品信息
     * >couponInfo | array | 优惠券信息
     * >expressWay | array | 快递信息
     *
     *
     * >storeOrderGoods[]['goodsInfo'] 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >goodsId | int | 商品id
     * >totalPrice | float | 商品总价
     * >goodsSn | string | 商品货号
     * >goodsCount | string | 商品数量
     * >goodsImage | string | 商品图片地址
     * >goodsName | string | 商品名称
     * >specInfo | array | 规格信息
     * >priceData | array | 价格信息
     *
     * >storeOrderGoods[]['goodsInfo']['specInfo'] 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >specId | int | 规格id
     * >price | float | 价格
     * >quantity | int | 数量
     * >color | string | 颜色
     * >size | string | 尺寸
     * >stock | int | 库存
     *
     * >storeOrderGoods[]['priceData'] 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >goodsId | int | 商品id
     * >storeId | int | 店铺id
     * >priceType | int | 价格类型
     * >priceLower | float | 最低价
     * >priceUpper | float | 最高价
     * >unitPrice | float | 单价
     * >priceData  | array | 起批价格区间
     *
     * >storeOrderGoods[]['priceData']['priceDetail'] 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >actId | int | 活动id
     * >goodsId | int | 商品id
     * >price | int | 价格
     * >tag | float | 活动标题
     *
     * >storeOrderGoods[]['priceData']['priceData'] 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >lowerLimit | int | 最低起批量
     * >upperLimit | int | 最高起批量
     * >price | float | 起批价
     * >type | int | 价格类型
     *
     * >storeOrderGoods[]['couponInfo'] 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >couponId | int | 优惠券id
     * >couponNo | string | 优惠券编号
     * >startTime | int | 开始时间
     * >endTime | int | 结束时间
     *
     * >storeOrderGoods[]['expressWay'] 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >name | string | 快递名称
     * >shippingId | int | 快递id
     * >freight | float | 运费
     * >weight  | float | 重量
     * >expressType | int | 是否可以到付 (0.支付 1.不支持)
     * >expressSelect | int | 快递类型 (1：货运；2：快递；3：EMS)
     *
     * >返回数据说明
     * >freePostCard 默认收货地址返回字段说明
     *
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     *
     *
     *
     *
     * @param array $data                           请求参数
     * @param array $data['isFrom']                 下单平台 1.pc 2.wap 3.app
     * @param array $data['type']                   下单类型 1.购物车下单 2.立即下单
     * @param array $data['goods']                  商品信息(立即下单必传,购物车下单传空)
     * @param int   $data['goods'][0]['goodsId']    选中的商品ID
     * @param int   $data['goods'][0]['storeId']    选中的店铺ID
     * @param int   $data['goods'][0]['spec']       选中的商品规格
     * @param int   $data['goods'][0]['isSpelling'] 是否拼团商品
     * @param array $data['uniqueIds'][]            购物车商品主键id (购物车下单必传,立即下单传空)
     *
     * @returnExample({"defaultAddress":{"addrId":"547627","userName":"黄丽玲","telNumber":"18312019106","detailInfo":"河北省 秦皇岛市 市辖区 啦咯啦咯啦咯啦咯啦","default":"1","regionId":"130301"},"storeOrderGoods":[{"storeId":"1760244","storeName":"女装大大","creditValue":{"type":1,"number":1},"totalQuantity":12,"totalWeight":1,"goodsInfo":[{"goodsId":5578939,"totalPrice":0.12,"goodsCount":12,"goodsNumber":"","goodsImage":"https:\/\/img01.eelly.test\/G01\/M00\/00\/06\/small_oYYBAFtMOZWIGOgHAAGL_sMz2wAAAACagKbTqgAAYwW358.jpg","goodsName":"运费","specInfo":[{"specId":"32090865","price":"0.01","originalPrice":"0.00","quantity":12,"color":"如图色","size":"均码","stock":99978}],"priceData":{"goodsId":"5578939","storeId":"1760244","priceType":2001,"priceLower":"0.01","priceUpper":"0.01","priceData":[{"lowerLimit":"1","upperLimit":"0","price":"0.01","type":"1"}],"pricePay":"0.01","priceTitle":"限时特惠","priceDetail":{"actId":"3401","goodsId":"5578939","nums":"0","mbrBuyLimit":"0","price":"0.01","typeInfo":"a:0:{}","tag":"限时特惠","startTime":"1503561600","endTime":"1542441599","type":"16","isLimitMbrbuy":"1","single":"0","isSetNums":"1","expireTime":4196480},"unitPrice":"0.01"}}],"couponInfo":[{"couponId":"1450168327","couponNo":"1450168327SS","startTime":"1525329993","endTime":"1525329993","recId":"111"}],"totalPrice":0.12,"expressWay":[{"name":"货运","shippingId":"222789","expressType":"0","express_select":"1","freight":"0","weight":"0"},{"name":"运费到付","shippingId":"222789","expressType":"1","expressSelect":"1","freight":"0","weight":"0"}],"defaultAddress":{"addrId":"547627","userName":"黄丽玲","telNumber":"18312019106","detailInfo":"河北省 秦皇岛市 市辖区 啦咯啦咯啦咯啦咯啦","default":"1","regionId":"130301"},"fullSendActiveConfig":["暂时给个"]}],"freePostCard":["暂时给个"]})
     *
     * @param UidDTO $user
     *
     * @author wechan
     *
     * @since 2018年08月22日
     */
    public function cartConfirmOrderList(array $data, UidDTO $user = null): array
    {
        return EellyClient::request('order/order', 'cartConfirmOrderList', true, $data, $user);
    }

    /**
     *  购物车确认下单列表.
     *
     * ### 请求参数
     * 字段名 | 类型 |描述
     * ---|---|---
     * data | array |请求参数
     * array $data['isFrom'] | int | 下单类型 1.购物车下单 2.立即下单
     * $data['goods'] | array | 商品信息(立即下单必传,购物车下单传空)
     * $data['goods'][0]['goodsId'] | int | 选中的商品ID
     * $data['goods'][0]['storeId'] | int | 选中的店铺ID
     * $data['goods'][0]['isSpelling'] | int | 是否拼团商品
     * $data['goods'][0]['spec'] | array | 选中的商品规格
     * $data['uniqueIds'][] | array | 购物车商品主键id (购物车下单必传,立即下单传空)
     * >请求数据说明
     * >data['goods']['spec'] 商品规格字段数据说明
     * >字段名 | 类型 |描述
     * >--- | ---- | -----
     * >quantity | int | 购买数量
     * >spId | int | 规格ID
     * > ---
     *
     * ### 返回结果
     * 字段名 | 类型 |描述
     * ---|---|---
     * defaultAddress | array | 默认收货地址
     * storeOrderGoods | array | 用户下单数据
     * freePostCard | array  |包邮卡信息
     *
     * >返回数据说明
     *
     * >defaultAddress 默认收货地址返回字段说明
     *
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >addrId | int | 收货地址id
     * >userName | string | 收货人名称
     * >telNumber | string | 收货人电话
     * >detailInfo | string | 收货人详细地址
     * >default | int | 是否为默认收货地址
     * >regionId | int | 地区id
     *
     * >storeOrderGoods 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >storeId | int | 店铺id
     * >storeName | int | 店铺名
     * >creditValue | int | 信誉值
     * >totalQuantity | int | 总件数
     * >totalWeight | int | 商品总重量
     * >goodsInfo | array | 商品信息
     * >couponInfo | array | 优惠券信息
     * >expressWay | array | 快递信息
     *
     *
     * >storeOrderGoods[]['goodsInfo'] 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >goodsId | int | 商品id
     * >totalPrice | float | 商品总价
     * >goodsSn | string | 商品货号
     * >goodsCount | string | 商品数量
     * >goodsImage | string | 商品图片地址
     * >goodsName | string | 商品名称
     * >specInfo | array | 规格信息
     * >priceData | array | 价格信息
     *
     * >storeOrderGoods[]['goodsInfo']['specInfo'] 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >specId | int | 规格id
     * >price | float | 价格
     * >quantity | int | 数量
     * >color | string | 颜色
     * >size | string | 尺寸
     * >stock | int | 库存
     *
     * >storeOrderGoods[]['priceData'] 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >goodsId | int | 商品id
     * >storeId | int | 店铺id
     * >priceType | int | 价格类型
     * >priceLower | float | 最低价
     * >priceUpper | float | 最高价
     * >unitPrice | float | 单价
     * >priceData  | array | 起批价格区间
     *
     * >storeOrderGoods[]['priceData']['priceDetail'] 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >actId | int | 活动id
     * >goodsId | int | 商品id
     * >price | int | 价格
     * >tag | float | 活动标题
     *
     * >storeOrderGoods[]['priceData']['priceData'] 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >lowerLimit | int | 最低起批量
     * >upperLimit | int | 最高起批量
     * >price | float | 起批价
     * >type | int | 价格类型
     *
     * >storeOrderGoods[]['couponInfo'] 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >couponId | int | 优惠券id
     * >couponNo | string | 优惠券编号
     * >startTime | int | 开始时间
     * >endTime | int | 结束时间
     *
     * >storeOrderGoods[]['expressWay'] 字段说明
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     * >name | string | 快递名称
     * >shippingId | int | 快递id
     * >freight | float | 运费
     * >weight  | float | 重量
     * >expressType | int | 是否可以到付 (0.支付 1.不支持)
     * >expressSelect | int | 快递类型 (1：货运；2：快递；3：EMS)
     *
     * >返回数据说明
     * >freePostCard 默认收货地址返回字段说明
     *
     * >字段名 | 类型 |描述
     * >-- | ---- | -----
     *
     *
     *
     *
     * @param array $data                           请求参数
     * @param array $data['isFrom']                 下单平台 1.pc 2.wap 3.app
     * @param array $data['type']                   下单类型 1.购物车下单 2.立即下单
     * @param array $data['goods']                  商品信息(立即下单必传,购物车下单传空)
     * @param int   $data['goods'][0]['goodsId']    选中的商品ID
     * @param int   $data['goods'][0]['storeId']    选中的店铺ID
     * @param int   $data['goods'][0]['spec']       选中的商品规格
     * @param int   $data['goods'][0]['isSpelling'] 是否拼团商品
     * @param array $data['uniqueIds'][]            购物车商品主键id (购物车下单必传,立即下单传空)
     *
     * @returnExample({"defaultAddress":{"addrId":"547627","userName":"黄丽玲","telNumber":"18312019106","detailInfo":"河北省 秦皇岛市 市辖区 啦咯啦咯啦咯啦咯啦","default":"1","regionId":"130301"},"storeOrderGoods":[{"storeId":"1760244","storeName":"女装大大","creditValue":{"type":1,"number":1},"totalQuantity":12,"totalWeight":1,"goodsInfo":[{"goodsId":5578939,"totalPrice":0.12,"goodsCount":12,"goodsNumber":"","goodsImage":"https:\/\/img01.eelly.test\/G01\/M00\/00\/06\/small_oYYBAFtMOZWIGOgHAAGL_sMz2wAAAACagKbTqgAAYwW358.jpg","goodsName":"运费","specInfo":[{"specId":"32090865","price":"0.01","originalPrice":"0.00","quantity":12,"color":"如图色","size":"均码","stock":99978}],"priceData":{"goodsId":"5578939","storeId":"1760244","priceType":2001,"priceLower":"0.01","priceUpper":"0.01","priceData":[{"lowerLimit":"1","upperLimit":"0","price":"0.01","type":"1"}],"pricePay":"0.01","priceTitle":"限时特惠","priceDetail":{"actId":"3401","goodsId":"5578939","nums":"0","mbrBuyLimit":"0","price":"0.01","typeInfo":"a:0:{}","tag":"限时特惠","startTime":"1503561600","endTime":"1542441599","type":"16","isLimitMbrbuy":"1","single":"0","isSetNums":"1","expireTime":4196480},"unitPrice":"0.01"}}],"couponInfo":[{"couponId":"1450168327","couponNo":"1450168327SS","startTime":"1525329993","endTime":"1525329993","recId":"111"}],"totalPrice":0.12,"expressWay":[{"name":"货运","shippingId":"222789","expressType":"0","express_select":"1","freight":"0","weight":"0"},{"name":"运费到付","shippingId":"222789","expressType":"1","expressSelect":"1","freight":"0","weight":"0"}],"defaultAddress":{"addrId":"547627","userName":"黄丽玲","telNumber":"18312019106","detailInfo":"河北省 秦皇岛市 市辖区 啦咯啦咯啦咯啦咯啦","default":"1","regionId":"130301"},"fullSendActiveConfig":["暂时给个"]}],"freePostCard":["暂时给个"]})
     *
     * @param UidDTO $user
     *
     * @author wechan
     *
     * @since 2018年08月22日
     */
    public function cartConfirmOrderListAsync(array $data, UidDTO $user = null)
    {
        return EellyClient::request('order/order', 'cartConfirmOrderList', false, $data, $user);
    }

    /**
     * 查询app消息列表商品信息.
     *
     * @param array $condition
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2018-08-24
     */
    public function getAppMessageOrder(array $condition): array
    {
        return EellyClient::request('order/order', 'getAppMessageOrder', true, $condition);
    }

    /**
     * 查询app消息列表商品信息.
     *
     * @param array $condition
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2018-08-24
     */
    public function getAppMessageOrderAsync(array $condition)
    {
        return EellyClient::request('order/order', 'getAppMessageOrder', false, $condition);
    }

    /**
     * 查询买家在某店铺的最后下单时间.
     *
     * @param array $condition 查询条件
     *
     * @return array
     *
     * @requestExample({ "condition": {"storeId": 1760467, "buyerIds": [1762341, 1762342]} })
     * @returnExample([ {"1762341": {"buyerId": 1762341, "lastTime": 1516389648}}, {"1762342": {"buyerId": 1762342, "lastTime": 1516389648}} ])
     *
     * @author zhangyangxun
     *
     * @since 2018-08-24
     */
    public function getLastOrderTime(array $condition): array
    {
        return EellyClient::request('order/order', 'getLastOrderTime', true, $condition);
    }

    /**
     * 查询买家在某店铺的最后下单时间.
     *
     * @param array $condition 查询条件
     *
     * @return array
     *
     * @requestExample({ "condition": {"storeId": 1760467, "buyerIds": [1762341, 1762342]} })
     * @returnExample([ {"1762341": {"buyerId": 1762341, "lastTime": 1516389648}}, {"1762342": {"buyerId": 1762342, "lastTime": 1516389648}} ])
     *
     * @author zhangyangxun
     *
     * @since 2018-08-24
     */
    public function getLastOrderTimeAsync(array $condition)
    {
        return EellyClient::request('order/order', 'getLastOrderTime', false, $condition);
    }

    /**
     * 订单下单接口.
     *
     * @param array  $data                                                    订单信息
     * @param array  $data['orderInfo']                                       商品信息
     * @param int    $data['orderInfo'][0]['storeId']                         店铺ID
     * @param int    $data['orderInfo'][0]['shippingId']                      快递模板id
     * @param int    $data['orderInfo'][0]['expressSelect']                   快递类型
     * @param int    $data['orderInfo'][0]['expressType']                     是否可以到付,需要判断店铺是否设置了到付
     * @param int    $data['orderInfo'][0]['isFreeShipping']                  是否免运费
     * @param int    $data['orderInfo'][0]['remark']                          订单备注
     * @param int    $data['orderInfo'][0]['couponId']                        优惠券Id
     * @param int    $data['orderInfo'][0]['goods'][0]['goodsId']             商品ID
     * @param int    $data['orderInfo'][0]['goods'][0]['spec']                商品规格
     * @param int    $data['orderInfo'][0]['goods'][0]['spec'][0]['quantity'] 商品数量
     * @param int    $data['orderInfo'][0]['goods'][0]['spec'][0]['spId']     规格ID
     * @param int    $data['addressId']                                       收货地址id
     * @param int    $data['userId']                                          用户id
     * @param int    $data['fromFlag']                                        0 PC 1 WAP 2 店+APP 3 衣联小程序 4 快应用 5 联美小程序 6 市场小程序
     * @param int    $data['isSpelling']                                      是否拼团订单
     * @param UidDTO $user                                                    登录用户信息
     *
     * @return array
     *
     * @returnExample({"50002027", "50002026"})
     *
     * @author wechan
     *
     * @since 2018年09月04日
     */
    public function saveMallOrder(array $data, UidDTO $user = null): array
    {
        return EellyClient::request('order/order', 'saveMallOrder', true, $data, $user);
    }

    /**
     * 订单下单接口.
     *
     * @param array  $data                                                    订单信息
     * @param array  $data['orderInfo']                                       商品信息
     * @param int    $data['orderInfo'][0]['storeId']                         店铺ID
     * @param int    $data['orderInfo'][0]['shippingId']                      快递模板id
     * @param int    $data['orderInfo'][0]['expressSelect']                   快递类型
     * @param int    $data['orderInfo'][0]['expressType']                     是否可以到付,需要判断店铺是否设置了到付
     * @param int    $data['orderInfo'][0]['isFreeShipping']                  是否免运费
     * @param int    $data['orderInfo'][0]['remark']                          订单备注
     * @param int    $data['orderInfo'][0]['couponId']                        优惠券Id
     * @param int    $data['orderInfo'][0]['goods'][0]['goodsId']             商品ID
     * @param int    $data['orderInfo'][0]['goods'][0]['spec']                商品规格
     * @param int    $data['orderInfo'][0]['goods'][0]['spec'][0]['quantity'] 商品数量
     * @param int    $data['orderInfo'][0]['goods'][0]['spec'][0]['spId']     规格ID
     * @param int    $data['addressId']                                       收货地址id
     * @param int    $data['userId']                                          用户id
     * @param int    $data['fromFlag']                                        0 PC 1 WAP 2 店+APP 3 衣联小程序 4 快应用 5 联美小程序 6 市场小程序
     * @param int    $data['isSpelling']                                      是否拼团订单
     * @param UidDTO $user                                                    登录用户信息
     *
     * @return array
     *
     * @returnExample({"50002027", "50002026"})
     *
     * @author wechan
     *
     * @since 2018年09月04日
     */
    public function saveMallOrderAsync(array $data, UidDTO $user = null)
    {
        return EellyClient::request('order/order', 'saveMallOrder', false, $data, $user);
    }

    /**
     * 获取快递方式和运费价格
     *
     * @param array $goods                        购物车商品列表
     * @param int   $goods[0]['goodsId']          选中的商品ID
     * @param int   $goods['spec']                选中的商品规格
     * @param int   $goods['spec'][0]['quantity'] 选中的商品规格
     * @param int   $goods['spec'][0]['specId']   选中的商品规格
     * @param int   $regionId                     地区id
     *
     * @returnExample([{"name":"货运","shippingId":"222789","expressType":0,"express_select":"1","freight":0,"weight":0},{"name":"运费到付","shippingId":"222789","expressType":"1","expressSelect":"1","freight":0,"weight":0}])
     *
     * @author wechan
     *
     * @since 2018年08月23日
     */
    public function getExpressWay(array $goods, int $regionId): array
    {
        return EellyClient::request('order/order', 'getExpressWay', true, $goods, $regionId);
    }

    /**
     * 获取快递方式和运费价格
     *
     * @param array $goods                        购物车商品列表
     * @param int   $goods[0]['goodsId']          选中的商品ID
     * @param int   $goods['spec']                选中的商品规格
     * @param int   $goods['spec'][0]['quantity'] 选中的商品规格
     * @param int   $goods['spec'][0]['specId']   选中的商品规格
     * @param int   $regionId                     地区id
     *
     * @returnExample([{"name":"货运","shippingId":"222789","expressType":0,"express_select":"1","freight":0,"weight":0},{"name":"运费到付","shippingId":"222789","expressType":"1","expressSelect":"1","freight":0,"weight":0}])
     *
     * @author wechan
     *
     * @since 2018年08月23日
     */
    public function getExpressWayAsync(array $goods, int $regionId)
    {
        return EellyClient::request('order/order', 'getExpressWay', false, $goods, $regionId);
    }

    /**
     * 根据传过来的订单id，返回对应可以使用的优惠卷列表.
     *
     * @param float $money   订单金额
     * @param int   $storeId 店铺id
     * @param int   $userId  用户id
     *
     * @returnExample([{"couponId": 1450168327,"couponNo": "1450168327SS","startTime":1525329993,"endTime":1525329993,"recId":111}])
     *
     * @return array
     */
    public function getOrderCouponList(float $money, int $storeId, int $userId): array
    {
        return EellyClient::request('order/order', 'getOrderCouponList', true, $money, $storeId, $userId);
    }

    /**
     * 根据传过来的订单id，返回对应可以使用的优惠卷列表.
     *
     * @param float $money   订单金额
     * @param int   $storeId 店铺id
     * @param int   $userId  用户id
     *
     * @returnExample([{"couponId": 1450168327,"couponNo": "1450168327SS","startTime":1525329993,"endTime":1525329993,"recId":111}])
     *
     * @return array
     */
    public function getOrderCouponListAsync(float $money, int $storeId, int $userId)
    {
        return EellyClient::request('order/order', 'getOrderCouponList', false, $money, $storeId, $userId);
    }

    /**
     * 订单发起的支付.
     *
     * @param array  $orderIds 多个订单Id
     * @param string $type     支付账号类型 wechat:微信支付 alipay:支付宝 balance:余额
     * @param string $platform 支付平台: app:手机app pc:电脑pc端 wap:手机wap端 smallWechat:小程序
     * @param array  $extend   扩展信息,比如某宝账号,某小程序账号信息
     * @param UidDTO $user     登录用户信息
     *
     * ### 返回参数说明
     * 字段名 | 类型 |描述
     * -- | ---- | -----
     * platform | string | 支付类型
     * billNo | string | 衣联交易号
     * data | array | 第三方支付(余额支付)返回的结果
     * orderSns  | array | 订单号
     * orderIds | array | 订单id
     *
     * @return array
     *
     * @author wechan<pxs6216@dingtalk.com>
     *
     * @since 2018年09月10日
     */
    public function orderPay(array $orderIds, string $type = 'wechat', string $platform = 'pc', array $extend = [], UidDTO $user = null): array
    {
        return EellyClient::request('order/order', 'orderPay', true, $orderIds, $type, $platform, $extend, $user);
    }

    /**
     * 订单发起的支付.
     *
     * @param array  $orderIds 多个订单Id
     * @param string $type     支付账号类型 wechat:微信支付 alipay:支付宝 balance:余额
     * @param string $platform 支付平台: app:手机app pc:电脑pc端 wap:手机wap端 smallWechat:小程序
     * @param array  $extend   扩展信息,比如某宝账号,某小程序账号信息
     * @param UidDTO $user     登录用户信息
     *
     * ### 返回参数说明
     * 字段名 | 类型 |描述
     * -- | ---- | -----
     * platform | string | 支付类型
     * billNo | string | 衣联交易号
     * data | array | 第三方支付(余额支付)返回的结果
     * orderSns  | array | 订单号
     * orderIds | array | 订单id
     *
     * @return array
     *
     * @author wechan<pxs6216@dingtalk.com>
     *
     * @since 2018年09月10日
     */
    public function orderPayAsync(array $orderIds, string $type = 'wechat', string $platform = 'pc', array $extend = [], UidDTO $user = null)
    {
        return EellyClient::request('order/order', 'orderPay', false, $orderIds, $type, $platform, $extend, $user);
    }

    /**
     * 根据订单id 获取金额跟运费.
     *
     * ### 返回结果
     * 字段名 | 类型 |描述
     * ---|---|---
     * totalFee | int | 总运费(分)
     * totalAmount | int | 总金额(分)
     * isSetPayPass | int | 是否设置支付密码 1.已设置 0.未设置
     *
     * @param array $orderIds 订单id
     *
     * @return array
     *
     * @returnExample({"totalFee":1,"totalAmount":1,"isSetPayPass":1})
     *
     * @author wechan
     *
     * @since 2018年9月27日
     */
    public function getAmountAndFeeByOrderId(array $orderIds): array
    {
        return EellyClient::request('order/order', 'getAmountAndFeeByOrderId', true, $orderIds);
    }

    /**
     * 根据订单id 获取金额跟运费.
     *
     * ### 返回结果
     * 字段名 | 类型 |描述
     * ---|---|---
     * totalFee | int | 总运费(分)
     * totalAmount | int | 总金额(分)
     * isSetPayPass | int | 是否设置支付密码 1.已设置 0.未设置
     *
     * @param array $orderIds 订单id
     *
     * @return array
     *
     * @returnExample({"totalFee":1,"totalAmount":1,"isSetPayPass":1})
     *
     * @author wechan
     *
     * @since 2018年9月27日
     */
    public function getAmountAndFeeByOrderIdAsync(array $orderIds)
    {
        return EellyClient::request('order/order', 'getAmountAndFeeByOrderId', false, $orderIds);
    }

    /**
     * 统计符合条件的订单数量.
     *
     * @param array $conditions
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2018-10-09
     */
    public function getOrderSumByCondition(array $conditions): array
    {
        return EellyClient::request('order/order', 'getOrderSumByCondition', true, $conditions);
    }

    /**
     * 统计符合条件的订单数量.
     *
     * @param array $conditions
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2018-10-09
     */
    public function getOrderSumByConditionAsync(array $conditions)
    {
        return EellyClient::request('order/order', 'getOrderSumByCondition', false, $conditions);
    }

    /**
     * 根据条件获取订单信息.
     *
     * @param string $conditions 订单条件
     * @param array  $bind       绑定数据
     * @param array  $extend     扩展信息
     *
     * @author wechan
     *
     * @since 2018年10月10日
     */
    public function getOrderConditionInfo(string $conditions = '', array $bind = [], array $extend = []): array
    {
        return EellyClient::requestJson('order/order', __FUNCTION__, [
            'conditions' => $conditions,
            'bind' => $bind,
            'extend' => $extend
        ]);
        //return EellyClient::request('order/order', 'getOrderConditionInfo', true, $conditions, $bind, $extend);
    }

    /**
     * 根据条件获取订单信息.
     *
     * @param string $conditions 订单条件
     * @param array  $bind       绑定数据
     * @param array  $extend     扩展信息
     *
     * @author wechan
     *
     * @since 2018年10月10日
     */
    public function getOrderConditionInfoAsync(string $conditions = '', array $bind = [], array $extend = [])
    {
        return EellyClient::request('order/order', 'getOrderConditionInfo', false, $conditions, $bind, $extend);
    }

    /**
     * 回调订单支付.
     *
     * @param array $relData 支付请求数据
     *
     * [
     *    "userId" => 148086 用户id
     *    "storeId" => 148086 店铺id
     *    "money" => 10000   诚信保证冻结金额
     *    "billNo" => xxxxxxxx    增值服务id
     * ]
     *
     * @return bool
     *
     * @author wechan
     *
     * @since 2018年10月25日
     */
    public function handleOrderPayed(array $relData): bool
    {
        return EellyClient::request('order/order', 'handleOrderPayed', true, $relData);
    }

    /**
     * 回调订单支付.
     *
     * @param array $relData 支付请求数据
     *
     * [
     *    "userId" => 148086 用户id
     *    "storeId" => 148086 店铺id
     *    "money" => 10000   诚信保证冻结金额
     *    "billNo" => xxxxxxxx    增值服务id
     * ]
     *
     * @return bool
     *
     * @author wechan
     *
     * @since 2018年10月25日
     */
    public function handleOrderPayedAsync(array $relData)
    {
        return EellyClient::request('order/order', 'handleOrderPayed', false, $relData);
    }

    /**
     * 获取各状态我的订单数量.
     *
     * > 返回数据说明
     *
     * key                | type    | value
     * ------------------ | ------- | --------
     * all                | int     | 所有
     * needPay            | int     | 待付款
     * needShare          | int     | 集赞中 待分享
     * needShipping       | int     | 待发货
     * needReceiving      | int     | 待收货
     * refunding          | int     | 退货退款
     * canceled           | int     | 已取消
     * needReview         | int     | 待评价
     * finished           | int     | 已完成
     *
     * @param string $client 订单请求客户端 (wap端:wap, pc端:pc, 衣联小程序:eelly,店+:buyer,百里挑一:blty,龙瑞购:lrg)
     * @param int    $role   用户角色 (1 买家, 2 卖家)
     * @param int    $userId 用户ID
     *
     * @return array
     *
     * @requestExample({"client":"wap","role":1,"userId":148086})
     * @returnExample(
     * {
     *     "all":52,
     *     "needPay": 32,
     *     "needShare": 8,
     *     "needShipping": 0,
     *     "needReceiving": 0,
     *     "refunding":2,
     *     "canceled":2,
     *     "needReview":2,
     *     "finished":2
     * }
     * )
     *
     * @author zhangyangxun
     *
     * @since 2018.10.24
     */
    public function listOrderStatusNum(string $client, int $role, int $userId): array
    {
        return EellyClient::request('order/order', 'listOrderStatusNum', true, $client, $role, $userId);
    }

    /**
     * 获取各状态我的订单数量.
     *
     * > 返回数据说明
     *
     * key                | type    | value
     * ------------------ | ------- | --------
     * all                | int     | 所有
     * needPay            | int     | 待付款
     * needShare          | int     | 集赞中 待分享
     * needShipping       | int     | 待发货
     * needReceiving      | int     | 待收货
     * refunding          | int     | 退货退款
     * canceled           | int     | 已取消
     * needReview         | int     | 待评价
     * finished           | int     | 已完成
     *
     * @param string $client 订单请求客户端 (wap端:wap, pc端:pc, 衣联小程序:eelly,店+:buyer,百里挑一:blty,龙瑞购:lrg)
     * @param int    $role   用户角色 (1 买家, 2 卖家)
     * @param int    $userId 用户ID
     *
     * @return array
     *
     * @requestExample({"client":"wap","role":1,"userId":148086})
     * @returnExample(
     * {
     *     "all":52,
     *     "needPay": 32,
     *     "needShare": 8,
     *     "needShipping": 0,
     *     "needReceiving": 0,
     *     "refunding":2,
     *     "canceled":2,
     *     "needReview":2,
     *     "finished":2
     * }
     * )
     *
     * @author zhangyangxun
     *
     * @since 2018.10.24
     */
    public function listOrderStatusNumAsync(string $client, int $role, int $userId)
    {
        return EellyClient::request('order/order', 'listOrderStatusNum', false, $client, $role, $userId);
    }

    /**
     * 根据订单状态和购买时间,返回店铺期间产生订单数.
     *
     * @param array $storeIds  店铺ids
     * @param array $status    状态 ['pending', 'accepted']
     * @param int   $startTime 开始时间
     * @param int   $endTime   结束时间
     *
     * @author wechan
     *
     * @since 2018年10月29日
     */
    public function getStatusTimeCount(array $storeIds, array $status, int $startTime, int $endTime): array
    {
        return EellyClient::request('order/order', 'getStatusTimeCount', true, $storeIds, $status, $startTime, $endTime);
    }

    /**
     * 根据订单状态和购买时间,返回店铺期间产生订单数.
     *
     * @param array $storeIds  店铺ids
     * @param array $status    状态 ['pending', 'accepted']
     * @param int   $startTime 开始时间
     * @param int   $endTime   结束时间
     *
     * @author wechan
     *
     * @since 2018年10月29日
     */
    public function getStatusTimeCountAsync(array $storeIds, array $status, int $startTime, int $endTime)
    {
        return EellyClient::request('order/order', 'getStatusTimeCount', false, $storeIds, $status, $startTime, $endTime);
    }

    /**
     * 根据订单id查询订单价格
     *
     * @param array $orderIds 订单id
     *
     * @return bool
     *
     * @author wechan
     *
     * @since 2018年10月31日
     */
    public function getOrderAmountByOrderIds(array $orderIds): array
    {
        return EellyClient::request('order/order', 'getOrderAmountByOrderIds', true, $orderIds);
    }

    /**
     * 根据订单id查询订单价格
     *
     * @param array $orderIds 订单id
     *
     * @return bool
     *
     * @author wechan
     *
     * @since 2018年10月31日
     */
    public function getOrderAmountByOrderIdsAsync(array $orderIds)
    {
        return EellyClient::request('order/order', 'getOrderAmountByOrderIds', false, $orderIds);
    }

    /**
     * 统计订单数据.
     *
     * @param int    $role       用户角色[1 买家, 2 卖家]
     * @param int    $userId     用户ID
     * @param string $fieldScope
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2018-10-29
     */
    public function getOrderStatByUser(int $role, int $userId, string $fieldScope): array
    {
        return EellyClient::request('order/order', 'getOrderStatByUser', true, $role, $userId, $fieldScope);
    }

    /**
     * 统计订单数据.
     *
     * @param int    $role       用户角色[1 买家, 2 卖家]
     * @param int    $userId     用户ID
     * @param string $fieldScope
     *
     * @return array
     *
     * @author zhangyangxun
     *
     * @since 2018-10-29
     */
    public function getOrderStatByUserAsync(int $role, int $userId, string $fieldScope)
    {
        return EellyClient::request('order/order', 'getOrderStatByUser', false, $role, $userId, $fieldScope);
    }

    /**
     * 获取不同店铺状态下的订单数量和金额.
     *
     * @param array $storeIds 用户数据
     * @param array $inStatus 订单状态
     *
     * @return array
     */
    public function getOrderAmountOrCountsByStoreIds(array $storeIds, array $inStatus = []): array
    {
        return EellyClient::request('order/order', 'getOrderAmountOrCountsByStoreIds', true, $storeIds, $inStatus);
    }

    /**
     * 获取不同店铺状态下的订单数量和金额.
     *
     * @param array $storeIds 用户数据
     * @param array $inStatus 订单状态
     *
     * @return array
     */
    public function getOrderAmountOrCountsByStoreIdsAsync(array $storeIds, array $inStatus = [])
    {
        return EellyClient::request('order/order', 'getOrderAmountOrCountsByStoreIds', false, $storeIds, $inStatus);
    }

    /**
     * 获取买家支付的数量和总金额
     *
     * @param array $buyerIds 买家id
     *
     * @return array
     */
    public function getMemberOrderCountAndAmount(array $buyerIds): array
    {
        return EellyClient::request('order/order', 'getMemberOrderCountAndAmount', true, $buyerIds);
    }

    /**
     * 获取买家支付的数量和总金额
     *
     * @param array $buyerIds 买家id
     *
     * @return array
     */
    public function getMemberOrderCountAndAmountAsync(array $buyerIds)
    {
        return EellyClient::request('order/order', 'getMemberOrderCountAndAmount', false, $buyerIds);
    }

    /**
     * 根据订单id 获取订单号
     * 
     * @param int $orderId 订单id
     * 
     * @author wechan
     * @since 2018年11月18日
     */
    public function getOrderSnByOrderId(int $orderId): string
    {
        return EellyClient::request('order/order', 'getOrderSnByOrderId', true, $orderId);
    }

    /**
     * 根据订单id 获取订单号
     * 
     * @param int $orderId 订单id
     * 
     * @author wechan
     * @since 2018年11月18日
     */
    public function getOrderSnByOrderIdAsync(int $orderId)
    {
        return EellyClient::request('order/order', 'getOrderSnByOrderId', false, $orderId);
    }

    /**
     * 获取时间区间内店铺非付款取消的总交易额
     *
     * @param array $storeIds 店铺id
     * @param int   $sTime   开始时间
     * @param int   $eTime   结束时间
     * @return array
     * @author wechan
     * @since  2018年11月28日
     */
    public function getNotCancelSalesByStoreId(array $storeIds, int $sTime, int $eTime): array
    {
        return EellyClient::request('order/order', 'getNotCancelSalesByStoreId', true, $storeIds, $sTime, $eTime);
    }

    /**
     * 获取时间区间内店铺非付款取消的总交易额
     *
     * @param array $storeIds 店铺id
     * @param int   $sTime   开始时间
     * @param int   $eTime   结束时间
     * @return array
     * @author wechan
     * @since  2018年11月28日
     */
    public function getNotCancelSalesByStoreIdAsync(array $storeIds, int $sTime, int $eTime)
    {
        return EellyClient::request('order/order', 'getNotCancelSalesByStoreId', false, $storeIds, $sTime, $eTime);
    }

    /**
     * 批量获取订单字段
     *
     * @param array $orderIds 订单id数组
     * @param string str 字段
     * @return array
     */
    public function getOrderFieldByOrderIds(array $orderIds, string $str = 'order_id, order_sn'): array
    {
        return EellyClient::requestJson('order/order', __FUNCTION__, [
            'orderIds' => $orderIds,
            'str' => $str
        ]);
        //return EellyClient::request('order/order', 'getOrderFieldByOrderIds', true, $orderIds, $str);
    }

    /**
     * 批量获取订单字段
     *
     * @param array $orderIds 订单id数组
     * @param string str 字段
     * @return array
     */
    public function getOrderFieldByOrderIdsAsync(array $orderIds, string $str = 'order_id, order_sn')
    {
        return EellyClient::request('order/order', 'getOrderFieldByOrderIds', false, $orderIds, $str);
    }

    /**
     * 获取需自动评论订单
     * @param int $evaluationStatus 评价状态
     * @param array $timeBetween 订单完成时间范围
     * @param array $page 分页
     *
     */
    public function getNeedAutoEvaluateOrders(int $evaluationStatus, array $timeBetween = [0, 0], array $page = [0, 0]): array
    {
        return EellyClient::request('order/order', 'getNeedAutoEvaluateOrders', true, $evaluationStatus, $timeBetween, $page);
    }

    /**
     * 获取需自动评论订单
     * @param int $evaluationStatus 评价状态
     * @param array $timeBetween 订单完成时间范围
     * @param array $page 分页
     *
     */
    public function getNeedAutoEvaluateOrdersAsync(int $evaluationStatus, array $timeBetween = [0, 0], array $page = [0, 0])
    {
        return EellyClient::request('order/order', 'getNeedAutoEvaluateOrders', false, $evaluationStatus, $timeBetween, $page);
    }

    /**
     * 根据订单id 更新 评价标志
     *
     * @param array $orderIds    订单id
     * @param int $evaluateFlag  消息通知标识的值
     *
     * @return bool
     *
     * @author wechan
     * @since 2019年01月02日
     */
    public function updateOrderEvaluateFlag(array $orderIds, int $evaluateFlag): bool
    {
        return EellyClient::request('order/order', 'updateOrderEvaluateFlag', true, $orderIds, $evaluateFlag);
    }

    /**
     * 根据订单id 更新 评价标志
     *
     * @param array $orderIds    订单id
     * @param int $evaluateFlag  消息通知标识的值
     *
     * @return bool
     *
     * @author wechan
     * @since 2019年01月02日
     */
    public function updateOrderEvaluateFlagAsync(array $orderIds, int $evaluateFlag)
    {
        return EellyClient::request('order/order', 'updateOrderEvaluateFlag', false, $orderIds, $evaluateFlag);
    }

    /**
     * 获取店铺订单统计
     *
     * @param integer $time 时间戳
     * @param integer $userId 店铺id
     * @param integer $type 类型 0:店铺 1:用户
     * @return integer
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2019.3.8
     */
    public function getTotalOrderCount(int $time, int $userId, int $type = 0): int
    {
        return EellyClient::request('order/order', 'getTotalOrderCount', true, $time, $userId, $type);
    }

    /**
     * 获取店铺订单统计
     *
     * @param integer $time 时间戳
     * @param integer $userId 店铺id
     * @param integer $type 类型 0:店铺 1:用户
     * @return integer
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2019.3.8
     */
    public function getTotalOrderCountAsync(int $time, int $userId, int $type = 0)
    {
        return EellyClient::request('order/order', 'getTotalOrderCount', false, $time, $userId, $type);
    }

    /**
     * 订单支付成功后 发送信息
     * 
     * @param array $data 请求的数据
     * 
     * @since 2019年03月06日
     */
    public function sendOrderSuccessMessage(array $data): bool
    {
        return EellyClient::request('order/order', 'sendOrderSuccessMessage', true, $data);
    }

    /**
     * 订单支付成功后 发送信息
     * 
     * @param array $data 请求的数据
     * 
     * @since 2019年03月06日
     */
    public function sendOrderSuccessMessageAsync(array $data)
    {
        return EellyClient::request('order/order', 'sendOrderSuccessMessage', false, $data);
    }

    /**
     * 获取买家在指定店铺下的支付金额
     *
     * @param array $buyerIds 买家id
     * @param int $storeId 店铺id
     *
     * @return array
     *
     * @author wechan
     * @since  2019年04月22日
     */
    public function getBuyerStorePayAmount(array $buyerIds, int $storeId): array
    {
        return EellyClient::request('order/order', 'getBuyerStorePayAmount', true, $buyerIds, $storeId);
    }

    /**
     * 获取买家在指定店铺下的支付金额
     *
     * @param array $buyerIds 买家id
     * @param int $storeId 店铺id
     *
     * @return array
     *
     * @author wechan
     * @since  2019年04月22日
     */
    public function getBuyerStorePayAmountAsync(array $buyerIds, int $storeId)
    {
        return EellyClient::request('order/order', 'getBuyerStorePayAmount', false, $buyerIds, $storeId);
    }
    
    /**
     * 获取时间区间内店铺付款交易额
     *
     * @param array $storeIds 店铺id
     * @param int   $sTime   开始时间
     * @param int   $eTime   结束时间
     * @return array
     * @author wechan
     * @since  2019年05月23日
     */
    public function getPayOrderAmountByStoreId(array $storeIds, int $sTime, int $eTime): array
    {
        return EellyClient::requestJson('order/order', __FUNCTION__, [
            'storeIds' => $storeIds,
            'sTime' => $sTime,
            'eTime' => $eTime
        ]);
    }
    
    /**
     * 获取时间区间内店铺下单的总交易额.
     *
     * @param array $storeIds 店铺id
     * @param int   $sTime    开始时间
     * @param int   $eTime    结束时间
     *
     * @return array
     *
     * @author wechan
     * @since  2019年05月29日
     */
    public function getOrderAmountByStoreId(array $storeIds, int $sTime, int $eTime): array
    {
        return EellyClient::requestJson('order/order', __FUNCTION__, [
            'storeIds' => $storeIds,
            'sTime' => $sTime,
            'eTime' => $eTime
        ]);
    }

    /**
     * 获取指定店铺最新提交的订单列表.
     *
     * @param array $storeIds 店铺id
     * @param int   $limit    限制条数
     *
     * @return array
     *
     * @author wechan
     * @since  2019年08月29日
     */
    public function getNewOrderByStoreIds(array $storeIds, int $limit = 100): array
    {
        return EellyClient::requestJson('order/order', __FUNCTION__, [
            'storeIds' => $storeIds,
            'limit' => $limit,
        ]);
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