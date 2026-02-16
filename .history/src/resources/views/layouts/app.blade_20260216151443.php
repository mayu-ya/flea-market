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
                <a href="/"><img src="../img/logo.png" alt="COACHTECHヘッダーロゴ" class="header-logo"></a>
            </div>
            <form class="header-form">
                <div class="header-input">
                    <input type="search" class="header-inpu-search" placeholder="なにをお探しですか？">
                </div>
            </form>
            <nav class="nav">
                <ul class="nav-list">
                    @if (Auth::check())
                    <li><form action="/logaut" method="post">
                            @csrf
                            <button type="submit" class="button-logout">ログアウト</button>
                        </form>
                    </li>
                    <li><a href="/mypage" class="header-a">マイページ</a></li>
                    <li><a href="/sell" class="header-a-sell">出品</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>