<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="row">
                    <div class="col-sm-4 center" >
                        <img src="/static/img/n-avator-bg.png"  class="img-circle" alt="image" style="width: 50px; height: 50px;margin-left: 10px;margin-top: 5px;">
                    </div>
                    <div class="col-sm-8">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="clear">
                                   <span class="block m-t-xs"><strong class="font-bold">{{$userinfo['display_name']}}</strong></span>
                                    <span class="text-muted text-xs block">@if($userinfo['is_admin']) 超级管理员 @else 普通管理员 @endif<b class="caret"></b></span>
                                    </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a  href="@uri('glob/setting@account/editpwd')">修改密码</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <li class="{{$homeactive}}">
                <a href="@uri('glob/index/index')" id="homemenu">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">主页</span>
                </a>
            </li>
            @if($menu)
                @foreach($menu as $v)
                    <?php
                        if(!isset($v['access'])) continue;
                    $check = $objUser->checkAccess($userinfo['id'], $v['access']['route']);
                    if(!$check) continue;
                    ?>
                    <li class="{{$v['active'] or ''}}">
                        <a href="javascript:;">
                            <i class="{{$v['icon'] empty 'fa fa-th-large'}}"></i>
                            <span class="nav-label">{{$v['name']}}</span>
                            <span class="fa arrow"></span>
                            <span class="label label-warning pull-right"></span>
                        </a>
                        @if(isset($v['child']) && $v['child'])
                            <ul class="nav nav-second-level">
                                @foreach($v['child'] as $cv)
                                    <?php
                                    $check = $objUser->checkAccess($userinfo['id'], $cv['access']['route']);
                                    if(!$check) continue;
                                    ?>
                                    <li class="{{$cv['access']['active'] or ''}}">
                                        <a data-route="{{$cv['access']['route'] or ''}}" href="@uri($cv['access']['route'])">{{$cv['name']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            @endif
            
        </ul>
    </div>
</nav>