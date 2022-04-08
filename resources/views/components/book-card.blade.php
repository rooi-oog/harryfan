<article x-data="{}"
    class="lg:w-80 lg:h-72 w-full h-72 shadow-md hover:shadow-xl hover:shadow-dark-900 shadow-dark-900 whitespace-normal cursor-default ring-1 ring-dark-800 relative rounded-lg"
    @click="location.href = '/book/{{$book->id}}';"
>
    @if (!strpos($book->file->path, "bz2"))
        <img
            src="books/{{$book->file->path}}"
            alt="not found"
            class="relative object-cover w-full h-full overflow-hidden rounded-lg ring-1 ring-gray-300 cursor-pointer"
        />
        <div class="absolute bottom-2 right-1 mt-1 ml-1 p-0.5 text-fuchsia-900 font-extrabold text-sm bg-gray-100 rounded-sm">
            {{ $book->authors[0]->full_name }} @unless(empty ($book->title)) : {{ $book->title }} @endunless
        </div>
    @else
        <div class="ring-1 ring-gray-300 w-32 h-48 float-left m-2 overflow-hidden text-[0.6rem] leading-[0.6rem] p-1 rounded-lg text-dark-700 bg-gray-300">
            @php
                $path = "books/" . $book->file->path;
                if (file_exists($path)) {
                    $bz = bzopen ($path, 'r');
                    if ($bz) {
                        $file = bzread($bz, 1024);
                        print ($file);
                        bzclose($bz);
                    }
                }
            @endphp
        </div>

    <div class="m-2 flex flex-col space-y-5 overflow-hidden">

        <h5 class="font-extrabold break-words">
            {{$book->title}}
        </h5>

        <h5 class="font-extralight flex flex-col space-y-2">
            @foreach($book->authors as $author)
                <a class="hover:text-red-500" href="?author={{$author->id}}">
                    {{$author->full_name}}
                </a>
            @endforeach
        </h5>

        @isset ($book->series->title)
            <h6 class="text-sm">Цикл:
                <a class="hover:text-red-500" href="?series={{$book->series->id}}">
                    {{$book->series->title}}
                </a>
                @isset($book->series_vol)
                    #{{$book->series_vol}}
                @endisset
            </h6>
        @endisset
    </div>

    <div>
        {{$book->file->content}}
    </div>
    <a href="/book/{{$book->id}}" class="absolute right-2 bottom-2 ring-2 ring-indigo-900 p-2 rounded-lg cursor-pointer hover:bg-indigo-900">Подробнее...</a>
    @endif
</article>
