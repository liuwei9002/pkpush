@extends('glob/layout/glob.blade.php')
@section('title', '权限组编辑')

@section('page')
<div class="row mb10">
    <ol class="breadcrumb">
        <li>当前位置：<a href="@uri('glob/setting@accessgroup/index')">权限组管理</a></li>
        <li class="active"><a href="@uri('glob/setting@accessgroup/edit',['id'=>$info['id']])">权限组编辑</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <form class="form-horizontal ajaxform" id="form" method="post" action="@uri('glob/setting@accessgroup/doedit',['id'=>$info['id']])">
                    <div class="form-group"><label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-10"><input type="text" value="{{$info['name']}}" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">权限列表</label>
                        <div class="col-sm-10">
                            <label class="">
                                <input type="checkbox" name="checkall">全选&nbsp;&nbsp;&nbsp;
                            </label>
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">
                                    @if($list)
                                    @foreach($list as $k=>$v)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <input type="checkbox" name="checkallsub">&nbsp;&nbsp;&nbsp;
                                                <a data-toggle="collapse" data-parent="#accordion"
                                                   href="#collapse_{{$k}}" aria-expanded="false"
                                                   class="collapsed">
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
                                        <div id="collapse_{{$k}}" class="panel-collapse collapse"
                                             aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <table id="DataTables_Table_0"
                                                       class="table table-striped table-bordered table-hover dataTables-example dataTable dtr-inline"
                                                       role="grid"
                                                       aria-describedby="DataTables_Table_0_info">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc">名称</th>
                                                        <th class="sorting_asc">类型</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>

                                                    <tr class="gradeA odd" role="row">
                                                        <td class="sorting_1">
                                                            <input type="checkbox" @diff($info['access'], $v['id'], "checked")
                                                                                     name="perm[]" id="p1"
                                                                                     value="{{$v['id']}}">&nbsp;&nbsp;&nbsp;{{$v['name']}}
                                                        </td>
                                                        <td class="sorting_1">
                                                            <?php
                                                            if ($v['ftype'] == 1) {
                                                                echo "菜单";
                                                            } elseif ($v['ftype'] == 2) {
                                                                echo "页面";
                                                            } else {
                                                                echo "服务";
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    @if(isset($v['child']))
                                                    @foreach($v['child'] as $cv)
                                                    <tr class="gradeA odd" role="row">
                                                        <td class="sorting_1"><input type="checkbox"  @diff($info['access'], $cv['id'], "checked")
                                                                                     name="perm[]"
                                                                                     id="p1"
                                                                                     value="{{$cv['id']}}">&nbsp;&nbsp;&nbsp;{{$cv['name']}}
                                                        </td>
                                                        <td class="sorting_1">
                                                            <?php
                                                            if ($cv['ftype'] == 1) {
                                                                echo "菜单";
                                                            } elseif ($cv['ftype'] == 2) {
                                                                echo "页面";
                                                            } else {
                                                                echo "服务";
                                                            }
                                                            ?>
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
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">描述</label>
                        <div class="col-sm-10"><input type="text" value="{{$info['descr']}}" name="descr" class="form-control">
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
@section("jsend")
    $(function(){
        $('[name=checkall]').click(function(){
            if($(this).prop("checked")){
                $('input[type=checkbox]').prop("checked",true);
            }else{
                $('input[type=checkbox]').removeAttr("checked");
            }
            reset();
        });

        $('input[type=checkbox][name=checkallsub]').click(function(){
            panel = $(this).parents('.panel');
            if($(this).prop("checked")){
                $("input[name='perm[]']",panel).each(function(){
                    $(this).prop("checked",true);
                });
            }else{
                $("input[name='perm[]']",panel).each(function(){
                    console.log(1);
                    $(this).prop("checked",false);
                });
            }
            reset();
        })

        $("input[name='perm[]']").click(function(){
            reset();
        });

        reset();

        function reset()
        {
            $('input[name=checkallsub]').prop("checked",false);
            $('input[name=checkallsub]').parent().find('a').css('color', 'inherit');

            $('input[type=checkbox]').each(function(){
                panel = $(this).parents('.panel');
                if($(this).prop('checked') == true)
                {
                    $('input[name=checkallsub]',panel).prop("checked",true);
                    $('input[name=checkallsub]',panel).parent().find('a').css('color', 'red');
                }
            })
        }

    })
@endsection