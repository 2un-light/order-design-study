<?php

declare(strict_types=1);

namespace Flexible\Domain\Shipping;

interface ShippingPolicy {
    public function calculate(int $price): int;
}