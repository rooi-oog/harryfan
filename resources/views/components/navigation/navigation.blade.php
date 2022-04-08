<nav
    x-data="
{
    filterText: '',

    openHeading (node) {
        var n = node.parentNode.classList.contains('sub--on');
        document.querySelectorAll('.heading_list ul li').forEach((function (e) {
            e.classList.remove('sub--on');
        }));
        n || node.parentNode.classList.add('sub--on');
    },

    filterList () {
        if (this.filterText !== '') {
            var li = $refs.lst.getElementsByTagName('li');
            for (var i = 0; i < li.length; i++) {
                var link = li[i].getElementsByTagName('h2')[0].getElementsByTagName('a')[0];
                if (link.textContent.toUpperCase().indexOf(this.filterText.toUpperCase()) > -1) {
                    li[i].style.display = '';
                } else {
                    li[i].style.display = 'none';
                }
            }
        }
    }
}"

    class="heading_list leading-7"
>
    @if (in_array ($display, array ('author', 'series')))
        <div class="border-b border-gray-700 items-center flex mb-5 w-full">
            <span class="cursor-pointer">
                <svg class="w-5 h-5 text-gray-700 pointer-events-none transition-colors dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </span>
                <span class="ml-3 w-full ">
               <label><input class="text-sm bg-dark-800 text-gray-300 border-0 focus:outline-none w-full"  @input="filterList()" x-model="filterText" type="text" name="contextSearch" placeholder="Фильтр..." /></label>
            </span>
        </div>
    @endif


    <ul>
        @switch($display)
        @case ('author')
        @case ('series')
            <div x-ref="lst">
                @foreach($data as $item)
                    <li @class(['relative active' => $item->id == request($display)])>
                        <h2>
                            <a href="?{{ $display }}={{$item->id}}">
                                {{ $display === 'author' ? $item->full_name : $item->title }}
                            </a>
                        </h2>
                    </li>
                @endforeach
            </div>
            @break

            {{-- Show heading list by default --}}
        @default ()
            @foreach($data as $heading)
                <li
                    @class([
                        'sub--on'
                            => !is_null($heading->categories->find(request('category'))) ||
                                !is_null($heading->sections->find(request('section')))

                    ])
                >
                    <h2 @click="openHeading ($el)">{{ $heading->title }}</h2>
                    <ul>
                        @foreach($heading->categories as $category)
                            <li @class(['relative active' => $category->id == request('category')])>
                                @if (count ($category->sections))
                                    {{ $category->title  }}

                                    <ul class="pl-5">
                                        @foreach ($category->sections as $section)
                                            <li @class(['relative active' => $section->id == request('section')])>
                                                <h2>
                                                    <a href="?section={{$section->id}}">
                                                        {{ $section->title }}
                                                    </a>
                                                </h2>
                                            </li>
                                        @endforeach
                                    </ul>

                                @else
                                    <h2>
                                        <a href="?category={{$category->id}}">
                                            {{ $category->title }}
                                        </a>
                                    </h2>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
            @break

        @endswitch


    </ul>
</nav>

<script>
    e = document.getElementsByClassName('active')[0];
    e && e.scrollIntoView({behavior: "auto", block: "center"});
</script>

