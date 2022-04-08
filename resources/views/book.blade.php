<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HarryFan Lib</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body class="antialiased bg-dark-700 text-gray-300 text-sm">
    <div class="container mx-auto">
        <div class="ml-2 md:ml-10">
            <x-search.search-panel class="py-5 w-0 mb-10" :display="NULL" />

            @if ($pageIsImage)
                <img src="{{$content}}" alt="image" class="pr-4 pl-2" />
            @else
                <pre class="whitespace-pre-line md:whitespace-pre">
                    {{ $content }}
                </pre>
            @endif

            <footer class="bg-dark-700 text-gray-300 text-xs py-5 max-h-32">
                <p>Fido:  2:463/2.5</p>
                <p>SysOp: <span class="text-indigo-500">Harry Fantasyst</span></p>
                <p>Одно из самых больших собраний текстов (особенно фантастики) на территории ex-USSR</p>
            </footer>
        </div>
    </div>
</body>
</html>
