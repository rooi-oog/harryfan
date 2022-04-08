<section {{ $attributes->merge(['class' => 'flex justify-between gap-4']) }}>
    {{-- Links --}}
    <div class="flex gap-4">
        <x-search.links href="/" :active="$display === 'heading'">
            Книги
        </x-search.links>
        <x-search.links href="/?author=" :active="$display === 'author'">
            Авторы
        </x-search.links>
        <x-search.links href="/?series=" :active="$display === 'series'">
            Серии
        </x-search.links>
    </div>
    {{-- Input type search --}}
    <div class="w-96 flex-shrink-0 flex gap-2 items-center border-b border-gray-600 hidden md:flex">
        <div class="cursor-default pb-1">
            <svg
                class="w-5 h-5 text-gray-700 pointer-events-none transition-colors dark:text-gray-500"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        <div class="ml-3 w-full ">
            <form method="GET" action="/">
               <label>
                   <input
                       class="text-sm bg-dark-700 text-gray-300 border-none focus:outline-none w-full m-0 pt-0"
                       style="box-shadow: none"
                       type="text"
                       name="contextSearch"
                       value="{{ request()->input('contextSearch') }}"
                       placeholder="Поиск..."
                   />
               </label>
            </form>
        </div>
    </div>
</section>


