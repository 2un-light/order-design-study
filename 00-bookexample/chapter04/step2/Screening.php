<?php

class Screening {
    private Movie $movie;
    private int $sequence;
    private DateTimeImmutable $whenScreened;

    public function __construct(Movie $movie, int $sequence, DateTimeImmutable $whenScreened) {
        $this->movie = $movie;
        $this->sequence = $sequence;
        $this->whenScreened = $whenScreened;
    }

    public function calculateFee(int $audienceCount): Money {
        switch($this->movie->getMovieType()) {
            case MovieType::AMOUNT_DISCOUNT:
                if($this->movie->isDiscountable($this->whenScreened, $this->sequence)) {
                    return $this->movie->calculateAmountDiscountedFee()->times($audienceCount);
                }
                break;
            case MovieType::PERCENT_DISCOUNT:
                if($this->movie->isDiscountable($this->whenScreened, $this->sequence)){
                    return $this->movie->calculatePercentDiscountedFee()->times($audienceCount);
                }
                break;
            case MovieType::NONE_DISCOUNT:
                return $this->movie->calculateNoneDiscountedFee()->times($audienceCount);
        }

        return $this->movie->calculateNoneDiscountedFee()->times($audienceCount);
    }
}