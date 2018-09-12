jQuery(document).ready(function(){
    console.log(routine);
    let exercises = routine.exercises;
    console.log(exercises);
    for(let i=0; i<exercises.length; i++){
        $("#"+exercises[i].pivot.day_id+" .calendar-content").append("<a href=\"/exercises/"+exercises[i].id+"\" style=\"white-space: nowrap;\">"+exercises[i].title+"</a>");
    }
    //"/routines/{{$routine->id}}"
    $(".calendar-content").not(":has(a)").html("<h3>Rest day</h3>");
});
