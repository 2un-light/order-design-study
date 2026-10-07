<?php

namespace Chapter11\Inheritance;

use Chapter11\Shared\Money;

class RateDiscountableRegularPhone extends RegularPhone {
    public function __construct(Money $amountPerMinute, private Money $discountAmount) {
        return parent::__construct($amountPerMinute);
    }

    public function calculateFee(): Money {
        return parent::calculateFee()->minus($this->discountAmount);
    }
}