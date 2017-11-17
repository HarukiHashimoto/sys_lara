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
        // log::info($smp);

        // 受け取ったデータをJSON形式にする
        $arr = json_safe_encode($smp);
        log::info(auth::id());
        // log::info($arr);

        $user_model = UserModel::first();
        log::info($user_model);

        $user_model = new UserModel;
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

    public function load_others_model()
    {
        $user_id = auth::id();
        $filePath = "UserModel/";

        // ログイン中のユーザー以外の作成したモデルを取得
        $files = glob($filePath."[!".$user_id."]_*.json");

        // 降順ソートに
        rsort($files);

        // 他ユーザー（１人目）の最新のモデルを取得，配列に格納
        $filename = basename($files[0]);
        $otherModels[0] = $filename;
        // 取得したデータのユーザIDを保持
        $id = strstr($filename, '_', true);
        echo $id;
        $j = 1;

        // その他のユーザーの最新のデータも配列に格納する
        for ($i=1; $i < count($files); $i++) {
            $tmp_name = basename($files[$i]);
            $tmp_id = strstr($tmp_name, '_', true);

            // tmp_idと異なるidが初めて現れたものを配列に格納する
            if ($id != $tmp_id) {
                $id = $tmp_id;
                $otherModels[$j] = $tmp_name;
                $j++;
            }
        }
        print_r($otherModels);
        print_r($files);
    }
}
