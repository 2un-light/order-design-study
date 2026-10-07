<?php

namespace Chapter11\Shared;

final class Money {
    public function __construct(private float $amount) {}

    public static function wons(int|float $amount): Money {
        return new Money($amount);
    }

    public static function zero(): Money {
        return new Money(0);
    }

    public function plus(Money $other): Money {
        return new Money($this->amount + $other->amount);
    }

    public function minus(Money $other): Money {
        return new Money($this->amount - $other->amount);
    }

    public function times(int|float $multiplier): Money {
        return new Money($this->amount * $multiplier);
    }

    public function amount(): float {
        return $this->amount;
    }

    public function __toString(): string {
        return number_format($this->amount) . '원';
    }
}