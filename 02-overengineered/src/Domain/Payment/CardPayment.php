<?php

declare(strict_types=1);

namespace Overengineered\Domain\Payment;

use InvalidArgumentException;
use Overengineered\Domain\Payment\PaymentInterface;

class CardPayment implements PaymentInterface {
    public function pay(int $amount, array $request): string {
        if(empty($request['paymentKey'])) {
            throw new InvalidArgumentException('카드 결제 정보가 없습니다.');
        }

        return 'PAID';
    }
}