@extends('layouts.app')

@section('header')
    @include('layouts.header.build_header')
@endsection

@section('content')
<div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="ui grid">
        <div class="row">
            <div class="nine wide column">
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
                <div id="mymodel_s" class="modelArea">

                </div>
            </div>
            <div class="four wide column">
                <br>
                <br>
                <h5>タグの付与</h5>
                <p>※選択中のノードにタグを付与します．</p>
                <div class="ui inverted segment">
                    <button class="ui button inverted tag yellow" value="0">提案</button>
                    <button class="ui button inverted tag purple" value="1">指針</button>
                    <button class="ui button inverted tag grey" value="2">結論</button>
                    <button class="ui button inverted tag blue" value="3">問題</button>
                    <button class="ui button inverted tag teal" value="4">関与者</button>
                    <button class="ui button inverted tag red" value="5">懸念</button>
                    <button class="ui button inverted tag green" value="6">問い</button>
                    <button class="ui button inverted tag brown" value="7">答え</button>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                {{-- 問いリスト --}}
                <qlist></qlist>
            </div>

            <div class="three wide column">

            </div>
        </div>
    </div>
    <div class="save ui centered grid">
        <button class="save ui huge button">save</button>
    </div>
    <br>
    <br>
    <br>


</div>

@endsection

@section('footer')
    @include('layouts.footer.build_footer')
@endsection
