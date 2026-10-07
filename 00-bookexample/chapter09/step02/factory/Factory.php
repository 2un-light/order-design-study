<?php

namespace Chapter09\Factory;

use Chapter09\Money\Money;
use Chapter09\Movie\Pricing\AmountDiscountPolicy;
use Chapter09\Movie\Pricing\SequenceCondition;
use Chapter09\Movie\Movie;
use DateInterval;

class Factory {
    public function createAvatarMovie(): Movie {
        return new Movie(
            "아바타",
            new DateInterval(120),
            Money::wons(10000),
            new AmountDiscountPolicy(
                Money::wons(800),
                new SequenceCondition(1),
                new SequenceCondition(10)
            )
        );
    }
}