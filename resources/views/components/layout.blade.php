{{--
           │        ┐  ┐                        ───┐
        ─══╬══─     └─ │  ──┐  ──┐  ──┐  ┐  ┐   └─    ──┐  ┐──┐
           │        │  │  └ └┐ │    │    └─ │   │     └ └┐  │ │
                                            │                              │
        ▓▓▓▓▓▓▓▓▓░    ▓▓▓▓▓▓▓▓▓▓▓▓▓░            ▓▓▓▓▓▓▓▓▓▓▓▓▓░          ─══╬══─
       ▓▓▓▓▓▓▓▓▓▓▓░   ▓▓▓▓▓▓▓▓▓▓▓▓▓░            ▓▓▓▓▓▓▓▓▓▓▓▓▓░             │
      ▓▓▓▓░    ▓▓▓▓░  ▓▓▓▓░                     ▓▓▓▓░
      ▓▓▓▓░           ▓▓▓▓░         ▓▓▓▓▓▓░     ▓▓▓▓░
      ▓▓▓▓░           ▓▓▓▓░        ▓▓▓░ ▓▓▓░    ▓▓▓▓░
       ▓▓▓▓▓▓▓▓▓▓░    ▓▓▓▓▓▓▓▓░    ▓▓▓░ ▓▓▓░    ▓▓▓▓▓▓▓▓░
        ▓▓▓▓▓▓▓▓▓▓░   ▓▓▓▓▓▓▓▓░     ▓▓▓▓▓░      ▓▓▓▓▓▓▓▓░
               ▓▓▓▓░  ▓▓▓▓░       ▓▓▓▓▓▓░ ▓▓▓░  ▓▓▓▓░
               ▓▓▓▓░  ▓▓▓▓░      ▓▓▓▓░ ▓▓▓▓▓░   ▓▓▓▓░
      ▓▓▓▓░    ▓▓▓▓░  ▓▓▓▓░      ▓▓▓▓░ ▓▓▓▓░    ▓▓▓▓░
       ▓▓▓▓▓▓▓▓▓▓▓░   ▓▓▓▓░       ▓▓▓░ ▓▓▓▓▓░   ▓▓▓▓░    Fido:  2:463/2.5
        ▓▓▓▓▓▓▓▓▓░    ▓▓▓▓░        ▓▓▓▓▓░ ▓▓▓░  ▓▓▓▓░    SysOp: Harry Fantasyst

     Одно из самых больших    ┐          ┐                   ┐
       собраний текстов       │     ──┐  └─┐  ──┐  ──┐  ──┐  └─┐  ──┐  ──┐  ┐  ┐
     (особенно фантастики)    └──┐  └ └┐ └ │  └ │  │    └ └┐ └─┐  └ │  │    └─ │
     на территории ex-USSR                                                     │
    --}}

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

<body class="antialiased h-screen bg-dark-700">
    <main class="flex w-full text-sm bg-dark-700 text-gray-300 relative">
        {{ $slot }}
    </main>
    <footer class="bg-dark-700 text-gray-300 text-xs px-5 py-10 max-h-32">
        <p>Fido:  2:463/2.5</p>
        <p>SysOp: <span class="text-indigo-500">Harry Fantasyst</span></p>
        <p>Одно из самых больших собраний текстов (особенно фантастики) на территории ex-USSR</p>
    </footer>
</body>
</html>
