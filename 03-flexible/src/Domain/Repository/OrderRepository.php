<?php

declare(strict_types=1);

namespace Flexible\Domain\Repository;

use Flexible\Domain\Order\Order;

interface OrderRepository {
    public function save(Order $order): void;

    public function findAll(): array;
}