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

namespace Eelly\SDK\System\Service;

use Eelly\DTO\BankDTO;

/**
 * @author eellytools<localhost.shell@gmail.com>
 */
interface BankInterface
{
    /**
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function getBank(int $BankId): BankDTO;

    /**
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function addBank(array $data): bool;

    /**
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function updateBank(int $BankId, array $data): bool;

    /**
     * @author eellytools<localhost.shell@gmail.com>
     */
    public function deleteBank(int $BankId): bool;

    /**
     * @author eellytools<localhost.shell@gmail.com>
     */

    public function listBankPage(array $condition = [], int $currentPage = 1, int $limit = 10): array;


}
