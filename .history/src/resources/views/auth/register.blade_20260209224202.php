@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css">
@endsection

@section('content')
<div class="content">
    <div class="title">
        <h1 class="title-logo">会員登録</h1>
    </div>

    <form class="form">
        <div class="form-content">
            <span class="form-span">ユーザー名</span>
            <div class="form-input">
                <input type="text" class="form-input-text">
            </div>
        </div>
        <div class="form-content">
            <span class="form-span">メールアドレス</span>
            <div class="form-input">
                <input type="text" class="form-input-text">
            </div>
        </div>
        <div class="form-content">
            <span class="form-span">パスワード</span>
            <div class="form-input">
                <input type="text" class="form-input-text">
            </div>
        </div>
        <div class="form-content">
            <span class="form-span">確認用パスワード</span>
            <div class="form-input">
                <input type="text" class="form-input-text">
            </div>
        </div>
        <div class="form-button">
            <button class="form-button-submit" type="submit">登録する</button>
        </div>
        <div class="form-a">
            <a href="/login" class="form-a-login">ログインはこちら</a>
        </div>
    </form>
</div>
@endsection