<div class="flex flex-col gap-8 md:flex-row">
    <div class="w-full md:w-1/3 flex sm:flex-col items-center gap-4">
        <figure class="w-full max-w-44">
            <img
                src="{{ asset('images/bosses/boss-' . $quest->id . '.png') }}"
                alt="{{ $quest->name }}"
                class="border-3 border-primary-300 overflow-hidden  w-full rounded-3xl aspect-square object-cover "
            >
            <figcaption class="mt-1 text-center font-semibold text-xs text-text-700 font-body">
                {{ $quest->boss_name }}
            </figcaption>
        </figure>
        <figure class="w-full max-w-44">
            <img
                src="{{ asset('images/quests/quest-' . $quest->id . '.png') }}"
                alt="{{ $quest->name }}"
                class="border-3 border-primary-300 overflow-hidden w-full rounded-3xl aspect-square  object-cover"
            >
            <figcaption class="mt-1 text-center font-semibold text-xs text-text-700 font-body">
                Location
            </figcaption>
        </figure>
    </div>

    <div class="space-y-6 w-full md:flex-1">
        <div>
            <p class="mb-2 text-sm font-semibold text-text-500">
                Quest Name
            </p>
            <div class="w-full rounded-xl border border-accent-300 bg-white px-4 py-3 text-sm text-text-600">
                {{ $quest->name }}
            </div>
        </div>

        <div>
            <p class="mb-2 text-sm font-semibold text-text-500">
                Boss
            </p>
            <div class="w-full rounded-xl border border-accent-300 bg-white px-4 py-3 text-sm text-text-600">
                {{ $quest->boss_name }}
            </div>
        </div>

        <div>
            <p class="mb-2 text-sm font-semibold text-text-500">
                Hero class
            </p>

            <p class="w-full rounded-xl border border-accent-300 bg-white px-4 py-3 text-sm text-text-600">
                {{ $quest->description }}
            </p>
        </div>
    </div>
</div>
<div class="mt-8  gap-3 flex items-center justify-end border-t border-accent-300 pt-6">
    <button
        type="button"
        id="close-show-quest-modal"
        class="rounded-xl px-5 py-3 text-sm font-semibold text-text-400 transition hover:bg-accent-100 hover:text-text-500"
    >
        Close
    </button>
</div>
