@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/email.css') }}">
@endsection

@section(content)
<div class="content">
    <h2 class="content-h">
        登録していただいたメールアドレスに認証メールをそうふしました。<br>メール認証を完了してください。
    </h2>
    <form action="">
        <button>認証はここから</button>
    </form>
    
</div>
@endsection