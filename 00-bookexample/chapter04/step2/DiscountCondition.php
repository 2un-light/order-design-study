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

    public function isDiscountable(...$args): bool {
        if(count($args) === 2) {
            $dayOfWeek = $args[0];
            $time = $args[1];

            if($this->type !== DiscountConditionType::PERIOD) {
                throw new InvalidArgumentException();
            }

            return $this->dayOfWeek === $dayOfWeek &&
            $this->startTime <= $time &&
            $this->endTime >= $time;
        }

        $sequence = $args[0];

        if($this->type !== DiscountConditionType::SEQUENCE) {
            throw new InvalidArgumentException();
        }

        return $this->sequence === $sequence;
        
    }


}