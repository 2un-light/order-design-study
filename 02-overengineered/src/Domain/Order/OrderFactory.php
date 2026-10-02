<?php

declare(strict_types=1);

namespace Overengineered\Domain\Order;

class OrderFactory {
    public function create(
        int $orderId,
        array $request,
        int $subtotal,
        int $discountAmount,
        int $shippingFee,
        int $finalPrice,
        string $paymentStatus,
    ): Order {
        return new Order(
            orderId: $orderId,
            productName:$request['productName'],
            unitPrice: $request['unitPrice'],
            quantity: $request['quantity'],
            memberType: $request['memberType'],
            subtotal: $subtotal,
            discountAmount:$discountAmount,
            shippingFee: $shippingFee,
            finalPrice: $finalPrice,
            paymentType: $request['paymentType'],
            paymentStatus: $paymentStatus,
        );
    }
}