<div class="flex min-w-0 flex-col">
    {{-- Scrollable header, with its scrollbar visually hidden --}}
    <div class="overflow-x-auto [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
        <div class="flex min-w-max gap-2 px-7 py-5">
            <h2 class="whitespace-nowrap text-lg font-bold text-text-500">
                Completed Missions
            </h2>

            <p class="mt-1 whitespace-nowrap text-sm text-text-400">
                Successful and failed mission history.
            </p>
        </div>
    </div>

    {{-- The card owns the rounded corners and shadow --}}
    <div class="min-w-0 overflow-hidden rounded-3xl border border-[#eee6f0] bg-white font-body shadow-lg shadow-text-400/30">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[36rem] text-left">
                <thead class="bg-primary-50">
                    <tr class="border-b border-[#eee6f0] text-xs font-extrabold uppercase tracking-tight text-text-400">
                        <th class="px-7 py-4">Quest</th>
                        <th class="px-6 py-4">Party</th>
                        <th class="px-6 py-4">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-accent-300">
                    @forelse ($missions as $mission)
                        @php
                            $isSuccessful = $mission->status === \App\Enums\MissionState::SUCCESSFUL;

                            $rowColor = $isSuccessful
                                ? 'bg-success-100/50 hover:bg-success-200'
                                : 'bg-danger-200/60 hover:bg-danger-300';

                            $hoverTextColor = $isSuccessful
                                ? 'hover:text-success-800'
                                : 'hover:text-danger-900';
                        @endphp

                        <tr class="transition {{ $rowColor }}">
                            <td class="px-7 py-4">
                                <button
                                    type="button"
                                    class="quest-show-button text-sm font-semibold text-text-500 transition {{ $hoverTextColor }}"
                                >
                                    {{ $mission->quest->name }}
                                </button>
                            </td>

                            <td class="px-6 py-4 text-sm font-medium text-text-500">
                                @foreach ($mission->heroes as $hero)
                                    {{ explode(' ', $hero->name)[0] }}{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </td>

                            <td class="px-6 py-4 text-xs font-semibold text-text-500">
                                {{ $mission->status->label() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-7 py-8 text-center text-sm text-text-400">
                                No completed missions yet.
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