<?php

//티켓 클래스
class Ticket {
    private int $fee;

    public function getFee(): int {
        return $this->fee;
    }
}