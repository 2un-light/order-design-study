<?php

namespace Chapter09\Movie;

use Chapter09\Money\Money;

abstract class DiscountPolicy {
    private array $conditions = [];

    public function __construct(DiscountCondition ...$conditions) {
        $this->conditions = $conditions;
    }

    public function calculateDiscountAmount(Screening $screening): Money {
        foreach($this->conditions as $condition) {
            if($condition->isSatisfiedBy($screening)) {
                return $this->getDiscountAmount($screening);
            }
        }

        return Money::$ZERO;
    }

    abstract protected function getDiscountAmount(Screening $screening): Money;

}