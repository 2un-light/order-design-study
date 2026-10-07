<?php

namespace Chapter09\Money;

class Money {
    public static Money $ZERO;

    private float $amount;

    public function __construct(float $amount) {
        $this->amount = $amount;
    }

    public static function wons(int|float $amount): Money {
        return new Money($amount);
    }


    public function plus(Money $amount): Money {
        return new Money($this->amount + $amount->amount);
    }

    public function minus(Money $amount): Money {
        return new Money($this->amount - $amount->amount);
    }

    public function times(float $percent): Money {
        return new Money($this->amount * $percent);
    }

    public function isLessThan(Money $other): bool {
        return $this->amount < $other->amount;
    }

    public function isGreaterThanOrEqual(Money $other): bool {
        return $this->amount >= $other->amount;
    }

    public function equals(object $object): bool {
        if ($this === $object) {
            return true;
        }

        if (!($object instanceof Money)) {
            return false;
        }

        return $this->amount === $object->amount;
    }

    public function hashCode(): string {
        return md5((string) $this->amount);
    }

    public function __toString(): string {
        return $this->amount . '원';
    }
}

Money::$ZERO = Money::wons(0);