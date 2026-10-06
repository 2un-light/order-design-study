<?php

class Movie {
    private string $title; //제목
    private int $runnigTime; //상영 시간
    private Money $fee; //기본 요금
    private DiscountCondition $discountConditions; //할인조건 목록

    private MovieType $movieType;
    private Money $discountAmount; //할인 금액
    private float $discountPercent; //할인 비율

    //MovieType GETTER/SETTER
    public function getMovieType(): MovieType {
        return $this->movieType;
    }

    public function setMovieType(MovieType $movieType): void {
        $this->movieType = $movieType;
    }

    //Fee GETTER/SETTER
    public function getFee(): Money {
        return $this->fee;
    }

    public function setFee(Money $fee): void {
        $this->fee = $fee;
    }

    //DiscountConditions GETTER/SETTER
    public function getDiscountConditions(): DiscountCondition {
        return $this->discountConditions;
    }

    public function setDiscountConditions(DiscountCondition $discountConditions): void {
        $this->discountConditions = $discountConditions;
    }

    //DiscountAmount GETTER/SETTER
    public function getDiscountAmount(): Money {
        return $this->discountAmount;
    }

    public function setDiscountAmount(Money $discountAmount): void {
        $this->discountAmount = $discountAmount;
    }

    //discountPercent GETTER/SETTER
    public function getDiscountPercnet(): float {
        return $this->discountPercent;
    }

    public function setDiscountPercent(float $discountPercent): void {
        $this->discountPercent = $discountPercent;
    }

}