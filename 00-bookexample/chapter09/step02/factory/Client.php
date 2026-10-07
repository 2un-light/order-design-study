<?php

namespace Chapter09\Factory;

use Chapter09\Money\Money;

class Client {
    private Factory $factory;

    public function __construct(Factory $factory) {
        $this->factory = $factory;
    }

    public function getAvatarFee(): Money {
        $avatar = $this->factory->createAvatarMovie();
        return $avatar->getFee();
    }
}