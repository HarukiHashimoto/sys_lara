@extends('layouts.app')

@section('header')
    @include('layouts.header.select_theme_header')
@endsection


@section('content')
<div class="content">
    <div class="wrapper">
        <div class="wrap_1200px">
            <div class="ui three column grid animated fadeInUp">
                <div class="column">
                    <div class="ui fluid card ">
                        <div class="image">
                            <img src="{{asset('image/genpatsu.jpeg')}}">
                        </div>
                        <div class="content">
                            <a class="header" href="build/genpatsu">原子力発電所について</a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui fluid card">
                        <div class="image">
                            <img src="{{asset('image/IR.jpg')}}">
                        </div>
                        <div class="content">
                            <a class="header" href="build/ir">IR施設の誘致について</a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui fluid card">
                        <div class="image">
                            <img src="{{asset('image/sea.jpg')}}">
                        </div>
                        <div class="content">
                            <a class="header">foofoo</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui three column grid animated fadeInUp">
                <div class="column">
                    <div class="ui fluid card ">
                        <div class="image">
                            <img src="{{asset('image/genpatsu.jpeg')}}">
                        </div>
                        <div class="content">
                            <a class="header" href="build/genpatsu_b">原子力発電所について(B)</a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui fluid card">
                        <div class="image">
                            <img src="{{asset('image/IR.jpg')}}">
                        </div>
                        <div class="content">
                            <a class="header" href="build/ir_b">IR施設の誘致について(B)</a>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui fluid card">
                        <div class="image">
                            <img src="{{asset('image/sea.jpg')}}">
                        </div>
                        <div class="content">
                            <a class="header">barbar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('layouts.footer.main_footer')
@endsection
