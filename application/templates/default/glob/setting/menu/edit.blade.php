@extends('glob/layout/glob.blade.php')
@section('title', '编辑菜单')

@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li>当前位置：<a href="@uri('glob/setting@menu/index')">菜单管理</a></li>
            <li class="active"><a href="@uri('glob/setting@menu/edit',["id"=>$info['id']])">编辑菜单</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form class="form-horizontal ajaxform" id="form" method="post" action="@uri('glob/setting@menu/doedit', ["id"=>$info['id']])">
                        <div class="form-group"><label class="col-sm-2 control-label">父级菜单</label>
                            <div class="col-sm-10">
                                <select name="pid" class="form-control m-b">
                                    <option value="0"  @diff($info['pid'],0)>顶级</option>
                                    @if($pmenu)
                                        @foreach($pmenu as $v)
                                    <option value="{{$v['id']}}" @diff($info['pid'], $v['id'])>{{$v['name']}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">名称</label>
                            <div class="col-sm-10"><input type="text" value="{{$info['name']}}" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">绑定权限</label>
                            <div class="col-sm-10">

                                <div class="panel-body">
                                    <div class="panel-group">
                                        @if($accesslist)
                                            @foreach($accesslist as $k=>$v)
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$k}}" aria-expanded="false" class="collapsed">
                                                        <?php
                                                        if($k == '_menuGroupRoot'){
                                                            echo "菜单组";
                                                        }else{
                                                            $str = $v['name']."->".$k;
                                                            echo $str;
                                                        }
                                                        ?>
                                                    </a>
                                                </h5>
                                            </div>
                                            <div id="collapse_{{$k}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr role="row">
                                                            <th >名称</th>
                                                            <th >类型</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <tr class=" odd" role="row" >
                                                            <td ><input type="radio" name="access_id" @diff($info['access_id'], $v['id'], "checked") value="{{$v['id']}}">&nbsp;&nbsp;&nbsp;{{$v['name']}}</td>
                                                            <td >
                                                                <?php
                                                                if($v['ftype'] == 1){
                                                                    echo "菜单";
                                                                }elseif($v['ftype'] == 2){
                                                                    echo "页面";
                                                                }else{
                                                                    echo "服务";
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        @if($v['child'])
                                                            @foreach($v['child'] as $cv)
                                                                @if($cv['ftype'] != 3)
                                                                <tr class=" odd" role="row" >
                                                                    <td ><input type="radio" name="access_id"  @diff($info['access_id'], $cv['id'], "checked")  value="{{$cv['id']}}">&nbsp;&nbsp;&nbsp;{{$cv['name']}}</td>
                                                                    <td >
                                                                        <?php
                                                                        if($cv['ftype'] == 1){
                                                                            echo "菜单";
                                                                        }elseif($cv['ftype'] == 2){
                                                                            echo "页面";
                                                                        }else{
                                                                            echo "服务";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                          </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-10"><input type="text" value="{{$info['fsort']}}" name="fsort" class="form-control"  data-required="true" >
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Icon</label>
                            <div class="col-sm-10"><input type="text" value="{{$info['icon']}}" placeholder="fa fa-th-large" name="icon" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">状态</label>
                            <div class="col-sm-10">
                                <select name="fstatus" class="form-control m-b">
                                    <option value="1" @diff($info['fstatus'], 1) >开启</option>
                                    <option value="0" @diff($info['fstatus'], 0) >关闭</option>
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