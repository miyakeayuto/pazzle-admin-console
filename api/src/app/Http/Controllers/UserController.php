<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserItemResource;
use App\Http\Resources\UserMailResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use http\Env\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $response = [
            'detail' => $user
        ];
        return response()->json(
            UserResource::make($user)              //UserResource::makeでuserを変換してからJsonを作成
        );
    }

    //ユーザーリストを取得
    public function index(Request $request)
    {
        //バリデーションチェック
        $validator = Validator::make($request->all(), [
            'min_level' => ['required', 'int'],
            'max_level' => ['required', 'int'],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $users = User::where('level', '>', $request->min_level)
            ->where('level', '<', $request->max_level);

        return response()->json(
            UserResource::collection($users)
        );
    }

    //ユーザー所持アイテムリスト
    public function userItem(Request $request)
    {
        //指定ユーザーを取得
        $user = User::findOrFail($request->user_id);

        //所持アイテムリストをリレーションで取得
        $items = $user->items;

        //中間テーブルのリソースを使いJSON化
        $response['items'] = UserItemResource::collection($items);

        return response()->json($response);
    }

    //ユーザー受信メールリスト
    public function userMail(Request $request)
    {
        //指定ユーザーを取得
        $user = User::findOrFail($request->user_id);

        //所持アイテムリストをリレーションで取得
        $mails = $user->mails;

        //中間テーブルのリソースを使いJSON化
        $response['mails'] = UserMailResource::collection($mails);

        return response()->json($response);
    }

    //ユーザー登録
    public function store(Request $request)
    {
        //バリデーションチェック
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->name,
            'level' => 1,
            'experience_point' => 1,
            'life' => 1
        ]);

        return response()->json(['user_id' => $user->id]);
    }

    //ユーザー更新
    public function update(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        //カラムの更新
        if (isset($request->level)) {
            $user->level = $request->level;
        }

        //保存
        $user->save();
    }

    
}
