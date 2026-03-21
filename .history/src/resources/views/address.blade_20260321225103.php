@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="title">
        <h1 class="title-logo">住所の変更</h1>
    </div>

    <form class="form" action="/purchase/{item_id}" method="post">
        @csrf
        <div class="form-content">
            <span class="form-span">郵便番号</span>
            <div class="form-input">
                <input type="text" class="form-input-text" name="post_code" value="{{ $profile->post_code }}">
            </div>
        </div>
        <div class="form-content">
            <span class="form-span">住所</span>
            <div class="form-input">
                <input type="text" class="form-input-text" name="address" value="{{ $profile->address }}">
            </div>
        </div>
        <div class="form-content">
            <span class="form-span">建物名</span>
            <div class="form-input">
                <input type="text" class="form-input-text" name="building" value="{{ $profile->building ?? '' }}">
            </div>
        </div>
        <div class="form-button">
            <button class="form-button-submit" type="submit">更新する</button>
        </div>
    </form>
</div>
@endsection