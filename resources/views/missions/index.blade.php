@extends('layouts.app')

@section('content')
    <section class="min-h-full rounded-xl bg-surface-500 px-3 py-5 sm:px-5">
        <div class="border-b border-accent-500 px-4 pb-2">
            <p class="text-sm text-text-400">Quests Overview</p>
        </div>

        {{-- Wider than before, but still capped and centred --}}
        <div class="mx-auto w-full max-w-[90rem] py-8">
            <div class="px-4">
                <h1 class="text-3xl font-bold tracking-tight text-text-500">
                    Missions
                </h1>
            </div>

            {{-- Stacked on small screens; side-by-side when there is room --}}
            <div class="mt-3 grid items-start grid-cols-1 gap-8 xl:grid-cols-2">
                @include('missions._completed-missions-table', [
                    'missions' => $completedMissions,
                ])

                @include('missions._assigned-missions-table', [
                    'missions' => $assignedMissions,
                ])
            </div>
        </div>
    </section>
@endsection