<?php

class Screening {
    private Movie $movie;
    private int $sequence;
    private DateTimeImmutable $whenScreened;

    public function getMovie(): Movie {
        return $this->movie;
    }

    public function setMoview(Movie $movie): void {
        $this->movie = $movie;
    }

    public function getWhenScreened(): DateTimeImmutable{
        return $this->whenScreened;
    }

    public function setWhenScreened(DateTimeImmutable $whenScreened): void {
        $this->whenScreened = $whenScreened;
    }

    public function getSequence(): int {
        return $this->sequence;
    }

    public function setSequence(int $sequence): void {
        $this->sequence = $sequence;
    }
}