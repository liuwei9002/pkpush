@extends('glob/layout/glob.blade.php')
@section('title', '用户管理')

@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li class="active">当前位置：<a href="@uri('glob/user@index/index')">用户列表</a></li>
        </ol>
    </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox  ibox-content">
                        <form class="form-horizontal form-inline" action="@uri("glob/user@index/index")" method="get">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="请输入账户" name="account" value="{{$account or ''}}">
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>搜索</button>
                        </form>
                </div>
                <div class="ibox ibox-content">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>账户</th>
                            <th>是否认证</th>
                            <th>注册来源</th>
                            <th>注册时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        @if($list)
                        <tbody>
                        @foreach($list as $v)
                        <tr>
                            <td>{{$v['id']}}</td>
                            <td>{{$v['account']}}/{{$v['display_name']}}</td>
                            <td>@option($v['validate'])</td>
                            <td>{{$v['reg_source']}}</td>
                            <td>{{$v['created_at']}}</td>
                            <td>
                                @if($v['is_lock']==0)
                                <a class="btn btn-danger btn-xs ajaxload" href="@uri('glob/user@index/lock', ['uid'=>$v['id']])">锁定</a>
                                    @else
                                 <a class="btn btn-warning btn-xs ajaxload"  href="@uri('glob/user@index/lock', ['uid'=>$v['id']])">解锁</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="6">
                                {{$pagi}}
                            </td>
                        </tr>
                        </tbody>
                          @endif
                    </table>
                </div>
            </div>
        </div>
@endsection