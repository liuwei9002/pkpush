@extends('glob/layout/glob.blade.php')
@section('title', '添加菜单')
@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li>当前位置：<a href="@uri('glob/wx@index/menulist',['appName'=>$appName])">自定义菜单</a></li>
            <li class="active"><a href="@uri('glob/wx@index/add',['appName'=>$appName, "pid"=>$pid])">添加菜单</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form class="form-horizontal ajaxform" id="form" method="post" action="@uri('glob/wx@index/doadd',['appName'=>$appName, "pid"=>$pid])">
                        <div class="form-group"><label class="col-sm-2 control-label">名称</label>
                            <div class="col-sm-10"><input type="text" value="" name="fname" class="form-control"  data-required="true" >
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">数据(key/url)</label>
                            <div class="col-sm-10"><input type="text" value="" name="fdata" class="form-control"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">类型</label>
                            <div class="col-sm-10">
                                <select name="ftype" class="form-control m-b">
                                    <option value="view">view</option>
                                    <option value="click">click</option>
                                </select>
                            </div>

                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-10"><input type="text" value="0" name="fsort" class="form-control"  data-required="true" >
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">状态</label>
                            <div class="col-sm-10">
                                <select name="fstatus" class="form-control m-b">
                                    <option value="1">开启</option>
                                    <option value="0">关闭</option>
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