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
            url: "http://localhost/procure-servicos/ServiceController/acceptService",
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
            url: "http://localhost/procure-servicos/ServiceController/userAcceptService",
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
            url: "http://localhost/procure-servicos/ServiceController/startService/"+serviceId,
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
            url: "http://localhost/procure-servicos/ServiceController/confirmService/"+serviceId,
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
            url: "http://localhost/procure-servicos/ServiceController/finishService/"+serviceId,
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
            url: "http://localhost/procure-servicos/ServiceController/confirmFinish/"+serviceId,
            dataType: "json",
            success:function(data) {
                // quando retornar com sucesso o ajax, o mesmo irá adicionar os markers
                alert(data);
                location.reload();
            },
    
        });
    });
});
