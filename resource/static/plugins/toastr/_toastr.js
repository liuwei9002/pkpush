toastr.options = {
    "closeButton": false,
    "debug": false,
    "progressBar": true,
    "positionClass": "toast-top-center",
    "onclick": null,
    "showDuration": "800",
    "hideDuration": "800",
    "timeOut": "1500",
    "extendedTimeOut": "800",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

function tinfo($str)
{
    toastr.info($str);
}

function tsuccess($str)
{
    toastr.success($str);
}

function terror($str)
{
    toastr.error($str);
}

function twarning($str)
{
    toastr.warning($str);
}

