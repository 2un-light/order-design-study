<?php

namespace Chapter11\Inheritance;

use Chapter11\Shared\Money;

class TaxableRegularPhone extends RegularPhone {
    public function __construct(Money $amountPerMinute, private float $taxRate)
    {
        return parent::__construct($amountPerMinute);
    }

    public function calculateFee(): Money {
        $fee = parent::calculateFee();
        return $fee->plus($fee->times($this->taxRate));
    }

    
}