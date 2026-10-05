<div id="create-hero-modal" 
@class([
    'hidden' => !$errors->createHero->any(),
    'fixed inset-0 z-50 bg-background-900/20 backdrop-blur-sm',
    ])
>
    <div class="flex min-h-full items-center justify-center p-6">
        <div id="create-hero-modal-content" class="w-full max-w-2xl rounded-3xl bg-surface-500 p-8 shadow-2xl">
            <div class="mb-8">
                <h2 class="mt-1 font-heading text-3xl font-bold tracking-tight text-text-600">
                    Create a new hero
                </h2>
                <p class="mt-2 font-body text-sm text-text-400">
                    Add a new adventurer to your guild roster.
                </p>
            </div>
            <form action="{{ route('heroes.store') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-8 md:flex-row ">
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
                            <label for="name" class="mb-2 block text-sm font-semibold text-text-500">
                                Hero name
                            </label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                placeholder="{{ old('name', 'e.g. Princess Donut') }}"
                                required
                                class="w-full rounded-xl border border-accent-300 bg-white px-4 py-3 text-sm text-text-600 outline-none transition placeholder:text-text-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20"
                            >
                            @error('name')
                            <p class=" mt-1 text-warning-600 text-xs">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="level" class="mb-2 block text-sm font-semibold text-text-500">
                                Starting level
                            </label>

                            <input
                                type="number"
                                name="level"
                                id="level"
                                value="1"
                                min="1"
                                required
                                class="w-full rounded-xl border border-accent-300 bg-white px-4 py-3 text-sm text-text-600 outline-none transition focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20"
                            >
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-semibold text-text-500">
                                Hero class
                            </p>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach (\App\Enums\HeroClass::cases() as $heroClass)
                                    <div>
                                        <input
                                            type="radio"
                                            name="hero_class"
                                            id="{{ $heroClass->value }}"
                                            value="{{ $heroClass->value }}"
                                            class="peer sr-only"
                                            {{ $heroClass->value === 'cleric' ? 'checked' : '' }}
                                        >

                                        <label
                                            for="{{ $heroClass->value }}"
                                            class="flex cursor-pointer items-center justify-center rounded-xl border border-accent-300 bg-white px-4 py-3 text-sm font-semibold text-text-400 transition hover:border-primary-300 hover:bg-primary-50 peer-checked:border-primary-500 peer-checked:bg-primary-100 peer-checked:text-primary-700"
                                        >
                                            {{ $heroClass->label() }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-8 flex items-center justify-end gap-3 border-t border-accent-300 pt-6">
                    <button
                        type="button"
                        id="close-create-hero-modal"
                        class="rounded-xl px-5 py-3 text-sm font-semibold text-text-400 transition hover:bg-accent-100 hover:text-text-500"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="rounded-xl bg-primary-600 px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-text-400/20 transition hover:bg-primary-700"
                    >
                        Create hero
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>