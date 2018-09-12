
///////////ajax
jQuery(document).ready(function(){
    //console.log('sent req',submission);
    jQuery('#ajaxSubmityes').click(function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        submission.yes += 1;
        let data = JSON.stringify(submission);
        jQuery.ajax({
            url: "/achievements/vote",
            type: 'POST',
            data: data,
            dataType:"json",

            success: function(data){
                $('.py-4').children().not('.container').remove();
                console.log('ajax success response',data);
                window.location = "/achievements/showsub";
            },
            error: function (data) {
                // let errors = $.parseJSON(data.responseText);
                // console.log(errors);
                // $('.py-4').children().not('.container').remove();
                // for(var prop in errors.errors){
                //     //console.log(errors.errors[prop][0]);
                //     let msg = errors.errors[prop][0];
                //     $('.py-4').prepend("<div class=\"alert alert-danger\">"+msg+"</div>")
                // };
            }});
    });
    jQuery('#ajaxSubmitno').click(function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        submission.no += 1;
        let data = JSON.stringify(submission);
        jQuery.ajax({
            url: "/achievements/vote",
            type: 'POST',
            data: data,
            dataType:"json",

            success: function(data){
                console.log('ajax success response',data);
                //window.location = "/achievements/showsub";
                document.location.reload(true);
            },
            error: function (data) {
                // let errors = $.parseJSON(data.responseText);
                // console.log(errors);
                // $('.py-4').children().not('.container').remove();
                // for(var prop in errors.errors){
                //     //console.log(errors.errors[prop][0]);
                //     let msg = errors.errors[prop][0];
                //     $('.py-4').prepend("<div class=\"alert alert-danger\">"+msg+"</div>")
                // };
            }});
    });
});

