/*$(function () {
    setInterval(searchServices(),5000);
    function searchServices(){
        $.ajax({
            type: "GET",
            url: "./ServiceController/searchServices",
            dataType: "json",
            success:function(data) {
                // quando retornar com sucesso o ajax, o mesmo irá adicionar os markers
                console.log(data);
            },
    
        });
    }
});*/

$(document).ready(function(){
    $('#accept').click(function(){
        var price = $('#price').val();
        var serviceId = $('#serviceId').val();
        console.log(price);
        $.ajax({
            type: "POST",
            url: document.location.origin + "/index.php/ServiceController/acceptService",
            dataType: "json",
            data:{
                "price": price,
                "serviceId": serviceId,
                "status": 3
            },
            success:function(data) {
                // quando retornar com sucesso o ajax, o mesmo irá adicionar os markers
                alert("Aguardando resposta do cliente");
                location.reload();
            },
    
        });
    });

    $('#userAccept').click(function(){
        var serviceId = $('#serviceId').val();
        console.log(price);
        $.ajax({
            type: "POST",
            url: document.location.origin + "/index.php/ServiceController/userAcceptService",
            dataType: "json",
            data:{
                "serviceId": serviceId,
                "status": 4
            },
            success:function(data) {
                // quando retornar com sucesso o ajax, o mesmo irá adicionar os markers
                alert(data);
                location.reload();
            },
    
        });
    });

    $('#startService').click(function(){
        var serviceId = $('#serviceId').val();
        $.ajax({
            type: "GET",
            url: document.location.origin + "/index.php/ServiceController/startService/"+serviceId,
            dataType: "json",
            success:function(data) {
                // quando retornar com sucesso o ajax, o mesmo irá adicionar os markers
                alert(data);
                location.reload();
            },
    
        });
    });

    $('#confirmService').click(function(){
        var serviceId = $('#serviceId').val();
        $.ajax({
            type: "GET",
            url: document.location.origin + "/index.php/ServiceController/confirmService/"+serviceId,
            dataType: "json",
            success:function(data) {
                // quando retornar com sucesso o ajax, o mesmo irá adicionar os markers
                alert(data);
                location.reload();
            },
    
        });
    });

    $('#finishService').click(function(){
        var serviceId = $('#serviceId').val();
        $.ajax({
            type: "GET",
            url: document.location.origin + "/index.php/ServiceController/finishService/"+serviceId,
            dataType: "json",
            success:function(data) {
                // quando retornar com sucesso o ajax, o mesmo irá adicionar os markers
                alert(data);
                location.reload();
            },
    
        });
    });

    $('#confirmFinish').click(function(){
        var serviceId = $('#serviceId').val();
        $.ajax({
            type: "GET",
            url: document.location.origin + "/index.php/ServiceController/confirmFinish/"+serviceId,
            dataType: "json",
            success:function(data) {
                alert(data);
                $('#modal1').modal('open');

            },
    
        });
    });
    
    $('#serviceRating').click(function(){
        var serviceId = $('#serviceId').val();
        var idRating =  $('input[name=star]').attr('id');
        var description = $("#description").val();
        var rating = 0;

        switch(idRating) {
            case 'star-5-2':
                rating = 5
                break;
            case 'star-4-2':
                rating = 4;
                break;
            case 'star-3-2':
                rating = 3;
                break;  
            case 'star-2-2':
                rating = 2;
                break;
            case 'star-1-2':
                rating = 1;
                break;      
        }
        $.ajax({
            type: "POST",
            url: document.location.origin + "/index.php/ServiceController/serviceRating",
            dataType: "json",
            data:{
                "serviceId": serviceId,
                "rating": rating,
                "description": description
            },
            success:function(data) {
                location.reload();
            },
    
        });
    });
});
