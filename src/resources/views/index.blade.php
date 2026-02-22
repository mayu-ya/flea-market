@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<form action="" class="form">
    <div class="form-category">
        <label><input type="radio"><span>おすすめ</span></label>
        <label><input type="radio"><span>マイリスト</span></label>
    </div>
    <div class="form-list">
        <div class="list">
            @foreach ($merchandises as $merchandise)
                <a href=""><img src="{{ $merchandise->image }}" alt="商品画像" class="form-img"></a>
                <div class="font">
                    <div class="name">{{ $merchandise->merchandise_name }}</div>
                    <div class="sold">
                       <p class="sold-p">sold</p>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
</form>
@endsection