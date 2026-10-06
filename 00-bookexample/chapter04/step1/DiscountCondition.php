<?php

class DiscountCondition {
    private DiscountConditionType $type;

    private int $sequence;

    private string $dayOfWeek;
    private DateTimeImmutable $startTime;
    private DateTimeImmutable $endTime;

    public function getType(): DiscountConditionType {
        return $this->type;
    }

    public function setType(DiscountConditionType $type): void {
        $this->type = $type;
    }

    public function getDayOfWeek(): string {
        return $this->dayOfWeek;
    }

    public function setDayOfWeek(string $dayOfWeek): void {
        $this->dayOfWeek = $dayOfWeek;
    }

    public function getStartTime(): DateTimeImmutable {
        return $this->startTime;
    }

    public function setStartTime(DateTimeImmutable $startTime): void {
        $this->startTime = $startTime;
    }

    public function getEndTime(): DateTimeImmutable {
        return $this->endTime;
    }

    public function setEndTime(DateTimeImmutable $endTime): void {
        $this->endTime = $endTime;
    }

    public function getSequence(): int {
        return $this->sequence;
    }

    public function setSequence(int $sequence): void {
        $this->sequence = $sequence;
    }

}