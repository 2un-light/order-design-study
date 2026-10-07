<?php

namespace Chapter09\Movie\Pricing;

use Chapter09\Money\Money;
use Chapter09\Movie\DiscountPolicy;
use Chapter09\Movie\Screening;

class OverlappedDiscountPolicy extends DiscountPolicy {

    private array $discountPolicies = [];

    public function __construct(DiscountPolicy ...$discountPolicy) {
        $this->discountPolicies = $discountPolicy;
    }

    protected function getDiscountAmount(Screening $screening): Money {
        $result = Money::$ZERO;

        foreach($this->discountPolicies as $discountPolicy) {
            $result = $result->plus(
                $discountPolicy->calculateDiscountAmount($screening)
            );
        }

        return $result;
    }

}