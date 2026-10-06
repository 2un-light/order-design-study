<?php

namespace Chapter08\Movie;

use Chapter08\Movie\Screening;

interface DiscountCondition {
    public function isSatisfiedBy(Screening $screening): bool;
}