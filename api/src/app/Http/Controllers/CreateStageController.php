<?php

namespace App\Http\Controllers;

use App\Models\CreateStage;
use App\Http\Resources\CrateStageResource;
use App\Http\Resources\CrateStagePositionResource;
use App\Models\CreateStagePosition;
use Illuminate\Http\Request;

class CreateStageController extends Controller
{
    //クリエイトステージ情報一覧取得
    public function index()
    {
        $create_stages = CreateStage::all();

        return response()->json(
            CrateStageResource::collection($create_stages)
        );
    }

    //ステージクリエイト情報取得
    public function show()
    {

    }

    //ステージクリエイト情報登録
    public function store(Request $request)
    {
        try {
            //トランザクション処理
            $create = DB::transaction(function () use ($request) {
                $create = CreateStagePosition::create([
                    'stage_id' => $request->stage_id,
                    'type' => $request->type,
                    'x' => $request->x,
                    'y' => $request->y
                ]);
                return $create;
            });
            //APIトークンを発行する
            $token = $create->createToken($request->name)->plainTextToken;
            return response()->json(['id' => $create->id, 'token' => $token]);
        } catch (Exception $e) {
            return response()->json($e, 500);
        }
    }
}
