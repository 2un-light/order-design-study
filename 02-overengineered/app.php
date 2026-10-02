<?php

declare(strict_types=1);

use Overengineered\Application\OrderService;
use Overengineered\Domain\Discount\DiscountPolicyFactory;
use Overengineered\Domain\Id\SequentialOrderIdGenerator;
use Overengineered\Domain\Order\OrderFactory;
use Overengineered\Domain\Payment\PaymentFactory;
use Overengineered\Domain\Shipping\DefaultShippingPolicy;
use Overengineered\Domain\Validation\OrderValidator;
use Overengineered\Infrastructure\Repository\InMemoryOrderRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$orderService = new OrderService(
    validator: new OrderValidator(),
    discountPolicyFactory: new DiscountPolicyFactory(),
    shippingPolicy: new DefaultShippingPolicy(),
    paymentFactory: new PaymentFactory(),
    orderRepository: new InMemoryOrderRepository(),
    orderIdGenerator: new SequentialOrderIdGenerator(),
    orderFactory: new OrderFactory(),
);

$order = $orderService->order([
    'productName' => '키보드',
    'unitPrice'=> 100000,
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