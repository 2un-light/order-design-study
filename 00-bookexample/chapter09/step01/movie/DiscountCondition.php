<?php

namespace Chapter09\Movie;

use Chapter09\Movie\Screening;

interface DiscountCondition {
    public function isSatisfiedBy(Screening $screening): bool;
}