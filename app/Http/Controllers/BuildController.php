<?php

namespace App\Http\Controllers;

use Request;
use Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        log::info(auth::id());

        // JSONファイルの名前は”ユーザID_タイムスタンプ”
        $name = auth::id()."_".time();

        // JSONファイルの保存場所はpublic/UserModel
        $filePath = "UserModel/";

        file_put_contents($filePath.$name.".json", $arr);
        return $arr;
    }

    public function load_model()
    {
        $user_id = auth::id();
        $filePath = "UserModel/".$user_id."_";

        // ログインしているユーザーのモデルファイルを取得
        $files = glob($filePath."*.json");

        // ファイルを降順ソート
        rsort($files);
        print_r($files);

        // ユーザーの最新のファイル内容を取得
        $content = file_get_contents($files[0]);
        echo $content;
    }
}
