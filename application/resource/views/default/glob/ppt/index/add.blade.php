@extends('glob/layout/glob.blade.php')
@section('title', 'PPT添加')

@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li>当前位置：<a href="@uri('glob/ppt@index/index')">PPT管理</a></li>
            <li class="active"><a href="@uri('glob/ppt@index/add')">PPT添加</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox ibox-content">
                <form class="form-horizontal ajaxform"  enctype="multipart/form-data" id="form" method="post" action="@uri('glob/ppt@index/doadd')">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-6">
                            <input type="text" value="" name="title" class="form-control" data-required="true">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">收费</label>
                        <div class="col-sm-6">
                            <input type="text" value="0" name="coin_number" class="form-control" data-required="true">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">创建人</label>
                        <div class="col-sm-6">
                            <select name="uid">
                                @if($employee)
                                    @foreach($employee  as $v)
                                        <option value="{{$v['id']}}">{{$v['display_name']}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">上传PPT</label>
                        <div class="col-sm-6">
                            <input type="file" name="ppt" class="form-control" data-required="true">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">预览文件(flash)</label>
                        <div class="col-sm-6">
                            <input type="file" name="ppt_preview" class="form-control" data-required="true">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标签</label>
                        <div class="col-sm-6">
                            <select name="tags[]" multiple="multiple" size="8">
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
                        <label class="col-sm-2 control-label">色系</label>
                        <div class="col-sm-6">
                            <select name="colors">
                                @if($colors)
                                    @foreach($colors  as $k=>$v)
                                        <option value="{{$k}}">{{$v}}</option>
                                    @endforeach
                                @endif
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
@endsection