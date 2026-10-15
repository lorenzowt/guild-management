<?php

namespace App\Http\Controllers;

use App\Enums\MissionState;
use App\Models\Hero;
use App\Models\Mission;

class GuildOverviewController extends Controller
{
    public function index()
    {
        $missionStats = [
            'assigned' => Mission::where('status', MissionState::ASSIGNED->value)->count(),
            'successful' => Mission::where('status', MissionState::SUCCESSFUL->value)->count(),
            'failed' => Mission::where('status', MissionState::FAILED->value)->count(),
        ];

        $completedMissions = $missionStats['successful'] + $missionStats['failed'];

        $successRate = $completedMissions > 0
            ? round(($missionStats['successful'] / $completedMissions) * 100)
            : 0;

        return view('guild-overview.index', [
            'missionStats' => $missionStats,
            'successRate' => $successRate,

            'topHeroes' => Hero::query()
                ->withCount('missions')
                ->orderByDesc('missions_count')
                ->orderByDesc('level')
                ->take(5)
                ->get(),

            'recentMissions' => Mission::with(['quest', 'heroes'])
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}