@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<form class="form">
    <div class="title">
        <h1 class="title-h">商品の出品</h1>
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
        <input type="checkbox" class="content-input">ファッション
        <input type="checkbox" class="content-input">家電
        <input type="checkbox" class="content-input">インテリア
        <input type="checkbox" class="content-input">レディース
        <input type="checkbox" class="content-input">メンズ
        <input type="checkbox" class="content-input">コスメ
        <input type="checkbox" class="content-input">本
        <input type="checkbox" class="content-input">ゲーム
        <input type="checkbox" class="content-input">スポーツ
        <input type="checkbox" class="content-input">キッチン
        <input type="checkbox" class="content-input">ハンドメイド
        <input type="checkbox" class="content-input">アクセサリー
        <input type="checkbox" class="content-input">おもちゃ
        <input type="checkbox" class="content-input">ベビー・キッズ
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