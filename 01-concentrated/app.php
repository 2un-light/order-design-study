<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Concentrated\OrderService;

$orderService = new OrderService();

$order = $orderService->order([
    'productName' => '키보드',
    'unitPrice' => 100000,
    'quantity' => 1,
    'memberType' => 'VIP',
    'paymentType' => 'CARD',
    'paymentKey' => 'TEST-CARD',
]);

echo "=== 주문 완료 ===" . PHP_EOL;
echo "주문 번호: {$order['orderId']}" . PHP_EOL;
echo "상품명: {$order['productName']}" . PHP_EOL;
echo "상품 금액: {$order['subtotal']}원" . PHP_EOL;
echo "할인 금액: {$order['discountAmount']}원" . PHP_EOL;
echo "배송비: {$order['shippingFee']}원" . PHP_EOL;
echo "최종 결제 금액: {$order['finalPrice']}원" . PHP_EOL;
echo "결제 상태: {$order['paymentStatus']}" . PHP_EOL;