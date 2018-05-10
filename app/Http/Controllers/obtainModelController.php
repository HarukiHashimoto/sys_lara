<?php

namespace App\Http\Controllers;

use App\UserModel;
use Request;

// オブジェクトをJSON形式へ変換する（日本語をunicodeのままで整形して．）
function json_safe_encode($data){
    return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}

function search_q_a($user_id, $user_model){
    for ($i=0; $i < count($user_id); $i++) {
        echo "<pre>";
        // print_r($user_model->nodes);
        foreach ($user_model[$i]->nodes->_data as $node) {
            // print_r($node);
            if ($node->group == 'instance') {
                echo $user_id[$i]."<br />";
                echo $node->label."<br />";
                echo 'これは  「  <strong>'.$node->title.'</strong>  」  のインスタンスです<br /><br />';
                get_q_link($node, $user_model[$i]);
            }
        }


        echo "</pre>";
    }
}

function get_q_link($q_node, $user_model){
    echo "<br />ここ";

    // 問いを"to"に持つエッジを検索
    foreach($user_model->edges->_data as $edge) {
        if ($edge->to == $q_node->id) {
            print_r($edge->from);
            print_r($user_model->nodes->_data[$edge->to]);
        }
    }
    echo "<br />";

}

class obtainModelController extends Controller
{
    public function more_suggestion()
    {
        $m_title = Request::input('title');
        $user_id = Request::input('user_id');

        echo "検索対象: ".$m_title."<br />";

        // ログイン中のユーザー以外の作成したモデルを取得
        $res = UserModel::select('user_id')
                ->where('m_title', $m_title)
                ->whereNotIn('user_id', [$user_id, 'given'])
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

                echo "<br />";
            }

            search_q_a($user, $model);

            // for ($i=0; $i < count($other); $i++) {
            //
            // }

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
