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

namespace Eelly\SDK\Store\Service;

use Eelly\SDK\Store\DTO\AssistantDTO;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
interface AssistantInterface
{
    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function getAssistant(int $assistantId): AssistantDTO;

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function addAssistant(array $data): bool;

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function updateAssistant(int $assistantId, array $data): bool;

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function deleteAssistant(int $assistantId): bool;

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function listAssistantPage(array $condition = [], int $currentPage = 1, int $limit = 10): array;

    /**
     * 获取子账号列表
     *
     * @param array $condition
     * @param array $extend
     * @return array
     *
     * @author zhangyangxun
     * @since 2019-04-15
     */
    public function listAssistant(array $condition = [], array $extend = []): array;
    
    /**
     * 新增赠送子账号
     * 
     * @param int $storeId 店铺id
     * @param array $data 扩展参数
     * 
     * @author wechan
     * @since 2019年6月17日
     */
    public function addReadyStoreAssistant($storeId, $data):bool; 
    
    /**
     * 根据店铺id获取子账号信息
     * 
     * @param array $storeIds 店铺id
     * 
     * @author wechan 
     * @since 2019年06月18日
     */
    public function getAssistantBystoreIds(array $storeIds): array;

    /**
     * 获取店铺子账号所有userId
     *
     * @param integer $storeId 店铺id
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2019.6.19
     */
    public function getStoreAssistantUserIds(int $storeId):array;
}