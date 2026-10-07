<?php

namespace Chapter09\Movie;

class Customer {
    private string $name;
    private string $id;

    public function __construct(string $name, string $id) {
        $this->id = $id;
        $this->name = $name;
    }
}