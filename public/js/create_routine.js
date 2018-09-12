function bing(){
    console.log("bing",exarray);
}

function addex(exercise){
    var exobject={
        name:exercise.title,
        exercise_id:exercise.id,
        day_id:day_selected
    };
    let dup=false;
    for(let i=0; i<exarray.length; i++)
        if (exarray[i].day_id == day_selected)
            if (exarray[i].name == exobject.name)
                dup = true;

    if(dup === false){
        exarray.push(exobject);
        if($("#"+day_selected +" .calendar-content").html() == "<h3>Rest day</h3>")
            $("#"+day_selected +" .calendar-content").children().remove();
        $("#"+day_selected +" .calendar-content").append("<a href=\"#\" style=\"white-space: nowrap;\">"+exobject.name+"</a>");
        $('#addexmodal').modal('hide');
    }
    else
        alert("That exercise has already been added on this day.");

}
function clearday(day){
    //<h3>Rest day</h3>
    $("#"+day +" .calendar-content").children().remove();
    $("#"+day +" .calendar-content").html("<h3>Rest day</h3>");
    exarray= exarray.filter( el => el.day_id !== day );
}
$(document).ready(function() {
    if(typeof exarray === "undefined")
        exarray=[];
    if(typeof day_selected === "undefined")
        var day_selected;
});
function select(day) {
    //console.log(day);
    day_selected=day;
}

jQuery(document).ready(function(){
    jQuery('#ajaxSubmit').click(function(e){

        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = new FormData($('#workoutform')[0]);
        formData.append('exarray',JSON.stringify(exarray));

        jQuery.ajax({
            url: "/routines/post",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,

            success: function(data){
                $('.py-4').children().not('.container').remove();
                //console.log(data);
                window.location = "/routines";
            },
            error: function (data) {
                let errors = $.parseJSON(data.responseText);
                console.log(errors);
                $('.py-4').children().not('.container').remove();
                for(var prop in errors.errors){
                    //console.log(errors.errors[prop][0]);
                    let msg = errors.errors[prop][0];
                    $('.py-4').prepend("<div class=\"alert alert-danger\">"+msg+"</div>")
                };
            }});
    });
});

function submitdata(){
    //$('#workoutform').serializeArray();
    // $.ajax({
    //     type: "POST",
    //     url: url,
    //     data: data,
    // }).done(function(response){
    //     console.log("BLA e OK", response);
    // });
}