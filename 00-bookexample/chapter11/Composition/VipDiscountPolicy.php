<?php

namespace Chapter11\Composition;

use Chapter11\Shared\Money;
use Chpater11\Composition\AdditionalRatePolicy;

class VipDiscountPolicy extends AdditionalRatePolicy {
    public function __construct(RatePolicy $next, private float $discountRate) {
        return parent::__construct($next);
    }

    protected function afterCalculated(Money $fee): Money {
        return $fee->minus($fee->times($this->discountRate));
    }
}