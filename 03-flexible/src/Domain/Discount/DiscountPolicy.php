<?php

namespace Flexible\Domain\Discount;

interface DiscountPolicy {
    public function calculate(int $subtotal): int;
}