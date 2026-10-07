<?php

declare(strict_types=1);

namespace Flexible\Domain\Discount;

use Override;

class NoDiscountPolicy implements DiscountPolicy {
    
    #[Override]
    public function calculate(int $subtotal): int
    {
        return 0;
    }
}