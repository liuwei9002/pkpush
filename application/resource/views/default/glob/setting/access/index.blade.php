@extends('glob/layout/glob.blade.php')
@section('title', '权限管理')

@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li class="active">当前位置：<a href="@uri('glob/setting@access/index')">权限管理</a></li>
        </ol>
    </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content"  id="perm">
                        <div class="">
                            <a class="btn btn-primary " href="@uri('glob/setting@access/add')">添加权限</a>
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                @if($list)
                                    @foreach($list as $k=>$v)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$k}}" aria-expanded="false" class="collapsed">
                                                <?php
                                                    if($k == '_menuGroupRoot'){
                                                        echo "菜单组";
                                                    }else{
                                                        $str = $v['name'];
                                                        echo $str;
                                                    }
                                                ?>
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapse_{{$k}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <table id="DataTables_Table_0" class="table table-striped table-bordered table-hover dataTables-example dataTable dtr-inline" role="grid" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" >名称</th>
                                                    <th class="sorting_asc" >Route</th>
                                                    <th class="sorting_asc" >类型</th>
                                                    <th class="sorting_asc" >操作</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="gradeA odd" role="row" >
                                                    <td class="sorting_1">{{$v['name']}}</td>
                                                    <td class="sorting_1">
                                                        {{$v['route']}}
                                                    </td>
                                                    <td class="sorting_1">
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
                                                    <td>
                                                        <a class="btn btn-white btn-sm del"  href="@uri('glob/setting@access/delete',['id'=>$v['id']])"><i class="fa fa-trash"></i> 删除 </a>
                                                        <a class="btn btn-white btn-sm edit" href="@uri('glob/setting@access/edit',['id'=>$v['id']])"><i class="fa fa-edit"></i> 修改 </a>
                                                    </td>
                                                </tr>
                                                @if($v['child'])
                                                @foreach($v['child'] as $cv)
                                                <tr class="gradeA odd" role="row" >
                                                    <td class="sorting_1">{{$cv['name']}}</td>
                                                    <td class="sorting_1">
                                                        {{$cv['route']}}
                                                    </td>
                                                    <td class="sorting_1">
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
                                                    <td>
                                                         <a class="btn btn-white btn-sm del"  href="@uri('glob/setting@access/delete',['id'=>$cv['id']])"><i class="fa fa-trash"></i> 删除 </a>
                                                        <a class="btn btn-white btn-sm edit" href="@uri('glob/setting@access/edit',['id'=>$cv['id']])"><i class="fa fa-edit"></i> 修改 </a>
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