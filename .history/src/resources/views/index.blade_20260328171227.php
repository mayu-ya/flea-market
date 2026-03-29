@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="category">
        <a href="{{ route('index.index') }}" class="category-a"><h3 class="category-item">おすすめ</h3></a>
        @if(Auth::check())
        <a href="" class="category-a"><h3 class="category-mylist">マイリスト</h3></a>
        @endif
    </div>
    <div class="form-list">
        <div class="list">
        @foreach ($merchandises as $merchandise)
            <div class="list-item">
                <a href="{{ route('item.show', [$merchandise->id]) }}"><img src="{{ $merchandise->image }}" alt="商品画像" class="form-img"></a>
                <input type="hidden" name="{{ $merchandise->profile_id }}">
                <div class="font">
                    <div class="name">{{ $merchandise->merchandise_name }}</div>
                    <div class="sold">
                        @if($merchandise->purchase)
                       <p class="sold-p">sold</p>
                       @endif
                    </div>
                </div>
            </div>
        @endforeach 
        </div>
    </div>
</div>
@endsection