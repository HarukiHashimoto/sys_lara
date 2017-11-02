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
        $arr = json_safe_encode($smp);
        log::info(auth::id());
        $name = auth::id()."_".time();
        $filePath = "UserModel/";
        file_put_contents($filePath.$name.".json", $arr);
        return $arr;
    }
}
