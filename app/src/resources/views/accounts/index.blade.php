<html lang="ja">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<!--ヘッダー-->
<div class="container">
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="index.blade.php" class="d-inline-flex link-body-emphasis text-decoration-none">
                <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="{{route('accounts.index')}}" class="nav-link px-2 link-secondary">アカウント一覧</a></li>
            <li><a href="{{route('accounts.create')}}" class="nav-link px-2">アカウント登録</a></li>
            <li><a href="{{route('accounts.user-list')}}" class="nav-link px-2">ユーザー一覧</a></li>
            <li><a href="{{route('accounts.item')}}" class="nav-link px-2">アイテム一覧</a></li>
            <li><a href="{{route('accounts.have-item')}}" class="nav-link px-2">所持アイテム一覧</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <form method="post" action="{{route('doLogout')}}">
                @csrf
                <button type="submit" class="btn btn-outline-primary me-2">ログアウト</button>
                <input type="hidden" name="action" value="doLogout">
            </form>
        </div>
    </header>
</div>

<h1>■アカウント一覧</h1>
<form method="post" action="/accounts/index">
    <input type="text" name="name_index" placeholder="名前を入力">
    <button type="submit">検索</button>
    @csrf
</form>

<table class="table">
    <tr>
        <th>名前</th>
        <th>パス</th>
        <th>操作</th>
    </tr>
    @foreach($accounts as $account)
        <tr>
            <td>{{$account['name']}}</td>
            <td>{{$account['password']}}</td>
            <td>
                <button type='submit'>削除</button>
            </td>
        </tr>
    @endforeach
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>
