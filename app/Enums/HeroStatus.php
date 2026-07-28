<?php

namespace App\Enums;

enum HeroStatus: string
{
    case Available = 'available';
    case OnMission = 'on_mission';
    case Injured = 'injured';
}