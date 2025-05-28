<?php

namespace App\Enums;

class TariffEnum
{
    const FREE_PLAN = 'free_plan';
    const PREMIUM = 'premium';
    const CLASSIC = 'classic';
    const STARTER = 'starter';
    const FREE_ENTRY = 'free_entry';

    public static function get(): array
    {
        return [
            self::FREE_PLAN => ['Безоплатка', '#1DB003'],
            self::PREMIUM => ['Premium', '#DD5122'],
            self::CLASSIC => ['Classic', '#2272DD'],
            self::STARTER => ['Starter', '#5A6472'],
            self::FREE_ENTRY => ['Бесплатный вход', '#5A6472'],
        ];
    }
}
