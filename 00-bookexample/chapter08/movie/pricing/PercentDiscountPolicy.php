<?php

namespace Chapter08\Movie\Pricing;

use Chapter08\Money\Money;
use Chapter08\Movie\DiscountCondition;
use Chapter08\Movie\DiscountPolicy;
use Chapter08\Movie\Screening;

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