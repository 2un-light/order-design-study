<?php

declare(strict_types=1);

namespace Overengineered\Domain\Shipping;

interface ShippingPolicyInterface {
    public function calculate(int $price): int;
}