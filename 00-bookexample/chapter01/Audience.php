<?php

//관람객 클래스
class Audience {
    private Bag $bag;

    public function __construct(Bag $bag) {
        $this->bag = $bag;
    }

    public function getBag(): Bag {
        return $this->bag;
    }
}