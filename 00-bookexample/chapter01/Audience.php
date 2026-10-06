<?php

//관람객 클래스
class Audience {
    private Bag $bag;

    public function buy(Ticket $ticket): int {
        return $this->bag->hold($ticket);
    }
}