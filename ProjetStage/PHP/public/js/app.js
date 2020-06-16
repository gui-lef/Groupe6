
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
            success : function(fig){ // success est toujours en place, bien sûr !
            console.table(fig);
            var fig=JSON.parse(fig)
               $(".modal-title").text(fig.nomFigurine);
                $(".card-prix").text(fig.prixFigurine);
                $(".modal-pic").attr('src','../../public/img/articles/figurines/'+fig.imageFigurine);
            },

        });

    });


    });