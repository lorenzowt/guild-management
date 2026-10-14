<div
    id="mission-outcome-modal"
    class="hidden fixed inset-0 z-50 bg-background-900/20 backdrop-blur-sm"
>
    <div class="flex min-h-full items-center justify-center p-6">
        <div
            id="mission-outcome-modal-content"
            class="w-full max-w-2xl rounded-3xl bg-surface-500 p-8 shadow-2xl"
        >
            {{-- Modal heading --}}
            <div class="mb-8">
                @if (session('outcome') === 'successful')
                    <p class="mb-2 text-sm font-semibold uppercase tracking-wide text-green-700">
                        Mission complete
                    </p>

                    <h2 class="font-heading text-3xl font-bold tracking-tight text-text-600">
                        Success!
                    </h2>

                    <p class="mt-2 font-body text-sm text-text-400">
                        Your heroes have completed their mission. Well done, Guild Master!
                    </p>
                @else
                    <p class="mb-2 text-sm font-semibold uppercase tracking-wide text-red-700">
                        Mission complete
                    </p>

                    <h2 class="font-heading text-3xl font-bold tracking-tight text-text-600">
                        Mission Failed
                    </h2>

                    <p class="mt-2 font-body text-sm text-text-400">
                        Your heroes couldn't overcome this challenge. Better luck next time!
                    </p>
                @endif
            </div>

            {{-- Mission information --}}
            <div class="space-y-6">
                <div>
                    <p class="mb-2 text-sm font-semibold text-text-500">
                        Quest
                    </p>

                    <div class="w-full rounded-xl border border-accent-300 bg-white px-4 py-3 text-sm text-text-600">
                        {{ session('quest') }}
                    </div>
                </div>

                <div>
                    <p class="mb-2 text-sm font-semibold text-text-500">
                        Heroes involved
                    </p>

                    <div class="w-full rounded-xl border border-accent-300 bg-white px-4 py-3">
                        <div class="flex flex-wrap gap-2">
                            @foreach (session('hero_names', []) as $heroName)
                                <span class="rounded-lg bg-primary-100 px-3 py-2 text-sm font-medium text-text-600">
                                    {{ $heroName }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div>
                    <p class="mb-2 text-sm font-semibold text-text-500">
                        Outcome
                    </p>

                    <div class="w-full rounded-xl border border-accent-300 bg-white px-4 py-3 text-sm text-text-600">
                        {{ session('outcome') === 'successful' ? 'Successful' : 'Failed' }}
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="mt-8 flex items-center justify-end gap-3 border-t border-accent-300 pt-6">
                <button
                    type="button"
                    id="close-mission-outcome-modal"
                    class="rounded-xl px-5 py-3 text-sm font-semibold text-text-400 transition hover:bg-accent-100 hover:text-text-500"
                >
                    Close
                </button>
            </div>
        </div>
    </div>
</div>