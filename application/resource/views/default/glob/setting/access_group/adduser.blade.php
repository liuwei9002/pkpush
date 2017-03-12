@extends('glob/layout/glob.blade.php')
@section('title', '权限组添加用户')
@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li>当前位置：<a href="@uri('glob/setting@accessgroup/index')">权限组管理</a></li>
            <li class="active"><a href="@uri('glob/setting@accessgroup/addUser',['id'=>$id])">权限组添加用户</a></li>
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
                        <button type="submit" class="btn btn-primary" id="adduser">
                            <i class="glyphicon glyphicon-plus"></i> 添加
                        </button>
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
                                <a class="btn btn-white btn-sm del" style="margin: 0 3px;"
                                   href="@uri("glob/setting@accessgroup/deluser",["id"=>$id, "uid"=>$v['id']])">
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
    <div class="modal inmodal in form-horizontal" id="permuserModal" tabindex="-1" role="dialog" aria-hidden="true"
         style="display: none; padding-right: 6px;">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4>添加用户至&nbsp;&nbsp;&nbsp;<span>{{$info['name']}}</span></h4>
                </div>
                <div class="modal-body">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div>通过","隔开,可以选择多个用户</div>
                                            <div class="input-group" style="width: 100%;">
                                                <input type="text" class="form-control" id="userselect"
                                                       autocomplete="off" data-id="" alt="" placeholder="输入名称/拼音进行搜索">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-white dropdown-toggle"
                                                            data-toggle="">
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-right" role="menu"
                                                        style="padding-top: 0px; max-height: 375px; max-width: 800px; overflow: auto; width: auto; transition: 0.3s; left: -267px; right: auto; min-width: 300px; padding-right: 0px;">
                                                    </ul>
                                                </div>
                                                <!-- /btn-group -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                    <button type="button" id="saveBtn" class="btn btn-primary save-user-group">保存</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section("jsinit")
    <script>
        var allUser = {!! $users !!};
        var saveUrl = "@uri('glob/setting@accessgroup/doadduser',['id'=>$id])";
    </script>
@endsection

@section("jsend")
        $(function () {
            $(".footable").footable();

            $("#adduser").click(function () {
                $("#permuserModal").modal();
            });

            var data = allUser;
            $("#userselect").bsSuggest({
                idField: "id",
                keyField: "tag",
                allowNoKeyword: true,
                multiWord: true,
                separator: ",",
                data:{
                    "value":data, "defaults": ""
                }
            });

            $("#userselect").on('onSetSelectValue', function (e, keyword) {
                var id = keyword.id;
                var userIds = $("#user_ids").val();
                if(userIds){
                    userIds = userIds +","+id;
                } else{
                    userIds = id;
                }
                $("#user_ids").val(userIds);
            });
            
            $("#saveBtn").click(function () {
                var users = $("#userselect").val();
                if(users){
                    $.post(saveUrl, {users:users},function(rs){
                        if(rs.statusCode == 200){
                            location.assign(location)
                        }
                    });
                }
            });

        });
@endsection