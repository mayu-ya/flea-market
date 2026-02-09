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
            <span class="form-span"></span>
            <div class="form-input">
                <input type="text" class="form-input-text">
            </div>
        </div>
        <div class="form-content">
            <span class="form-span"> </span>
            <div class="form-input">
                <input type="text" class="form-input-text">
            </div>
        </div>
        <div class="form-content">
            <span class="form-span"></span>
            <div class="form-input">
                <input type="text" class="form-input-text">
            </div>
        </div>
        <div class="form-content">
            <span class="form-span"></span>
            <div class="form-input">
                <input type="text" class="form-input-text">
            </div>
        </div>
    </form>
</div>
@endsection