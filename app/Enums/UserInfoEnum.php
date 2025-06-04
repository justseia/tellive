<?php

namespace App\Enums;

class UserInfoEnum
{
    const STANDARD_WORK = 'standard_work';
    const STANDARD_DIRECTION = 'standard_direction';
    const STANDARD_PEOPLE = 'standard_people';

    const SUPPORT = 'support';
    const COUNTRY = 'country';
    const CRUISE = 'cruise';
    const YEAR = 'year';

    public static function get($value): array
    {
        return [
            self::STANDARD_WORK => 'Работаем с ' . $value . ' года',
            self::STANDARD_DIRECTION => 'Направлений - ' . $value . ' стран',
            self::STANDARD_PEOPLE => 'Участников - ' . $value . ' млн',

            self::SUPPORT => 'Поддержала ' . $value . '+ людей',
            self::COUNTRY => 'Посетила ' . $value . ' стран',
            self::CRUISE => 'Побывала в ' . $value . ' круизах',
            self::YEAR => 'Работаю с ' . $value . ' года',
        ];
    }
}
