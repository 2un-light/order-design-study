<?php

namespace Chapter11\Composition;

use Chapter11\Shared\Call;
use Chapter11\Shared\Money;

class NightlyDiscountPolicy extends BasicRatePolicy {
    public function __construct(private Money $regularAmount, private Money $nightAmount) {}

    protected function calculateCallFee(Call $call): Money {
        $amount = $call->isNight() ? $this->nightAmount : $this->regularAmount;

        return $amount->times($call->getDurationMinutes());
    }
}