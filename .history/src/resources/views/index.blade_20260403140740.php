@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="category">
        <a href="{{ route('index.index') }}" class="category-a"><h3 class="category-item">おすすめ</h3></a>
        <a href="{{ route('mylist.index') }}" class="category-a"><h3 class="category-mylist">マイリスト</h3></a>
    </div>
    <div class="form-list">
        <div class="list">
        @foreach ($merchandises as $merchandise)
            <div class="list-item">
                @if(empty($merchandise->id))
            <p style="color:red;">IDが空の商品があります！名前: {{ $merchandise->merchandise_name }}</p>
                @else
                <a href="{{ route('item.show', ['item_id' => $merchandise->id]) }}"><img src="{{ asset( $merchandise->image) }}" alt="商品画像" class="form-img"></a>
                <input type="hidden" name="{{ $merchandise->profile_id }}">
                @endif
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