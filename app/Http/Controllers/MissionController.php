<?php

namespace App\Http\Controllers;

use App\Enums\MissionState;
use Illuminate\Http\Request;
use App\Models\Mission;
use App\Services\Missions\CompleteMission;
use App\Http\Requests\StoreMissionRequest;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('missions.index', [
            'assignedMissions' => Mission::with(['quest', 'heroes'])
                ->where('status', MissionState::ASSIGNED->value)
                ->paginate(5, ['*'], 'assigned_page'),

            'completedMissions' => Mission::with(['quest', 'heroes'])
                ->whereIn('status', [
                    MissionState::SUCCESSFUL->value,
                    MissionState::FAILED->value,
                ])
                ->paginate(5, ['*'], 'completed_page'),
        ]);
    }

    public function complete(Mission $mission, CompleteMission $completeMission) 
    {
        $outcome = $completeMission->complete($mission);

        return redirect()
            ->route('missions.index')
            ->with('outcome', $outcome->value)
            ->with('quest', $mission->quest->name)
            ->with('hero_names',$mission->heroes->pluck('name')->all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMissionRequest $request)
    {
        Mission::create($request->validated());

        return redirect()->route('missions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
