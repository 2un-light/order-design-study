<?php

namespace Chapter09\Locator;

use Chapter09\Movie\DiscountPolicy;

class ServiceLocator {
    private static ?ServiceLocator $soleInstance = null;

    private ?DiscountPolicy $discountPolicy = null;

    public static function discountPolicy(): DiscountPolicy {
        return self::instance()->discountPolicy;
    }

    public static function provide(DiscountPolicy $discountPolicy): void {
        self::instance()->discountPolicy = $discountPolicy;
    }

    private static function instance(): ServiceLocator {
        if(self::$soleInstance === null) {
            self::$soleInstance = new ServiceLocator();
        }
        return self::$soleInstance;
    }

    private function __construct(){}
}