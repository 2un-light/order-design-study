<?php

//판매원 클래스
class TicketSeller {
    private TicketOffice $ticketOffice; //매표소

    public function __construct(TicketOffice $ticketOffice) {
        $this->ticketOffice = $ticketOffice;
    }

    public function getTicketOffice(): TicketOffice {
        return $this->ticketOffice;
    }
}