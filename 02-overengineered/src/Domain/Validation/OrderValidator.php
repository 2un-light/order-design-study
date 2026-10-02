<?php

declare(strict_types=1);

namespace Overengineered\Domain\Validation;

use InvalidArgumentException;
use Override;

class OrderValidator implements OrderValidatorInterface {

    public function validate(array $request): void {
       if(empty($request['productName'])) {
            throw new InvalidArgumentException('상품명은 필수입니다.');
       }

       if(!isset($request['unitPrice']) || $request['unitPrice'] <= 0) {
            throw new InvalidArgumentException('상품 가격은 0보다 커야 합니다.');
       }

       if(!isset($request['quantity']) || $request['quantity'] <= 0) {
            throw new InvalidArgumentException('수량은 0보다 커야 합니다.');
       }

       if(empty($request['memberType'])) {
            throw new InvalidArgumentException('회원 등급은 필수입니다.');
       }

       if(empty($request['paymentType'])) {
            throw new InvalidArgumentException('결제 방식은 필수입니다.');
       }
    }
}