@extends('glob/layout/glob.blade.php')
@section('title', '权限管理')

@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li class="active">当前位置：<a href="@uri('glob/wx@index/index')">公众号列表</a></li>
        </ol>
    </div>
        <div class="row">
            @if($publickey)
                @foreach($publickey as $v)
                    <div class="col-sm-2">
                        <div class="widget style1 navy-bg">
                            <div class="row vertical-align">
                                <div class="col-xs-12 text-center">
                                    <a href="@uri('glob/wx@index/menulist', ['appName'=>$v])" style="color:#ffffff;"><h2 class="font-bold">{{$v}}</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                 @endforeach
             @endif
        </div>
@endsection