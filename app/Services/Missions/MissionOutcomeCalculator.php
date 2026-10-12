<?php

namespace App\Services\Missions;

use App\Enums\MissionState;
use App\Models\Quest;
use Illuminate\Database\Eloquent\Collection;

class MissionOutcomeCalculator
{
    public function calculate(Collection $heroes, Quest $quest): MissionState
    {
        $questLevel = $quest->difficulty;
        $partyLevel = $this->calculatePartyLevel($heroes);

        if ($partyLevel > $questLevel) {
            return MissionState::SUCCESSFUL;
        }

        return MissionState::FAILED;
    }

    private function calculatePartyLevel(Collection $heroes): int
    {
        $totalHeroLevel = $heroes->sum('level');

        $uniqueClassBonus = $heroes->unique('class')->count() - 1;

        return $totalHeroLevel + $uniqueClassBonus;
    }

}