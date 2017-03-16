@extends('glob/layout/glob.blade.php')
@section('title', 'tags添加')

@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li>当前位置：<a href="@uri('glob/ppt@tags/index')">tags管理</a></li>
            <li class="active"><a href="@uri('glob/ppt@tags/add')">tags添加</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox ibox-content">
                <form class="form-horizontal ajaxform" id="form" method="post" action="@uri('glob/ppt@tags/doadd')">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">父标签</label>
                        <div class="col-sm-6">
                            <select name="pid">
                                <option value="0">顶级标签</option>
                                @if($tags)
                                    @foreach($tags  as $v)
                                        <option value="{{$v['id']}}">{{$v['name']}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">名称</label>
                        <div class="col-sm-6">
                            <input type="text" value="" name="name" class="form-control" data-required="true">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">排序</label>
                        <div class="col-sm-6">
                            <input type="text" value="0" name="fsort" class="form-control" data-required="true">
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
@endsection