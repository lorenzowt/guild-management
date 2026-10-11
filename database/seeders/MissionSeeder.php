<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mission;
use App\Enums\MissionState;
use App\Models\Quest;
use App\Models\Hero;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createMissions(2);
    }

    private function createMissions(int $count) 
    {
        $quest = Quest::firstOrFail();

        $heroes = Hero::take(4)->get();

        for ($i = 0; $i < $count; $i++) {
            $mission = Mission::create([
                'quest_id' => $quest->id,
                'status' => MissionState::ASSIGNED,
            ]);

            $mission->heroes()->attach($heroes);
        }

        for ($i = 0; $i < $count; $i++) {
            $mission = Mission::create([
                'quest_id' => $quest->id,
                'status' => MissionState::SUCCESSFUL,
            ]);

            $mission->heroes()->attach($heroes);
        }

        for ($i = 0; $i < $count; $i++) {
            $mission = Mission::create([
                'quest_id' => $quest->id,
                'status' => MissionState::FAILED,
            ]);

            $mission->heroes()->attach($heroes);
        }
    }
}