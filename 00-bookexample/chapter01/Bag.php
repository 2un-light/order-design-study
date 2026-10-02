<?php

//가방 클래스
class Bag {
    private int $amount; //현금
    private Invitation $invitation; //초대장
    private Ticket $ticket; //티켓

    public function __construct(int $amount, ?Invitation $invitation){
        $this->amount = $amount;
        $this->invitation = $invitation;
    }

    public function hasInvitation(): bool {
        return $this->invitation != null;
    }

    public function hasTicket(): bool {
        return $this->ticket != null;
    }

    public function setTicket(Ticket $ticket): void {
        $this->ticket = $ticket;
    }

    public function minusAmount(int $amount): void {
        $this->amount -= $amount;
    }

    public function plusAmount(int $amount): void {
        $this->amount += $amount;
    }
}