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

namespace Eelly\SDK\Activity\Service;

interface ActivitySpreadSettingInterface
{
    public function getList(): array ;

    public function saveBatch(array $data): bool ;
}
