<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;

// オブジェクトをJSON形式へ変換する（日本語をunicodeのままで整形して．）
function json_safe_encode($data){
    return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}

class obtainModelController extends Controller
{
    public function more_suggestion()
    {
        // $m_title = Request::post('title');
        $m_title = "ir";

        // $m_title = "genpatsu";
        // ログイン中のユーザー以外の作成したモデルを取得
        $res = UserModel::select('user_id')
                ->where('m_title', $m_title)
                // ->whereNotIn('user_id', [$user_id, 'given'])
                ->groupBy('user_id')
                ->get();

        if (count($res)!=0) {
            for ($i=0; $i < count($res); $i++) {
                $id = $res[$i]->user_id;
                $other[$i] = UserModel::select('user_id', 'model_json')
                        ->where('m_title', $m_title)
                        ->where('user_id', $id)
                        ->latest()
                        ->first();
            }

            for ($i=0; $i < count($other); $i++) {
                $user[$i] = $other[$i]->user_id;
                $model[$i] = json_decode($other[$i]->model_json);
                echo $user[$i].":<br />";
                print_r($model[$i]->tagList);
                echo "<br />";


            }
            // ランダムでキー取得
            // $key = array_rand($other, 1);
            //
            // $res = json_safe_encode($other[$key]->model_json);

            // return $res;
        } else {
            // return 0;
        }
    }
}
