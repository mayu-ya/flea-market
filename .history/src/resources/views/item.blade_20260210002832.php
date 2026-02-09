@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('content')
<form class="form">
    <div class="form-img">
        <input type="text" class="form-img-input">
    </div>

    <h2></h2>
    <table class="table">
    </table>
</form>
@endsection