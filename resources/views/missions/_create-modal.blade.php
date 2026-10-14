<div
    id="create-mission-modal"
    @class([
        'fixed inset-0 z-50 bg-background-900/20 backdrop-blur-sm',
        'hidden' => !$errors->createMission->any(),
    ])
>
    <div class="flex min-h-full items-center justify-center p-6">
        <div
            id="create-mission-modal-content"
            class="w-full max-w-2xl rounded-3xl bg-surface-500 p-8 shadow-2xl"
        >
            <div class="mb-8">
                <h2 class="mt-1 font-heading text-3xl font-bold tracking-tight text-text-600">
                    Assign a new mission
                </h2>

                <p class="mt-2 font-body text-sm text-text-400">
                    Choose a quest and send up to four available heroes.
                </p>
            </div>

            <form action="{{ route('missions.store') }}" method="POST">
                @csrf

                <div class="space-y-6">
                    <div>
                        <label for="quest_id" class="mb-2 block text-sm font-semibold text-text-500">
                            Quest
                        </label>

                        <select
                            name="quest_id"
                            id="quest_id"
                            required
                            class="w-full rounded-xl border border-accent-300 bg-white px-4 py-3 text-sm text-text-600 outline-none transition focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20"
                        >
                            <option value="" disabled @selected(!old('quest_id'))>
                                Choose a quest
                            </option>

                            @foreach ($quests as $quest)
                                <option value="{{ $quest->id }}" @selected(old('quest_id') == $quest->id)>
                                    {{ $quest->name }} — {{ $quest->boss_name }}
                                </option>
                            @endforeach
                        </select>

                        @error('quest_id', 'createMission')
                            <p class="mt-1 text-xs text-warning-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="mb-2 flex items-center justify-between gap-3">
                            <label for="hero_ids" class="text-sm font-semibold text-text-500">
                                Hero party
                            </label>

                            <span class="text-xs text-text-400">
                                Select 1–4 heroes
                            </span>
                        </div>

                        <select
                            name="hero_ids[]"
                            id="hero_ids"
                            multiple
                            required
                            class="w-full rounded-xl border border-accent-300 bg-white px-4 py-3 text-sm text-text-600 outline-none transition focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20"
                        >
                            @foreach ($availableHeroes as $hero)
                                <option
                                    value="{{ $hero->id }}"
                                    @selected(in_array($hero->id, old('hero_ids', [])))
                                >
                                    {{ $hero->name }} — Level {{ $hero->level }} {{ $hero->hero_class->label() }}
                                </option>
                            @endforeach
                        </select>

                        <p class="mt-2 text-xs text-text-400">
                            Hold <kbd class="rounded bg-accent-100 px-1.5 py-0.5">⌘</kbd>
                            on Mac or <kbd class="rounded bg-accent-100 px-1.5 py-0.5">Ctrl</kbd>
                            on Windows to select more than one hero. Tom Select will make this friendlier later.
                        </p>

                        @error('hero_ids', 'createMission')
                            <p class="mt-1 text-xs text-warning-600">{{ $message }}</p>
                        @enderror

                        @error('hero_ids.*', 'createMission')
                            <p class="mt-1 text-xs text-warning-600">{{ $message }}</p>
                        @enderror

                        @if ($availableHeroes->isEmpty())
                            <p class="mt-2 text-xs text-warning-600">
                                No available heroes can be assigned right now.
                            </p>
                        @endif
                    </div>
                </div>

                <div class="mt-8 flex items-center justify-end gap-3 border-t border-accent-300 pt-6">
                    <button
                        type="button"
                        id="close-create-mission-modal"
                        class="rounded-xl px-5 py-3 text-sm font-semibold text-text-400 transition hover:bg-accent-100 hover:text-text-500"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        @disabled($quests->isEmpty() || $availableHeroes->isEmpty())
                        class="rounded-xl bg-primary-600 px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-text-400/20 transition hover:bg-primary-700 disabled:cursor-not-allowed disabled:opacity-50"
                    >
                        Assign mission
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>