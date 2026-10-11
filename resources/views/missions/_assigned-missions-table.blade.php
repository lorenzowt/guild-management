<div class="flex min-w-0 flex-col">
    {{-- Scrollable header, with the scrollbar hidden --}}
    <div class="overflow-x-auto [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
        <div class="flex min-w-max gap-2 px-7 py-5">
            <h2 class="whitespace-nowrap text-lg font-bold text-text-500">
                Assigned Missions
            </h2>

            <p class="mt-1 whitespace-nowrap text-sm text-text-400">
                Your heroes are ready to begin
            </p>
        </div>
    </div>

    {{-- Card controls the rounded edges and shadow --}}
    <div class="min-w-0 overflow-hidden rounded-3xl border border-[#eee6f0] bg-white font-body shadow-lg shadow-text-400/30">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[42rem] text-left">
                <thead class="bg-primary-50">
                    <tr class="border-b border-[#eee6f0] text-xs font-extrabold uppercase tracking-tight text-text-400">
                        <th class="px-7 py-4">Quest</th>
                        <th class="px-6 py-4">Party</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-accent-300">
                    @forelse ($missions as $mission)
                        <tr class="bg-white transition hover:bg-accent-100">
                            <td class="px-6 py-4">
                                <button
                                    type="button"
                                    class="quest-show-button text-sm font-semibold text-text-500 transition hover:text-primary-600"
                                >
                                    {{ $mission->quest->name }}
                                </button>
                            </td>

                            <td class="px-6 py-4 text-sm font-medium text-text-500">
                                @foreach ($mission->heroes as $hero)
                                    {{ explode(' ', $hero->name)[0] }}{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </td>

                            <td class="px-6 py-4 text-xs font-medium text-text-500">
                                {{ $mission->status->label() }}
                            </td>

                            <td class="px-6 py-4 text-right">
                                {{-- Change this back to a form once the route exists --}}
                                <button
                                    type="button"
                                    class="rounded-xl bg-primary-500/80 px-2 py-2 text-xs font-semibold text-white transition hover:bg-primary-500"
                                >
                                    Start mission
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-7 py-8 text-center text-sm text-text-400">
                                No assigned missions yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($missions->hasPages())
            <div class="border-t border-[#eee6f0] px-7 py-4">
                {{ $missions->onEachSide(1)->links() }}
            </div>
        @endif
    </div>
</div>