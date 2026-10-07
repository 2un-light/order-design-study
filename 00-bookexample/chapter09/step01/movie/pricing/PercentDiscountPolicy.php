<?php

namespace Chapter09\Movie\Pricing;

use Chapter09\Money\Money;
use Chapter09\Movie\DiscountCondition;
use Chapter09\Movie\DiscountPolicy;
use Chapter09\Movie\Screening;

class PercentDiscountPolicy extends DiscountPolicy{
    private float $percent;

    public function __construct(float $percent, DiscountCondition ...$conditions) {
        parent::__construct(...$conditions);
        $this->percent = $percent;
    }

    protected function getDiscountAmount(Screening $screening): Money {
        return $screening->getMovieFee()->times($this->percent);
    }
}