$("document").ready(function () {
    $(".cp").keyup(function (){
        if ($(this).val().length === 5){
            $.ajax({
                type: 'get',
                url: 'http://127.0.0.1:8000/city/' + $(this).val(),
                beforeSend: function(){
                    console.log('ca charge!!');
                },
                success: function(data){
                    $(".ville").val(data.city);
                    console.log('ok ok ok!!!');
                }
            });
        }else{
            $(".ville").val('')
        }
    })
})