@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mylist.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="category">
        <a href="{{ route('index.index') }}" class="category-a"><h3 class="category-item">おすすめ</h3></a>
        <a href="{{ route('mylist.index') }}" class="category-a"><h3 class="category-mylist">マイリスト</h3></a>
    </div>
    <div class="form-list">
        <div class="list">
        @if(Auth::check())    
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
        @endif 
        </div>
    </div>
</div>
@endsection