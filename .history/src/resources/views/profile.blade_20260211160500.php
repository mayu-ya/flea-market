@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="title">
        <h1 class="title-h">プロフィール設定</h1>
    </div>

    <form class="form-img">
        <div class="img"></div>
        <div class="img-button">
            <button class="img-button-submit">画像を選択する</button>
        </div>
    </form>

    <form class="form">
        <div class="form-content">
            <span class="form-span">ユーザー名</span>
            <div class="form-input">
                <input type="text" class="form-input-text">
            </div>
        </div>
        <div class="form-content">
            <span class="form-span">郵便番号</span>
            <div class="form-input">
                <input type="text" class="form-input-text">
            </div>
        </div>
        <div class="form-content">
            <span class="form-span">住所</span>
            <div class="form-input">
                <input type="text" class="form-input-text">
            </div>
        </div>
        <div class="form-content">
            <span class="form-span">建物名</span>
            <div class="form-input">
                <input type="text" class="form-input-text">
            </div>
        </div>
        <div class="form-button">
            <button class="form-button-submit">更新する</button>
        </div>
    </form>
</div>
@endsection