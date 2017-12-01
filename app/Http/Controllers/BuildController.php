<?php

namespace App\Http\Controllers;

use Request;
use Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\UserModel;

// オブジェクトをJSON形式へ変換する（日本語をunicodeのままで整形して．）
function json_safe_encode($data){
    return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}

class BuildController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function build_smp()
    {
        return view('build_smp');
    }

    /**
     * [モデルデータを受け取ってJSONファイルを書き出す]
     * @return [Null] [.jsonを書き出す]
     */
    public function save_model()
    {
        $smp = Request::all();

        // 受け取ったデータをJSON形式にする
        $arr = json_safe_encode($smp);

        $user_model = UserModel::first();

        $user_model = new UserModel;
        // ｍ_titleは教材ごとに変更する予定
        $user_model->m_title = "sample";
        $user_model->user_id = auth::id();
        $user_model->model_json = $arr;
        $user_model->save();


        // JSONファイルの名前は”ユーザID_タイムスタンプ”
        $name = auth::id()."_".time();

        // JSONファイルの保存場所はpublic/UserModel
        $filePath = "UserModel/";

        foreach (glob($filePath."*.json") as $filename) {
            echo "$filename size " . filesize($filename) . "\n";
        }

        file_put_contents($filePath.$name.".json", $arr);
        return $arr;
    }

    public function load_model()
    {
        $user_id = auth::id();
        $m_title = Request::post('title');

        // ログイン中のユーザーが作成したモデルで，最新のものを取得する
        $res = UserModel::where('m_title', 'sample')->where('user_id', $user_id)->latest('created_at')->first();
        if($res == NULL) {
            $res = '{"id":""}';
        } else {
            $res = $res->model_json;
        }
        // givenノードの読み込み
        $given = UserModel::where('m_title', 'sample')->where('user_id', 'given')->first();
        $res = '['.$given->model_json.','.$res.']';
        $res = json_safe_encode($res);
        return $res;
    }

    public function load_others_model()
    {
        $user_id = auth::id();
        // ログイン中のユーザー以外の作成したモデルを取得
        $res = UserModel::select('user_id')
                ->where('m_title', 'sample')
                ->whereNotIn('user_id', [$user_id, 'given'])
                ->groupBy('user_id')
                ->get();

        for ($i=0; $i < count($res); $i++) {
            $id = $res[$i]->user_id;
            $other[$i] = UserModel::select('user_id', 'model_json')
                    ->where('m_title', 'sample')
                    ->where('user_id', $id)
                    ->latest()
                    ->first();
        }

        // ランダムでキー取得
        $key = array_rand($other, 1);

        $res = json_safe_encode($other[$key]->model_json);
        return $res;
    }
}
