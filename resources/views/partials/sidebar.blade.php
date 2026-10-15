@php
    $defaultLinkClasses = 'flex items-center gap-3 rounded-lg px-3 py-2 text-lg font-medium text-text-500 transition hover:bg-accent-200 hover:text-text-600';

    $activeLinkClasses = 'flex items-center gap-3 rounded-lg bg-accent-500 px-3 py-2 text-lg font-medium text-text-600';
@endphp

<aside
    id="sidebar"
    class="fixed inset-y-0 left-0 z-50 flex w-64 -translate-x-full flex-col gap-12 bg-background-500 px-2 pb-8 pt-7 shadow-xl shadow-text-400/10 transition-transform duration-300 lg:sticky lg:top-0 lg:h-screen lg:translate-x-0 lg:shadow-none"
>
    <div class="flex items-center justify-between px-2">
        <a
            href="{{ route('guild-overview') }}"
            class="font-heading text-3xl font-bold text-primary-500"
        >
            Logo
        </a>

        <button
            id="close-sidebar-button"
            type="button"
            aria-label="Close navigation"
            class="rounded-lg p-2 text-text-500 transition hover:bg-accent-200 lg:hidden"
        >
            ✕
        </button>
    </div>

    <nav class="flex flex-col gap-3 font-heading">
        <a
            href="{{ route('guild-overview') }}"
            @class([
                $activeLinkClasses => request()->routeIs('guild-overview'),
                $defaultLinkClasses => !request()->routeIs('guild-overview'),
            ])
        >
            <span aria-hidden="true">⌂</span>
            Guild
        </a>

        <a
            href="{{ route('missions.index') }}"
            @class([
                $activeLinkClasses => request()->routeIs('missions.*'),
                $defaultLinkClasses => !request()->routeIs('missions.*'),
            ])
        >
            <span aria-hidden="true">⚔</span>
            Missions
        </a>

        <a
            href="{{ route('quests.index') }}"
            @class([
                $activeLinkClasses => request()->routeIs('quests.*'),
                $defaultLinkClasses => !request()->routeIs('quests.*'),
            ])
        >
            <span aria-hidden="true">📜</span>
            Quests
        </a>

        <a
            href="{{ route('heroes.index') }}"
            @class([
                $activeLinkClasses => request()->routeIs('heroes.*'),
                $defaultLinkClasses => !request()->routeIs('heroes.*'),
            ])
        >
            <span aria-hidden="true">✦</span>
            Heroes
        </a>
    </nav>

    <div class="mt-auto rounded-2xl bg-primary-100 p-4">
        <p class="text-sm font-semibold text-primary-800">
            Your guild awaits.
        </p>

        <p class="mt-1 text-xs leading-5 text-text-400">
            Prepare your heroes and set out on your next adventure.
        </p>
    </div>
</aside>