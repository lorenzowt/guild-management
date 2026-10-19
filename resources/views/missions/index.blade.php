@extends('layouts.app')

@vite('resources/js/missions.js')
@if(session('outcome'))
    <script>
        window.openMissionOutcomeModal = true;
    </script>
@endif
@if ($errors->createMission->any())
    <script>
        window.openCreateMissionModal = true;
    </script>
@endif

@section('content')
    <section class="flex min-h-full flex-col gap-10 rounded-xl bg-surface-500 px-5 pt-3 pb-5">
        <div class="border-m border-b border-accent-500 px-4 pb-2">
            <p class="text-sm text-text-400">Missions Overview</p>
        </div>

        <div class="mx-auto flex w-full max-w-[90rem] flex-col gap-6">
            <div class="flex items-center justify-between gap-4 px-4">
                <div>
                    <h1 class="text-3xl font-bold tracking-tight text-text-500">
                        Missions
                    </h1>

                    <p class="mt-2 text-sm text-text-500">
                        Assign a quest to your available heroes and track its outcome.
                    </p>
                </div>

                <button
                    id="create-mission-button"
                    type="button"
                    class="shrink-0 rounded-xl bg-primary-600 px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-text-400/30 transition hover:bg-primary-700"
                >
                    + Assign mission
                </button>
            </div>

            {{-- Stacked on small screens; side-by-side when there is room --}}
            <div class="grid items-start grid-cols-1 gap-8 xl:grid-cols-2">
                @include('missions._completed-missions-table', [
                    'missions' => $completedMissions,
                ])

                @include('missions._assigned-missions-table', [
                    'missions' => $assignedMissions,
                ])
            </div>
        </div>
    </section>
@include('missions._mission-outcome-modal')
@include('missions._create-modal')
@endsection