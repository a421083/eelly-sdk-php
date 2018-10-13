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

namespace Eelly\SDK\Pay\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\Pay\Service\RechargeRelInterface;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class RechargeRel implements RechargeRelInterface
{
    /**
     * 新增充值与业务关系信息
     * 
     * @param array $data 请求参数
     * @param array $data['precId'] 充值交易ID
     * @param array $data['billNo'] 衣联交易号
     * @param array $data['type'] 充值用途类型：1 订单支付 2 购买服务
     * @param array $data['itemId'] 充值用途对象ID：如订单ID、购买服务记录ID等
     * @param array $data['status'] 处理状态：0 未处理 1 成功 2 失败（主动查询超过3天的数据记录为失败）
     * @param array $data['createdTime'] 添加时间
     * 
     * @author wechan
     * @since 2018年10月12日
     */
    public function addRechargeRel(array $data): bool
    {
        return EellyClient::request('pay/rechargeRel', 'addRechargeRel', true, $data);
    }

    /**
     * 新增充值与业务关系信息
     * 
     * @param array $data 请求参数
     * @param array $data['precId'] 充值交易ID
     * @param array $data['billNo'] 衣联交易号
     * @param array $data['type'] 充值用途类型：1 订单支付 2 购买服务
     * @param array $data['itemId'] 充值用途对象ID：如订单ID、购买服务记录ID等
     * @param array $data['status'] 处理状态：0 未处理 1 成功 2 失败（主动查询超过3天的数据记录为失败）
     * @param array $data['createdTime'] 添加时间
     * 
     * @author wechan
     * @since 2018年10月12日
     */
    public function addRechargeRelAsync(array $data)
    {
        return EellyClient::request('pay/rechargeRel', 'addRechargeRel', false, $data);
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