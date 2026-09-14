{{-- <aside class="hidden  md:max-w-40 lg:max-w-64 w-full pt-5 border-r shadow-2xl rounded-3xl bg-white border-pastel-petal-900/10 md:flex flex-col items-center transition-all duration-500 ease-in-out">
    <div class =" h-24 flex gap-4 items-center justify-evenly border-b-2 border-pastel-petal-900/10 font-semibold text-pastel-petal-900/60">
        <p>Logo</p>  
        <p>Guild Manager</p>
    </div>
    <div class="flex flex-col mt-10 gap-15  items-center font-semibold text-pastel-petal-900/60">    
        <p>Guild</p>
        <p>Missions</p>  
        <p>Parties</p>  
        <p>Quests</p>  
        <a href="{{ route('heroes.index') }}">Heroes</a>  
    </div>
</aside> --}}

{{-- <aside class="flex min-h-screen w-64 flex-col border-r border-[#eadfec] bg-[#f8f1fa] px-5 py-7">
    <a href="#" class="mb-12 flex items-center gap-3 px-3">
        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#8c5d9d] text-lg font-bold text-white">
            G
        </div>

        <div>
            <p class="text-base font-bold text-[#3c2e45]">Guildly</p>
            <p class="text-xs text-[#9d8aa7]">Guild Manager</p>
        </div>
    </a>

    <nav class="space-y-2">
        <a
            href="#"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-[#7d6b85] transition hover:bg-white hover:text-[#684574]"
        >
            <span class="text-lg">⌂</span>
            Dashboard
        </a>

        <a
            href="{{ route('heroes.index') }}"
            class="flex items-center gap-3 rounded-xl bg-white px-4 py-3 text-sm font-semibold text-[#704c7e] shadow-sm"
        >
            <span class="text-lg">⚔</span>
            Heroes
        </a>

        <a
            href="#"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-[#7d6b85] transition hover:bg-white hover:text-[#684574]"
        >
            <span class="text-lg">🛡</span>
            Parties
        </a>

        <a
            href="#"
            class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium text-[#7d6b85] transition hover:bg-white hover:text-[#684574]"
        >
            <span class="text-lg">📜</span>
            Quests
        </a>
    </nav>

    <div class="mt-auto rounded-2xl bg-[#eee0f1] p-4">
        <p class="text-sm font-semibold text-[#63446e]">Your guild awaits.</p>
        <p class="mt-1 text-xs leading-5 text-[#896f93]">
            Build parties, recruit heroes, and prepare for adventure.
        </p>
    </div>
</aside>
 --}}
 <aside class="min-h-screen w-64 flex flex-col px-2 pb-8 pt-7 gap-12 bg-background-500">
    <div class="text-center">
        <a class="text-primary-200 font-heading text-3xl font-bold">Logo</a>
    </div>
    <nav class="flex flex-col gap-5 font-heading text-text-500 text-lg font-medium">
        <a class="px-2.5 py-1.5">Guild</a>
        <a class="px-2.5 py-1.5">Missions</a>
        <a class="px-2.5 py-1.5">Party</a>
        <a class="px-2.5 py-1.5">Quests</a>
        <a class="px-2.5 py-1.5 bg-accent-500 rounded-lg">Heroes</a>
    </nav>
 </aside>
