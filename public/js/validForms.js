$('#cpf').on('blur', function() {
    validCpf();
});

let confirm_password = document.getElementById("confirm-password");
let password = document.getElementById("password");

$('#confirm-password').on('blur', function() {
    if(confirm_password.value != password.value) {
        $( "#confirm-password, #password" ).removeClass("valid");
        $( "#confirm-password, #password" ).addClass("invalid");
    }else{
        $( "#confirm-password, #password" ).removeClass("invalid");
        $( "#confirm-password, #password" ).addClass("valid");
    }
});


function validCpf() {
    $.ajax({
        type: "POST",
        url: "../ValidFormController/validCPF",
        dataType: "json",
        data: {
            "cpf": cpf.value
        },
        success: function(data) {
            if(data.status == false) {
                $( "#cpf" ).removeClass("valid");
                $( "#cpf" ).addClass("invalid");
            }else{
                $( "#cpf" ).removeClass("invalid");
                $( "#cpf" ).addClass("valid");
            }
        }
    });
}