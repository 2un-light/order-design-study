<?php

namespace Chapter11\Composition;

use Chapter11\Composition\Phone;
use Chapter11\Shared\Money;

interface RatePolicy {
    public function calculateFee(Phone $phone): Money;
}