<?php

declare(strict_types=1);

namespace Overengineered\Domain\Payment;

interface PaymentInterface {
    public function pay(int $amount, array $request): string;
}