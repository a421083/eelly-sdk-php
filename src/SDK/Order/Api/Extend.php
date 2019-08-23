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

use Eelly\SDK\Order\Service\ExtendInterface;

/**
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Extend
{
    /**
     * 根据订单id，获取订单扩展信息
     *
     * @param int $orderId 订单id
     *
     * @throws \Eelly\SDK\Order\Exception\OrderException
     *
     * @return array
     * @author wechan
     *
     * @since 2019年08月22日
     */
    public function getOrderExtend(int $orderId): array
    {
        return EellyClient::requestJson('order/order', __FUNCTION__, [
            'orderId' => $orderId,
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
