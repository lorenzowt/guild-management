<div id="show-hero-modal" class="hidden fixed inset-0 z-50 bg-background-900/20 backdrop-blur-sm">
    <div class="flex min-h-full items-center justify-center p-6">
        <div
            id="show-hero-modal-content"
            class="w-full max-w-2xl rounded-3xl bg-surface-500 p-8 shadow-2xl"
        >
            <div class="mb-8">
                <h2 class="mt-1 font-heading text-3xl font-bold tracking-tight text-text-600">
                    Hero information
                </h2>

                <p class="mt-2 font-body text-sm text-text-400">
                    View information about this adventurer.
                </p>
            </div>

            <div id="show-hero-modal-body">
                {{-- Hero information will be loaded here --}}
            </div>

            <div class="mt-8 flex items-center justify-end border-t border-accent-300 pt-6">
                <button
                    type="button"
                    id="close-show-hero-modal"
                    class="rounded-xl px-5 py-3 text-sm font-semibold text-text-400 transition hover:bg-accent-100 hover:text-text-500"
                >
                    Close
                </button>
            </div>
        </div>
    </div>
</div>