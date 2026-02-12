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
        <img class="content-img" src="" alt="商品画像">
    </div>

    <div class="detail">
        <h2 class="title-h">商品の詳細</h2>
    </div>
    <div class="content">
        <h3 class="content-h">カテゴリー</h3>
        <label><input type="checkbox"><span>ファッション</span></label>
        <label><input type="checkbox"><span>家電</span></label>
        <label><input type="checkbox"><span>インテリア</span></label>
        <label><input type="checkbox"><span>レディース</span></label>
        <label><input type="checkbox"><span>メンズ</span></label>
        <label><input type="checkbox"><span>コスメ</span></label>
        <label><input type="checkbox"><span>本</span></label>
        <label><input type="checkbox"><span>ゲーム</span></label>
        <label><input type="checkbox"><span>スポーツ</span></label>
        <label><input type="checkbox"><span>キッチン</span></label>
        <label><input type="checkbox"><span>ハンドメイド</span></label>
        <label><input type="checkbox"><span>アクセサリー</span></label>
        <label><input type="checkbox"><span>おもちゃ</span></label>
        <label><input type="checkbox"><span>ベビー・キッズ</span></label>
    </div>
    <div class="content">
        <h3 class="content-h">商品の状態</h3>
        <select class="content-condition" name="condition">
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