<?php

namespace App\Utilities;

class NumbersManipulator
{
    /**
     * @param $percentage
     * @param $number
     * @return float|int
     */
    public function percentage($percentage, $number)
    {
        return ($percentage / 100) * $number;
    }

    /**
     * @param $number
     * @return bool
     */
    public function is_negative($number): bool
    {
        if ($number > 0) {
            return false;
        }
        if($number == 0) {
            return false;
        }
        if($number < 0) {
            return true;
        }
    }
}
