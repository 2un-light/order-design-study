<?php

declare(strict_types=1);

namespace Overengineered\Domain\Repository;

use Overengineered\Domain\Order\Order;

interface OrderRepositoryInterface {
    public function save(Order $order): void;

    public function findAll(): array;
}