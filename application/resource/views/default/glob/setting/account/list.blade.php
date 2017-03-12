@extends('glob/layout/glob.blade.php')
@section('title', '权限管理')

@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li class="active">当前位置：<a href="@uri('glob/setting@account/userlist')">用户管理</a></li>
        </ol>
    </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="ibox-content">
                            <div class="form-inline">
                                <div class="form-group">
                                    <input type="text" name="skey" class="form-control" id="filter" autocomplete="off"
                                           placeholder="输入用户名/拼音搜索" value="">
                                </div>
                                <div class="form-group pull-right">
                                    <a class="btn btn-primary " href="@uri('glob/setting@account/add')">添加用户</a>
                                </div>
                            </div>
                        </div>
                        <table id="DataTables_Table_0"
                               class="footable table table-striped table-bordered table-hover dataTables-example dataTable dtr-inline"
                               role="grid" aria-describedby="DataTables_Table_0_info" data-page-size="20" data-filter=#filter>
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc">姓名</th>
                                <th class="sorting_asc">email</th>
                                <th class="sorting_asc">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($list)
                                @foreach($list as $v)
                                    <tr role="row" class="gradeA odd">
                                        <td class="sorting_asc" style="vertical-align: middle;">{{$v['display_name']}}</td>
                                        <td class="sorting_asc" style="vertical-align: middle;">{{$v['email']}}</td>
                                        <td class="sorting_asc" style="vertical-align: middle;">
                                            <a class="btn btn-white btn-sm del" style="margin: 0 3px;" href="@uri("glob/setting@account/deluser",["id"=>$v['id']])">
                                                <i class="fa fa-trash"></i>
                                                删除
                                            </a>
                                        </td>
                                    </tr>
                            @endforeach
                            <tfoot>
                            <tr>
                                <td colspan="3">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                            </tfoot>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection