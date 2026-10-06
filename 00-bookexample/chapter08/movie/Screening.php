<?php

namespace Chapter08\Movie;

use Chapter08\Money\Money;
use Chapter08\Movie\Movie;
use Chapter08\Movie\Reservation;

class Screening {
    private Movie $movie;
    private int $sequence;
    private DateTimeImmutable $whenScreened;

    public function __construct(Movie $movie, int $sequence, DateTimeImmutable $whenScreened) {
        $this->movie = $movie;
        $this->sequence = $sequence;
        $this->whenScreened = $whenScreened;
    }

    public function getStartTime(): DateTimeImmutable {
        return $this->whenScreened;
    }

    public function isSequence(int $sequence): bool {
        return $this->sequence === $sequence;
    }

    public function getMovieFee(): Money {
        return $this->movie->getFee();
    }

    public function reserve(Customer $customer, int $audienceCount): Reservation {
        return new Reservation($customer, $this, $this->calculateFee($audienceCount), $audienceCount);
    }

    private function calculateFee(int $audienceCount): Money {
        return $this->movie->calculateMovieFee($this)->times($audienceCount);
    }
}