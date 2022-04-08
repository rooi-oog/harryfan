<x-layout>
    @php
        $navIsOpen = false;
        $req = request()->toArray();
        foreach (['author', 'series'] as $key)
            $navIsOpen |= (array_key_exists($key, $req) && !isset ($req [$key]));
    @endphp

    <aside class="maxNavigationHeight overflow-y-auto min-w-fit hidden lg:block px-10 py-5 bg-dark-800 bg-gradient-to-b from-dark-800 to-dark-700">
        <x-logo class="pb-10" />
        <x-navigation.navigation :display="$navType" :data="$navList"/>
    </aside>

    <section class="grow flex flex-col">

        {{-- Mobile version header --}}
        <header
            x-data="{ navIsOpen: {{ $navIsOpen }} }"
            class="w-full lg:hidden"
        >

            <div class="mx-auto px-5 pt-10 flex items-start justify-between">
                <x-logo />

                {{-- Burger buttons--}}
                <h6
                    style="display: none"
                    x-show="!navIsOpen"
                    @click="navIsOpen = true"
                    class="text-red-500 cursor-pointer"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </h6>

                <h6
                    style="display: none"
                    x-show="navIsOpen"
                    @click="navIsOpen = false"
                    class="text-red-500 cursor-pointer"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </h6>
            </div>

            <div x-show="navIsOpen" class="w-full" style="display: none">
                <nav class="absolute w-full bg-dark-600 shadow-sm shadow-dark-900 z-10 p-5">
                    <x-navigation.navigation :display="$navType" :data="$navList"/>
                </nav>
            </div>
        </header>

        <x-search.search-panel class="p-5 w-full mb-10" :display="$navType" />

        {{-- Book card list --}}
        <section class="flex flex-wrap gap-4 px-5">
            @foreach($books as $book)
                <x-book-card :book="$book" />
            @endforeach
        </section>

        {{-- Books pagination --}}
        <div class="px-2.5 pt-10">
            {{ $books->appends(request()->input())->onEachSide(1)->links() }}
        </div>

    </section>

</x-layout>
