$(function () {
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
});