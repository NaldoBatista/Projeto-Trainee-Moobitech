
$.validator.addMethod("regex", function(value, element, regex) {
    if (value.match(regex)) {
        return true;
    }
    return false;
}, " Formato invalido");

$(function() {

    let form = $('.form-cadastrar-usuario');

    if (form.length) {
        form.validate({
            rules : {
                login: {
                    required: true,
                    minlength: 3,
                    regex: /^[0-9a-zA-Zà-úÀ-Ú]+$/
                },
                senha: {
                    required: true,
                    maxlength: 6,
                    regex: /^[0-9a-zA-Zà-úÀ-Ú]+$/
                },
                nivel_acesso: {
                    required: true,
                }
            },
            messages: {
                login: {
                    required: "Informe o seu nome",
                    minlength: "O nome deve ter no mínimo 3 caracters"
                },
                senha: {
                    required: "Informe a data de nascimento"
                },
                nivel_acesso: {
                    required: "Informe o grau de parentesco"
                }

            }
        })
    }
})