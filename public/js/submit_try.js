$(document).ready(function(){
    $('.user-showcase').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
    });
    console.log("slick loaded");
    if(typeof ach_selected === "undefined")
        var ach_selected;
});
function selectAchievement(ach){
    ach_selected=ach;
    console.log(ach_selected);
}
///////////ajax
jQuery(document).ready(function(){
    jQuery('#ajaxSubmit').click(function(e){

        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = new FormData($('#form')[0]);
        formData.append('achievement',JSON.stringify(ach_selected));

        jQuery.ajax({
            url: "/achievements/submit",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,

            success: function(data){
                $('.py-4').children().not('.container').remove();
                //console.log('ajax response',data);
                window.location = "/home";
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

