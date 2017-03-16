$(function(){
    var paceOptions = {
        restartOnRequestAfter: false
    };
    $(document).ajaxStart(function () {
        Pace.restart();
    });
    $('.ajaxform').jqueryform();

    $('.ajaxload').ajaxload();

    $("#side-menu").metisMenu();

    $(".nicescroll").slimScroll({
        height: "100%",
        railOpacity: .4,
        wheelStep: 10
    })

    $(".navbar-minimalize").click(function () {
        $("body").toggleClass("mini-navbar"), SmoothlyMenu()
    })

    function SmoothlyMenu() {
        $("body").hasClass("mini-navbar") ? $("body").hasClass("fixed-sidebar") ? ($("#side-menu").hide(), setTimeout(function () {
            $("#side-menu").fadeIn(500)
        }, 300)) : $("#side-menu").removeAttr("style") : ($("#side-menu").hide(), setTimeout(function () {
            $("#side-menu").fadeIn(500)
        }, 100))
    }

    var option = {
        "path":"/"
    }
    $("a", ".nav-second-level").each(function () {
        $(this).click(function () {
            var route = $(this).data("route");
            $.Cookie('menu_active', route, option);
        });
    });

    $("#homemenu").click(function () {
        $.Cookie('menu_active', '', option);
    });


    
});