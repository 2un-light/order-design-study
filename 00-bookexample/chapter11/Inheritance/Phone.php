<?php

namespace Chapter11\Inheritance;

use Chapter11\Shared\Call;
use Chapter11\Shared\Money;

abstract class Phone {
    protected array $calls = [];

    public function addCall(Call $call): void {
        $this->calls[] = $call;
    }

    public function calculateFee(): Money {
        $result = Money::zero();

        foreach($this->calls as $call) {
            $result = $result->plus($this->calculateCallFee($call));
        }

        return $result;
    }

    abstract protected function calculateCallFee(Call $call): Money;
}