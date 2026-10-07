<?php

namespace Chapter09\Movie\Pricing;

use Chapter09\Movie\DiscountCondition;
use Chapter09\Movie\Screening;

class SequenceCondition implements DiscountCondition {
    private int $sequence;

    public function __construct(int $sequence) {
        $this->sequence = $sequence;
    }

    public function isSatisfiedBy(Screening $screening): bool {
        return $screening->isSequence($this->sequence);
    }
}