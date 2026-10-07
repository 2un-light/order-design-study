<?php

namespace Chapter11\Inheritance;

use Chapter11\Shared\Money;

class RateDiscountableNightlyDiscountPhone extends NightlyDiscountPhone {
    public function __construct(Money $regularAmount, Money $nightAmount, private Money $discountAmount) {
        return parent::__construct($regularAmount, $nightAmount);
    }

    public function calculateFee(): Money {
        return parent::calculateFee()->minus($this->discountAmount);
    }
}