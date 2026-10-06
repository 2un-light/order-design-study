<?php

class Movie {
    private string $title; //제목
    private int $runnigTime; //상영 시간
    private Money $fee; //기본 요금
    private DiscountCondition $discountConditions; //할인조건 목록

    private MovieType $movieType;
    private Money $discountAmount; //할인 금액
    private float $discountPercent; //할인 비율

    public function getMovieType(): MovieType {
        return $this->movieType;
    }

    //금액 할인 계산
    public function calculateAmountDiscountedFee(): Money {
        if($this->movieType !== MovieType::AMOUNT_DISCOUNT) {
            throw new InvalidArgumentException();
        }

        return $this->fee->minus($this->discountAmount);
    }

    //비율 할인 계산
    public function calculatePercentDiscountedFee(): Money {
        if($this->movieType !== MovieType::PERCENT_DISCOUNT) {
            throw new InvalidArgumentException();
        }

        return $this->fee->minus($this->fee->times($this->discountPercent));
    }

    //할인 미적용 계산
    public function calculateNoneDiscountedFee(): Money {
        if($this->movieType !== MovieType::NONE_DISCOUNT) {
            throw new InvalidArgumentException();
        }

        return $this->fee;
    }

    //할인 여부 판단
    public function isDiscountable(DateTimeImmutable $whenScreened, int $sequence) {
        foreach($this->discountConditions as $condition) {
            if($condition->getType() === DiscountConditionType::PERIOD) {
                if($condition->isDiscountable(strtoupper($whenScreened->format('l')), $whenScreened)) {
                    return true;
                }
            }else {
                if($condition->isDiscountable($sequence)) {
                    return true;
                }
            }
        }

        return false;
    }

}