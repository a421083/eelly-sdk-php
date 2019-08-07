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

/**
 * @author shadonTools<localhost.shell@gmail.com>
 */
class EvaluationSeller
{
    /**
     * 买家查看商家的评价列表
     * 
     * > conditions 数据说明
     * 
     * key | type | desc
     * --- | ---- | ----
     * storeId | int | 店铺id
     * isValid | int | 是否有效 0:否 1:是
     * page | int | 页码
     * limit | int | 每页限制
     * tab | int | 标签 0:全部 1:很不满 2:不满 3:一般 4:满意 5:很满意 6:有图
     *
     * @param array $conditions 筛选条件
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2019.7.22
     */
    public function list(array $conditions):array
    {
        return EellyClient::request('order/evaluationSeller', 'list', true, $conditions);
    }

    /**
     * 满意度
     *
     * @param integer $storeId 店铺id
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2019.7.23
     */
    public function satisfaction(int $storeId):array
    {
        return EellyClient::request('order/evaluationSeller', 'satisfaction', true, $storeId);
    }

    /**
     * 店铺评价
     *
     * @param integer $storeId 店铺id
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2019.7.24
     */
    public function storeEvaluation(int $storeId):array
    {
        return EellyClient::request('order/evaluationSeller', 'storeEvaluation', true, $storeId);
    }

    /**
     * 获取第一个评价
     *
     * @param integer $storeId 店铺id
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2019.7.24
     */
    public function getFirstEvaluation(int $storeId):array
    {
        return EellyClient::request('order/evaluationSeller', 'getFirstEvaluation', true, $storeId);
    }

    public function adminGetListPage(array $condition = [], int $page = 1, int $limit = 20): array
    {
        return EellyClient::request('order/evaluationSeller', __FUNCTION__, true, $condition, $page, $limit);
    }

    public function adminUpdate(int $orderId, array $data): bool
    {
        return EellyClient::request('order/evaluationSeller', __FUNCTION__, true, $orderId, $data);
    }

    public static function getStoreEvaluationBatch(array $storeIds)
    {
        return EellyClient::requestJson('order/evaluationSeller', __FUNCTION__, ['storeIds' => $storeIds]);
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
