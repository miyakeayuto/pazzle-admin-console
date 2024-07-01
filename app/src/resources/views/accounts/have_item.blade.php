@extends('layouts.app')
@section('title','所持アイテム一覧')
@section('haveItems','link-secondary')
@section('body')
    <!--所持アイテム一覧表示-->
    <h1>■所持アイテム一覧■</h1>
    <table class="table">
        <tr>
            <th>ID</th>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
@endsection
