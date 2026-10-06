<?php

class ReservationAgency {

    public function reserve(Screening $screening, Customer $customer, int $audienceCount): Reservation {
        $movie = $screening->getMovie();

        $discountable = false;
        //할인 가능 여부 확인
        foreach($movie->getDiscountConditions() as $condition) {
            if($condition->getType() === DiscountConditionType::PERIOD) {
                $discountable = 
                    strtoupper($screening->getWhenScreened()->format('l')) === $condition->getDayOfWeek() &&
                    $condition->getStartTime()->format('H:i:s') <= $screening->getWhenScreened()->format('H:i:s') &&
                    $condition->getEndTime()->format('H:i:s') >= $screening->getWhenScreened()->format('H:i:s');
            }else {
                $discountable = 
                    $condition->getSequence() === $screening->getSequence();
            }

            if($discountable) {
                break;
            }
        }

        $fee = null;

        //할인 정책에 따라 요금 계산
        if($discountable) {
            $discountAmount = Money::zero();

            switch($movie->getMovieType()) {
                case MovieType::AMOUNT_DISCOUNT:
                    $discountAmount = $movie->getDiscountAmount();
                    break;
                
                case MovieType::PERCENT_DISCOUNT:
                    $discountAmount = $movie->getFee()->times($movie->getDiscountPercnet());
                    break;
                    
                case MovieType::NONE_DISCOUNT:
                    $discountAmount = Money::zero();
                    break;
            }

            $fee = $movie->getFee()->minus($discountAmount)->times($audienceCount);
        }else {
            $fee = $movie->getFee()->times($audienceCount);
        }

        return new Reservation(
            $customer,
            $screening,
            $fee,
            $audienceCount,
        );
    }
}