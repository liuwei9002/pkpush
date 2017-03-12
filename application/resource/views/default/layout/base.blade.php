<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns=http://www.w3.org/1999/xhtml>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" href="/static/img/favicon.ico">
    @static('/static/ui/css/bootstrap.min.css')
    @static('/static/ui/css/font-awesome.min.css')
    @static('/static/plugins/toastr/toastr.min.css')
    @static('/static/css/style.min.css')
    @static('/static/css/_.css')
    @yield('cssend')
</head>
<body @yield('body')>
@yield('content')
@yield('jsinit')
@static('/static/js/jquery-2.1.4.min.js')
@static('/static/js/jquery-cookie.js')
@static('/static/ui/js/bootstrap.min.js')
@static('/static/plugins/pacejs/pace.min.js')
@static('/static/plugins/jqueryForm/jquery.form.js')
@static('/static/plugins/jqueryForm/_jquery.form.js')
@static('/static/plugins/ajaxload/ajaxload.js')
@static('/static/plugins/toastr/toastr.min.js')
@static('/static/plugins/toastr/_toastr.js')
@static('/static/plugins/metisMenu/jquery.metisMenu.js')
@static('/static/plugins/slimscroll/jquery.slimscroll.min.js')
@static('/static/plugins/footable/footable.all.min.js')
@static('/static/plugins/suggest/bootstrap-suggest.min.js')
@static('/static/js/_.js')
@yield('jsend')
</body>
</html>