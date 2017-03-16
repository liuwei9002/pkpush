@extends('glob/layout/glob.blade.php')
@section('title', '权限管理')

@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li class="active">当前位置：<a href="@uri('glob/wx@index/menulist',['appName'=>$appName])">自定义菜单</a></li>
        </ol>
    </div>
    <div class="tabs-container">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#tab-1" aria-expanded="true"> 自定义菜单</a>
            </li>
        </ul>
        <div class="row">
            <div class="col-lg-12">
        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="panel-body clear">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="tab-1" class="ibox float-e-margins">
                                    <div class="pull-left">
                                        <a class="btn btn-primary " href="@uri('glob/wx@index/add',['appName'=>$appName, "pid"=>0])"><i class="fa fa-plus"></i> 添加菜单</a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-success ajaxload" href="@uri('glob/wx@index/upwx',['appName'=>$appName])"><li class="fa fa-upload"></li> 上报到微信</a>
                                    </div>
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>菜单名称</th>
                                                <th>菜单类型</th>
                                                <th>key/url</th>
                                                <th>状态</th>
                                                <th>排序</th>
                                                <th>操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($list as $v)
                                            <tr>
                                                <td>{{$v['fname']}}</td>
                                                <td>{{$v['ftype']}}</td>
                                                <td>{{$v['fdata']}}</td>
                                                <td>
                                                    @if($v['fstatus'] == 1)
                                                        <span class="label label-primary">开启</span>
                                                    @else
                                                        <span class="label label-warning">关闭</span>
                                                    @endif
                                                </td>
                                                <td>{{$v['fsort']}}</td>
                                                <td>
                                                    <a class="btn btn-white btn-sm del" href="@uri('glob/wx@index/delete',['appName'=>$appName,"id"=>$v['id']])"><i class="fa fa-trash"></i> 删除 </a>
                                                    <a class="btn btn-white btn-sm edit" href="@uri('glob/wx@index/edit',['appName'=>$appName, "id"=>$v['id']])"><i class="fa fa-edit"></i> 修改 </a>
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_menulist_{{$v['id']}}" aria-expanded="false" class="collapsed btn btn-info btn-sm">
                                                        <i class="fa fa-folder-open"></i> 子菜单查看
                                                    </a>
                                                    <a class="btn btn-primary btn-sm edit" href="@uri('glob/wx@index/add',['appName'=>$appName, "pid"=>$v['id']])"><i class="fa fa-plus"></i> 添加子菜单 </a>
                                                </td>
                                            </tr>
                                            <tr id="collapse_menulist_{{$v['id']}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                <td COLSPAN="6">
                                                    <table id="DataTables_Table_0" class="table table-striped table-bordered table-hover dataTables-example dataTable dtr-inline" role="grid" aria-describedby="DataTables_Table_0_info">
                                                        <thead>
                                                        <tr role="menu">
                                                            <th class="sorting_asc">名称</th>
                                                            <th>菜单类型</th>
                                                            <th>key/url</th>
                                                            <th class="sorting_asc">状态</th>
                                                            <th class="sorting_asc">排序</th>
                                                            <th class="sorting_asc">操作</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if(isset($v['child']))
                                                        @foreach($v['child'] as $cv)
                                                        <tr class="gradeA odd" role="row">
                                                            <td>{{$cv['fname']}}</td>
                                                            <td>{{$cv['ftype']}}</td>
                                                            <td>{{$cv['fdata']}}</td>
                                                            <td class="sorting_1 status">
                                                                @if($cv['fstatus'] == 1)
                                                                    <span class="label label-primary">开启</span>
                                                                @else
                                                                    <span class="label label-warning">关闭</span>
                                                                @endif
                                                            </td>
                                                            <td class="sorting_1">{{$cv['fsort']}}</td>
                                                            <td>
                                                                <a class="btn btn-white btn-sm del" href="@uri('glob/wx@index/delete',['appName'=>$appName,"id"=>$cv['id']])"><i class="fa fa-trash"></i> 删除 </a>
                                                                <a class="btn btn-white btn-sm edit" href="@uri('glob/wx@index/edit',['appName'=>$appName, "id"=>$cv['id']])"><i class="fa fa-edit"></i> 修改 </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

@endsection