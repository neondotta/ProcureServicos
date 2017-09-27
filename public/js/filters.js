$(document).ready(function(){
    $('#category').change(function(){
        $.ajax({
            type: "POST",
            url: "./servicesFilter/searchByFilter",
            dataType: "json",
            data:{
                "category": this.value
            },
            success:function(data) {
                add_professional(data);
            },
    
        });
    });
});

function add_professional(data) {
    $('li.collection-item').remove();
    document.getElementById('info').innerHTML = " Encontrado:  " + data.length + " profissionais próximos de você.<br>";
    $.each(data, function(i, e) {
        const li = $("<li class=\"collection-item avatar\"></li>");
        const span = $("<span class=\"title\" id=\"nameProfessional\"></span>");
        const p = $("<p id=\"emailProfessional\"></p>");
        const img = $('<img />', { src:'public/images/default.jpg', alt:"", class:"left" });
        let certificate = null;
        if(e.certificate == true) {
            certificate = $("<a href=\"#!\" class=\"secondary-content\">" +
                "<i class=\"material-icons\">verified_user</i></a>");
        }

        span.text(e.name);
        p.text(e.email);

        li.append(img, span, p, certificate);
        li.appendTo($('.collection'));
    });

}

