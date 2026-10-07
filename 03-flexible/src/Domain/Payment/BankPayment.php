<?php

declare(strict_types=1);

namespace Flexible\Domain\Payment;

use InvalidArgumentException;

class BankPayment implements PaymentMethod {
    public function pay(int $amount, array $request): string {
        if(empty($request['bankAccount'])) {
            throw new InvalidArgumentException('계좌이체 정보가 없습니다.');
        }

        return 'PAID';
    }
}