
$(function() {
    $( "#tabs" ).tabs();
});


$(function() {
  
    let form = $('.form-cadastrar-filiado');

    if (form.length) {
        form.validate({
            rules : {
                nome: {
                    required: true,
                    minlength: 3,
                    regex: /^[a-zA-Zà-úÀ-Ú\s]+$/
                },
                cpf: {
                    required: true,
                    cpf: true
                },
                rg: {
                    required: true,
                    minlength: 5,
                    digits: true
                },
                data_nascimento: {
                    required: true,
                    date: true
                },
                empresa: {
                    required: true,
                    minlength: 3,
                    regex: /^[0-9a-zA-Zà-úÀ-Ú\s]+$/
                },
                cargo: {
                    required: true,
                    minlength: 3
                },
                situacao: {
                    required: true,
                },
                telefone_residencial: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 11
                },
                telefone_celular: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 11
                }

            },
            messages: {
                nome: {
                    required: "Informe o seu nome",
                    minlength: "O nome deve ter no mínimo 3 caracters"
                },
                cpf: {
                    required: "Informe seu CPF",
                    digits: "O CPF deve conter apenas números"
                },
                rg: {
                    required: "Informe seu RG",
                    digits: "O RG deve conter apenas números"
                },
                data_nascimento: {
                    required: "Informe sua data de nascimento"
                },
                empresa: {
                    required: "Informe o nome da sua empresa",
                    minlength: "O nome deve ter no mínimo 3 caracters"
                },
                cargo: {
                    required: "Informe seu cargo",
                    minlength: "O cargo deve ter no mínimo 3 caracters"
                },
                situacao: {
                    required: "Informe sua situação"
                },
                telefone_residencial: {
                    required: "Informe seu número de telefone residencial",
                    digits: "O número deve conter apenas digitos",
                    minlength: "Numero inválido",
                    maxlength: "Numero inválido"
                },
                telefone_celular: {
                    required: "Informe seu número de telefone residencial",
                    digits: "O número deve conter apenas digitos",
                    minlength: "Numero inválido",
                    maxlength: "Numero inválido"
                }
            }
        })
    }
})
