@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage_buy.css') }}">
@endsection

@section('content')
<div class="profile">
    <div class="profile-div">
        <img src="{{ asset($profile->profile_img) ?? '' }}" alt="プロフィール画像" class="profile-img">
        <h2 class="profile-h">{{ $profile->name ?? '' }}</h2>
    </div>
    <a href="{{ route('profile.index') }}" class="profile-a">プロフィールを編集</a>
</div>
<div class="content">
    <div class="category">
        <a href="{{ route('mypage_sell.index') }}" class="category-a"><h3 class="category-item">出品した商品</h3></a>
        <a href="{{ route('mypage_buy.index') }}" class="category-a"><h3 class="category-mylist">購入した商品</h3></a>
    </div>
    <div class="form-list">
        @foreach ($merchandises as $merchandise)
        <div class="list">
            <div class="list-item">
                <img src="{{ $merchandise->image }}" alt="商品画像" class="form-img">
                <div class="font">
                    <div class="name">{{ $merchandise->merchandise_name }}</div>
                </div>
            </div> 
        </div>
        @endforeach 
    </div>
</div>
@endsection