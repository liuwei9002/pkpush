@extends('glob/layout/glob.blade.php')
@section('title', '添加权限')
@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li>当前位置：<a href="@uri('glob/setting@account/userlist')">用户管理</a></li>
            <li class="active"><a href="@uri('glob/setting@account/add')">添加用户</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form class="form-horizontal ajaxform" id="form" method="post" action="@uri('glob/setting@account/doeditpwd')">
                        <div class="form-group"><label class="col-sm-2 control-label">原密码</label>
                            <div class="col-sm-10"><input type="password" value="" name="pwd" class="form-control"  data-required="true" >
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">新密码</label>
                            <div class="col-sm-10"><input type="password" value="" name="pwd1" class="form-control"  data-required="true"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">重复新密码</label>
                            <div class="col-sm-10"><input type="password" value="" name="pwd2" class="form-control"  data-required="true"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary save">保存</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection