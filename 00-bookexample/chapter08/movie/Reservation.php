<?php

namespace Chapter08\Movie;

use Chapter08\Money\Money;
use Chapter08\Movie\Customer;
use Chapter08\Movie\Screening;

class Reservation {
    private Customer $customer;
    private Screening $screening;
    private Money $fee;
    private int $audienceCount;

    public function __construct(Customer $customer, Screening $screening, Money $fee, int $audienceCount) {
        $this->customer = $customer;
        $this->screening = $screening;
        $this->fee = $fee;
        $this->audienceCount = $audienceCount;
    }
}