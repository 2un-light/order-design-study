<?php

declare(strict_types=1);

namespace Overengineered\Domain\Discount;

class GoldDiscountPolicy implements DiscountPolicyInterface {
    public function calculate(int $subtotal): int {
        return (int) ($subtotal * 0.15);
    }
}