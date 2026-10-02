<?php

class Theater {
    private TicketSeller $ticketSeller;

    public function __construct(TicketSeller $ticketSeller) {
        $this->ticketSeller = $ticketSeller;
    }

    public function enter(Audience $audience): void {
        if($audience->getBag()->hasInvitation()) {
            $ticket = $this->ticketSeller->getTicketOffice()->getTicket();
            $audience->getBag()->setTicket($ticket);
        }else {
            $ticket = $this->ticketSeller->getTicketOffice()->getTicket();
            $audience->getBag()->minusAmount($ticket->getFee());
            $this->ticketSeller->getTicketOffice()->plusAmount($ticket->getFee());
            $audience->getBag()->setTicket($ticket);
        }
    }
}