@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<form class="form">
    <div class="content">
        <div class="content-item"></div>
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
            <select name="" id="" class="pay-select">
                <option value="">選択してください</option>
                <option value="">コンビニ払い</option>
                <option value="">カード支払い</option>
            </select>
        </div>
        <div class="button">
            <button class="button-submit" type="submit">購入する</button>
        </div>
    </div>
    <div class="content">
        <div class="address">
            <div class="address-content">
                <div class="address-item">配送先</div>
                <div class="address-a">
                    <a class="address-a-nav" href="">変更する</a>
                </div>
            </div>  
            <div class="address-input">
                <label for="">〒<input type="text" name="post_code"></label>
                <input type="text" class="address-input" name="address">
                <input type="text" class="address-input" name="building">
            </div>
        </div>
    </div>
</form>
@endsection