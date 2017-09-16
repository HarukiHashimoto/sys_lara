@extends('layouts.app')

@section('header')
    @include('layouts.header.build_header')
@section('content')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Build-Model</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    build page
                    <div class="ui grid">
    <div class="row">
        <div class="twelve wide column">
            <div id="node-popUp">
              <span id="node-operation">node</span> <br>
              <table style="margin:auto;">
                <tr>
                  <td>id</td><td><input id="node-id" value="new value" /></td>
                </tr>
                <tr>
                  <td>label</td><td><input id="node-label" value="new value" /></td>
                </tr>
                <tr>
                  <td>group</td><td><input id="group" value="usr_node" /></td>
                </tr>
              </table>
              <input type="button" value="save" id="node-saveButton" />
              <input type="button" value="cancel" id="node-cancelButton" />
            </div>

            <div id="edge-popUp">
                <span id="edge-operation">edge</span> <br>
                <table style="margin:auto;">
                    <tr>
                        {{-- <td>P or N</td> --}}
                        {{-- <td><input id="edge-label" value="new value" /></td> --}}
                        <td><p>
                        <input type="radio" name="pon" value="1" /> Posi
                        <input type="radio" name="pon" value="2" /> Nega
                        <input type="radio" name="pon" value="3" /> else
                        </p></td>
                    </tr>
                </table>
              <input type="button" value="save" id="edge-saveButton" />
              <input type="button" value="cancel" id="edge-cancelButton" />
            </div>
            <div id="mymodel_s" class="modelArea">

            </div>
        </div>
        <div class="four wide column">
            <br>
            <br>
            <h5>タグの付与</h5>
            <p>※選択中のノードにタグを付与します．</p>
            <div class="ui inverted segment">
                <button class="ui button inverted tag yellow" value="tag_1">提案</button>
                <button class="ui button inverted tag purple" value="tag_2">指針</button>
                <button class="ui button inverted tag grey" value="tag_3">結論</button>
                <button class="ui button inverted tag blue" value="tag_4">問題</button>
                <button class="ui button inverted tag teal" value="tag_5">関与者</button>
                <button class="ui button inverted tag red" value="tag_6">懸念</button>
                <button class="ui button inverted tag green" value="tag_7">問い</button>
                <button class="ui button inverted tag brown" value="tag_8">答え</button>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h5>ソクラティックな問いリスト</h5>
            <div class="ui vertical menu">
                <div class="ui left pointing dropdown link item">
                    <i class="dropdown icon"></i>
                    理由・根拠の問い
                    <div class="menu">
                        <div id="Ⅱ-1" class="item q_list">なぜそう言えるのですか？</div>
                        <div id="Ⅱ-2" class="item q_list">それが真実か，どうやって知ることができますか？</div>
                        <div id="Ⅱ-3" class="item q_list">別の理由は考えられますか？</div>
                    </div>
                </div>
                <div class="ui left pointing dropdown link item">
                    <i class="dropdown icon"></i>
                    仮定の問い
                    <div class="menu">
                        <div id="Ⅲ-1" class="item q_list">何を仮定していますか？</div>
                        <div id="Ⅲ-2" class="item q_list">仮定を正当化できますか？</div>
                        <div id="Ⅲ-3" class="item q_list">仮定は常に成り立ちますか？</div>
                        <div id="Ⅲ-4" class="item q_list">別の仮定を置くことはできますか？</div>
                    </div>
                </div>
                <div class="ui left pointing dropdown link item">
                    <i class="dropdown icon"></i>
                    含意・結果の問い
                    <div class="menu">
                        <div id="Ⅳ-1" class="item q_list">どのような狙いがありますか？</div>
                        <div id="Ⅳ-2" class="item q_list">それによってどのような結果を期待していますか？</div>
                        <div id="Ⅳ-3" class="item q_list">他のやり方，提案はありますか？</div>
                    </div>
                </div>
                <div class="ui left pointing dropdown link item">
                    <i class="dropdown icon"></i>
                    観点・見方の問い
                    <div class="menu">
                        <div id="Ⅴ-1" class="item q_list">長期/短期的スパンで考えることはできますか？</div>
                        <div id="Ⅴ-2" class="item q_list">誰か別の立場から考えることはできますか？</div>
                        <div id="Ⅴ-3" class="item q_list">社会システムを良くするという視点から考えることはできますか？</div>
                    </div>
                </div>
                <div class="ui left pointing dropdown link item">
                    <i class="dropdown icon"></i>
                    問いを吟味する問い
                    <div class="menu">
                        <div id="Ⅵ-1" class="item q_list">この問いは明確ですか？</div>
                        <div id="Ⅵ-2" class="item q_list">この問いはなぜ重要ですか？</div>
                        <div id="Ⅵ-3" class="item q_list">この問いに答えるのは簡単ですか？</div>
                        <div id="Ⅵ-4" class="item q_list">この問いにどのようにして答えることができますか？</div>
                        <div id="Ⅵ-5" class="item q_list">問いの細分化ができますか？</div>
                        <div id="Ⅵ-6" class="item q_list">この問いの前に，答えるべき問いはありますか？</div>
                    </div>
                </div>
                <div class="ui left pointing dropdown link item">
                    <i class="dropdown icon"></i>
                    起源・拠りどころの問い
                    <div class="menu">
                        <div id="Ⅶ-1" class="item q_list">あなたは何を問題視していますか？</div>
                        <div id="Ⅶ-2" class="item q_list">あなたは何を最も優先しますか？</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('header')
    @include('layouts.footer.build_footer')
@endsection
