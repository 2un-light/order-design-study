<?php

declare(strict_types=1);

namespace Overengineered\Domain\Shipping;

class DefaultShippingPolicy implements ShippingPolicyInterface {
    public function calculate(int $price): int {
        return $price >= 70000 ? 0 : 3000;
    }
}