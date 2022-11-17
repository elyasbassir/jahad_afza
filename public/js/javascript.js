$(document).ready(function (){
    var ch =false;
$(".show_more_tools").click(function (){
if (ch==false){
    ch=true;
    $(".toolbar").animate({left: "0px"});

}else{
    ch=false;
    $(".toolbar").animate({left: "-300px"});
}


});


});
