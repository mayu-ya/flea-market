@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<form class="form">
    <div class="title">
        <h1 class="title-logo">商品の出品</h1>
    </div>
    <div class="content">
        <h3 class="content-h">商品画像</h3>
        <input type="text" class="content-img">
    </div>

    <div class="detail">
        <h2 class="title-h">商品の詳細</h2>
    </div>
    <div class="content">
        <h3 class="content-h">カテゴリー</h3>
        <input type="checkbox" class="content-input" id="fashion"><label name="input-label" for="fashion">ファッション</label>
        <input type="checkbox" class="content-input" id="appliances"><label for="appliances">家電</label>
        <input type="checkbox" class="content-input" id="interior"><label for="interior">インテリア</label>
        <input type="checkbox" class="content-input" id="womens"><label for="womens">レディース</label>
        <input type="checkbox" class="content-input" id="mens"><label for="mens">メンズ</label>
        <input type="checkbox" class="content-input" id="cosmetics"><label for="cosmetics">コスメ</label>
        <input type="checkbox" class="content-input" id="book"><label for="book">本</label>
        <input type="checkbox" class="content-input" id="game"><label for="game">ゲーム</label>
        <input type="checkbox" class="content-input" id="sport"><label for="sport">スポーツ</label>
        <input type="checkbox" class="content-input" id="kitchen"><label for="kitchen">キッチン</label>
        <input type="checkbox" class="content-input" id="handmade"><label for="handmade">ハンドメイド</label>
        <input type="checkbox" class="content-input" id="accessories"><label for="accessories">アクセサリー</label>
        <input type="checkbox" class="content-input" id="toy"><label for="toy">おもちゃ</label>
        <input type="checkbox" class="content-input" id="kids"><label for="kids">ベビー・キッズ</label>
    </div>
    <div class="content">
        <h3 class="content-h">商品の状態</h3>
        <select name="condition">
            <option value="">選択してください</option>
            <option value="">良好</option>
            <option value="">目立った外傷なし</option>
            <option value="">やや傷や汚れあり</option>
            <option value="">状態が悪い</option>
        </select>
    </div>

    <div class="detail">
        <h2 class="title-h">商品名と説明</h2>
    </div>
    <div class="content">
        <h3 class="content-h">商品名</h3>
        <input type="text" class="content-text">
    </div>
    <div class="content">
        <h3 class="content-h">ブランド名</h3>
        <input type="text" class="content-text">
    </div>
    <div class="content">
        <h3 class="content-h">商品名</h3>
        <textarea class="content-textarea" name=""></textarea>
    </div>
    <div class="content">
        <h3 class="content-h">販売価格</h3>
        <label for="price">￥</label>
        <input type="text" class="content-text" name="price" id="price">
    </div>

    <div class="button">
        <button class="button-submit">出品する</button>
    </div>
</form>
@endsection