@extends('layouts.app')

@section('content')
    <section class="h-full overflow-hidden rounded-xl bg-surface-500 px-4 py-5 sm:px-6">
        <div class="mx-auto w-full max-w-[90rem]">
            <div class="rounded-3xl bg-primary-100 px-6 py-10 shadow-sm sm:px-10">
                <p class="text-sm font-semibold text-primary-700">
                    Guild overview
                </p>

                <div class="mt-3 flex flex-col justify-between gap-6 lg:flex-row lg:items-end">
                    <div>
                        <h1 class="font-heading text-3xl font-bold tracking-tight text-text-600 sm:text-4xl">
                            Welcome back, Guild Master ✦
                        </h1>

                        <p class="mt-3 max-w-2xl font-body text-sm leading-6 text-text-500">
                            Your heroes are ready for their next adventure. Check on active
                            missions, celebrate victories, and prepare your strongest party.
                        </p>
                    </div>

                    <a
                        href="{{ route('missions.index') }}"
                        class="inline-flex w-fit items-center rounded-xl bg-primary-600 px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-text-400/20 transition hover:bg-primary-700"
                    >
                        View missions
                    </a>
                </div>
            </div>

            <div class="mt-8 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-3xl border border-[#eee6f0] bg-white p-6 shadow-lg shadow-text-400/10">
                    <p class="text-sm font-semibold text-text-400">Active missions</p>
                    <p class="mt-3 text-3xl font-bold text-primary-700">
                        {{ $missionStats['assigned'] }}
                    </p>
                    <p class="mt-2 text-xs text-text-400">Heroes currently on an adventure</p>
                </div>

                <div class="rounded-3xl border border-[#eee6f0] bg-white p-6 shadow-lg shadow-text-400/10">
                    <p class="text-sm font-semibold text-text-400">Successful missions</p>
                    <p class="mt-3 text-3xl font-bold text-success-700">
                        {{ $missionStats['successful'] }}
                    </p>
                    <p class="mt-2 text-xs text-text-400">Quests completed with glory</p>
                </div>

                <div class="rounded-3xl border border-[#eee6f0] bg-white p-6 shadow-lg shadow-text-400/10">
                    <p class="text-sm font-semibold text-text-400">Failed missions</p>
                    <p class="mt-3 text-3xl font-bold text-danger-700">
                        {{ $missionStats['failed'] }}
                    </p>
                    <p class="mt-2 text-xs text-text-400">Heroes who may need some rest</p>
                </div>

                <div class="rounded-3xl border border-[#eee6f0] bg-white p-6 shadow-lg shadow-text-400/10">
                    <p class="text-sm font-semibold text-text-400">Success rate</p>
                    <p class="mt-3 text-3xl font-bold text-secondary-700">
                        {{ $successRate }}%
                    </p>
                    <p class="mt-2 text-xs text-text-400">Across completed missions</p>
                </div>
            </div>

            <div class="mt-8 grid grid-cols-1 gap-8 xl:grid-cols-5">
                <div class="xl:col-span-3">
                    <div class="overflow-hidden rounded-3xl border border-[#eee6f0] bg-white shadow-lg shadow-text-400/10">
                        <div class="flex items-center justify-between border-b border-[#eee6f0] bg-primary-50 px-7 py-5">
                            <div>
                                <h2 class="text-lg font-bold text-text-500">
                                    Recent adventures
                                </h2>

                                <p class="mt-1 text-sm text-text-400">
                                    The latest activity from your guild.
                                </p>
                            </div>

                            <a
                                href="{{ route('missions.index') }}"
                                class="text-sm font-semibold text-primary-700 transition hover:text-primary-900"
                            >
                                See all
                            </a>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full min-w-[38rem] text-left">
                                <thead class="bg-primary-50">
                                    <tr class="border-b border-[#eee6f0] text-xs font-extrabold uppercase tracking-tight text-text-400">
                                        <th class="px-7 py-4">Quest</th>
                                        <th class="px-6 py-4">Party</th>
                                        <th class="px-6 py-4">Status</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-accent-300">
                                    @forelse ($recentMissions as $mission)
                                        @php
                                            $statusColor = match ($mission->status) {
                                                \App\Enums\MissionState::SUCCESSFUL => 'bg-success-100 text-success-800',
                                                \App\Enums\MissionState::FAILED => 'bg-danger-100 text-danger-800',
                                                default => 'bg-primary-100 text-primary-800',
                                            };
                                        @endphp

                                        <tr class="transition hover:bg-accent-100">
                                            <td class="px-7 py-4 text-sm font-semibold text-text-500">
                                                {{ $mission->quest->name }}
                                            </td>

                                            <td class="px-6 py-4 text-sm text-text-500">
                                                @foreach ($mission->heroes as $hero)
                                                    {{ explode(' ', $hero->name)[0] }}{{ !$loop->last ? ', ' : '' }}
                                                @endforeach
                                            </td>

                                            <td class="px-6 py-4">
                                                <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $statusColor }}">
                                                    {{ $mission->status->label() }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="px-7 py-10 text-center text-sm text-text-400">
                                                No adventures yet. Your guild is ready for its first quest!
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="xl:col-span-2">
                    <div class="overflow-hidden rounded-3xl border border-[#eee6f0] bg-white shadow-lg shadow-text-400/10">
                        <div class="border-b border-[#eee6f0] bg-secondary-50 px-7 py-5">
                            <h2 class="text-lg font-bold text-text-500">
                                Guild favourites
                            </h2>

                            <p class="mt-1 text-sm text-text-400">
                                Heroes with the most adventures.
                            </p>
                        </div>

                        <div class="divide-y divide-accent-300">
                            @forelse ($topHeroes as $hero)
                                <div class="flex items-center gap-4 px-7 py-4">
                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-secondary-200 text-sm font-bold text-secondary-800">
                                        {{ strtoupper(substr($hero->name, 0, 1)) }}
                                    </div>

                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-sm font-bold text-text-500">
                                            {{ $hero->name }}
                                        </p>

                                        <p class="mt-1 text-xs text-text-400">
                                            Level {{ $hero->level }} · {{ $hero->hero_class->label() }}
                                        </p>
                                    </div>

                                    <div class="text-right">
                                        <p class="text-sm font-bold text-primary-700">
                                            {{ $hero->missions_count }}
                                        </p>

                                        <p class="text-xs text-text-400">
                                            missions
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="px-7 py-10 text-center text-sm text-text-400">
                                    Hire some heroes to start building your guild.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection