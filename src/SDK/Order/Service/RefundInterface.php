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

namespace Eelly\SDK\Order\Service;

/**
 * @author eellytools<localhost.shell@gmail.com>
 */
interface RefundInterface
{
    /**
     * 快速退款，对外接口.
     *
     * @param int $orderId 订单ID
     * @param int $money 退款金额
     * @param int $sellerId 卖家ID
     * @return array
     * @author 肖俊明<xiaojunming@eelly.net>
     * @since 2018年04月24日
     */
    public function quickReturnMoney(int $orderId, int $money, int $sellerId): array ;
}
