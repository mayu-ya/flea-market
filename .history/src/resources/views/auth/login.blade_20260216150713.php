@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<form class="form" action="/login" method="post">
    @csrf
    <div class="title">
        <h1 class="form-title">ログイン</h1>
    </div>

    <div class="form-content">
        <span class="form-span">メールアドレス</span>
        <div class="form-error">
            // 
        </div>
        <div class="form-input">
            <input type="text" class="form-input-text" value="{{ old('email') }}">
        </div>
    </div>
    <div class="form-content">
        <span class="form-span">パスワード</span>
        <div class="form-error">
            // 
        </div>
        <div class="form-input">
            <input type="text" class="form-input-text" name="password">
        </div>
    </div>
    <div class="form-button">
        <button class="form-button-submit">ログインする</button>
    </div>
    <div class="form-a">
        <a href="/register" class="form-a-register">会員登録はこちら</a>
    </div>
</form>
@endsection