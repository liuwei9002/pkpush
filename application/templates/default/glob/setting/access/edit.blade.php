@extends('glob/layout/glob.blade.php')
@section('title', '添加权限')

@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li>当前位置：<a href="@uri('glob/setting@access/index')">权限管理</a></li>
            <li class="active"><a href="@uri('glob/setting@access/edit',['id'=>$info['id']])">编辑权限</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form class="form-horizontal  ajaxform" id="form" method="post" action="@uri('glob/setting@access/doedit',['id'=>$info['id']])">
                        <div class="form-group"><label class="col-sm-2 control-label">名称</label>
                            <div class="col-sm-10"><input type="text" value="{{$info["name"]}}" name="name" class="form-control" data-required="true" >
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Route</label>
                            <div class="col-sm-10"><input type="text" value="{{$info["route"]}}" name="route" class="form-control"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">类型</label>
                            <div class="col-sm-10">
                                <select name="ptype" class="form-control m-b">
                                    <option value="1" @diff($info["ftype"], 1, "selected")>菜单</option>
                                    <option value="2" @diff($info["ftype"], 2, "selected")>页面</option>
                                    <option value="3" @diff($info["ftype"], 3, "selected")>服务</option>
                                </select>
                            </div>

                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">根节点类型</label>
                            <div class="col-sm-10">
                                <select name="is_root" class="form-control m-b">
                                    <option value="0" @diff($info["root_type"], 0, "selected")>不是根节点</option>
                                    <option value="1" @diff($info["root_type"], 1, "selected")>菜单节点</option>
                                    <option value="2" @diff($info["root_type"], 2, "selected")>菜单组节点</option>
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