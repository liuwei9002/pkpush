@extends('glob/layout/glob.blade.php')
@section('title', '权限组管理')

@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li  class="active">当前位置：<a href="@uri('glob/setting@accessgroup/index')">权限组管理</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content" id="perm">
                    <div class="">
                        <a class="btn btn-primary " href="@uri('glob/setting@accessgroup/add')">添加权限组</a>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <table id="DataTables_Table_0"
                               class="table table-striped table-bordered table-hover dataTables-example dataTable dtr-inline"
                               role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc">名称</th>
                                <th class="sorting_asc">描述</th>
                                <th class="sorting_asc">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($list)
                                @foreach($list as $v)
                                    <tr class="gradeA odd" role="row">
                                        <td class="sorting_1" style="vertical-align: middle;">{{$v['name']}}</td>
                                        <td class="sorting_1" style="vertical-align: middle;">{{$v['descr']}}</td>
                                        <td>
                                            <a class="btn btn-white btn-sm del" style="margin: 0 3px;"
                                               href="@uri("glob/setting@accessgroup/del",["id"=>$v['id']])">
                                                <i class="fa fa-trash"></i>
                                                删除
                                            </a>
                                            <a class="btn btn-white btn-sm edit" style="margin: 0 3px;"
                                               href="@uri("glob/setting@accessgroup/edit",["id"=>$v['id']])">
                                                <i class="fa fa-edit"></i>
                                                修改
                                            </a>
                                            <a class="btn btn-white btn-sm adduser" style="margin: 0 3px;"
                                               href="@uri("glob/setting@accessgroup/addUser",["id"=>$v['id']])">
                                                <i class="fa fa-group"></i> 添加用户
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection