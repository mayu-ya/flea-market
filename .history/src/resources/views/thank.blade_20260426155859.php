@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thank.css') }}">
@endsection

@section('content')
<div class="content">
    <h1 class="content-h">購入が完了しました</h1>
    <a href="/" class="content-a">トップ画面に戻る</a>
</div>
@endsection