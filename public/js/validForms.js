let confirm_password = document.getElementById("confirm-password");
let password = document.getElementById("password");
let cnpj = document.getElementById("cnpj");
let submit = document.getElementById("btn-submit");

$('#cpf').on('blur', function() {
    validCpf();
});


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

$('#cnpj').on("blur", function () {
    if (cnpj.value != '') {
        validCnpj();
    } else {
        showInvoice();
    }
});

function validCnpj() {
    $.ajax({
        type: "POST",
        url: "../ValidFormController/getCnpj",
        dataType: "json",
        data: {
            "cnpj": cnpj.value
        },
        success: function(data) {
            if(data.status == false) {
                $( "#cnpj" ).removeClass("valid").addClass("invalid");
                submit.setAttribute("disabled","disabled");
            }else{
                $( "#cnpj" ).removeClass("invalid").addClass("valid");
                submit.removeAttribute("disabled","disabled");
                $('#nota-fiscal').removeClass("hide-content").addClass("show-content");

            }
        }
    });
}

function showInvoice() {
    console.log($('#cnpj').hasClass("valid"));
    if(cnpj.value != '' && $('#cnpj').hasClass("valid")) {
        $('#nota-fiscal').removeClass("hide-content").addClass("show-content");
    }else if(cnpj.value == '' || $('#cnpj').hasClass("invalid")) {
        $('#nota-fiscal').removeClass("show-content").addClass("hide-content");
    }
}