<?php

namespace App\Enums;

enum HeroClass: string
{
    case Cleric = 'cleric';
    case Mage = 'mage';
    case Rogue = 'rogue';
    case Warrior = 'warrior';
}