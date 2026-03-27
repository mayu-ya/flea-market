@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<form class="form" action="{{ route('purchase.store', [$merchandise->id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="content-item">
            <div class="item">
                <img src="" alt="商品画像" class="item-img">
            </div>
            <div class="item">
                <div class="item-input">
                    <input type="hidden" name="merchandise_id" value="{{ $merchandise->id }}">
                    <input type="text" class="input" value="{{ $merchandise->merchandise_name }}" readonly><br>
                    <label>￥<input type="text" class="input" value="{{ $merchandise->price }}" readonly></label>
                </div>
            </div>
        </div>
        <table class="table">
            <tr class="table-tr">
                <th class="table-th">商品代金</th>
                <td class="table-td"></td>
            </tr>
            <tr class="table-tr">
                <th class="table-th">支払方法</th>
                <td class="table-td"></td>
            </tr>
        </table>
    </div>
    <div class="content">
        <div class="pay">
            <div class="pay-item">支払い方法</div>
            <select name="pay" id="" class="pay-select">
                <option value="">選択してください</option>
                <option value="1">コンビニ払い</option>
                <option value="2">カード支払い</option>
            </select>
        </div>
        <div class="button">
            <button class="button-submit" type="submit">購入する</button>
        </div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <div class="content">
        <div class="address">
            <div class="address-content">
                <div class="address-item">配送先</div>
                <div class="address-a">
                    <a class="address-a-nav" href="{{ route('address.index', [$merchandise->id]) }}">変更する</a>
                </div>
            </div>  
            <div class="address-in">
                <label for="">〒<input type="text" name="post_code" value="{{ $profile->post_code }}" readonly></label><br>
                <input type="text" class="address-input" name="address" value="{{ $profile->address }}" readonly>
                <input type="text" class="address-input" name="building" value="{{ $profile->building ?? '' }}" readonly>
                <input type="hidden" name="profile_id" value="{{ $profile->id }}">
            </div>
        </div>
    </div>
</form>
@endsection