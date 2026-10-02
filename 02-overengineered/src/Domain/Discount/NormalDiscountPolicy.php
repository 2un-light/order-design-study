<?php

declare(strict_types=1);

namespace Overengineered\Domain\Discount;

class NormalDiscountPolicy implements DiscountPolicyInterface {
    public function calculate(int $subtotal): int {
        return 0;
    }
}