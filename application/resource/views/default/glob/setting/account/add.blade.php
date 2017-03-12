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
                    <form class="form-horizontal ajaxform" id="form" method="post" action="@uri('glob/setting@account/doadd')">
                        <div class="form-group"><label class="col-sm-2 control-label">邮箱账户</label>
                            <div class="col-sm-10"><input type="text" value="" name="email" class="form-control"  data-required="true" >
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">昵称</label>
                            <div class="col-sm-10"><input type="text" value="" name="displayName" class="form-control"  data-required="true"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-10"><input type="text" value="" name="passwd" class="form-control"  data-required="true"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">是否是超级管理员</label>
                            <div class="col-sm-10">
                                <select name="isAdmin" class="form-control m-b">
                                    <option value="0">否</option>
                                    <option value="1">是</option>
                                </select>
                            </div>
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