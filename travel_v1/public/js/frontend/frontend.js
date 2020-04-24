$(document).ready(function(){
    
    /*$('#add_comment').ajaxForm({ 
        data: {
            comment_description: console.log($("#comment_description").val())
            
        },
        success: function(responseText){
            //console.log($("#comment_description").val());
            //console.log(responseText);
        }, 
    }); */

    $("#add_comment").submit(function(e) {

        e.preventDefault(); 
        var url = $(this).attr('action');
        var commentDescription = $("#comment_description");
        var cityId = $("#comment_description");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: url,
            data: {
                comment_description: commentDescription.val(),
                city_id: cityId.attr('data-city-id')
            }, 
            success: function(response)
            {                
                if(response.message === 'ok'){

                    $(".comment_list div:eq(0)").before(
                        '<div> <span>'+response.userName +'</span>' + '<p class="form-control" id="comment">' + response.comment + '</p> </div>' 
                    );
                    commentDescription.val('')
                }
            }
        });
    });
});