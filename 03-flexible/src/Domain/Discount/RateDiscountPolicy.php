<?php

declare(strict_types=1);

namespace Flexible\Domain\Discount;

use Flexible\Domain\Discount\DiscountPolicy;

class RateDiscountPolicy implements DiscountPolicy {
    public function __construct(private readonly float $rate) {}

    public function calculate(int $subtotal): int {
        return (int) ($subtotal * $this->rate);
    }
}