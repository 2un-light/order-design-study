<?php

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

    public function getCustomer(): Customer {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): void {
        $this->customer = $customer;
    }

    public function getScreening(): Screening {
        return $this->screening;
    }

    public function setScreening(Screening $screening): void {
        $this->screening = $screening;
    }

    public function getFee(): Money {
        return $this->fee;
    }

    public function setFee(Money $fee): void {
        $this->fee = $fee;
    }

    public function getAudienceCount(): int {
        return $this->audienceCount;
    }

    public function setAudienceCount(int $audienceCount): void {
        $this->audienceCount = $audienceCount;
    }
}