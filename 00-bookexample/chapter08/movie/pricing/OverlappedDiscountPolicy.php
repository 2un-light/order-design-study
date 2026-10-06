<?php

namespace Chapter08\Movie\Pricing;

use Chapter08\Money\Money;
use Chapter08\Movie\DiscountPolicy;
use Chapter08\Movie\Screening;

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