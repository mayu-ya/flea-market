@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="title">
        <h1 class="title-h">プロフィール設定</h1>
    </div>

    <form class="form" action="/mypage" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-img">
            <div class="img">
                <img src="" class="img-picture">
            </div>
            <div class="img-input">
                <input type="file" class="img-input-file" name="profile_img"><label>画像を選択する</label>
            </div>
        </div>

        <div class="form-content">
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <span class="form-span">ユーザー名</span>
            <div class="form-input">
                <input type="text" class="form-input-text" name="name" value="{{ old('name', $profile['name'] ?? '') }}">
            </div>
        </div>
        <div class="form-content">
            <span class="form-span">郵便番号</span>
            <div class="form-input">
                <input type="text" class="form-input-text" name="post_code" value="{{ old('post_code', $profile['post_code'] ?? '') }}" placeholder="ハイフン(-)を含む">
            </div>
        </div>
        <div class="form-content">
            <span class="form-span">住所</span>
            <div class="form-input">
                <input type="text" class="form-input-text" name="address" value="{{ old('address', $profile['address'] ?? '') }}">
            </div>
        </div>
        <div class="form-content">
            <span class="form-span">建物名</span>
            <div class="form-input">
                <input type="text" class="form-input-text" name="building" value="{{ old('building', $profile['building'] ?? '') }}">
            </div>
        </div>
        <div class="form-button">
            <button class="form-button-submit">更新する</button>
        </div>
    </form>
</div>
@endsection