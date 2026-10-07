<?php

namespace Chapter11\Shared;

final class Call {
    public function __construct(private int $durationMinutes, private int $startHour) {}

    public function getDurationMinutes(): int {
        return $this->durationMinutes;
    }

    public function isNight(): bool {
        return $this->startHour >= 22 || $this->startHour < 6;
    }
}