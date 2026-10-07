<?php

namespace Chapter09\Movie\Pricing;

use Chapter09\Money\Money;
use Chapter09\Movie\DiscountCondition;
use Chapter09\Movie\DiscountPolicy;
use Chapter09\Movie\Screening;

class AmountDiscountPolicy extends DiscountPolicy{
    private Money $discountAmount;

    public function __construct(Money $discountAmount, DiscountCondition ...$conditions) {
        parent::__construct(...$conditions);
        $this->discountAmount = $discountAmount;
    }

    protected function getDiscountAmount(Screening $screening): Money {
        return $this->discountAmount;
    }
}