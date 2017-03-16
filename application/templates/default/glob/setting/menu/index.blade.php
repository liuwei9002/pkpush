@extends('glob/layout/glob.blade.php')
@section('title', '菜单管理')

@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li  class="active">当前位置：<a href="@uri('glob/setting@menu/index')">菜单管理</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content"  id="perm">
                    <div class="">
                        <a class="btn btn-primary " href="@uri('glob/setting@menu/add')">添加菜单</a>
                    </div>
                    <div class="panel-body">
                        <div class="panel-group" id="accordion">
                            @if($pmenu)
                            @foreach($pmenu  as $k=>$v)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$k}}" aria-expanded="false" class="collapsed">
                                            {{$v['name']}}
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapse_{{$k}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                        <table id="DataTables_Table_0" class="table table-striped table-bordered table-hover dataTables-example dataTable dtr-inline" role="grid" aria-describedby="DataTables_Table_0_info">
                                            <thead>
                                            <tr role="menu">
                                                <th class="sorting_asc" >名称</th>
                                                <th class="sorting_asc" >状态</th>
                                                <th class="sorting_asc" >排序</th>
                                                <th class="sorting_asc" >操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="gradeA odd" role="row" >
                                                <td class="sorting_1">{{$v['name']}}</td>
                                                <td class="sorting_1 status">
                                                    @if($v['fstatus'] == 1)
                                                        <span class="label label-primary">开启</span>
                                                    @else
                                                        <span class="label label-warning">关闭</span>
                                                    @endif
                                                </td>
                                                <td class="sorting_1">{{$v['fsort']}}</td>
                                                <td>
                                                    @if($v['fstatus'] == 1)
                                                        <a class="btn btn-white btn-sm status-btn" href="@uri('glob/setting@menu/updatestatus',['id'=>$v['id'],'status'=>$v['fstatus']])"><i class="fa fa-eye-slash"></i> <span>关闭</span></a>
                                                    @else
                                                        <a class="btn btn-white btn-sm status-btn"  href="@uri('glob/setting@menu/updatestatus',['id'=>$v['id'],'status'=>$v['fstatus']])"><i class="fa fa-eye"></i> <span>开启</span></a>
                                                    @endif
                                                    <a class="btn btn-white btn-sm del"   href="@uri('glob/setting@menu/del',['id'=>$v['id']])"><i class="fa fa-trash"></i> 删除 </a>
                                                    <a class="btn btn-white btn-sm edit"  href="@uri('glob/setting@menu/edit',['id'=>$v['id']])"><i class="fa fa-edit"></i> 修改 </a>
                                                </td>
                                            </tr>
                                            @if(isset($v['child']))
                                                @foreach($v['child'] as $cv)
                                                <tr class="gradeA odd" role="row" >
                                                    <td class="sorting_1">{{$cv["name"]}}</td>
                                                    <td class="sorting_1 status">
                                                        @if($cv['fstatus'] == 1)
                                                            <span class="label label-primary">开启</span>
                                                        @else
                                                            <span class="label label-warning">关闭</span>
                                                        @endif
                                                    </td>
                                                    <td class="sorting_1">{{$cv['fsort']}}</td>
                                                    <td>
                                                        @if($cv['fstatus'] == 1)
                                                            <a class="btn btn-white btn-sm status-btn"  href="@uri('glob/setting@menu/updatestatus',['id'=>$cv['id'],'status'=>$cv['fstatus']])"><i class="fa fa-eye-slash"></i> <span>关闭</span></a>
                                                        @else
                                                            <a class="btn btn-white btn-sm status-btn"  href="@uri('glob/setting@menu/updatestatus',['id'=>$cv['id'],'status'=>$cv['fstatus']])"><i class="fa fa-eye"></i> <span>开启</span></a>
                                                        @endif
                                                        <a class="btn btn-white btn-sm del"  href="@uri('glob/setting@menu/del',['id'=>$cv['id']])"><i class="fa fa-trash"></i> 删除 </a>
                                                        <a class="btn btn-white btn-sm edit" href="@uri('glob/setting@menu/edit',['id'=>$cv['id']])"><i class="fa fa-edit"></i> 修改 </a>
                                                    </td>
                                                </tr>
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
        </div>
    </div>
@endsection