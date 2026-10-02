<?php

declare(strict_types=1);

namespace Overengineered\Application;

use Overengineered\Domain\Discount\DiscountPolicyFactory;
use Overengineered\Domain\Id\OrderIdGeneratorInterface;
use Overengineered\Domain\Order\OrderFactory;
use Overengineered\Domain\Payment\PaymentFactory;
use Overengineered\Domain\Repository\OrderRepositoryInterface;
use Overengineered\Domain\Shipping\ShippingPolicyInterface;
use Overengineered\Domain\Validation\OrderValidatorInterface;

class OrderService {
    public function __construct(
        private readonly OrderValidatorInterface $validator,
        private readonly DiscountPolicyFactory $discountPolicyFactory,
        private readonly ShippingPolicyInterface $shippingPolicy,
        private readonly PaymentFactory $paymentFactory,
        private readonly OrderRepositoryInterface $orderRepository,
        private readonly OrderIdGeneratorInterface $orderIdGenerator,
        private readonly OrderFactory $orderFactory,
    )
    {}

    public function order(array $request): array {
        //검증
        $this->validator->validate($request);
        
        //가격 계산
        $subtotal = $request['unitPrice'] * $request['quantity'];

        //할인 정책 (Normal: 0원, VIP: 10% 할인)
        $discountPolicy = $this->discountPolicyFactory->create($request['memberType']);

        //할인 금액
        $discountAmount = $discountPolicy->calculate($subtotal);

        //할인된 금액
        $discountedPrice = $subtotal - $discountAmount;

        //배송비 (50000원 이하 3000원, 50000원 이상 무료)
        $shippingFee = $this->shippingPolicy->calculate($discountedPrice);

        //총 가격
        $finalPrice = $discountedPrice + $shippingFee;

        //결제 수단
        $payment = $this->paymentFactory->create($request['paymentType']);

        //결제
        $paymentStatus = $payment->pay($finalPrice, $request);

        //주문 생성
        $order = $this->orderFactory->create(
            orderId: $this->orderIdGenerator->nextId(),
            request: $request,
            subtotal: $subtotal,
            discountAmount: $discountAmount,
            shippingFee: $shippingFee,
            finalPrice: $finalPrice,
            paymentStatus: $paymentStatus,
        );

        //배열에 주문 저장
        $this->orderRepository->save($order);

        return $order->toArray();
    }
}