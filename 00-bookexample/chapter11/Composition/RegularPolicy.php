<?php

namespace Chapter11\Composition;

use Chapter11\Shared\Call;
use Chapter11\Shared\Money;

class RegularPolicy extends BasicRatePolicy {
    public function __construct(private Money $amountPerMinute){}

    protected function calculateCallFee(Call $call): Money {
        return $this->amountPerMinute->times($call->getDurationMinutes());
    }
}