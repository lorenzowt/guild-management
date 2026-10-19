<?php

namespace App\Services\Missions;

use App\Enums\HeroStatus;
use App\Models\Hero;
use App\Models\Mission;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CreateMission
{
    public function execute(array $data): Mission
    {
        return DB::transaction(function () use ($data) {
            $heroIds = $data['hero_ids'];

            $heroes = Hero::query()
                ->whereIn('id', $heroIds)
                ->lockForUpdate()
                ->get();

            $hasUnavailableHero = $heroes->count() !== count($heroIds)
                || $heroes->contains(
                    fn (Hero $hero) => $hero->status !== HeroStatus::AVAILABLE
                );

            if ($hasUnavailableHero) {
                $exception = ValidationException::withMessages([
                    'hero_ids' => 'One or more selected heroes are no longer available.',
                ]);

                $exception->errorBag = 'createMission';

                throw $exception;
            }

            $mission = Mission::create([
                'quest_id' => $data['quest_id'],
            ]);

            $mission->heroes()->attach($heroIds);

            Hero::whereIn('id', $heroIds)->update([
                'status' => HeroStatus::ON_MISSION->value,
            ]);

            return $mission;
        });
    }
}