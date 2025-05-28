<?php

namespace App\Enums;

class TypeTravelEnum
{
    const PARENTS = 'parents';
    const FAMILY = 'family';
    const FRIENDS = 'friends';
    const CHILDREN = 'children';
    const SOLO = 'solo';

    public static function get(): array
    {
        return [
            self::PARENTS => 'Поездка с родителями',
            self::FAMILY => 'Поездка с семьей',
            self::FRIENDS => 'Поездка с друзьями',
            self::CHILDREN => 'Поездка с детьми',
            self::SOLO => 'Одиночная поездка',
        ];
    }
}
