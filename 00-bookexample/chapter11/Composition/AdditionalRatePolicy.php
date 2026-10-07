<?php

namespace Chpater11\Composition;

use Chapter11\Composition\RatePolicy;
use Chapter11\Composition\Phone;
use Chapter11\Shared\Money;

abstract class AdditionalRatePolicy implements RatePolicy {
    public function __construct(private RatePolicy $next){}

    final public function calculateFee(Phone $phone): Money {
        $fee = $this->next->calculateFee($phone);
        return $this->afterCalculated($fee);
    }

    abstract protected function afterCalculated(Money $fee): Money;
}