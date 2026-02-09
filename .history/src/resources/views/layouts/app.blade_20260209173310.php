<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flea-market</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header>
        <div class="header">
            <div class="header-inner">
                <img src="resources/views/img/COACHTECHヘッダーロゴ.png" alt="COACHTECHヘッダーロゴ" class="header-logo">
            </div>
            @yield('header')
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>