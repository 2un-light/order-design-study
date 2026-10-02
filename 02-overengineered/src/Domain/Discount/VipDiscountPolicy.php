<?php

declare(strict_types=1);

namespace Overengineered\Domain\Discount;
use Overengineered\Domain\Discount\DiscountPolicyInterface;

class VipDiscountPolicy implements DiscountPolicyInterface {
    public function calculate(int $subtotal): int {
        return (int) ($subtotal * 0.1);
    }
}