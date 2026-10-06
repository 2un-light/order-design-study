<?php

final class Money {
    private float $amount;

    private function __construct(float $amount) {
        $this->amount = $amount;
    }

    public static function wons(float $amount): self {
        return new self($amount);
    }

    public static function zero(): self {
        return new self(0);
    }
    
    public function plus(Money $amount): Money {
        return new self($this->amount + $amount->amount);
    }

    public function minus(Money $amount): Money {
        return new self($this->amount - $amount->amount);
    }

    public function times(float $percent): Money {
        return new self($this->amount * $percent);
    }

    public function isLessThan(Money $other): bool {
        return $this->amount < $other->amount;
    }

    public function isGreaterThanOrEqual(Money $other): bool {
        return $this->amount >= $other->amount;
    }

    public function getAmount(): float {
        return $this->amount;
    }

}