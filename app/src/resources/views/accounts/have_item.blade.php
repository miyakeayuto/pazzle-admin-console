@extends('layouts.app')
@section('title','所持アイテム一覧')
@section('haveItems','link-secondary')
@section('body')
    <!--所持アイテム一覧表示-->
    <h1>■所持アイテム一覧■</h1>
    <form method="post" action={{ route('accounts.have-item') }}>
        <input type="text" name="id_find" placeholder="ユーザーIDを入力">
        <button type="submit">検索</button>
        @csrf
    </form>
    <table class="table">
        <tr>
            <th>プレイヤー名</th>
            <th>アイテム名</th>
            <th>所持個数</th>
        </tr>
        @foreach ($have_items as $have)
            <tr>
                <td>{{$have['id']}}</td>
                <td>{{$have['user_name']}}</td>
                <td>{{$have['item_name']}}</td>
                <td>{{$have['possession']}}</td>
            </tr>
        @endforeach
    </table>
@endsection
