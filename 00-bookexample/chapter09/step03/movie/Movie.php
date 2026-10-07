<?php

namespace Chapter09\Movie;

use Chapter09\Locator\ServiceLocator;
use Chapter09\Money\Money;
use DateInterval;

class Movie {
    private string $title;
    private DateInterval $runningTime;
    private Money $fee;
    private DiscountPolicy $discountPolicy;

    public function __construct(string $title, DateInterval $runningTime, Money $fee, DiscountPolicy $discountPolicy) {
        $this->title = $title;
        $this->runningTime = $runningTime;
        $this->fee = $fee;
        $this->discountPolicy = ServiceLocator::discountPolicy();
    }

    public function getFee(): Money {
        return $this->fee;
    }

    public function calculateMovieFee(Screening $screening): Money {
        return $this->fee->minus($this->discountPolicy->calculateDiscountAmount($screening));
    }

}