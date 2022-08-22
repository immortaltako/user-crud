<?php

namespace App\Http\Helpers;


class PersonsHelper
{
    public static function getAge($dob) {
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dob), date_create($today));

        return $diff->format('%y');
    }

    public static function getSign(string $dob):string {
        $zodiac = '';

        list ($year, $month, $day) = explode ('-', $dob);

        if ( ( $month == 3 && $day > 20 ) || ( $month == 4 && $day < 20 ) ) { $zodiac = "Aries"; }
        elseif ( ( $month == 4 && $day > 19 ) || ( $month == 5 && $day < 21 ) ) { $zodiac = "Taurus"; }
        elseif ( ( $month == 5 && $day > 20 ) || ( $month == 6 && $day < 21 ) ) { $zodiac = "Gemini"; }
        elseif ( ( $month == 6 && $day > 20 ) || ( $month == 7 && $day < 23 ) ) { $zodiac = "Cancer"; }
        elseif ( ( $month == 7 && $day > 22 ) || ( $month == 8 && $day < 23 ) ) { $zodiac = "Leo"; }
        elseif ( ( $month == 8 && $day > 22 ) || ( $month == 9 && $day < 23 ) ) { $zodiac = "Virgo"; }
        elseif ( ( $month == 9 && $day > 22 ) || ( $month == 10 && $day < 23 ) ) { $zodiac = "Libra"; }
        elseif ( ( $month == 10 && $day > 22 ) || ( $month == 11 && $day < 22 ) ) { $zodiac = "Scorpio"; }
        elseif ( ( $month == 11 && $day > 21 ) || ( $month == 12 && $day < 22 ) ) { $zodiac = "Sagittarius"; }
        elseif ( ( $month == 12 && $day > 21 ) || ( $month == 1 && $day < 20 ) ) { $zodiac = "Capricorn"; }
        elseif ( ( $month == 1 && $day > 19 ) || ( $month == 2 && $day < 19 ) ) { $zodiac = "Aquarius"; }
        elseif ( ( $month == 2 && $day > 18 ) || ( $month == 3 && $day < 21 ) ) { $zodiac = "Pisces"; }

        return $zodiac;
    }

    public static function getActivities() {
        return [
            'baseball' => ['title' => 'Baseball', 'icon' => 'baseball'],
            'basketball' => ['title' => 'Basketball', 'icon' => 'basketball-ball'],
            'bowling' => ['title' => 'Bowling', 'icon' => 'bowling-ball'],
            'exercise' => ['title' => 'Exercise', 'icon' => 'dumbbell'],
            'football' => ['title' => 'Football', 'icon' => 'football-ball'],
            'soccer' => ['title' => 'Soccer', 'icon' => 'futbol'],
            'golf' => ['title' => 'Golf', 'icon' => 'golf-ball'],
            'hockey' => ['title' => 'Hockey', 'icon' => 'hockey-puck'],
            'quidditch' => ['title' => 'Quidditch', 'icon' => 'quidditch'],
            'skating' => ['title' => 'Ice Skating', 'icon' => 'skating'],
            'skiing' => ['title' => 'Skiing', 'icon' => 'skiing'],
            'skiing-nordic' => ['title' => 'Nordic Skiing', 'icon' => 'skiing-nordic'],
            'snowboarding' => ['title' => 'Snowboarding', 'icon' => 'snowboarding'],
            'table-tennis' => ['title' => 'Ping Pong', 'icon' => 'table-tennis'],
            'volleyball' => ['title' => 'Volleyball', 'icon' => 'volleyball-ball'],
        ];
    }

    public static function getActivityIcon($activity) {
        $activities = self::getActivities();

        if (isset($activities[$activity])) {
            return $activities[$activity]['icon'];
        } else {
            return 'question';
        }
    }

    public static function getActivityTitle($activity) {
        $activities = self::getActivities();

        if (isset($activities[$activity])) {
            return $activities[$activity]['title'];
        } else {
            return 'Unknown';
        }
    }
}
