<?php

declare(strict_types=1);

namespace Concentrated;

use InvalidArgumentException;

class OrderService {
    private array $orders = [];

    public function order(array $request): array {
        //입력값 검증
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

        //상품 금액 계산
        $subtotal = $request['unitPrice'] * $request['quantity'];

        //회원 등급별 할인 계산
        if($request['memberType'] === 'NORMAL') {
            $discountRate = 0;
        }elseif($request['memberType'] === 'VIP') { //VIP는 10% 할인
            $discountRate = 0.1;
        }else {
            throw new InvalidArgumentException(('지원하지 않는 회원 등급입니다.'));
        }

        $discountAmount = (int) ($subtotal * $discountRate);
        $discountedPrice = $subtotal - $discountAmount;

        //배송비 계산
        if($discountedPrice >= 50000) {
            $shippingFee = 0;
        } else {
            $shippingFee = 3000;
        }

        $finalPrice = $discountedPrice + $shippingFee;

        //결제 처리
        if($request['paymentType'] === 'CARD') {
            if(empty($request['paymentKey'])) {
                throw new InvalidArgumentException(('카드 결제 정보가 없습니다.'));
            }

            //결제 성공
            $paymentStatus = 'PAID';
        }else {
            throw new InvalidArgumentException('지원하지 않는 결제 방식입니다.');
        }

        $order = [
            'orderId' => count($this->orders) + 1,
            'productName' => $request['productName'],
            'unitPrice' => $request['unitPrice'],
            'quantity' => $request['quantity'],
            'memberType' => $request['memberType'],
            'subtotal' => $subtotal,
            'discountAmount' => $discountAmount,
            'shippingFee' => $shippingFee,
            'finalPrice' => $finalPrice,
            'paymentType' => $request['paymentType'],
            'paymentStatus' => $paymentStatus,
        ];

        //주문 저장
        $this->orders[] = $order;

        return $order;
    }

    public function getOrders(): array {
        return $this->orders;
    }
}