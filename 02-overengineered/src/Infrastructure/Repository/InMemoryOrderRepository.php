<?php

declare(strict_types=1);

namespace Overengineered\Infrastructure\Repository;

use Overengineered\Domain\Order\Order;
use Overengineered\Domain\Repository\OrderRepositoryInterface;

class InMemoryOrderRepository implements OrderRepositoryInterface {
    private array $orders = [];

    public function save(Order $order): void {
        $this->orders[] = $order;
    }

    public function findAll(): array {
        return $this->orders;
    }
}