<?php

declare(strict_types=1);

namespace Overengineered\Domain\Validation;

interface OrderValidatorInterface {
    public function validate(array $request): void;
}