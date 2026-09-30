@extends('layouts.app')

@section('content')
@vite('resources/js/heroes.js')

<section class="flex flex-col min-h-full bg-surface-500 rounded-xl px-5 pt-3 pb-5 gap-10">
    <div class="pb-2 px-4 border-m border-b border-accent-500">
        <p class="text-text-400 text-sm">Hero Management</p>
    </div>
    <div class="mx-auto min-w-6xl flex flex-col gap-6">
        <div class="flex items-center justify-between gap-4 px-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-text-500">
                    Your Roaster
                </h1>
                <p class="mt-2 text-sm text-text-500">
                    Manage the heroes currently in your guild and hire new units.
                </p>
            </div>
            <button
                id="create-hero-button"
                class="rounded-xl bg-primary-600 px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-text-400/30 transition hover:bg-primary-700"                
            >
                + Hire units
            </button>
        </div>    
        <div class="overflow-hidden rounded-3xl border border-[#eee6f0] bg-white shadow-lg shadow-text-400/30 font-body">
            <div class="overflow-x-auto">
                <table class="w-full min-w-180 text-left">
                    <thead class="bg-primary-50">
                        <tr class="border-b border-[#eee6f0] font-extrabold uppercase tracking-tight text-text-400 text-xs">
                            <th class="px-7 py-5">
                                Name
                            </th>
                            <th class="px-6 py-5">
                                Class
                            </th>
                            <th class="px-6 py-5">
                                Level
                            </th>
                            <th class="px-6 py-5">
                                Status
                            </th>
                            <th class="px-7 py-5 text-right">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-accent-300">
                        @foreach ($heroes as $hero)
                            <tr class="transition hover:bg-accent-100 bg-white font-body">
                                <td class="px-7 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary-100 text-sm font-bold text-accent-800">
                                            {{ strtoupper(substr($hero->name, 0, 1)) }}
                                        </div>

                                        <button
                                        type="button" 
                                        class="hero-show-button font-semibold  text-text-500 hover:text-primary-600 transition"
                                        data-url="{{ route('heroes.show', $hero) }}"
                                        >
                                            {{ $hero->name }}
                                        </button>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm font-medium text-text-500">
                                    {{ $hero->hero_class->value }}
                                </td>

                                <td class="px-6 py-4 text-sm font-medium text-text-500">
                                    level {{ $hero->level }}
                                </td>

                                <td class="px-6 py-4 text-xs font-medium text-text-500">
                                        {{ $hero->status->value }}
                                </td>

                                <td class="px-7 py-4">
                                    <div class="flex justify-end gap-2">
                                        <button
                                            type="button"
                                            class="rounded-lg bg-secondary-300 px-3.5 py-2 text-xs font-bold tracking-wide shadow-sm text-secondary-800 transition hover:bg-secondary-500 hover:text-secondary-900"
                                        >
                                            Cure
                                        </button>

                                        <button
                                            type="button"
                                            class="rounded-lg bg-danger-300/80 px-3.5 py-2 text-xs font-bold tracking-wide shadow-sm text-danger-700 transition hover:bg-danger-500/80 hover:text-danger-800"
                                        >
                                            Remove
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="hero-pagination">
            {{ $heroes->links() }}
        </div>
    </div>
    @include('heroes._create-modal')
    @include('heroes._show-modal')
    <div id="edit-hero-modal-container">
        @if ($editHero)
            @include('heroes._edit-modal', ['hero' => $editHero])
        @endif
    </div>
    @if ($editHero)
    <script>
        window.openEditHeroModal = true;
    </script>
    @endif
    @if ($showHero)
    <script>
        window.showHeroUrl = {{ Js::from(route('heroes.show', $showHero)) }}
    </script>
    @endif
</section>
@endsection

