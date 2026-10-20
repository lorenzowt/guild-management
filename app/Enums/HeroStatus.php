<?php

namespace App\Enums;

enum HeroStatus: string
{
    case AVAILABLE = 'available';
    case ON_MISSION = 'on_mission';
    case INJURED = 'injured';
    case DEACTIVATED = 'deactivated';

    public function label()
    {
        return match($this){
            self::AVAILABLE => 'Available',
            self::ON_MISSION => 'On Mission',
            self::INJURED => 'injured',
            self::DEACTIVATED => 'deactivated',
        };
    }
}
