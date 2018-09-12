function showfemale(){
    $("#malefigures").css("display", "none");
    $("#femalefigures").css("display", "block");
}
function showmale(){
    $("#malefigures").css("display", "block");
    $("#femalefigures").css("display", "none");
}
function selectList(group) {
}

$(document).ready(function() {
    var exercises = $("#msclgrps").text().split(" ");
    console.log(exercises);
    exercises.forEach(function(entry) {
        console.log(entry);
        $("."+entry).attr("style", "opacity:1");
        $("."+entry).addClass("selected");
    });


});
