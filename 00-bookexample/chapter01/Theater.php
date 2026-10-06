<?php

class Theater {
    private TicketSeller $ticketSeller;

    public function enter(Audience $audience): void {
        $this->ticketSeller->sellTo($audience);
    }

}