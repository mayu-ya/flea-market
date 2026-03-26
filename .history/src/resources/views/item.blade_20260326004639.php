@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="form-img">
        <img src="" alt="" class="img-picture">
    </div>

    <div class="content-infoemation">
        <div class="content-item">
            <div class="title">
                <h2 class="titile-h">{{ $merchandise->merchandise_name }}</h2>
                <p class="brand_name">{{ $merchandise->brand_name }}</p>
            </div>
            <div class="money">
                <label for="">￥</label>
                <input type="text" class="information-input" value="{{ $merchandise->price }}" readonly>
            </div>
            <div class="img">
                <div>
                    @if($merchandise->is_liked_by_auth_user())
                        <a href="{{ route('reply.unlike', ['id' => $merchandise->id]) }}"><img src="../img/heart-logo-p.png" alt="" class="img-unlike"><span class="img-span">{{ $merchandise->likes->count() }}</span></a>
                    @else
                        <a href="{{ route('reply.like', ['id' => $merchandise->id]) }}"><img src="../img/heart-logo.png" alt="" class="img-like"><span class="img-span">{{ $merchandise->likes->count() }}</span></a>
                    @endif
                </div>
                <div>
                    <img src="../img/speech.png" alt="コメント" class="img-comment"><span class="img-span">{{ $merchandise->comments->count() }}</span>
                </div>
            </div>
            <div class="button">
                <a href="{{ route('purchase.index', [$merchandise->id]) }}" class="button-a">購入手続きへ</a>
            </div>
            <h3 class="explanation">商品説明</h3>
            <div class="explan">
                <textarea class="explan-textarea" name="explan" readonly>{{ $merchandise->explanation }}</textarea>
            </div>
            <h3 class="explanation">商品の情報</h3>
            <div class="information">
                <div class="information-title">
                    <span class="information-span">カテゴリー</span>
                    @foreach($merchandise->details as $category)
                    <input type="text" class="information-input" value="{{ $category->content }}">
                    @endforeach
                </div>
                <div class="information-title">
                    <span class="information-span">商品の状態</span>
                    @php
                        $conditiontext = [1 => '良好', 2 => '目立った傷や汚れなし', 3 => 'やや傷や汚れあり', 4 => '状態が悪い'][ $merchandise->condition ];
                    @endphp
                    <input type="text" class="information-input" value="{{ $conditiontext }}">
                </div>
            </div>
        </div>
        <form class="form-comment" action="/posts/comment" method="post">
            @csrf
            <h3 class="comment">コメント</h3>
            <div class="profile">
                @foreach($merchandise->comments as $comment)
                <div class="profile-avatar">
                    <img src="" alt="" class="profile-img">
                    <input type="text" class="profile-input" value="{{ $comment->profile->name ?? '' }}" readonly>
                </div>
                <textare name="contact" class="profile-textarea" readonly>{{ $comment->contact ?? '' }}</textare>
                @endforeach
            </div>
            <div class="text">
                <span class="comment-span">商品へのコメント</span>
                <textarea class="comment-textarea" name="contact"></textarea>
                <input type="hidden" name="merchandise_id" value="{{ $merchandise->id }}">
                <input type="hidden" name="profile_id" value="{{ $profile->id }}">
            </div>
            <div class="comment-button">
                <button class="comment-button-submit" type="submit">コメントを送信する</button>
            </div>
        </form>
    </div>
    
</div>
@endsection