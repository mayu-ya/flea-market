@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="form-img">
        <img src="" alt="">
    </div>

    <div class="content-infoemation">
        <form class="form">
            <div class="content-item">
                <div class="title">
                    <h2 class="titile-h">商品名</h2>
                    <p class="brand_name">ブランド名</p>
                </div>
                <div class="money">
                    <label for="">￥</label>
                    <input type="text" class="money">
                </div>
                <div class="img">
                    <img src="" alt="">
                    <img src="" alt="">
                </div>
                <div class="button">
                    <button class="button-submit">購入手続きへ</button>
                </div>
                <h3 class="explanation">商品説明</h3>
                <div class="explan">
                    <textarea class="explan-textarea" name="" id=""></textarea>
                </div>
                <h3 class="explanation">商品の情報</h3>
                <div class="information">
                    <div class="information-title">
                        <span class="information-span">カテゴリー</span>
                        <input type="text" class="information-input">
                    </div>
                    <div class="information-title">
                        <span class="information-span">商品の状態</span>
                        <input type="text" class="information-input">
                    </div>
                </div>
            </div>
        </form>
        <form class="form-comment">
            <h3 class="comment">コメント</h3>
            <div class="profile"></div>
            <div class="text">
                <span class="comment-span">商品へのコメント</span>
                <textarea class="comment-textarea" name="" id=""></textarea>
            </div>
            <div class="comment-button">
                <button class="comment-button-submit" type="submit">コメントを送信する</button>
            </div>
        </form>
    </div>
    
</div>
@endsection