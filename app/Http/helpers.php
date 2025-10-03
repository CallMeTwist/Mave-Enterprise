<?php

/**
 * This is my custom helper function
 * Laravel keeps resetting it's global helper file
 * So I opened a new file of my own, damn you Laravel!
 */

use App\Models\Setting;
use App\Utilities\Accent;
use App\Utilities\DateManipulator;
use App\Utilities\Multitexter;
use App\Utilities\NumbersManipulator;
use App\Utilities\RandomGenerator;
use App\Utilities\Shopping;
use App\Utilities\StringModifier;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Optional;

if (! function_exists('number_manipulator')) {
    /**
     * @return NumbersManipulator
     */
    function number_manipulator(): NumbersManipulator
    {
        return new NumbersManipulator();
    }
}

if (! function_exists('discount')) {
    /**
     * @param $price
     * @param $percentage
     * @return float|int|string
     */
    function discount($price, $percentage)
    {
        return Shopping::discount($price, $percentage);
    }
}

if (! function_exists('percentage')) {
    /**
     * @param $percentage
     * @param $number
     * @return float|int
     */
    function percentage($percentage, $number)
    {
        return NumbersManipulator::percentage($percentage, $number);
    }
}

if (! function_exists('generate_random_string')) {
    /**
     * @param $length
     * @return string
     * @throws Exception
     */
    function generate_random_string($length)
    {
        return RandomGenerator::generate_random_string($length);
    }
}

if (! function_exists('generate_unique_uuid')) {
    /**
     * @return mixed
     */
    function generate_unique_uuid()
    {
        return RandomGenerator::generate_unique_uuid();
    }
}

if (! function_exists('generate_random_numbers')) {
    /**
     * @param $length
     * @return string
     */
    function generate_random_numbers($length)
    {
        return RandomGenerator::generate_random_numbers($length);
    }
}

if (! function_exists('time_ago')) {
    /**
     * @param $date
     * @return string
     */
    function time_ago($date)
    {
        return DateManipulator::time_ago($date);
    }
}

if (! function_exists('get_working_days_from_count')) {
    /**
     * @param $currentDate
     * @param $numBusDays
     * @param array $holidays
     * @param array $resultDates
     * @return array|mixed
     */
    function get_working_days_from_count($currentDate, $numBusDays, $holidays = array(), $resultDates = array())
    {
        return (new DateManipulator())->getWorkingDaysFromCount($currentDate, $numBusDays, $holidays = array(), $resultDates = array());
    }
}

if (! function_exists('date_percent_diff')) {
    /**
     * @param $date1
     * @param $date2
     * @return float|int
     */
    function date_percent_diff($date1, $date2)
    {
        return DateManipulator::date_percent_diff($date1, $date2);
    }
}

if (! function_exists('get_working_days')) {
    /**
     * @param $date1
     * @param $date2
     * @return int
     */
    function get_working_days($date1, $date2)
    {
        return DateManipulator::getWorkingDays($date1, $date2);
    }
}

if (! function_exists('list_working_days')) {
    /**
     * @param $date
     * @return array
     */
    function list_working_days($date)
    {
        return DateManipulator::listWorkingDays($date);
    }
}

if (! function_exists('get_working_days_from_range')) {
    /**
     * @param $start
     * @param $end
     * @return mixed
     */
    function get_working_days_from_range($start, $end)
    {
        return DateManipulator::getWorkingDaysFromRange($start, $end);
    }
}

if (! function_exists('get_date_from_range')) {
    /**
     * @param $date1
     * @param $date2
     * @return array
     */
    function get_date_from_range($date1, $date2)
    {
        return DateManipulator::getDatesFromRange($date1, $date2);
    }
}

if (! function_exists('time_left')) {
    /**
     * @param $date
     * @return mixed
     */
    function time_left($date)
    {
        return DateManipulator::time_remaining($date);
    }
}

if (! function_exists('age')) {
    /**
     * @param $date
     * @return int
     */
    function age($date)
    {
        return DateManipulator::age($date);
    }
}

if (! function_exists('get_age')) {
    /**
     * @param $date
     * @return false|int|string
     */
    function get_age($date)
    {
        return DateManipulator::get_age($date);
    }
}

if (! function_exists('remove_accent')) {
    /**
     * @param $string
     * @return mixed
     */
    function remove_accent($string)
    {
        return Accent::remove_accent($string);
    }
}

if (! function_exists('ellipsis')) {
    /**
     * @param $string
     * @param $length
     * @return string
     */
    function ellipsis($string, $length)
    {
        return StringModifier::ellipsis($string, $length);
    }
}

if (! function_exists('abbreviate')) {
    /**
     * @param $string
     * @return string
     */
    function abbreviate($string)
    {
        return StringModifier::abbreviate($string);
    }
}

if (! function_exists('get_guard')) {
    /**
     * @return mixed
     */
    function get_guard()
    {
        $guard = auth()->guard();

        $sessionName = $guard->getName();

        $parts = explode('_', $sessionName);

        unset($parts[count($parts) -1]);

        unset($parts[0]);

        $guardName = implode('_', $parts);

        return $guardName;
    }
}

if (! function_exists('slug_reverse')) {
    /**
     * @param $string
     * @return string
     */
    function slug_reverse($string)
    {
        return title_case(str_replace('-', ' ', $string));
    }
}

if (! function_exists('me')) {
    /**
     * @return Authenticatable|null
     */
    function me()
    {
        return auth()->user();
    }
}

if (! function_exists('generate_unique_code')) {
    /**
     * @return string
     * @throws Exception
     */
    function generate_unique_code($model, $length, $type)
    {
        return RandomGenerator::generate_unique_code($model, $length, $type);
    }
}

if (! function_exists('generate_unique_uuid')) {
    /**
     * @return string
     */
    function generate_unique_uuid()
    {
        return RandomGenerator::generate_unique_uuid();
    }
}

if (! function_exists('get_settings')) {
    /**
     * @return mixed
     */
    function get_settings()
    {
        return optional(Setting::first());
    }
}

if (! function_exists('get_currency')) {
    /**
     * @return mixed
     */
    function get_currency(): mixed
    {
        return config('currency')[get_settings()->currency];
    }
}

if (! function_exists('send_sms')) {
    /**
     * @return Multitexter
     */
    function sms()
    {
        return new Multitexter();
    }
}

if (! function_exists('upload_path')) {
    /**
     * @return string
     */
    function upload_path(): string
    {
        return '/uploads';
    }
}

if (! function_exists('get_legals')) {
    /**
     * @return Optional|mixed
     */
    function get_legals()
    {
        return optional(Legal::first());
    }
}

//if (!function_exists('urlWithAnchor')) {
//    function urlWithAnchor($anchor)
//    {
//        return url('/')."#".$anchor;
//    }
//}
