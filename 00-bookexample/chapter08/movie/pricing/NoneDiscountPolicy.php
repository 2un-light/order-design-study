<?php

namespace Chapter08\Movie\Pricing;

use Chapter08\Money\Money;
use Chapter08\Movie\DiscountPolicy;
use Chapter08\Movie\Screening;

class NoneDiscountPolicy extends DiscountPolicy{
    protected function getDiscountAmount(Screening $screening): Money {
        return Money::$ZERO;
    }
}