
$.validator.addMethod("regex", function(value, element, regex) {
    if (value.match(regex)) {
        return true;
    }
    return false;
}, " Formato invalido");

$(function() {

    let form = $('.form-cadastrar-dependente');

    if (form.length) {
        form.validate({
            rules : {
                nome: {
                    required: true,
                    minlength: 3,
                    regex: /^[a-zA-Zà-úÀ-Ú\s]+$/
                },
                data_nascimento: {
                    required: true,
                    data: true
                },
                grau_parentesco: {
                    required: true,
                    regex: /^[a-zA-Zà-úÀ-Ú\s]+$/
                }
            },
            messages: {
                nome: {
                    required: "Informe o seu nome",
                    minlength: "O nome deve ter no mínimo 3 caracters"
                },
                data_nascimento: {
                    required: "Informe a data de nascimento"
                },
                grau_parentesco: {
                    required: "Informe o grau de parentesco"
                }

            }
        })
    }
})