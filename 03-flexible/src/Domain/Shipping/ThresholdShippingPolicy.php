<?php

declare(strict_types=1);

namespace Flexible\Domain\Shipping;

class ThresholdShippingPolicy implements ShippingPolicy {

    public function __construct(private int $freeShippingThreshold, private int $shippingFee){}

    public function calculate(int $price): int {
        return $price >= $this->freeShippingThreshold ? 0 : $this->shippingFee;
    }
}