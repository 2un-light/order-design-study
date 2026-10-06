<?php

namespace Chapter08\Movie\Pricing;

use Chapter08\Money\Money;
use Chapter08\Movie\DiscountCondition;
use Chapter08\Movie\DiscountPolicy;
use Chapter08\Movie\Screening;
use Override;

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