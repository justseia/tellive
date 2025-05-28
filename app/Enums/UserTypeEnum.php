<?php

namespace App\Enums;

class UserTypeEnum
{
    const NEW_CLIENT = 'new_client';
    const PARTNER = 'partner';
    const CRUISER = 'cruiser';
    const POTENTIAL_CLIENT = 'potential_client';
    const DECLINED = 'declined';

    public static function get(): array
    {
        return [
            self::NEW_CLIENT => 'Новый клиент',
            self::PARTNER => 'Партнер',
            self::CRUISER => 'Круизер',
            self::POTENTIAL_CLIENT => 'Потенциальный клиент',
            self::DECLINED => 'Отказ',
        ];
    }
}
