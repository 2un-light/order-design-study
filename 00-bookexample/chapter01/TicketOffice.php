<?php

//매표소 클래스
class TicketOffice {
    private int $amount; //판매 금액

    /** @var Ticket[] */
    private array $tickets = []; //판매하거나 교환해줄 티켓 목록

    public function sellTicketTo(Audience $audience): void {
        $this->plusAmount($audience->buy($this->getTicket()));
    }


    private function getTicket(): ?Ticket {
        return array_shift($this->tickets);
    }

    private function plusAmount(int $amount): void {
        $this->amount += $amount;
    }

}