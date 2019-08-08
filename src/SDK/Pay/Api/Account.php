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
use Eelly\SDK\Pay\Service\AccountInterface;
use Eelly\SDK\Pay\DTO\AccountDTO;
use Eelly\DTO\UidDTO;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Account
{
    /**
     * 根据帐户主键id获取账户信息.
     *
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * ------------------|-------|--------------
     * paId              |int    |用户银行信息ID，自增主键
     * userId            |int    |用户ID：0 平台系统帐户
     * storeId           |int    |店铺ID：0 买家帐户
     * money             |int    |账户可用金额：单位为分
     * frozenMoney       |int    |账户冻结金额：单位为分
     * commissionRatio   |string |提现手续费率
     * passwordPay       |null   |支付密码
     * status            |int    |状态：0 正常 1 风险监控 2 冻结提现 4 冻结支付
     * alipayAccount     |string |支付宝账号
     * wechatPurseOpenId |string |微信钱包绑定的微信账户open_id
     * createdTime       |string |添加时间
     *
     * @param int $paId 账户ID，自增主键
     *
     * @return AccountDTO
     * @requestExample({
     *     "paId":1
     * })
     * @returnExample({
     *     paId:1,
     *     userId:148086,
     *     storeId:0,
     *     money:2190,
     *     frozenMoney:200,
     *     commissionRatio:"0.000",
     *     passwordPay:null,
     *     status:0,
     *     alipayAccount:"",
     *     wechatPurseOpenId:"",
     *     createdTime:"1510278091"
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年11月15日
     *
     * @Validation(
     *     @OperatorValidator(0,{message:"账户ID",operator:["gt",0]})
     * )
     */
    public function getAccount(int $paId): AccountDTO
    {
        return EellyClient::request('pay/account', 'getAccount', true, $paId);
    }

    /**
     * 根据帐户主键id获取账户信息.
     *
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * ------------------|-------|--------------
     * paId              |int    |用户银行信息ID，自增主键
     * userId            |int    |用户ID：0 平台系统帐户
     * storeId           |int    |店铺ID：0 买家帐户
     * money             |int    |账户可用金额：单位为分
     * frozenMoney       |int    |账户冻结金额：单位为分
     * commissionRatio   |string |提现手续费率
     * passwordPay       |null   |支付密码
     * status            |int    |状态：0 正常 1 风险监控 2 冻结提现 4 冻结支付
     * alipayAccount     |string |支付宝账号
     * wechatPurseOpenId |string |微信钱包绑定的微信账户open_id
     * createdTime       |string |添加时间
     *
     * @param int $paId 账户ID，自增主键
     *
     * @return AccountDTO
     * @requestExample({
     *     "paId":1
     * })
     * @returnExample({
     *     paId:1,
     *     userId:148086,
     *     storeId:0,
     *     money:2190,
     *     frozenMoney:200,
     *     commissionRatio:"0.000",
     *     passwordPay:null,
     *     status:0,
     *     alipayAccount:"",
     *     wechatPurseOpenId:"",
     *     createdTime:"1510278091"
     * })
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年11月15日
     *
     * @Validation(
     *     @OperatorValidator(0,{message:"账户ID",operator:["gt",0]})
     * )
     */
    public function getAccountAsync(int $paId)
    {
        return EellyClient::request('pay/account', 'getAccount', false, $paId);
    }

    /**
     * 获取用户账户信息，或者店铺账户信息.
     *
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * ------------------|-------|--------------
     * paId              |int    |账户ID，自增主键
     * userId            |int    |用户ID：0 平台系统帐户
     * storeId           |int    |店铺ID：0 买家帐户
     * money             |int    |账户可用金额：单位为分
     * frozenMoney       |int    |账户冻结金额：单位为分
     * commissionRatio   |string |提现手续费率
     * passwordPay       |string |支付密码
     * status            |int    |状态：0 正常 1 风险监控 2 冻结提现 4 冻结支付
     * alipayAccount     |string |支付宝账号
     * wechatPurseOpenId |string |微信钱包绑定的微信账户open_id
     * createdTime       |int    |添加时间
     * passwordKey       |string |密码钥匙
     * updateTime        |string |修改时间
     *
     * @param int         $storeId 店铺ID
     * @param UidDTO|null $user    登录用户
     *
     * @return AccountDTO
     * @requestExample({"storeId":148086})
     * @returnExample({"paId":1,"userId":148086,"storeId":0,"money":1300,
     *     "frozenMoney":200,"commissionRatio":"0.000", "passwordPay": "e10adc3949ba59abbe56e057f20f883e",
     *     "status":2, "alipayAccount":"支付宝账户","wechatPurseOpenId":"微信钱包","createdTime":1510278091,"passwordKey":"密钥","updateTime":"2017-11-21 17:46:30"})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年11月09日
     */
    public function getAccountUser(int $storeId = 0, UidDTO $user = null): AccountDTO
    {
        return EellyClient::request('pay/account', 'getAccountUser', true, $storeId, $user);
    }

    /**
     * 获取用户账户信息，或者店铺账户信息.
     *
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * ------------------|-------|--------------
     * paId              |int    |账户ID，自增主键
     * userId            |int    |用户ID：0 平台系统帐户
     * storeId           |int    |店铺ID：0 买家帐户
     * money             |int    |账户可用金额：单位为分
     * frozenMoney       |int    |账户冻结金额：单位为分
     * commissionRatio   |string |提现手续费率
     * passwordPay       |string |支付密码
     * status            |int    |状态：0 正常 1 风险监控 2 冻结提现 4 冻结支付
     * alipayAccount     |string |支付宝账号
     * wechatPurseOpenId |string |微信钱包绑定的微信账户open_id
     * createdTime       |int    |添加时间
     * passwordKey       |string |密码钥匙
     * updateTime        |string |修改时间
     *
     * @param int         $storeId 店铺ID
     * @param UidDTO|null $user    登录用户
     *
     * @return AccountDTO
     * @requestExample({"storeId":148086})
     * @returnExample({"paId":1,"userId":148086,"storeId":0,"money":1300,
     *     "frozenMoney":200,"commissionRatio":"0.000", "passwordPay": "e10adc3949ba59abbe56e057f20f883e",
     *     "status":2, "alipayAccount":"支付宝账户","wechatPurseOpenId":"微信钱包","createdTime":1510278091,"passwordKey":"密钥","updateTime":"2017-11-21 17:46:30"})
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年11月09日
     */
    public function getAccountUserAsync(int $storeId = 0, UidDTO $user = null)
    {
        return EellyClient::request('pay/account', 'getAccountUser', false, $storeId, $user);
    }

    /**
     * 获取用户账户信息，或者店铺账户信息.
     *
     * @param array $data
     * @param int   $data['storeId'] 店铺ID
     * @param int   $data['userId']  登录用户
     *
     * @return array
     * @requestExample({"data":{"userId":148086,"storeId":1122}})
     * @returnExample()
     *
     * @author 张泽强 <zhangzeqiang@eelly.net>
     *
     * @since  2017年11月18日
     */
    public function getAccountUserInfo(array $data): array
    {
        return EellyClient::request('pay/account', 'getAccountUserInfo', true, $data);
    }

    /**
     * 获取用户账户信息，或者店铺账户信息.
     *
     * @param array $data
     * @param int   $data['storeId'] 店铺ID
     * @param int   $data['userId']  登录用户
     *
     * @return array
     * @requestExample({"data":{"userId":148086,"storeId":1122}})
     * @returnExample()
     *
     * @author 张泽强 <zhangzeqiang@eelly.net>
     *
     * @since  2017年11月18日
     */
    public function getAccountUserInfoAsync(array $data)
    {
        return EellyClient::request('pay/account', 'getAccountUserInfo', false, $data);
    }

    /**
     * 判断是否存在账号，没有执行创建.
     *
     * @param int $userId  用户ID
     * @param int $storeId 店铺ID
     *
     * @return int
     * @requestExample({"userId":148086,"storeId":148086})
     * @returnExample(1)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年01月02日
     * @Validation(
     *  @OperatorValidator(0,{message:"用户ID",operator:["gt",0]})
     *)
     */
    public function checkIsExistAccount(int $userId, int $storeId = 0): int
    {
        return EellyClient::request('pay/account', 'checkIsExistAccount', true, $userId, $storeId);
    }

    /**
     * 判断是否存在账号，没有执行创建.
     *
     * @param int $userId  用户ID
     * @param int $storeId 店铺ID
     *
     * @return int
     * @requestExample({"userId":148086,"storeId":148086})
     * @returnExample(1)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年01月02日
     * @Validation(
     *  @OperatorValidator(0,{message:"用户ID",operator:["gt",0]})
     *)
     */
    public function checkIsExistAccountAsync(int $userId, int $storeId = 0)
    {
        return EellyClient::request('pay/account', 'checkIsExistAccount', false, $userId, $storeId);
    }

    /**
     * 添加会员资金账户.
     *
     * @param array  $data                      会员资金账户数据
     * @param int    $data['userId']            用户ID
     * @param int    $data['storeId']           店铺I
     * @param float  $data['money']             账户金额
     * @param float  $data['frozenMoney']       账户冻结金额
     * @param float  $data['commissionRatio']   提现手续费率
     * @param int    $data['status']            状态：0 正常 1 风险监控 2 冻结提现 4 冻结支付
     * @param string $data['alipayAccount']     支付宝账号
     * @param string $data['wechatPurseOpenId'] 微信钱包绑定的微信账户open_id
     * @param string $data['passwordKey']       密码钥匙
     * @param string $data['passwordPay']       支付密码
     * @param UidDTO $user                      用户信息
     *
     * @throws \Eelly\SDK\Pay\Exception\AccountException
     *
     * @return bool
     * @requestExample({
     *     "data":{
     *         "storeId":2,
     *         "money":2,
     *         "commissionRatio":3,
     *         "status":1,
     *         "alipayAccount":"",
     *         "wechatPurseOpenId":""
     *     }
     * })
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年09月21日
     */
    public function addAccount(array $data, UidDTO $user = null): bool
    {
        return EellyClient::request('pay/account', 'addAccount', true, $data, $user);
    }

    /**
     * 添加会员资金账户.
     *
     * @param array  $data                      会员资金账户数据
     * @param int    $data['userId']            用户ID
     * @param int    $data['storeId']           店铺I
     * @param float  $data['money']             账户金额
     * @param float  $data['frozenMoney']       账户冻结金额
     * @param float  $data['commissionRatio']   提现手续费率
     * @param int    $data['status']            状态：0 正常 1 风险监控 2 冻结提现 4 冻结支付
     * @param string $data['alipayAccount']     支付宝账号
     * @param string $data['wechatPurseOpenId'] 微信钱包绑定的微信账户open_id
     * @param string $data['passwordKey']       密码钥匙
     * @param string $data['passwordPay']       支付密码
     * @param UidDTO $user                      用户信息
     *
     * @throws \Eelly\SDK\Pay\Exception\AccountException
     *
     * @return bool
     * @requestExample({
     *     "data":{
     *         "storeId":2,
     *         "money":2,
     *         "commissionRatio":3,
     *         "status":1,
     *         "alipayAccount":"",
     *         "wechatPurseOpenId":""
     *     }
     * })
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年09月21日
     */
    public function addAccountAsync(array $data, UidDTO $user = null)
    {
        return EellyClient::request('pay/account', 'addAccount', false, $data, $user);
    }

    /**
     * 更新会员资金账户信息.
     *
     * @param int         $paId                      账户ID
     * @param array       $data                      需要更新的账号信息
     * @param int         $data['money']             账户金额
     * @param float       $data['commissionRatio']   提现手续费率
     * @param int         $data['status']            状态：0 正常 1 风险监控 2 冻结提现 4 冻结支付
     * @param string      $data['alipayAccount']     支付宝账号
     * @param string      $data['wechatPurseOpenId'] 微信钱包绑定的微信账户open_id
     * @param string      $data['passwordKey']       密码钥匙
     * @param string      $data['passwordPay']       支付密码
     * @param UidDTO|null $user                      登录的用户信息
     *
     * @return bool
     * @requestExample({
     *     "paId":1,
     *     "data":{
     *         "userId":1,
     *         "storeId":2,
     *         "money":2,
     *         "commissionRatio":3,
     *         "status":1,
     *         "alipayAccount":"",
     *         "wechatPurseOpenId":""
     *     }
     * })
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年09月21日
     *
     * @Validation(
     *     @OperatorValidator(0,{message:"账号Id",operator:["gt",0]}),
     *     @OperatorValidator(1,{message:"数据不能为空"})
     * )
     */
    public function updateAccount(int $paId, array $data, UidDTO $user = null): bool
    {
        return EellyClient::request('pay/account', 'updateAccount', true, $paId, $data, $user);
    }

    /**
     * 更新会员资金账户信息.
     *
     * @param int         $paId                      账户ID
     * @param array       $data                      需要更新的账号信息
     * @param int         $data['money']             账户金额
     * @param float       $data['commissionRatio']   提现手续费率
     * @param int         $data['status']            状态：0 正常 1 风险监控 2 冻结提现 4 冻结支付
     * @param string      $data['alipayAccount']     支付宝账号
     * @param string      $data['wechatPurseOpenId'] 微信钱包绑定的微信账户open_id
     * @param string      $data['passwordKey']       密码钥匙
     * @param string      $data['passwordPay']       支付密码
     * @param UidDTO|null $user                      登录的用户信息
     *
     * @return bool
     * @requestExample({
     *     "paId":1,
     *     "data":{
     *         "userId":1,
     *         "storeId":2,
     *         "money":2,
     *         "commissionRatio":3,
     *         "status":1,
     *         "alipayAccount":"",
     *         "wechatPurseOpenId":""
     *     }
     * })
     * @returnExample(true)
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2017年09月21日
     *
     * @Validation(
     *     @OperatorValidator(0,{message:"账号Id",operator:["gt",0]}),
     *     @OperatorValidator(1,{message:"数据不能为空"})
     * )
     */
    public function updateAccountAsync(int $paId, array $data, UidDTO $user = null)
    {
        return EellyClient::request('pay/account', 'updateAccount', false, $paId, $data, $user);
    }

    /**
     * 获取店+账号资金管理
     *
     * ### 返回数据说明
     *
     * key | type | value
     * --- | ---- | -----
     * withdrawCapitalFreeze    | bool      | 冻结提现 true:是，false:否
     * limitedFunctionality     | int       | 提现受限
     * auditStatus              | int       | 是否实名认证 0:否，1:通过
     * setPayPassword           | bool      | 是否设置了支付密码
     * mobile                   | string    | 绑定的手机号码
     * withdrawLimit | int | 提现受限 0:没有受限，1:受限
     * isBindWechat | bool   | 是否绑定定了微信 true 是， false， 否
     * nickname     | string | 微信昵称 isBindWechat为true才出现
     * money        | int  | 账号余额 单位分
     * frozenMoney  | int  | 账号冻结金额 单位分
     * 
     * @param int         $storeId 店铺ID 默认是0
     * @param UidDTO|null $user    登录用户
     * @return array
     * 
     * @requestExample({"storeId":"0"})
     * @returnExample({"withdrawCapitalFreeze":"false","limitedFunctionality":"0","auditStatus":"1","setPayPassword":"true","mobile":"15018759997","isBindWechat":"true","nickname":"nickname","money":"0.00","frozenMoney":"0.00"})
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.9.3
     */
    public function getBuyerAccountMoneyManage(int $storeId = 0, UidDTO $user = null): array
    {
        return EellyClient::request('pay/account', 'getBuyerAccountMoneyManage', true, $storeId, $user);
    }

    /**
     * 获取店+账号资金管理
     *
     * ### 返回数据说明
     *
     * key | type | value
     * --- | ---- | -----
     * withdrawCapitalFreeze    | bool      | 冻结提现 true:是，false:否
     * limitedFunctionality     | int       | 提现受限
     * auditStatus              | int       | 是否实名认证 0:否，1:通过
     * setPayPassword           | bool      | 是否设置了支付密码
     * mobile                   | string    | 绑定的手机号码
     * withdrawLimit | int | 提现受限 0:没有受限，1:受限
     * isBindWechat | bool   | 是否绑定定了微信 true 是， false， 否
     * nickname     | string | 微信昵称 isBindWechat为true才出现
     * money        | int  | 账号余额 单位分
     * frozenMoney  | int  | 账号冻结金额 单位分
     * 
     * @param int         $storeId 店铺ID 默认是0
     * @param UidDTO|null $user    登录用户
     * @return array
     * 
     * @requestExample({"storeId":"0"})
     * @returnExample({"withdrawCapitalFreeze":"false","limitedFunctionality":"0","auditStatus":"1","setPayPassword":"true","mobile":"15018759997","isBindWechat":"true","nickname":"nickname","money":"0.00","frozenMoney":"0.00"})
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.9.3
     */
    public function getBuyerAccountMoneyManageAsync(int $storeId = 0, UidDTO $user = null)
    {
        return EellyClient::request('pay/account', 'getBuyerAccountMoneyManage', false, $storeId, $user);
    }

    /**
     * 同步数据.
     *
     * @param array $data
     * @param int   $type
     *
     * @return bool
     *
     * @author hehui<hehui@eelly.net>
     */
    public function synchrodata(array $data, int $type): bool
    {
        return EellyClient::request('pay/account', 'synchrodata', true, $data, $type);
    }

    /**
     * 同步数据.
     *
     * @param array $data
     * @param int   $type
     *
     * @return bool
     *
     * @author hehui<hehui@eelly.net>
     */
    public function synchrodataAsync(array $data, int $type)
    {
        return EellyClient::request('pay/account', 'synchrodata', false, $data, $type);
    }

    /**
     * 绑定微信钱包
     * 
     * > data数据说明
     * key | type | value 
     * --- | ---- | ----
     * openId | string | 微信公众平台id
     * nickname | string | 微信昵称
     * unionId | string | 微信公众平台唯一id
     * appId | string | 微信平台appId
     * token | string | token(未使用)
     * 
     * > 返回数据说明
     * key | type | value
     * --- | ---- | -----
     * nickname | string | 微信昵称
     * 
     * @param array $data 请求所需数据
     * @param integer $storeId 店铺id 0:店+ 非0:厂家
     * @param UidDTO $user 登陆的账号
     * @return boolean
     * 
     * @requestExample({"data":{["openId":"qwertyuiopsdfghj","nickname":"hello world","unionId":"oldRYuK7MV6d8uyEO3q16cdav3jo","appId":"wxdd557bb66b43f811"]}})
     * @returnExample("hello world")
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.9.3
     */
    public function bindWechat(array $data, int $storeId = 0, UidDTO $user = null): string
    {
        return EellyClient::request('pay/account', 'bindWechat', true, $data, $storeId, $user);
    }

    /**
     * 绑定微信钱包
     * 
     * > data数据说明
     * key | type | value 
     * --- | ---- | ----
     * openId | string | 微信公众平台id
     * nickname | string | 微信昵称
     * unionId | string | 微信公众平台唯一id
     * appId | string | 微信平台appId
     * token | string | token(未使用)
     * 
     * > 返回数据说明
     * key | type | value
     * --- | ---- | -----
     * nickname | string | 微信昵称
     * 
     * @param array $data 请求所需数据
     * @param integer $storeId 店铺id 0:店+ 非0:厂家
     * @param UidDTO $user 登陆的账号
     * @return boolean
     * 
     * @requestExample({"data":{["openId":"qwertyuiopsdfghj","nickname":"hello world","unionId":"oldRYuK7MV6d8uyEO3q16cdav3jo","appId":"wxdd557bb66b43f811"]}})
     * @returnExample("hello world")
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.9.3
     */
    public function bindWechatAsync(array $data, int $storeId = 0, UidDTO $user = null)
    {
        return EellyClient::request('pay/account', 'bindWechat', false, $data, $storeId, $user);
    }

    /**
     * 判断用户是否设置了支付密码
     *
     * @param integer $userId 用户id
     * @param integer $storeId 店铺id 默认0 店+
     * @return boolean
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.9.28
     */
    public function checkIsSetPayPassword(int $userId, int $storeId = 0): bool
    {
        return EellyClient::request('pay/account', 'checkIsSetPayPassword', true, $userId, $storeId);
    }

    /**
     * 判断用户是否设置了支付密码
     *
     * @param integer $userId 用户id
     * @param integer $storeId 店铺id 默认0 店+
     * @return boolean
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.9.28
     */
    public function checkIsSetPayPasswordAsync(int $userId, int $storeId = 0)
    {
        return EellyClient::request('pay/account', 'checkIsSetPayPassword', false, $userId, $storeId);
    }

    /**
     * 校验密码是否正确.
     *
     * @param integer $userId 用户的id
     * @param string $payPassword 支付密码
     * @param integer $storeId 店铺id 默认0:店家 非0:厂家
     * @return bool
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.9.5
     */
    public function checkPayPassword(int $userId, string $payPassword, int $storeId = 0): bool
    {
        return EellyClient::request('pay/account', 'checkPayPassword', true, $userId, $payPassword, $storeId);
    }

    /**
     * 校验密码是否正确.
     *
     * @param integer $userId 用户的id
     * @param string $payPassword 支付密码
     * @param integer $storeId 店铺id 默认0:店家 非0:厂家
     * @return bool
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.9.5
     */
    public function checkPayPasswordAsync(int $userId, string $payPassword, int $storeId = 0)
    {
        return EellyClient::request('pay/account', 'checkPayPassword', false, $userId, $payPassword, $storeId);
    }

    /**
     * 设置支付密码 / 重置支付密码
     *
     * @param integer $userId 用户id
     * @param string $payPassword 支付密码
     * @param integer $storeId 店铺id 默认0 店铺同userId值
     * @return boolean
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.10.15
     */
    public function setPayPassword(int $userId, string $payPassword, int $storeId = 0): bool
    {
        return EellyClient::request('pay/account', 'setPayPassword', true, $userId, $payPassword, $storeId);
    }

    /**
     * 设置支付密码 / 重置支付密码
     *
     * @param integer $userId 用户id
     * @param string $payPassword 支付密码
     * @param integer $storeId 店铺id 默认0 店铺同userId值
     * @return boolean
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.10.15
     */
    public function setPayPasswordAsync(int $userId, string $payPassword, int $storeId = 0)
    {
        return EellyClient::request('pay/account', 'setPayPassword', false, $userId, $payPassword, $storeId);
    }

    /**
     * 设置账号的提现手续费
     *
     * @param integer $userId  用户id
     * @param integer $storeId 店铺id
     * @param float $commissionRatio 手续费 默认 0.008
     * @return boolean
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.11.15
     */
    public function setCommissionratio(int $userId, int $storeId, float $commissionRatio = 0.008): bool
    {
        return EellyClient::request('pay/account', 'setCommissionratio', true, $userId, $storeId, $commissionRatio);
    }

    /**
     * 设置账号的提现手续费
     *
     * @param integer $userId  用户id
     * @param integer $storeId 店铺id
     * @param float $commissionRatio 手续费 默认 0.008
     * @return boolean
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2018.11.15
     */
    public function setCommissionratioAsync(int $userId, int $storeId, float $commissionRatio = 0.008)
    {
        return EellyClient::request('pay/account', 'setCommissionratio', false, $userId, $storeId, $commissionRatio);
    }

    /**
     * 统计资金账号流水
     *
     * @param int $userId
     * @param int $storeId
     * @return array
     *
     * @author zhangyangxun
     * @since 2018-11-21
     */
    public function getAccountStatistics(int $userId, int $storeId = 0): array
    {
        return EellyClient::request('pay/account', 'getAccountStatistics', true, $userId, $storeId);
    }

    /**
     * 统计资金账号流水
     *
     * @param int $userId
     * @param int $storeId
     * @return array
     *
     * @author zhangyangxun
     * @since 2018-11-21
     */
    public function getAccountStatisticsAsync(int $userId, int $storeId = 0)
    {
        return EellyClient::request('pay/account', 'getAccountStatistics', false, $userId, $storeId);
    }

   /**
     * 统计用户交易流水
     *
     * @param int $userId
     * @param int $storeId
     * @return array
     *
     * @author zhangyangxun
     * @since 2018-11-26
     */
    public function statAccountMoney(int $userId, int $storeId = 0): array
    {
        return EellyClient::request('pay/account', 'statAccountMoney', true, $userId, $storeId);
    }

    /**
     * 统计用户交易流水
     *
     * @param int $userId
     * @param int $storeId
     * @return array
     *
     * @author zhangyangxun
     * @since 2018-11-26
     */
    public function statAccountMoneyAsync(int $userId, int $storeId = 0)
    {
        return EellyClient::request('pay/account', 'statAccountMoney', false, $userId, $storeId);
    }
   
    /**
     * 根据传过来的账号id，返回对应的用户信息
     *
     * @param array $paIds 账号id
     * @return array
     *
     * @requestExample({"paIds":[3,6]})
     * @returnExample({"3":{"user_id":"148086","user_name":"molimoq","nickname":"molimoq","real_name":"\u674e\u767d","phone_mob":"13430245646"},"6":{"user_id":"1761477","user_name":"liping284","nickname":"liping284","real_name":"","phone_mob":""}})
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.12.07
     */
    public function getUserInfoByPaIds(array $paIds):array
    {
        return EellyClient::requestJson('pay/account', __FUNCTION__, [
            'paIds' => $paIds
        ]);
        //return EellyClient::request('pay/account', __FUNCTION__, true, $paIds);
    }

    /**
     * @inheritdoc
     */
    public function getUserInfoByPaIdsAsync(array $paIds):array
    {
        return EellyClient::request('pay/account', __FUNCTION__, false, $paIds);
    }

    /**
     * 根据传过来的用户id，返回对应的账号id
     *
     * @param array $userIds 用户id
     * @return array
     *
     * @requestExample({"userIds":[148086]})
     * @returnExample([3,2])
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.12.11
     */
    public function getPaIdByUserIds(array $userIds):array
    {
        return EellyClient::request('pay/account', __FUNCTION__, true, $userIds);
    }

    /**
     * @inheritdoc
     */
    public function getPaIdByUserIdsAsync(array $userIds):array
    {
        return EellyClient::request('pay/account', __FUNCTION__, false, $userIds);
    }

    /**
     * 根据传过来的查询条件，返回对应的记录
     *
     * @param string $condition 查询条件
     * @param array $bind  绑定参数
     * @return array
     *
     * @requestExample({"condition":"pa_id IN ({paId:array})", "bind":{"paId":[2,3]}})
     * @returnExample([{"paId":"2","userId":"148086","storeId":"148086","money":"285900","frozenMoney":"0","commissionRatio":"0.008","status":"0","alipayAccount":"","wechatPurseOpenId":"oW-yJwJS5QW2mb-JvNtwbHcgpk74","createdTime":"1527168509"},{"paId":"3","userId":"148086","storeId":"0","money":"1","frozenMoney":"0","commissionRatio":"0.000","status":"0","alipayAccount":"","wechatPurseOpenId":"oW-yJwJS5QW2mb-JvNtwbHcgpk74","createdTime":"1527168509"}])
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     * @since 2018.12.12
     */
    public function getAccountInfoByCondition(string $condition, array $bind = []):array
    {
        return EellyClient::request('pay/account', __FUNCTION__, true, $condition, $bind);
    }

    /**
     * @inheritdoc
     */
    public function getAccountInfoByConditionAsync(string $condition, array $bind = []):array
    {
        return EellyClient::request('pay/account', __FUNCTION__, false, $condition, $bind);
    }

    /**
     * 校验用户是否通过实名认证|通过返回true,否则false.
     *
     * @param int                           $userId              用户ID
     * @param array                         $data                提交的数据
     * @param int                           $data['storeId']     店铺ID，可以为空
     * @param string                        $data['billNo']      交易号
     * @param string                        $data['operate']     操作符，+或者-
     * @param int                           $data['fund']        修改的金额
     * @param array                         $data['field']       提交的数据
     * @param int                           $data['type']        操作类型：1 充值 2 提现 3 消费 4 结算 5 退款 6 诚保冻结 7 诚保解冻
     * @param int                           $data['itemId']      关联ID
     * @param Phalcon\Mvc\Model\Transaction $data['transaction'] 事务
     *
     * @return bool
     */
    public function updateAccountMoney(int $userId, array $data): bool
    {
        return EellyClient::request('pay/account', __FUNCTION__, true, $userId, $data);
    }

    /**
     * 根据用户id和店铺id 返回用户的手续费率
     *
     * @param int $userId  用户id
     * @param int $storeId 店铺id
     * @return
     *
     * @author wechan
     * @since 2019年07月31日
     */
    public function getUserCommissionratio(int $userId, int $storeId = 0)
    {
        return EellyClient::request('pay/account', __FUNCTION__, true, $userId, $storeId);
    }

    /**
     * @param array  $storeIds
     * @param string $fieldScope
     * @return array
     * @throws \ErrorException
     * @author zhangyangxun
     * @since 2019/8/8
     */
    public static function getAccountInfoBatch(array $storeIds, string $fieldScope = 'base'): array
    {
        return EellyClient::requestJson('pay/account', __FUNCTION__, ['storeIds' => $storeIds, 'fieldScope' => $fieldScope]);
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