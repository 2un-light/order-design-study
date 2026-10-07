<?php 

declare(strict_types=1);

use Flexible\Application\OrderService;
use Flexible\Domain\Discount\NoDiscountPolicy;
use Flexible\Domain\Discount\RateDiscountPolicy;
use Flexible\Domain\Payment\CardPayment;
use Flexible\Domain\Shipping\ThresholdShippingPolicy;
use Flexible\Infrastructure\Repository\InMemoryOrderRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$orderService = new OrderService(
    //할인 정책
    discountPolicies: [
        'NORMAL' => new NoDiscountPolicy(),
        'VIP' => new RateDiscountPolicy(0.1),
    ],

    //배송비 정책
    shippingPolicy: new ThresholdShippingPolicy(
        freeShippingThreshold: 50000,
        shippingFee: 3000
    ),

    paymentMethods: [
        'CARD' => new CardPayment(),
    ],

    orderRepository: new InMemoryOrderRepository(),

);

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