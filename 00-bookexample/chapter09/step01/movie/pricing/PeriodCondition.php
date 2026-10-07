<?php

use Chapter09\Movie\DiscountCondition;
use Chapter09\Movie\Screening;

class PeriodCondition implements DiscountCondition{
    private string $dayOfWeek;
    private DateTimeImmutable $startTime;
    private DateTimeImmutable $endTime;

    public function __construct(string $dayOfWeek, DateTimeImmutable $startTime, DateTimeImmutable $endTIme) {
        $this->dayOfWeek = $dayOfWeek;
        $this->startTime = $startTime;
        $this->endTime = $endTIme;
    }

    public function isSatisfiedBy(Screening $screening): bool {
        return strtoupper($screening->getStartTime()->format('l')) === $this->dayOfWeek &&
            $this->startTime->format('H:i:s') <= $screening->getStartTime()->format('H:i:s') &&
            $this->endTime->format('H:i:s') >= $screening->getStartTime()->format('H:i:s');
    }
}