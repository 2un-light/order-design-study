<?php

//가방 클래스
class Bag {
    private int $amount; //현금
    private Invitation $invitation; //초대장
    private Ticket $ticket; //티켓

    public function hold(Ticket $ticket): int {
        if($this->hasInvitation()) {
            $this->setTicket($ticket);
            return 0;
        }else {
            $this->setTicket($ticket);
            $this->minusAmount($ticket->getFee());
            return $ticket->getFee();
        }
    }

    private function hasInvitation(): bool {
        return $this->invitation != null;
    }

    private function setTicket(Ticket $ticket): void {
        $this->ticket = $ticket;
    }

    private function minusAmount(int $amount): void {
        $this->amount -= $amount;
    }
}