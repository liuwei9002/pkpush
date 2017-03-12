@extends('glob/layout/glob.blade.php')
@section('title', 'PPT管理')

@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li class="active">当前位置：<a href="@uri('glob/ppt@tags/index')">tags管理</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox ibox-content">
                <div class="">
                    <a href="@uri('glob/ppt@tags/add')" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                </div>
                <div class="panel-body">
                    <div class="panel-group" id="accordion">
                        @if($list)
                            @foreach($list as $v)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse__menuGroupRoot_{{$v['id']}}" aria-expanded="false" class="collapsed">
                                        {{$v['name']}}
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse__menuGroupRoot_{{$v['id']}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <table id="DataTables_Table_0" class="table table-striped table-bordered table-hover dataTables-example dataTable dtr-inline" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc">名称</th>
                                            <th class="sorting_asc">PPT数</th>
                                            <th class="sorting_asc">排序</th>
                                            <th class="sorting_asc">pid</th>
                                            <th class="sorting_asc">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr class="gradeA odd" role="row">
                                            <td class="sorting_1">{{$v['name']}}</td>
                                            <td class="sorting_1">
                                                {{$v['ppt_number']}}
                                            </td>
                                            <td class="sorting_1">
                                                {{$v['fsort']}}
                                             </td>
                                            <td class="sorting_1">
                                                {{$v['pid']}}
                                            </td>
                                            <td>
                                                <a class="btn btn-white btn-sm del ajaxload" href="@uri('glob/ppt@tags/del', ['id'=>$v['id']])"><i class="fa fa-trash"></i> 删除 </a>
                                                <a class="btn btn-white btn-sm edit" href="@uri('glob/ppt@tags/edit', ['id'=>$v['id']])"><i class="fa fa-edit"></i> 修改 </a>
                                            </td>
                                        </tr>

                                        @if(isset($v['child']) && $v['child'])
                                            @foreach($v['child'] as $cv)
                                                <tr class="gradeA odd" role="row">
                                                    <td class="sorting_1">{{$cv['name']}}</td>
                                                    <td class="sorting_1">
                                                        {{$cv['ppt_number']}}
                                                    </td>
                                                    <td class="sorting_1">
                                                        {{$cv['fsort']}}
                                                    </td>
                                                    <td class="sorting_1">
                                                        {{$cv['pid']}}
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-white btn-sm del ajaxload" href="@uri('glob/ppt@tags/del', ['id'=>$cv['id']])"><i class="fa fa-trash"></i> 删除 </a>
                                                        <a class="btn btn-white btn-sm edit" href="@uri('glob/ppt@tags/edit', ['id'=>$cv['id']])"><i class="fa fa-edit"></i> 修改 </a>
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
@endsection