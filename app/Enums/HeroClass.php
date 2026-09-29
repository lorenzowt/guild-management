<?php

namespace App\Enums;

enum HeroClass: string
{
    case CLERIC = 'cleric';
    case MAGE = 'mage';
    case ROGUE = 'rogue';
    case WARRIOR = 'warrior';

    public function label()
    {
        return match($this) {
            self::CLERIC => 'Cleric',
            self::MAGE => 'Mage',
            self::ROGUE => 'Rogue',
            self::WARRIOR => 'Warrior', 
        };
    }
}