
$(function () {

    $(".voirplus").click(function(){
        var id=$(this).attr('data-id');
        var type=$(this).attr('data-type');

        $.ajax({
            url : 'ajax/ajax.php',
            type : 'POST',
            data : {
                'id':id,
                'type':type,
            },
            success : function(data){

            console.log(data);
            var model=JSON.parse(data)
               $(".modal-title").text(model[1]);
                $(".card-description").text(model[2]);
                $(".card-prix").text(model[3]+' €');
                $(".modal-pic").attr('src','../../public/img/articles/'+type+'/'+model[4]);
            },

        });


    });


    });