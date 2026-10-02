<?php

declare(strict_types=1);

namespace Overengineered\Domain\Id;

interface OrderIdGeneratorInterface {
    public function nextId(): int;
}