<?php

namespace App\Http\Controllers;


use App\Models\Account;
use App\Models\HaveItem;
use App\Models\Item;
use App\Models\Player;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //アカウント一覧を表示する
    public function index(Request $request)
    {
        if (isset($request['name_index'])) {
            //nameが指定されていたら
            $accounts = Account::where('name', '=', $request['name_index'])->get();
        } else {
            //テーブルの全てのレコードを表示
            $accounts = Account::All();
        }

        //デバッグ

        //AccountControllerのindex関数に指定したIDを渡せる。※dd関数はデバッグ用表示
        //dd($request->account_id);

        //DebugBar::info('てりやきマックうまかった');
        //DebugBar::error('チキチー食べたい');

        //セッションに指定のキーで値を保存
        //$request->session()->put('key', 5);
        //$request->session()->put('key2', 8);

        //セッションから指定のキーの値を取得
        //$value = $request->session()->get('key');

        //DebugBar::info($value);

        //指定したデータをセッションから削除
        //$request->session()->forget('key');
        //$value = $request->session()->get('key');
        //DebugBar::info($value);

        //セッションの全てのデータを削除
        //$request->session()->flush();
        //$value = $request->session()->get('key2');
        //DebugBar::info($value);

        //セッションに指定したキーが存在するか
        if ($request->session()->exists('login')) {
            return view('accounts/index', ['accounts' => $accounts]);             //ビューに変数を渡す
        } else {
            return view('accounts/login');
        }
    }

    //ログイン画面表示
    public function login(Request $request)
    {
        return view('accounts/login');
    }

    //ログイン処理
    public function doLogin(Request $request)
    {
        //バリデーション
        $validated = $request->validate([
            'name' => ['required', 'min:4', 'max:20']
        ]);

        //条件を指定して取得
        $account = Account::where('name', '=', $request['name'])->get();

        if (Hash::check($request['pass'], $account[0]->password)) {
            //成功した時
            //セッションに指定のキーで値を保存
            $request->session()->put('login', true);
            return redirect('accounts/index');
        } else {
            //失敗した時
            return redirect()->route('login', ['error' => 'invalid']);
        }
    }

    public function doLogout(Request $request)
    {
        //指定したデータをセッションから削除
        $request->session()->forget('login');

        return redirect('/');
    }

    //プレイヤーリスト
    public function playerList(Request $request)
    {
        $players = Player::All();

        //セッションに指定したキーが存在するか
        if ($request->session()->exists('login')) {
            return view('accounts/player', ['players' => $players]);             //ビューに変数を渡す
        } else {
            return view('accounts/login');
        }
    }

    //プレイヤーリスト
    public function itemList(Request $request)
    {
        $items = Item::All();

        //セッションに指定したキーが存在するか
        if ($request->session()->exists('login')) {
            return view('accounts/item', ['items' => $items]);             //ビューに変数を渡す
        } else {
            return view('accounts/login');
        }
    }

    //プレイヤーリスト
    public function have_ItemList(Request $request)
    {
        $have_items = HaveItem::All();

        //セッションに指定したキーが存在するか
        if ($request->session()->exists('login')) {
            return view('accounts/have_item', ['have_items' => $have_items]);             //ビューに変数を渡す
        } else {
            return view('accounts/login');
        }
    }
}
