<?php

namespace Flexible\Application;

use Flexible\Domain\Order\Order;
use Flexible\Domain\Repository\OrderRepository;
use Flexible\Domain\Shipping\ShippingPolicy;
use InvalidArgumentException;

class OrderService {
    private array $orders = [];
    private int $nextOrderId = 1;

    /**
     * @param array<string, DiscountPolicy> $discountPolicies
     * @param array<string, PaymentMethod> $paymentMethods
     */
    public function __construct(
        private readonly array $discountPolicies,
        private readonly ShippingPolicy $shippingPolicy,
        private readonly array $paymentMethods,
        private readonly OrderRepository $orderRepository,
    ) {}

    public function order(array $request): array {
        //입력값 검증
        $this->validate($request);

        //상품 금액 계산
        $subtotal = $request['unitPrice'] * $request['quantity'];

        //등급별 할인 정책
        $discountPolicy = $this->discountPolicies[$request['memberType']] ?? throw new InvalidArgumentException('지원하지 않는 회원 등급 입니다.');

        //할인 가격
        $discountAmount = $discountPolicy->calculate($subtotal);

        //총 가격
        $discountedPrice = $subtotal - $discountAmount;

        //배송비
        $shippingFee = $this->shippingPolicy->calculate($discountedPrice);

        $finalPrice = $discountedPrice + $shippingFee;

        //결제
        $payment = $this->paymentMethods[$request['paymentType']] ?? throw new InvalidArgumentException('지원하지 않는 결제 방식입니다.');

        $paymentStatus = $payment->pay($finalPrice, $request);

        $order = new Order(
            orderId: $this->nextOrderId++,
            productName: $request['productName'],
            unitPrice: $request['unitPrice'],
            quantity: $request['quantity'],
            memberType: $request['memberType'],
            subtotal: $subtotal,
            discountAmount: $discountAmount,
            shippingFee: $shippingFee,
            finalPrice: $finalPrice,
            paymentType: $request['paymentType'],
            paymentStatus: $paymentStatus,
        );

        $this->orderRepository->save($order);

        return $order->toArray();
    }

    public function getOrders(): array {
        return $this->orders;
    }

    //입력값 검증
    private function validate(array $request): void {
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