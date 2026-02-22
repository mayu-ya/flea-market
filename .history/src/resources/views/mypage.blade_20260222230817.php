@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="profile">
    <div class="profile-div">
        <img src="" alt="プロフィール画像" class="profile-img">
        <h2 class="profile-h">ユーザー名</h2>
    </div>
    <a href="{{ route('profile.index') }}" class="profile-a">プロフィールを編集</a>
</div>
@endsection