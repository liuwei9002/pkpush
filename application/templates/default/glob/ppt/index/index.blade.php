@extends('glob/layout/glob.blade.php')
@section('title', 'PPT管理')

@section('page')
    <div class="row mb10">
        <ol class="breadcrumb">
            <li class="active">当前位置：<a href="@uri('glob/ppt@index/index')">PPT管理</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox  ibox-content">
                <div class="row">
                    <form class="form-horizontal form-inline col-sm-11" action="@uri("glob/ppt@index/index")"
                          method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="请输入标题" name="title"
                                   value="{{$title or ''}}">
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> 搜索</button>
                    </form>
                    <div class="col-sm-1">
                        <a href="@uri('glob/ppt@index/add')" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="ibox ibox-content">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 100px;">标题</th>
                        <th>创建人</th>
                        <th style="width: 100px;">文件</th>
                        <th>标签</th>
                        <th>收费</th>
                        <th>色系</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    @if($list)
                        <tbody>
                        @foreach($list as $v)
                            <tr>
                                <td>{{$v['id']}}</td>
                                <td>{{$v['title']}}</td>
                                <td>{{$v['user']['display_name']}}</td>
                                <td>
                                    @if($v['preview_filepath'])
                                        <a class="pptpreview" data-v="{{$v['preview_filepath']}}" data-toggle="modal"
                                           data-target="#myModal">{{$v['filepath']}}</a>
                                    @else
                                        {{$v['filepath']}}
                                    @endif
                                </td>
                                <td>
                                    @if($v['tags'])
                                        @foreach($v['tags'] as $tv)
                                            <span class="badge badge-info">{{$tv['name']}}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{$v['coin_number']}}</td>
                                <td><span class="badge badge-warning">@option($v['fcolor'], $colors)</span></td>
                                <td>{{$v['created_at']}}</td>
                                <td>
                                    <a class="btn btn-white btn-sm del ajaxload"
                                       href="@uri('glob/ppt@index/del', ['id'=>$v['id']])"><i class="fa fa-trash"></i>
                                        删除 </a>
                                    <a class="btn btn-white btn-sm edit"
                                       href="@uri('glob/ppt@index/edit', ['id'=>$v['id']])"><i class="fa fa-edit"></i>
                                        修改 </a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="9">
                                {{$pagi}}
                            </td>
                        </tr>
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <div class="modal inmodal" id="myModal" tabindex="9999" role="dialog" aria-hidden="true">

        <div class="modal-dialog" style="width: 700px;height: 500px;">
            <div class="modal-content" style="display:block">
                <div class="modal-body">
                    <div id="viewer" class="flexpaper_viewer" style="width: 100%;height:500px"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section("cssend")
    @static('/static/flexpaper/css/flexpaper.css')
@endsection
@section("jsend")
    @static('/static/flexpaper/js/flexpaper.js')
    @static('/static/flexpaper/js/flexpaper_handlers.js')
    <script>
        $(function () {
            $(".pptpreview").each(function () {
                $(this).click(function () {
                    var pptpath = $(this).data("v");
//                    $("#pptvalue").val(pptpath);
//                    $("#pptembed").attr("src", pptpath);
                    $('#viewer').FlexPaperViewer(
                            {
                                config: {
                                    jsDirectory: "/static/flexpaper/js/",
                                    SWFFile: pptpath,
                                    cssDirectory:"/static/flexpaper/css/",
                                    ZoomTransition: 'easeOut',
                                    Scale : 0.15,
                                    ZoomTime: 0.5,
                                    ZoomInterval: 0.7,
                                    FitPageOnLoad: true,
                                    FitWidthOnLoad: true,
                                    FullScreenAsMaxWindow: false,
                                    ProgressiveLoading: true,
                                    MinZoomSize: 0.1,
                                    MaxZoomSize: 1,
                                    SearchMatchAll: false,
                                    InitViewMode: 'Portrait',
                                    RenderingOrder: 'flash,html',
                                    StartAtPage: '',
                                    ViewModeToolsVisible: false,
                                    ZoomToolsVisible: true,
                                    NavToolsVisible: true,
                                    CursorToolsVisible: false,
                                    SearchToolsVisible: false,
                                    WMode: 'window',
                                    localeChain: 'en_US',
                                    PrintPaperAsBitmap:false,
                                }
                            }
                    );

                });
            });
        });
    </script>
@endsection