$('#cpf').on('blur', function() {
    validCpf();
});

let confirm_password = document.getElementById("confirm-password");
let password = document.getElementById("password");
let submit = document.getElementById("btn-submit");

$('#confirm-password').on('blur', function() {
    if(confirm_password.value != password.value) {
        $( "#confirm-password, #password" ).removeClass("valid").addClass("invalid");
        submit.setAttribute("disabled","disabled");
    }else{
        $( "#confirm-password, #password" ).removeClass("invalid").addClass("valid");
        submit.setAttribute("enable", "enable");
    }
});


function validCpf() {
    $.ajax({
        type: "POST",
        url: "../ValidFormController/getCpf",
        dataType: "json",
        data: {
            "cpf": cpf.value
        },
        success: function(data) {
            if(data.status == false) {
                $( "#cpf" ).removeClass("valid").addClass("invalid");
                submit.setAttribute("disabled","disabled");
            }else{
                $( "#cpf" ).removeClass("invalid").addClass("valid");
                submit.removeAttribute("disabled","disabled");
            }
        }
    });
}