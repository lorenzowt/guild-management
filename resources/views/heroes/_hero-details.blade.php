<div class="flex flex-col gap-8 md:flex-row">
    <div class="w-full md:w-1/3 flex flex-col items-center gap-3">
        <div class="flex aspect-square w-full max-w-44 items-center justify-center rounded-3xl bg-primary-100 text-primary-600">
            <span class="text-4xl">✦</span>
        </div>

        <p class="text-center text-xs text-text-400">
            Hero portrait
        </p>
    </div>

    <div class="space-y-6 w-full md:flex-1">
        <div>
            <p class="mb-2 text-sm font-semibold text-text-500">
                Hero name
            </p>
            <div class="w-full rounded-xl border border-accent-300 bg-white px-4 py-3 text-sm text-text-600">
                {{ $hero->name }}
            </div>
        </div>

        <div>
            <p class="mb-2 text-sm font-semibold text-text-500">
                Level
            </p>
            <div class="w-full rounded-xl border border-accent-300 bg-white px-4 py-3 text-sm text-text-600">
                {{ $hero->level }}
            </div>
        </div>

        <div>
            <p class="mb-2 text-sm font-semibold text-text-500">
                Hero class
            </p>

            <div class="grid grid-cols-2 gap-2">
                @foreach (\App\Enums\HeroClass::cases() as $heroClass)
                    <div
                        class="flex items-center justify-center rounded-xl border px-4 py-3 text-sm font-semibold
                        {{ $hero->hero_class === $heroClass
                            ? 'border-primary-500 bg-primary-100 text-primary-700'
                            : 'border-accent-300 bg-white text-text-400' }}"
                    >
                        {{ $heroClass->label() }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="mt-8  gap-3 flex items-center justify-end border-t border-accent-300 pt-6">
    <button
        type="button"
        id="close-show-hero-modal"
        class="rounded-xl px-5 py-3 text-sm font-semibold text-text-400 transition hover:bg-accent-100 hover:text-text-500"
    >
        Close
    </button>
    <button
    type="button"
    id="open-edit-modal"
    class="rounded-xl bg-accent-700 px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-text-400/20 transition hover:bg-accent-800"
    data-url="{{ route('heroes.edit', $hero) }}"
    >
    Edit Hero
</button>
</div>
