<?php

declare(strict_types=1);

namespace Overengineered\Domain\Discount;

interface DiscountPolicyInterface {
    public function calculate(int $subtotal): int;
}