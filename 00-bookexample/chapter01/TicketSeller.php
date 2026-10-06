<?php

//판매원 클래스
class TicketSeller {
    private TicketOffice $ticketOffice; //매표소

    public function sellTo(Audience $audience): void {
        $this->ticketOffice->sellTicketTo($audience);
    }
}