<div class="flex flex-col gap-6">
    <div>
        <p class="text-xs font-semibold uppercase tracking-wide text-text-400">
            Name
        </p>
        <p class="mt-1 text-lg font-bold text-text-600">
            {{ $hero->name }}
        </p>
    </div>

    <div>
        <p class="text-xs font-semibold uppercase tracking-wide text-text-400">
            Class
        </p>
        <p class="mt-1 text-sm font-medium text-text-500">
            {{ $hero->hero_class->label() }}
        </p>
    </div>

    <div>
        <p class="text-xs font-semibold uppercase tracking-wide text-text-400">
            Level
        </p>
        <p class="mt-1 text-sm font-medium text-text-500">
            {{ $hero->level }}
        </p>
    </div>

    <div>
        <p class="text-xs font-semibold uppercase tracking-wide text-text-400">
            Status
        </p>
        <p class="mt-1 text-sm font-medium text-text-500">
            {{ $hero->status->value }}
        </p>
    </div>
</div>