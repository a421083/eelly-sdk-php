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

namespace Eelly\SDK\Pay\Service;

/**
 * 会计主业务接口
 *
 * @author wechan<liweiquan@eelly.net>
 * @since  2017年11月15日
 */
interface SubjectVoucherAccountingInterface
{
    /**
     * 会计主流程
     * 
     * @param $data 请求参数
     * @param $$data['voucherCode'] 凭证代码
     * @param $data['money'] 发生额
     * @param $data['refId'] 关联业务ID
     * @param $data['remark'] 备注
     * 
     * @author wechan<liweiquan@eelly.net>
     * @since  2017年11月15日
     */
    public function payAccounting($data) : void;
}