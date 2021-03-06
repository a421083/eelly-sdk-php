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

use Eelly\DTO\UidDTO;

/**
 * 用户银行信息.
 *
 * @author sunanzhi <sunanzhi@hotmail.com>
 * @since 1
 */
interface BankInterface
{

    /**
     * 获取一条用户银行信息
     *
     * @param int $pbId 用户银行信息ID
     * @param UidDTO $user 登录用户
     * @return array
     * 
     * @requestExample({"pbId":218})
     * @returnExample({"pbId":"218","userId":"148086","gbCode":"1234","bankId":"46","bankName":"中信银行","bankSubbranch":"广东省广州市","bankAccount":"1234123123123","realName":"广东洪正电子商务有限公司","phone":"12345678901","isDefault":"1","status":"1","createdTime":"15352213","updateTime":"2018-09-06 17:14:06"})
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.9.6
     */
    public function getPayBank(int $pbId, UidDTO $user = null): array;

    /**
     * 添加用户银行信息.
     *
     * > data 数据说明
     * key | type | value
     * --- | ---- | -----
     * storeId     | int    | 店铺id 0:店+ 非0:厂家
     * bankAccount | string | 银行卡账号
     * bankSubbranch | string | 支行名称 通过个人认证类型type来进行可选判断 0:个人，不需要；1:企业，对公账号，需要
     * gbCode      | int    | 国标地区唯一id
     * bankId      | int    | 卡类型id
     * phone       | string | 手机号码
     * isDefault   | int    | 是否默认使用此卡 0:否，1:是
     * payPassword | string | 支付密码
     * 
     * @param array $data 请求数据
     * @param UidDTO $user 登录用户
     * @return bool
     *
     * @requestExample({"storeId":"148086","gbCode":"1234","bankId":"46","bankName":"中信银行","bankSubbranch":"广东省广州市","bankAccount":"1234123123123","phone":"12345678901","isDefault":"1","payPassword":"123456"})
     * @returnExample(true)
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.9.6
     */
    public function addPayBank(array $data, UidDTO $user = null): bool;

    /**
     * 设置默认银行卡
     * 
     * @param integer $pbId 用户银行卡id
     * @param UidDTO $user 登录用户
     * @return boolean
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.9.6
     */
    public function setPayBankDefault(int $pbId, UidDTO $user = null): bool;

    /**
     * 解绑银行卡
     *
     * @param integer $pbId 绑定的银行卡号
     * @param UidDTO $user 登录用户
     * @return boolean
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.9.6
     */
    public function untiedPayBank(int $pbId, UidDTO $user = null): bool;

    /**
     * 获取用户银行卡.
     *
     * @param UidDTO $user 登录用户
     * @return array
     * 
     * @requestExample()
     * @returnExample({[{"pbId":"218","userId":"148086","gbCode":"1234","bankId":"46","bankName":"中信银行","bankSubbranch":"广东省广州市","bankAccount":"1234123123123","realName":"广东洪正电子商务有限公司","phone":"12345678901","isDefault":"1","status":"1","createdTime":"15352213","updateTime":"2018-09-06 17:14:06"}, {"pbId":"218","userId":"148086","gbCode":"1234","bankId":"46","bankName":"中信银行","bankSubbranch":"广东省广州市","bankAccount":"1234123123123","realName":"广东洪正电子商务有限公司","phone":"12345678901","isDefault":"1","status":"1","createdTime":"15352213","updateTime":"2018-09-06 17:14:06"}, {"pbId":"218","userId":"148086","gbCode":"1234","bankId":"46","bankName":"中信银行","bankSubbranch":"广东省广州市","bankAccount":"1234123123123","realName":"广东洪正电子商务有限公司","phone":"12345678901","isDefault":"1","status":"1","createdTime":"15352213","updateTime":"2018-09-06 17:14:06"}]})
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.9.6
     */
    public function getUserPayBank(UidDTO $user = null): array;
}
