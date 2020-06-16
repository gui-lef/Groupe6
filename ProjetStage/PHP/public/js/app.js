
$(function () {

/*
$('.product-image').click(
    function () {
    $(this).hide('slow')
    }
);*/
    $(".voirplus").click(function(){
        var id=$(this).attr('data-id');

        $.ajax({
            url : 'ajax/figurine.php',
            type : 'POST',
            data : {
                'id':id
            },
            success : function(code_html){ // success est toujours en place, bien sûr !

                $(".modal-title").text(code_html)
            },

        });

    });


    });