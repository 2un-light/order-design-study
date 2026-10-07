<?php

declare(strict_types=1);

namespace Flexible\Domain\Order;

class Order {

    public function __construct(
        private readonly int $orderId,
        private readonly string $productName,
        private readonly int $unitPrice,
        private readonly int $quantity,
        private readonly string $memberType,
        private readonly int $subtotal,
        private readonly int $discountAmount,
        private readonly int $shippingFee,
        private readonly int $finalPrice,
        private readonly string $paymentType,
        private readonly string $paymentStatus,
    ){}

    public function toArray(): array {
        return [
            'orderId' => $this->orderId,
            'productName' => $this->productName,
            'unitPrice' => $this->unitPrice,
            'quantity' => $this->quantity,
            'memberType' => $this->memberType,
            'subtotal' => $this->subtotal,
            'discountAmount' => $this->discountAmount,
            'shippingFee' => $this->shippingFee,
            'finalPrice' => $this->finalPrice,
            'paymentType' => $this->paymentType,
            'paymentStatus' => $this->paymentStatus,
        ];
    }
    
}