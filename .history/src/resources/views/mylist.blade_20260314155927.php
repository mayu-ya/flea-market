@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<form action="" class="form">
    <div class="form-category">
        <a href="" class="category-a"><h3 class="category">おすすめ</h3></a>
        <a href="" class="category-a"><h3 class="category-mylist">マイリスト</h3></a>
    </div>
    <div class="form-list">
        <div class="list">
        @foreach ($merchandises as $merchandise)
            <div class="list-item">
                <a href="{{ route('item.show', [$merchandise->id]) }}"><img src="{{ $merchandise->image }}" alt="商品画像" class="form-img"></a>
                <div class="font">
                    <div class="name">{{ $merchandise->merchandise_name }}</div>
                    <div class="sold">
                       <p class="sold-p">sold</p>
                    </div>
                </div>
            </div>
        @endforeach 
        </div>
    </div>
</form>
@endsection