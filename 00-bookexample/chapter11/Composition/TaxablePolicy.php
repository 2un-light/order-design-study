<?php

namespace Chapter11\Composition;

use Chapter11\Shared\Money;
use Chpater11\Composition\AdditionalRatePolicy;

class TaxablePolicy extends AdditionalRatePolicy {
    public function __construct(RatePolicy $next, private float $taxRate) {
        return parent::__construct($next);
    }

    protected function afterCalculated(Money $fee): Money {
        return $fee->plus($fee->times($this->taxRate));
    }
}