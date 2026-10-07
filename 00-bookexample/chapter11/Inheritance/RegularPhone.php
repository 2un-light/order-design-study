<?php

namespace Chapter11\Inheritance;

use Chapter11\Shared\Call;
use Chapter11\Shared\Money;

class RegularPhone extends Phone {
    public function __construct(private Money $amountPerMinute){}

    protected function calculateCallFee(Call $call): Money {
        return $this->amountPerMinute->times($call->getDurationMinutes());
    }
}