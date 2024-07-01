@extends('layouts.app')
@section('title','アカウント一覧')
@section('items','link-secondary')
@section('body')
    <!--アイテム一覧表示-->
    <h1>■アイテム一覧■</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>種別</th>
            <th>効果値</th>
            <th>説明</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item['id']}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['type']}}</td>
                <td>{{$item['effect']}}</td>
                <td>{{$item['info']}}</td>
            </tr>
        @endforeach
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
@endsection
