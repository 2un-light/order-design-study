<?php

declare(strict_types=1);

namespace Overengineered\Domain\Discount;

use InvalidArgumentException;

class DiscountPolicyFactory {
    public function create(string $memberType): DiscountPolicyInterface {
        return match ($memberType) {
            'NORMAL' => new NormalDiscountPolicy(),
            'VIP' => new VipDiscountPolicy(),
            default => throw new InvalidArgumentException(
                '지원하지 않는 회원 등급입니다.'
            ),
        };
    }
}