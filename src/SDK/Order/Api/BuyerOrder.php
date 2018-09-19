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

use Eelly\DTO\UidDTO;
use Eelly\SDK\EellyClient;
use Eelly\SDK\Order\Service\BuyerOrderInterface;

/**
 * @author shadonTools<localhost.shell@gmail.com>
 */
class BuyerOrder implements BuyerOrderInterface
{
    /**
     * {@inheritdoc}
     */
    public function orderPage(int $tab = 0, int $page = 1, int $limit = 20, $searchParams = null, UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/buyerOrder', __FUNCTION__, true, $tab, $page, $limit, $searchParams);
    }

    /**
     * {@inheritdoc}
     */
    public function orderDetails(int $orderId, UidDTO $uidDTO = null): array
    {
        return EellyClient::request('order/buyerOrder', __FUNCTION__, true, $orderId);
    }

    /**
     * {@inheritdoc}
     */
    public function confirmReceivedOrder(int $orderId, string $password, UidDTO $uidDTO = null): bool
    {
        return EellyClient::request('order/buyerOrder', __FUNCTION__, true, $orderId, $password);
    }

    /**
     * {@inheritdoc}
     */
    public function notifySendProducts(int $orderId, UidDTO $uidDTO = null): bool
    {
        return EellyClient::request('order/buyerOrder', __FUNCTION__, true, $orderId);
    }

    /**
     * {@inheritdoc}
     */
    public function cancelOrder(int $orderId, UidDTO $uidDTO = null): bool
    {
        return EellyClient::request('order/buyerOrder', __FUNCTION__, true, $orderId);
    }

    /**
     * 申请退货退款.
     *
     * @param int    $type        退货退款类型 1:仅退款， 2:退货退款
     * @param int    $orderId     订单id
     * @param int    $remarkType  退款原因
     * @param int    $price       退款金额
     * @param string $desc        退款说明
     * @param string $certificate 退款凭证 图片，多图用#拼接
     *
     * @return bool
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefund(int $type, int $orderId, int $remarkType, int $price, string $desc = '-', string $certificate = '-'): bool
    {
        return EellyClient::request('order/buyerOrder', 'orderRefund', true, $type, $orderId, $remarkType, $price, $desc, $certificate);
    }

    /**
     * 申请退货退款.
     *
     * @param int    $type        退货退款类型 1:仅退款， 2:退货退款
     * @param int    $orderId     订单id
     * @param int    $remarkType  退款原因
     * @param int    $price       退款金额
     * @param string $desc        退款说明
     * @param string $certificate 退款凭证 图片，多图用#拼接
     *
     * @return bool
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundAsync(int $type, int $orderId, int $remarkType, int $price, string $desc = '-', string $certificate = '-')
    {
        return EellyClient::request('order/buyerOrder', 'orderRefund', false, $type, $orderId, $remarkType, $price, $desc, $certificate);
    }

    /**
     * 退货退款详情.
     *
     * > from_os_id 和 to_os_id 状态说明
     *
     *  key    |  value
     *  ------ | -------
     *  16     | 申请退货退款
     *  17     | 同意退货 等待买家发货
     *  18     | 发出退货 等待卖家收货
     *  19     | 拒绝退货退款 看certificate - type 1:仅退款 2:退货退款
     *  20     | 重新发起退货退款
     *  21     | 确认退款
     *  25     | 退货退款成功
     *  26     | 交易取消
     *  27     | 退款取消
     *
     * > remark_type 退货原因状态
     *
     *  key    |  value
     *  ------ | -------
     *  0      | 其他
     *  3      | 商品质量不好
     *  4      | 卖家超时未发货
     *  5      | 卖家发错货
     *  7      | 商品与描述不符
     *  8      | 收到商品破损
     *  11     | 商品缺货
     *  12     | 与卖家协商一致退款
     *  13     | 不想要了／拍错了
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * applyAmount      | int      | 申请的金额
     * applyFreight     | int      | 申请的运费
     * type             | int      | 退货退款类型: 1 退款 2 退货
     * remarkType       | string   | 退货退款原因
     * remark           | string   | 备注说明
     * certificate      | int      | 凭证
     * seller_id        | int      | 店铺id
     * finished_time    | int      | 退货退款完成时间
     * seller_name      | string   | 店铺名称
     * orderSn          | int      | 订单编号
     * firstTime        | int      | 第一次发起的退货退款时间戳
     * lastTime         | int      | 最后一次更新的时间
     * time             | int      | 倒计时的时间
     * statusContent    | string   | 详情文案信息
     * status           | int      | 文案状态 1:申请退款中,2:申请退货中,3:卖家拒绝退款，等待我处理,4:卖家同意退货，等待我退货,5:卖家拒绝退货，等待我处理,6:我已发货，等待卖家发货,7:退货退款成功
     *
     * @param int $orderId 订单id
     *
     * @return array
     *
     * @requestExample({"orderId":116})
     * @returnExample({
     *      "applyAmount":"10",
     *      "applyFreight":"1",
     *      "type":"2",
     *      "seller_id":"1761477",
     *      "seller_name":"广东省广州市萌STYLE时尚童装店批发服装店细心",
     *      "remarkType":"卖家超时未发货",
     *      "remark":"-",
     *      "statusContent":"退货退款成功",
     *      "status":"7",
     *      "certificate":"[]",
     *      "orderSn":"1810837219",
     *      "firstTime":"1529908563",
     *      "finished_time":"1529908563",
     *      "lastTime":"1529913120",
     *      "time":"9281"
     * })
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderDetail(int $orderId): array
    {
        return EellyClient::request('order/buyerOrder', 'orderDetail', true, $orderId);
    }

    /**
     * 退货退款详情.
     *
     * > from_os_id 和 to_os_id 状态说明
     *
     *  key    |  value
     *  ------ | -------
     *  16     | 申请退货退款
     *  17     | 同意退货 等待买家发货
     *  18     | 发出退货 等待卖家收货
     *  19     | 拒绝退货退款 看certificate - type 1:仅退款 2:退货退款
     *  20     | 重新发起退货退款
     *  21     | 确认退款
     *  25     | 退货退款成功
     *  26     | 交易取消
     *  27     | 退款取消
     *
     * > remark_type 退货原因状态
     *
     *  key    |  value
     *  ------ | -------
     *  0      | 其他
     *  3      | 商品质量不好
     *  4      | 卖家超时未发货
     *  5      | 卖家发错货
     *  7      | 商品与描述不符
     *  8      | 收到商品破损
     *  11     | 商品缺货
     *  12     | 与卖家协商一致退款
     *  13     | 不想要了／拍错了
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * applyAmount      | int      | 申请的金额
     * applyFreight     | int      | 申请的运费
     * type             | int      | 退货退款类型: 1 退款 2 退货
     * remarkType       | string   | 退货退款原因
     * remark           | string   | 备注说明
     * certificate      | int      | 凭证
     * seller_id        | int      | 店铺id
     * finished_time    | int      | 退货退款完成时间
     * seller_name      | string   | 店铺名称
     * orderSn          | int      | 订单编号
     * firstTime        | int      | 第一次发起的退货退款时间戳
     * lastTime         | int      | 最后一次更新的时间
     * time             | int      | 倒计时的时间
     * statusContent    | string   | 详情文案信息
     * status           | int      | 文案状态 1:申请退款中,2:申请退货中,3:卖家拒绝退款，等待我处理,4:卖家同意退货，等待我退货,5:卖家拒绝退货，等待我处理,6:我已发货，等待卖家发货,7:退货退款成功
     *
     * @param int $orderId 订单id
     *
     * @return array
     *
     * @requestExample({"orderId":116})
     * @returnExample({
     *      "applyAmount":"10",
     *      "applyFreight":"1",
     *      "type":"2",
     *      "seller_id":"1761477",
     *      "seller_name":"广东省广州市萌STYLE时尚童装店批发服装店细心",
     *      "remarkType":"卖家超时未发货",
     *      "remark":"-",
     *      "statusContent":"退货退款成功",
     *      "status":"7",
     *      "certificate":"[]",
     *      "orderSn":"1810837219",
     *      "firstTime":"1529908563",
     *      "finished_time":"1529908563",
     *      "lastTime":"1529913120",
     *      "time":"9281"
     * })
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderDetailAsync(int $orderId)
    {
        return EellyClient::request('order/buyerOrder', 'orderDetail', false, $orderId);
    }

    /**
     * 协商记录.
     *
     * > from_os_id 和 to_os_id 状态说明
     *
     *  key    |  value
     *  ------ | -------
     *  16     | 申请退货退款
     *  17     | 同意退货 等待买家发货
     *  18     | 发出退货 等待卖家收货
     *  19     | 拒绝退货退款 看certificate - type 1:仅退款 2:退货退款
     *  20     | 重新发起退货退款
     *  21     | 确认退款
     *  25     | 退货退款成功
     *  26     | 交易取消
     *  27     | 退款取消
     *
     * > remark_type 退货原因状态
     *
     *  key    |  value
     *  ------ | -------
     *  0      | 其他
     *  3      | 商品质量不好
     *  4      | 卖家超时未发货
     *  5      | 卖家发错货
     *  7      | 商品与描述不符
     *  8      | 收到商品破损
     *  11     | 商品缺货
     *  12     | 与卖家协商一致退款
     *  13     | 不想要了／拍错了
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * order_id      | int      | 订单id
     * type          | int      | 操作类型 1:买家，2:卖家
     * handle_id     | int      | 买家id
     * handle_name   | string   | 买家名称
     * from_os_id    | int      | 原先状态id
     * to_os_id      | int      | 至某种状态id
     * remark        | int      | 备注说明 这个说明是操作日志的说明
     * created_time  | int      | 此记录的时间戳
     * certificate                | array    | 凭证数据
     * certificate['order_id']     | int      | 订单id
     * certificate['os_id']        | int      | 订单状态
     * certificate['type']         | int      | 订单类型 1:退款 2:退货退款
     * certificate['refuseReason'] | string   |  卖家拒绝  退货／退款 的拒绝原因
     * certificate['phase']        | int      | 订单发货状态 1:未发货发起的退款 2:已发货发起的退款 3:已发货发起的退货退款
     * certificate['apply_amount'] | int      | 申请的退款金额
     * certificate['apply_freight']| int      | 申请的退款运费
     * certificate['certificate']  | array    | 图片凭证
     * certificate['remark_type']  | int      | 退货退款原因
     * certificate['remark']       | stirng   | 备注说明 这个remark是申请时的说明
     * certificate['created_time'] | stirng   | 退货退款发出的时间戳
     * address                    | array    | 退货地址
     * address - phone            | string   | 手机号
     * address - mobile           | string   | 手机号
     * address - region_name      | string   | 地区
     * address - address          | string   | 详细地址
     * address - consignee        | string   | 收件人姓名
     *
     * @param int $orderId 订单id
     *
     * @return array
     * @requestExample({"orderId":116})
     * @returnExample([
     * {
     *      "order_id":"116",
     *      "type":"1",
     *      "handle_id":"2108403",
     *      "handle_name":"买家名称",
     *      "from_os_id":"0",
     *      "to_os_id":"16",
     *      "remark":"买家 买家名称 提交了 退货申请",
     *      "created_time":"2018-06-29 19:42:24",
     *      "certificate":[{
     *          "order_id":116,
     *          "os_id":16,
     *          "type":2,
     *          "phase":3,
     *          "apply_amount":100,
     *          "apply_freight":"1",
     *          "certificate":"null",
     *          "remark_type":4,
     *          "remark":"-",
     *          "created_time":"1529908563"
     *      }]
     * },
     * {
     *      "order_id":"116",
     *      "type":"1",
     *      "handle_id":"2108403",
     *      "handle_name":"买家名称",
     *      "from_os_id":"20",
     *      "to_os_id":"17",
     *      "remark":"买家 买家名称 提交了 退货申请",
     *      "created_time":"2018-06-29 19:42:24",
     *      "remark":"-",
     *      "address":[{
     *          "phone":116,
     *          "mobile":16,
     *          "region_name":2,
     *          "address":3,
     *          "consignee":100
     *      }]
     * }
     * ])
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundLog(int $orderId): array
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundLog', true, $orderId);
    }

    /**
     * 协商记录.
     *
     * > from_os_id 和 to_os_id 状态说明
     *
     *  key    |  value
     *  ------ | -------
     *  16     | 申请退货退款
     *  17     | 同意退货 等待买家发货
     *  18     | 发出退货 等待卖家收货
     *  19     | 拒绝退货退款 看certificate - type 1:仅退款 2:退货退款
     *  20     | 重新发起退货退款
     *  21     | 确认退款
     *  25     | 退货退款成功
     *  26     | 交易取消
     *  27     | 退款取消
     *
     * > remark_type 退货原因状态
     *
     *  key    |  value
     *  ------ | -------
     *  0      | 其他
     *  3      | 商品质量不好
     *  4      | 卖家超时未发货
     *  5      | 卖家发错货
     *  7      | 商品与描述不符
     *  8      | 收到商品破损
     *  11     | 商品缺货
     *  12     | 与卖家协商一致退款
     *  13     | 不想要了／拍错了
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * order_id      | int      | 订单id
     * type          | int      | 操作类型 1:买家，2:卖家
     * handle_id     | int      | 买家id
     * handle_name   | string   | 买家名称
     * from_os_id    | int      | 原先状态id
     * to_os_id      | int      | 至某种状态id
     * remark        | int      | 备注说明 这个说明是操作日志的说明
     * created_time  | int      | 此记录的时间戳
     * certificate                | array    | 凭证数据
     * certificate['order_id']     | int      | 订单id
     * certificate['os_id']        | int      | 订单状态
     * certificate['type']         | int      | 订单类型 1:退款 2:退货退款
     * certificate['refuseReason'] | string   |  卖家拒绝  退货／退款 的拒绝原因
     * certificate['phase']        | int      | 订单发货状态 1:未发货发起的退款 2:已发货发起的退款 3:已发货发起的退货退款
     * certificate['apply_amount'] | int      | 申请的退款金额
     * certificate['apply_freight']| int      | 申请的退款运费
     * certificate['certificate']  | array    | 图片凭证
     * certificate['remark_type']  | int      | 退货退款原因
     * certificate['remark']       | stirng   | 备注说明 这个remark是申请时的说明
     * certificate['created_time'] | stirng   | 退货退款发出的时间戳
     * address                    | array    | 退货地址
     * address - phone            | string   | 手机号
     * address - mobile           | string   | 手机号
     * address - region_name      | string   | 地区
     * address - address          | string   | 详细地址
     * address - consignee        | string   | 收件人姓名
     *
     * @param int $orderId 订单id
     *
     * @return array
     * @requestExample({"orderId":116})
     * @returnExample([
     * {
     *      "order_id":"116",
     *      "type":"1",
     *      "handle_id":"2108403",
     *      "handle_name":"买家名称",
     *      "from_os_id":"0",
     *      "to_os_id":"16",
     *      "remark":"买家 买家名称 提交了 退货申请",
     *      "created_time":"2018-06-29 19:42:24",
     *      "certificate":[{
     *          "order_id":116,
     *          "os_id":16,
     *          "type":2,
     *          "phase":3,
     *          "apply_amount":100,
     *          "apply_freight":"1",
     *          "certificate":"null",
     *          "remark_type":4,
     *          "remark":"-",
     *          "created_time":"1529908563"
     *      }]
     * },
     * {
     *      "order_id":"116",
     *      "type":"1",
     *      "handle_id":"2108403",
     *      "handle_name":"买家名称",
     *      "from_os_id":"20",
     *      "to_os_id":"17",
     *      "remark":"买家 买家名称 提交了 退货申请",
     *      "created_time":"2018-06-29 19:42:24",
     *      "remark":"-",
     *      "address":[{
     *          "phone":116,
     *          "mobile":16,
     *          "region_name":2,
     *          "address":3,
     *          "consignee":100
     *      }]
     * }
     * ])
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundLogAsync(int $orderId)
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundLog', false, $orderId);
    }

    /**
     * 撤销退款申请.
     *
     * @param int $orderId 订单id
     *
     * @return bool
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function cancelOrderRefund(int $orderId): bool
    {
        return EellyClient::request('order/buyerOrder', 'cancelOrderRefund', true, $orderId);
    }

    /**
     * 撤销退款申请.
     *
     * @param int $orderId 订单id
     *
     * @return bool
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function cancelOrderRefundAsync(int $orderId)
    {
        return EellyClient::request('order/buyerOrder', 'cancelOrderRefund', false, $orderId);
    }

    /**
     * 退货.
     *
     * @param int    $orderId     订单id
     * @param string $invoiceInfo 收件人信息 json格式
     * @param string $invoiceCode 送货编码 快递公司拼音
     * @param string $invoiceName 快递公司
     * @param string $invoiceNo   订单编号
     *
     * @return bool
     * @requestExample(
     * {
     *      "orderId":"116",
     *      "invoiceInfo":'{"consignee":"收件人姓名", "gbCode":"地区编号", "regionName":"广东省 广州市 越秀区","address":"白云大道北泰兴大厦","zipcode":"500001","mobile":"15267987854"}',
     *      "invoiceCode":"shunfeng",
     *      "invoiceName":"顺丰",
     *      "invoiceNo":"123123"
     * }
     * )
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundInvoice(int $orderId, string $invoiceInfo, string $invoiceCode, string $invoiceName, string $invoiceNo): bool
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundInvoice', true, $orderId, $invoiceInfo, $invoiceCode, $invoiceName, $invoiceNo);
    }

    /**
     * 退货.
     *
     * @param int    $orderId     订单id
     * @param string $invoiceInfo 收件人信息 json格式
     * @param string $invoiceCode 送货编码 快递公司拼音
     * @param string $invoiceName 快递公司
     * @param string $invoiceNo   订单编号
     *
     * @return bool
     * @requestExample(
     * {
     *      "orderId":"116",
     *      "invoiceInfo":'{"consignee":"收件人姓名", "gbCode":"地区编号", "regionName":"广东省 广州市 越秀区","address":"白云大道北泰兴大厦","zipcode":"500001","mobile":"15267987854"}',
     *      "invoiceCode":"shunfeng",
     *      "invoiceName":"顺丰",
     *      "invoiceNo":"123123"
     * }
     * )
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundInvoiceAsync(int $orderId, string $invoiceInfo, string $invoiceCode, string $invoiceName, string $invoiceNo)
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundInvoice', false, $orderId, $invoiceInfo, $invoiceCode, $invoiceName, $invoiceNo);
    }

    /**
     * 重新申请退货退款接口.
     *
     * > from_os_id 和 to_os_id 状态说明
     *
     *  key    |  value
     *  ------ | -------
     *  16     | 申请退货退款
     *  17     | 同意退货 等待买家发货
     *  18     | 发出退货 等待卖家收货
     *  19     | 拒绝退货退款 看certificate - type 1:仅退款 2:退货退款
     *  20     | 重新发起退货退款
     *  21     | 确认退款
     *  25     | 退货退款成功
     *  26     | 交易取消
     *  27     | 退款取消
     *
     * > remark_type 退货原因状态
     *
     *  key    |  value
     *  ------ | -------
     *  0      | 其他
     *  3      | 商品质量不好
     *  4      | 卖家超时未发货
     *  5      | 卖家发错货
     *  7      | 商品与描述不符
     *  8      | 收到商品破损
     *  11     | 商品缺货
     *  12     | 与卖家协商一致退款
     *  13     | 不想要了／拍错了
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * order_id      | int      | 订单id
     * apply_amount  | int       | 申请退款金额
     * apply_freight | int       | 申请运费金额
     * type          | int      | 退货退款类型: 1 退款 2 退货
     * remark_type   | int      | 退货原因
     * remark        | int      | 备注说明
     * phase         | int       | 订单状态 1:未发货发起的退款，2:已发货发起的退款 3:已发货发起的退货退款
     * os_id         | int       | 订单状态
     * certificate   | array       | 凭证数据 只有type为2时才有有效数据
     *
     * @param int $orderId 订单id
     *
     * @return array
     * @requestExample({"orderId":"116"})
     * @returnExample({
     *      "order_id":"116",
     *      "apply_amount":"10",
     *      "apply_freight":"1",
     *      "type":"2",
     *      "remark_type":"4",
     *      "remark":"-",
     *      "phase":"3",
     *      "os_id":"26",
     *      "certificate":"[]"
     * })
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundLogEdit(int $orderId): array
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundLogEdit', true, $orderId);
    }

    /**
     * 重新申请退货退款接口.
     *
     * > from_os_id 和 to_os_id 状态说明
     *
     *  key    |  value
     *  ------ | -------
     *  16     | 申请退货退款
     *  17     | 同意退货 等待买家发货
     *  18     | 发出退货 等待卖家收货
     *  19     | 拒绝退货退款 看certificate - type 1:仅退款 2:退货退款
     *  20     | 重新发起退货退款
     *  21     | 确认退款
     *  25     | 退货退款成功
     *  26     | 交易取消
     *  27     | 退款取消
     *
     * > remark_type 退货原因状态
     *
     *  key    |  value
     *  ------ | -------
     *  0      | 其他
     *  3      | 商品质量不好
     *  4      | 卖家超时未发货
     *  5      | 卖家发错货
     *  7      | 商品与描述不符
     *  8      | 收到商品破损
     *  11     | 商品缺货
     *  12     | 与卖家协商一致退款
     *  13     | 不想要了／拍错了
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * order_id      | int      | 订单id
     * apply_amount  | int       | 申请退款金额
     * apply_freight | int       | 申请运费金额
     * type          | int      | 退货退款类型: 1 退款 2 退货
     * remark_type   | int      | 退货原因
     * remark        | int      | 备注说明
     * phase         | int       | 订单状态 1:未发货发起的退款，2:已发货发起的退款 3:已发货发起的退货退款
     * os_id         | int       | 订单状态
     * certificate   | array       | 凭证数据 只有type为2时才有有效数据
     *
     * @param int $orderId 订单id
     *
     * @return array
     * @requestExample({"orderId":"116"})
     * @returnExample({
     *      "order_id":"116",
     *      "apply_amount":"10",
     *      "apply_freight":"1",
     *      "type":"2",
     *      "remark_type":"4",
     *      "remark":"-",
     *      "phase":"3",
     *      "os_id":"26",
     *      "certificate":"[]"
     * })
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundLogEditAsync(int $orderId)
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundLogEdit', false, $orderId);
    }

    /**
     * 修改退货信息.
     *
     * @param int    $oiId        退货id
     * @param int    $orderId     订单id
     * @param string $invoiceCode 送货编号 快递公司对应的拼音
     * @param string $invoiceName 送货公司的名称
     * @param string $invoiceNo   送货单号
     *
     * @return bool
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function editOrderRefundInvoice(int $oiId, int $orderId, string $invoiceCode, string $invoiceName, string $invoiceNo): bool
    {
        return EellyClient::request('order/buyerOrder', 'editOrderRefundInvoice', true, $oiId, $orderId, $invoiceCode, $invoiceName, $invoiceNo);
    }

    /**
     * 修改退货信息.
     *
     * @param int    $oiId        退货id
     * @param int    $orderId     订单id
     * @param string $invoiceCode 送货编号 快递公司对应的拼音
     * @param string $invoiceName 送货公司的名称
     * @param string $invoiceNo   送货单号
     *
     * @return bool
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function editOrderRefundInvoiceAsync(int $oiId, int $orderId, string $invoiceCode, string $invoiceName, string $invoiceNo)
    {
        return EellyClient::request('order/buyerOrder', 'editOrderRefundInvoice', false, $oiId, $orderId, $invoiceCode, $invoiceName, $invoiceNo);
    }

    /**
     * 获取退货信息.
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * oi_id      | int      | 退货id
     * order_id      | int      | 订单id
     * type  | int       | 物流类型：1 发货物流 2 退货物流
     * consignee | string       | 收货人姓名
     * gb_code          | int      | 地区ID
     * region_name   | string      | 地区名称
     * address        | string      | 收货详细地址'
     * zipcode         | string       | 邮编
     * phone         | string       | 手机号码
     * mobile   | string       | 手机号码
     * invoice_code   | string       | 送货编码：快递公司对应的拼音
     * invoice_name   | string       | 送货公司名称
     * invoice_no   | string       | 送货单号
     * status   | int       | 物流状态：0 未查到 1 配送中 2 已送达
     *
     * @param int $orderId 订单id
     *
     * @return array
     * @requestExample({"orderId":"5000100"})
     * @returnExample({
     *      "oi_id":"285",
     *      "order_id":"116",
     *      "type":"2",
     *      "consignee":"张三",
     *      "gb_code":"440105",
     *      "region_name":"广东省 广州市 海珠区",
     *      "address":"新港中路397号",
     *      "zipcode":"0",
     *      "phone":"0",
     *      "mobile":"20",
     *      "sl_id":"1",
     *      "logistics_name":"yiyiyiyi - 货运 - 运费到付",
     *      "invoice_code":"shkd",
     *      "invoice_name":"顺丰快递",
     *      "invoice_no":"12312312321123123",
     *      "status":"0",
     *      "sign_time":"0",
     *      "remark":"{}",
     *      "created_time":"1525750592",
     *      "update_time":"2018-07-04 18:00:18"
     * })
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function getOrderRefundInvoice(int $orderId): array
    {
        return EellyClient::request('order/buyerOrder', 'getOrderRefundInvoice', true, $orderId);
    }

    /**
     * 获取退货信息.
     *
     * > 返回数据说明
     *
     * key | type |  value
     * --- | ---- | -------
     * oi_id      | int      | 退货id
     * order_id      | int      | 订单id
     * type  | int       | 物流类型：1 发货物流 2 退货物流
     * consignee | string       | 收货人姓名
     * gb_code          | int      | 地区ID
     * region_name   | string      | 地区名称
     * address        | string      | 收货详细地址'
     * zipcode         | string       | 邮编
     * phone         | string       | 手机号码
     * mobile   | string       | 手机号码
     * invoice_code   | string       | 送货编码：快递公司对应的拼音
     * invoice_name   | string       | 送货公司名称
     * invoice_no   | string       | 送货单号
     * status   | int       | 物流状态：0 未查到 1 配送中 2 已送达
     *
     * @param int $orderId 订单id
     *
     * @return array
     * @requestExample({"orderId":"5000100"})
     * @returnExample({
     *      "oi_id":"285",
     *      "order_id":"116",
     *      "type":"2",
     *      "consignee":"张三",
     *      "gb_code":"440105",
     *      "region_name":"广东省 广州市 海珠区",
     *      "address":"新港中路397号",
     *      "zipcode":"0",
     *      "phone":"0",
     *      "mobile":"20",
     *      "sl_id":"1",
     *      "logistics_name":"yiyiyiyi - 货运 - 运费到付",
     *      "invoice_code":"shkd",
     *      "invoice_name":"顺丰快递",
     *      "invoice_no":"12312312321123123",
     *      "status":"0",
     *      "sign_time":"0",
     *      "remark":"{}",
     *      "created_time":"1525750592",
     *      "update_time":"2018-07-04 18:00:18"
     * })
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function getOrderRefundInvoiceAsync(int $orderId)
    {
        return EellyClient::request('order/buyerOrder', 'getOrderRefundInvoice', false, $orderId);
    }

    /**
     * 返回最多退款金额 和 运费.
     *
     * @param int $orderId 订单id
     *
     * @return array
     *
     * @requestExample({"orderId":"5000100"})
     * @returnExample({"returnAmount":1000, "freight":0})
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundMoney(int $orderId): array
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundMoney', true, $orderId);
    }

    /**
     * 返回最多退款金额 和 运费.
     *
     * @param int $orderId 订单id
     *
     * @return array
     *
     * @requestExample({"orderId":"5000100"})
     * @returnExample({"returnAmount":1000, "freight":0})
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     */
    public function orderRefundMoneyAsync(int $orderId)
    {
        return EellyClient::request('order/buyerOrder', 'orderRefundMoney', false, $orderId);
    }

    /**
     * 集赞不足人数提醒 (支付后22小时未集赞成功，则立刻发送提醒通知).
     *
     * @param int $limit 每次处理的数量
     *
     * @return array
     *
     * @requestExample({"limit":"50"})
     * @returnExample([{"orderId":"50001659","buyerId":"2108412","requireLikes":"1","payTime":"1531724066","likes":"0"},{"orderId":"50001706","buyerId":"2848170","requireLikes":"1","payTime":"1532066230","likes":null}])
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.08.28
     */
    public function listOrderCollectionNotEnough(int $limit = 50): array
    {
        return EellyClient::request('order/buyerOrder', __FUNCTION__, true, $limit);
    }

    /**
     * {@inheritdoc}
     */
    public function listOrderCollectionNotEnoughAsync(int $limit = 50): array
    {
        return EellyClient::request('order/buyerOrder', __FUNCTION__, false, $limit);
    }

    /**
     * 更新订单的消息通知标志.
     *
     * @param int $orderId    订单id
     * @param int $noticeFlag 消息通知标志
     *
     * @return bool
     *
     * @requestExample({"orderId":"50001707", "noticeFlag":8})
     * @returnExample(true)
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2018.08.28
     */
    public function updateOrderNoticeFlag(int $orderId, int $noticeFlag): bool
    {
        return EellyClient::request('order/buyerOrder', __FUNCTION__, true, $orderId, $noticeFlag);
    }

    /**
     * {@inheritdoc}
     */
    public function updateOrderNoticeFlagAsync(int $orderId, int $noticeFlag): bool
    {
        return EellyClient::request('order/buyerOrder', __FUNCTION__, false, $orderId, $noticeFlag);
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
