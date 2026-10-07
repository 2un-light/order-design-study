<?php

declare(strict_types=1);

namespace Flexible\Infrastructure\Repository;

use Flexible\Domain\Order\Order;
use Flexible\Domain\Repository\OrderRepository;
use Override;

class InMemoryOrderRepository implements OrderRepository {
    private array $orders = [];

    public function save(Order $order): void {
        $this->orders[] = $order;
    }

    public function findAll(): array {
        return $this->orders;
    }
}