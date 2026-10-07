<?php

namespace Chapter09\Movie\Pricing;

use Chapter09\Money\Money;
use Chapter09\Movie\DiscountPolicy;
use Chapter09\Movie\Screening;

class NoneDiscountPolicy extends DiscountPolicy{
    protected function getDiscountAmount(Screening $screening): Money {
        return Money::$ZERO;
    }
}