<?php

namespace Chapter11\Composition;

use Chapter11\Shared\Call;
use Chapter11\Shared\Money;

abstract class BasicRatePolicy implements RatePolicy {
    
    final public function calculateFee(Phone $phone): Money {
        $result = Money::zero();

        foreach($phone->getCalls() as $call) {
            $result = $result->plus($this->calculateFee($call));
        }

        return $result;
    }

    abstract protected function calculateCallFee(Call $call): Money;
}