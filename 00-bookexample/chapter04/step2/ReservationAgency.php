<?php

class ReservationAgency {

    public function reserve(Screening $screening, Customer $customer, int $audienceCount): Reservation {
        $fee = $screening->calculateFee($audienceCount);
        return new Reservation($customer, $screening, $fee, $audienceCount);
    }
    
}