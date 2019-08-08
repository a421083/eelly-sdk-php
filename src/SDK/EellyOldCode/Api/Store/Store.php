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
 * Class Store.
 *
 *  modules/Goods/Service/GoodsService.php
 *
 * @author hehui<hehui@eelly.net>
 */
class Store
{
    /**
     * 获取店铺基本信息.
     *
     * ###使用示例
     *
     * ####一般使用方式
     * <code>
     * StoreService::getInstance()->getInfoByStoreIds([148086,158252]);
     * </code>
     *
     * @param array $storeIds 店铺ID
     *
     * @service
     * > 数据说明
     *   key | value
     *   --------------------|--------------------
     *   status              |    状态码:200 | 701
     *   info                |    提示信息
     *                       |    200: 成功
     *                       |    701: 参数错误
     *   retval              |    $retval
     *
     * > $retval 数组说明
     *   key | value
     *   --------------------|--------------------
     *   store_id            |    string 店铺ID
     *   store_name          |    string 店铺名
     *   state               |    string 店铺状态
     *   store_logo          |    string 店铺LOGO
     *   is_promise          |    string 店铺类型
     *   credit_mark         |    string 店铺已经通过的所有认证类型与服务
     *   street_addr         |    string 街道地址
     *   credit_value        |    string 店铺信誉值
     *   praise_rate         |    string 卖家好评率
     *   goods_count         |    string 商品总数
     *   praise_rate_com_org |    double 与同行平均比较值
     *   real_shot           |    string 是否实拍
     *   return_goods_status |    string 是否包退换
     *   credit_info         |    $credit_info 店铺等级数组
     *   auth_all            |    $auth_all 店铺已经通过的所有认证类型与服务值数组
     *   is_mix              |    integer 是否混批
     *   mix_num             |    integer 混批数量
     *   mix_money           |    float   混批金额
     *
     * > $credit_info 数组说明
     *   key | value
     *   --------------------|--------------------
     *   0                   |    integer 店铺等级
     *   1                   |    integer 该等级起始值
     *   2                   |    integer 该等级终止值
     *   3                   |    string  该等级图片名称
     *
     * > $auth_all 数组说明
     *   key | value
     *   --------------------|--------------------
     *   is_entity           |    string  实体认证
     *   is_enterprise       |    string  企业认证
     *   is_time_shipping    |    string  准时发货
     *   is_integrity        |    string  诚信保障
     *   is_behalfof         |    string  一件代发
     *
     * @return array
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     *
     * @since 2018.8.16
     */
    public function getInfoByStoreIds(array $storeIds)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $storeIds);
    }

    /**
     * 获取店铺已经通过的认证类型与服务
     *
     * @param array $storeIds
     *
     * @return array
     *
     * @author 郭凯<guokai@eelly.net>
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since  2018.08.21
     */
    public function getCreditMarkByStoreIds(array $storeIds)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $storeIds);
    }

    /**
     * 获取运费和重量>>小程序需求.
     *
     * @param array $data 获取
     * @param $data[0]['goodsId']     |array  |商品ID
     * @param $data[0]['quantity']    |array  |商品数量
     * @param $regionId               |int    |地区ID
     *
     * @return array
     *
     * @author 肖俊明<xiaojunming@eelly.net>
     *
     * @since 2018年04月26日
     *
     * ### 返回数据说明
     *
     * 字段|类型|说明
     * ---------------|-------|--------------
     * name           |float  |选择的快递类型
     * shippingId     |float  |快递模板ID
     * expressSelect  |float  |快递类型
     * freight        |float  |重量
     * weight         |float  |重量
     */
    public function getFreightAndWeight(array $data, int $regionId = 0): array
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $data, $regionId);
    }

    /*
     * @param $storeId
     *
     * @throws \ErrorException
     *
     * @return mixed
     */
    public function sellerStoreIndexForV1($storeId)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $storeId);
    }

    /**
     * 根据店铺Id数组查店铺实体认证信息.
     *
     * @param array $storeIds
     *
     * @return array
     *
     * @author wuhao <wuhao@eelly.net>
     *
     * @since 2015-11-21
     */
    public function getRegionInfoByStoreIds(array $storeIds)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $storeIds);
    }

    /**
     * 店铺起批数量.
     *
     * @param int $storeId 店铺id
     *
     * @return int
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     *
     * @since 2018.9.10
     */
    public function getQuantity(int $storeId)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $storeId);
    }

    /**
     * 批量店铺起批数量.
     *
     * @param int $storeIds 店铺id
     *
     * @return array
     *
     * @author sunanzhi <sunanzhi@hotmail.com>
     *
     * @since 2019.1.7
     */
    public function getQuantitys(array $storeIds)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $storeIds);
    }

    /**
     * 更新店铺佣金比率.
     *
     * @param int   $storeId        店铺ID
     * @param float $commissionRate 佣金比率
     *
     * @return mixed
     *
     * @author zhangyangxun
     *
     * @since 2018-09-11
     */
    public function saveStoreCommissionRate(int $storeId, float $commissionRate)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $storeId, $commissionRate);
    }

    /**
     * 获取订单收货人信息.
     *
     * @param array $storeInfo 店铺信息
     * @param array $postData  post数据
     * @param array $address   收货地址
     *
     * @return array
     */
    public function getConsigneeInfo(array $storeInfo, array $postData, array $address)
    {
        //return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $storeInfo, $postData, $address);
        return EellyClient::requestJson('eellyOldCode/store/store', __FUNCTION__, [
            'storeInfo' => $storeInfo,
            'postData'  => $postData,
            'address'   => $address,
        ]);
    }

    /**
     * 获取店铺自定义字段.
     *
     * @param int    $storeId
     * @param string $fieldType
     * @param int    $state
     *
     * @return mixed
     *
     * @author zhangyangxun
     *
     * @since 2018-11-14
     */
    public function getStoreFieldById(int $storeId, string $fieldType, int $state = -1)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $storeId, $fieldType, $state);
    }

    /**
     * 获取店铺信息（店主，描述）.
     *
     * @param int $storeId
     *
     * @return array
     *
     * @author wangjiang<wangjiang@eelly.net>
     *
     * @since  2017年4月21日
     */
    public function getStoreOwnerInfo(int $storeId)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $storeId);
    }

    /**
     * 获取实体认证人姓名
     * 企业身份认证（企业法人姓名）>个人实名认证（真实姓名）>基础资料（店主姓名）.
     *
     * @param array $storeId 店铺id
     *
     * @author liweiquan<liweiquan@eelly.net>
     *
     * @since  2016年10月07日
     */
    public function getStoreAuthName(int $storeId)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $storeId);
    }

    /**
     * 检验是否是在指定的主营内.
     *
     * @param array $params            请求参数
     * @param array $params['storeId'] 店铺id
     * @param array $params['cateIds'] 分类id
     */
    public function checkStoreMainBusiness(array $params)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $params);
    }

    /**
     * 检验店铺是否是在指定的Vip内.
     *
     * @param array $params             请求参数
     * @param array $params['storeId']  店铺id
     * @param array $params['vipTypes'] 类型id
     */
    public function checkStoreVip(array $params)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $params);
    }

    /**
     * 检验店铺是否是在指定的商圈内.
     *
     * @param array $params               请求参数
     * @param array $params['storeId']    店铺id
     * @param array $params['districtId'] 商圈id
     */
    public function checkStoreDistrict(array $params)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $params);
    }

    /**
     * 根据storeName获取到storeId.
     *
     * @param string $storeName
     *
     * @return mixed
     *
     * @author zhangyangxun
     *
     * @since 2019-01-16
     */
    public function getStoreIdByStoreName(string $storeName)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $storeName);
    }

    /**
     * 获取满足条件的店铺.
     *
     * @param array  $where
     * @param int    $limit
     * @param string $order
     * @param int    $page
     *
     * @return array
     *
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since  2019.02.14
     */
    public function getStoreIdsByWhere($where, $limit = 20, $order = 'store_id ASC', $page = 1)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $where, $limit, $order, $page);
    }

    /**
     * 根据storeid拿 name.
     *
     * @param array $storeIds
     *
     * @return array
     */
    public function getStoreNameByIds($storeIds)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $storeIds);
    }

    /**
     * 根据storeId查询店铺是否存在.
     *
     * @param int  $storeId
     * @param bool $bool
     *
     * @return bool
     */
    public function isExistById($storeId, $bool = false)
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true, $storeId, $bool);
    }

    /**
     * 获取运费模板物流方式列表 - 卖家v1.3
     *
     * @return array
     *
     * @author liangzhiwei
     * @author zhangyingdi<zhangyingdi@eelly.net>
     *
     * @since 2019.07.22
     */
    public function distributionStyleList()
    {
        return EellyClient::request('eellyOldCode/store/store', __FUNCTION__, true);
    }
}
