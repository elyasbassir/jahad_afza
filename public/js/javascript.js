$(document).ready(function () {
    var ch = false;

    $('#hide_div').click(function () {
        if (ch == true) {
            ch = false;
            $(".toolbar").animate({left: "-300px"});
            $("#hide_div").css("display", 'none');
        }
    });
    $(".show_more_tools").click(function () {
        if (ch == false) {
            ch = true;
            $(".toolbar").animate({left: "0px"});
            $("#hide_div").css("display", 'block');

        } else {
            ch = false;
            $(".toolbar").animate({left: "-300px"});
            $("#hide_div").css("display", 'none');
        }


    });



});
