<?php

namespace Chapter11\Composition;

use Chapter11\Shared\Call;
use Chapter11\Shared\Money;

class Phone {
    private array $calls = [];

    public function __construct(private RatePolicy $ratePolicy){}

    public function addCall(Call $call): void {
        $this->calls[] = $call;
    }

    public function getCalls(): array {
        return $this->calls;
    }

    public function calculateFee(): Money {
        return $this->ratePolicy->calculateFee($this);
    }
}