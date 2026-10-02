<?php

declare(strict_types=1);

namespace Overengineered\Domain\Id;

class SequentialOrderIdGenerator implements OrderIdGeneratorInterface {
    private int $currentId = 0;

    public function nextId(): int {
        return ++$this->currentId;
    }
}