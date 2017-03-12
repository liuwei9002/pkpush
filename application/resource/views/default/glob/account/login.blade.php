@extends('layout/base.blade.php')
@section('title', '登录-管理系统')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">

                <div class="panel-body">
                    <h4>欢迎登录后台管理系统</h4>
                    <div class="hr-line-dashed"></div>
                        <form class="form-horizontal ajaxform" method="post" action="@uri('glob/account/login')">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-envelope"></i>
                                    <input type="email" class="form-control" name="email" placeholder="邮箱地址" data-required="true">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="inner-addon left-addon">
                                        <i class="fa fa-key"></i>
                                    <input type="password" name="pwd" placeholder="密码" data-required="true" class="form-control">
                                        </div>
                                </div>
                            </div>
                            <div class="form-group" id="captchaField">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-5 center">
                                            <img src="@uri('glob/captcha/recaptcha',['type'=>'login'])" id="recaptcha"/>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="inner-addon left-addon">
                                                <i class="fa fa-shield"></i>
                                            <input type="text" name="captcha" id="checkcaptcha" placeholder="验证码"  data-required="true" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-8">
                                    <button class="btn btn-block btn-primary " type="submit">登 录</button>
                                </div>
                                    <div class="col-sm-2"></div>
                                    </div>
                            </div>
                        </form>
                </div>
            </div>

        </div>
        <div class="col-md-4"></div>
    </div>
</div>
@endsection
@section('body', 'class="signin gray-bg"')
@section("jsinit")
<script>
    var captchaCheckUrl = "@uri('glob/captcha/checkcaptcha',['type'=>'login'])";
</script>
@endsection
@section("cssend")
<style>
.signin{
    width: 100%;
    min-height: 100%;
    overflow: hidden;
    padding-top: 10%;
}
</style>
@endsection
@section("jsend")
    @static('/static/plugins/captcha/captcha.js')
<script>
$(function(){
    $("#recaptcha").captcha();
    $("#checkcaptcha").checkcaptcha({
        checkurl:captchaCheckUrl,
        errorId:"#captchaField",
    });
});
</script>
@endsection