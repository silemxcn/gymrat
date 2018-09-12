function showfemale(){
    $("#malefigures").css("display", "none");
    $("#femalefigures").css("display", "block");
}
function showmale(){
    $("#malefigures").css("display", "block");
    $("#femalefigures").css("display", "none");
}
function selectList(group){
    console.log(group.className);
    //console.log($(group).hasClass("selected"));

    if($(group).hasClass("selected")) {
        $("." + group.className.split(" ")).each(function (el) {
            $(this).removeAttr("style", "opacity:1");
            $(this).removeClass("selected");
            //console.log(group.className);
        });
        let newtext = $("#muscle_group").val().replace(group.className+' ','');
        $("#muscle_group").val(newtext);
    }
    else {
        let newtext = $("#muscle_group").val()+group.className+' ';
        $("#muscle_group").val(newtext);

        $("." + group.className).each(function (el) {
            $(this).attr("style", "opacity:1");
            $(this).addClass("selected");
            //console.log(group.className);
        });
    }


}
function selectGroup(){

}