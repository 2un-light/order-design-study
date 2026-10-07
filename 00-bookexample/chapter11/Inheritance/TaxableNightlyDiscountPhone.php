<?php

namespace Chapter11\Inheritance;

use Chapter11\Shared\Money;
use Override;

class TaxableNightlyDiscountPhone extends NightlyDiscountPhone {
    public function __construct(Money $regularAmount, Money $nightAmount, private float $taxRate) {
        return parent::__construct($regularAmount, $nightAmount);
    }

    public function calculateFee(): Money {
        $fee = parent::calculateFee();

        return $fee->plus($fee->times($this->taxRate));
    }
}