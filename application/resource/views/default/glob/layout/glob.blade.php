@extends('layout/base.blade.php')
@section('body', ' class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden"')

@section('content')
    <div id="wrapper">
        @widget('glob/widget/nav.blade.php')
        {{--page--}}
        <div id="page-wrapper" class="gray-bg dashbard-1">
            @widget('glob/widget/top.menu.blade.php')
            <div class="row J_mainContent" id="content-main">
                <div class="wrapper nicescroll"  id="page">
                        @yield('page')
                </div>
            </div>
            <div class="footer">
                <div class="pull-right">&copy; 2014-2015 daocang</div>
            </div>
        </div>
        <!--右侧部分结束-->
    </div>
@endsection