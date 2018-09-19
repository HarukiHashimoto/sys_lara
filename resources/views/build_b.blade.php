@extends('layouts.app')

@section('header')
    @include('layouts.header.build_header')
@endsection

@section('content')
    <div class="content">
        <div class="wrapper">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="build_left_area">
                <div id="node-popUp">
                  <span id="node-operation">node</span> <br>
                  <table style="margin:auto;">
                    <tr>
                      <td>id</td><td><input id="node-id" value="new value" /></td>
                    </tr>
                    <tr>
                      <td>内容</td><td><textarea id="node-label" value="new value" ></textarea></td>
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

                {{-- モデル表示エリア --}}
                <div id="mymodel_s" class="modelArea">

                </div>
            </div>

            <div class="build_right_area">
                 <h5>タグの付与</h5>
                <p>※選択中のノードにタグを付与します．</p>
                <div class="ui inverted segment">
                    <button class="ui button inverted tag yellow" value="0">理由・根拠</button>
                    <button class="ui button inverted tag purple" value="1">視点・見方</button>
                    <button class="ui button inverted tag grey" value="2">仮定</button>
                    <button class="ui button inverted tag blue" value="3">結果</button>
                    <button class="ui button inverted tag teal" value="4">事例</button>
                    <button class="ui button inverted tag red" value="5">信念</button>
                    <button class="ui button inverted tag green" value="6">問い</button>
                    <button class="ui button inverted tag brown" value="7">提案</button>
                </div>
                <br>
                <br>
                <br>
                {{--問いリスト--}}
                <qlist></qlist>
                <br>
                <br>
                <br>
                <br>
                <div class="ui centered grid">
                    <button class="save_btn ui huge button primary">保存</button>
                    <button class="ref_btn ui huge button positive">参照</button>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>

            <div class="ui modal basic ref_modal">
                <div class="refModelArea" id="refModel">
                </div>
            </div>
        </div>
    </div>
@endsection



@section('footer')
    @include('layouts.footer.build_footer')
@endsection
