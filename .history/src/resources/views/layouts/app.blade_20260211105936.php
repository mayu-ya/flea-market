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
                <img src="../img/COACHTECHヘッダーロゴ.png" alt="COACHTECHヘッダーロゴ" class="header-logo" width="240" hight="80">
            </div>
            <form class="header-form">
                <div class="header-input">
                    <input type="search" class="header-inpu-search">
                </div>
            </form>
            <nav class="nav">
                <ul class="nav-list">
                    <li class="nav-item"><a href="" class="header-a">ログアウト</a></li>
                    <li class="nav-item"><a href="/mypage" class="header-a">マイページ</a></li>
                    <li class="nav-item"><a href="/sell" class="header-a-sell">出品</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>