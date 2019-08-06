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

namespace Eelly\SDK\Store\Api;

use Eelly\SDK\EellyClient;
use Eelly\SDK\Store\Service\AssistantInterface;
use Eelly\SDK\Store\DTO\AssistantDTO;

/**
 *
 * @author shadonTools<localhost.shell@gmail.com>
 */
class Assistant
{
    public static function getStoreIds(int $uid, bool $expire = true): array
    {	
        return EellyClient::requestJson('store/assistant', __FUNCTION__, ['uid' => $uid, 'expire' => $expire]);
    }
    
    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function getAssistant(int $assistantId): AssistantDTO
    {
        return EellyClient::request('store/assistant', 'getAssistant', true, $assistantId);
    }

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function getAssistantAsync(int $assistantId)
    {
        return EellyClient::request('store/assistant', 'getAssistant', false, $assistantId);
    }

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function addAssistant(array $data): bool
    {
        return EellyClient::request('store/assistant', 'addAssistant', true, $data);
    }

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function addAssistantAsync(array $data)
    {
        return EellyClient::request('store/assistant', 'addAssistant', false, $data);
    }

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function updateAssistant(int $assistantId, array $data): bool
    {
        return EellyClient::request('store/assistant', 'updateAssistant', true, $assistantId, $data);
    }

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function updateAssistantAsync(int $assistantId, array $data)
    {
        return EellyClient::request('store/assistant', 'updateAssistant', false, $assistantId, $data);
    }

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function deleteAssistant(int $assistantId): bool
    {
        return EellyClient::request('store/assistant', 'deleteAssistant', true, $assistantId);
    }

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function deleteAssistantAsync(int $assistantId)
    {
        return EellyClient::request('store/assistant', 'deleteAssistant', false, $assistantId);
    }

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function listAssistantPage(array $condition = [], int $currentPage = 1, int $limit = 10): array
    {
        return EellyClient::request('store/assistant', 'listAssistantPage', true, $condition, $currentPage, $limit);
    }

    /**
     *
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function listAssistantPageAsync(array $condition = [], int $currentPage = 1, int $limit = 10)
    {
        return EellyClient::request('store/assistant', 'listAssistantPage', false, $condition, $currentPage, $limit);
    }

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
    public function listAssistant(array $condition = [], array $extend = []): array
    {
        return EellyClient::request('store/assistant', 'listAssistant', true, $condition, $extend);
    }

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
    public function listAssistantAsync(array $condition = [], array $extend = [])
    {
        return EellyClient::request('store/assistant', 'listAssistant', false, $condition, $extend);
    }

    /**
     * 新增赠送子账号
     * 
     * @param int $storeId 店铺id
     * @param array $data 扩展参数
     * 
     * @author wechan
     * @since 2019年6月17日
     */
    public function addReadyStoreAssistant($storeId, $data): bool
    {
        return EellyClient::request('store/assistant', 'addReadyStoreAssistant', true, $storeId, $data);
    }

    /**
     * 新增赠送子账号
     * 
     * @param int $storeId 店铺id
     * @param array $data 扩展参数
     * 
     * @author wechan
     * @since 2019年6月17日
     */
    public function addReadyStoreAssistantAsync($storeId, $data)
    {
        return EellyClient::request('store/assistant', 'addReadyStoreAssistant', false, $storeId, $data);
    }

    /**
     * 根据店铺id获取子账号信息
     * 
     * @param array $storeIds 店铺id
     * 
     * @author wechan 
     * @since 2019年06月18日
     */
    public function getAssistantBystoreIds(array $storeIds): array
    {
        return EellyClient::requestJson('store/assistant', 'getAssistantBystoreIds', [
            'storeIds' => $storeIds
        ]);
    }

    /**
     * 根据店铺id获取子账号信息
     * 
     * @param array $storeIds 店铺id
     * 
     * @author wechan 
     * @since 2019年06月18日
     */
    public function getAssistantBystoreIdsAsync(array $storeIds)
    {
        return EellyClient::request('store/assistant', 'getAssistantBystoreIds', false, $storeIds);
    }

    /**
     * 获取店铺子账号所有userId
     *
     * @param integer $storeId 店铺id
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2019.6.19
     */
    public function getStoreAssistantUserIds(int $storeId): array
    {
        return EellyClient::request('store/assistant', 'getStoreAssistantUserIds', true, $storeId);
    }

    /**
     * 获取店铺子账号所有userId
     *
     * @param integer $storeId 店铺id
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2019.6.19
     */
    public function getStoreAssistantUserIdsAsync(int $storeId)
    {
        return EellyClient::request('store/assistant', 'getStoreAssistantUserIds', false, $storeId);
    }

    /**
     * 获取子账号信息
     *
     * @param array $userIds 用户id
     * @return array
     * 
     * @author sunanzhi <sunanzhi@hotmail.com>
     * @since 2019.7.2
     */
    public function getAssistantInfo(array $userIds)
    {
        return EellyClient::request('store/assistant', 'getAssistantInfo', true, $userIds);
    }

    /**
     * 校验用户是否处于店铺解绑状态
     *
     * @param int $userId 用户id
     * @return bool
     *
     * @author wechan
     * @since 2019年07月31日
     */
    public function checkUserIsUnBind(int $userId):bool
    {
        return EellyClient::request('store/assistant', __FUNCTION__, false, $userId);
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