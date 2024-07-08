<?php

namespace App\Http\Controllers;

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

        $users = User::where(min(3) < $request->level)
            ->where(max(9) > $request->level);

        return response()->json(
            UserResource::collection($users)
        );
    }

    //ユーザー所持アイテムリスト
    public function userItem(Request $request)
    {
        
    }
}
