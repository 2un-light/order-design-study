<?php

declare(strict_types=1);

namespace Overengineered\Domain\Payment;

use InvalidArgumentException;

class PaymentFactory {
    public function create(string $paymentType): PaymentInterface {
        return match($paymentType) {
            'CARD' => new CardPayment(),
            default => throw new InvalidArgumentException('지원하지 않는 결제 방식입니다.'),
        };
    }
}