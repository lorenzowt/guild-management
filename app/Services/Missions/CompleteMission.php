<?php

namespace App\Services\Missions;

use App\Services\Missions\MissionOutcomeCalculator;
use App\Enums\MissionState;
use App\Models\Mission;
use App\Models\Hero;
use App\Models\Quest;
use Illuminate\Database\Eloquent\Collection;

class CompleteMission
{
    public function __construct(
        private MissionOutcomeCalculator $calculator
    ){}

    public function complete(Mission $mission): MissionState
    {

        $mission->loadMissing(['heroes', 'quest']);

        $outcome = $this->calculator->calculate(
            $mission->heroes, 
            $mission->quest
        );

        match($outcome) {
            MissionState::SUCCESSFUL => $this->handleSuccessful($mission),
            MissionState::FAILED=> $this->handleFailed($mission),
        };

        return $outcome;
    }

    private function handleSuccessful(Mission $mission)
    {
        foreach ($mission->heroes as $hero) {
            $hero->levelUp();
        }

        $mission->markSucessful();
    }

    private function handleFailed(Mission $mission)
    {
        foreach ($mission->heroes as $hero) {
            $hero->levelDown();
            $hero->injure();
        }

        $mission->markFailed();
    }

}