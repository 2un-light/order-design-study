<?php

declare(strict_types=1);

namespace Flexible\Domain\Payment;

interface PaymentMethod {
    public function pay(int $amount, array $request): string;
}