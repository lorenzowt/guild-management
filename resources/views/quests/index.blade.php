@extends('layouts.app')

@section('content')

@vite('resources/js/quests.js')
<section class="flex flex-col min-h-full bg-surface-500 rounded-xl px-5 pt-3 pb-5 gap-10">
    <div class="pb-2 px-4 border-m border-b border-accent-500">
        <p class="text-text-400 text-sm">Quests Overview</p>
    </div>
    <div class="mx-auto min-w-6xl flex flex-col gap-6">
        <div class="flex items-center justify-between gap-4 px-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-text-500">
                    Available Quests
                </h1>
                <p class="mt-2 text-sm text-text-500">
                    Check quest info, preparation is the key of success.
                </p>
            </div>
        </div>    
        <div class="overflow-hidden rounded-3xl border border-[#eee6f0] bg-white shadow-lg shadow-text-400/30 font-body">
            <div class="overflow-x-auto">
                <table class="w-full min-w-180 text-left">
                    <thead class="bg-primary-50">
                        <tr class="border-b border-[#eee6f0] font-extrabold uppercase tracking-tight text-text-400 text-xs">
                            <th class="px-7 py-5">
                                Quest Name
                            </th>
                            <th class="px-6 py-5">
                                Boss
                            </th>
                            <th class="px-6 py-5">
                                Difficulty
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-accent-300">
                        @foreach ($quests as $quest)
                            <tr class="transition hover:bg-accent-100 bg-white font-body">
                                <td class="px-7 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-primary-100 text-sm font-bold text-accent-800">
                                            {{ strtoupper(substr($quest->boss_name, 0, 1)) }}
                                        </div>

                                        <button
                                        type="button" 
                                        class="quest-show-button font-semibold  text-text-500 hover:text-primary-600 transition"
                                        data-url="{{ route('quests.show', $quest) }}"
                                        >
                                            {{ $quest->name }}
                                        </button>
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-sm font-medium text-text-500">
                                    Difficulty {{ $quest->boss_name }}
                                </td>

                                <td class="px-6 py-4 text-xs font-medium text-text-500">
                                    Difficulty {{ $quest->difficulty }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="hero-pagination">
            {{ $heroes->links() }}
        </div> --}}
    </div>
 @include('quests._show-modal')
</section>
@endsection