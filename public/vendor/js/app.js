$(document).ready(function () {
    $("#form_validation").validate();
    $("#form_validation2").validate();

    $('.select2').select2({
        placeholder: 'Selecionar'
    });

    $('.cep').mask('00000-000');
    $('.celular').mask('(00) 0 0000-0000');
    $('.telefone').mask('(00) 0000-0000');
    $('.cpf').mask('000.000.000-00', {reverse: true});

    var options = {
        onKeyPress: function (cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('.cpfcnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }

    $('.cpfcnpj').length > 11 ? $('.cpfcnpj').mask('00.000.000/0000-00', options) : $('.cpfcnpj').mask('000.000.000-00#', options);

    /*
    * Translated default messages for the jQuery validation plugin.
    * Locale: PT_BR
    */
    jQuery.extend(jQuery.validator.messages, {
        required: "Este campo &eacute; obrigatório.",
        remote: "Por favor, corrija este campo.",
        email: "Por favor, forne&ccedil;a um endere&ccedil;o eletr&ocirc;nico v&aacute;lido.",
        url: "Por favor, forne&ccedil;a uma URL v&aacute;lida.",
        date: "Por favor, forne&ccedil;a uma data v&aacute;lida.",
        dateISO: "Por favor, forne&ccedil;a uma data v&aacute;lida (ISO).",
        number: "Por favor, forne&ccedil;a um n&uacute;mero v&aacute;lido.",
        digits: "Por favor, forne&ccedil;a somente d&iacute;gitos.",
        creditcard: "Por favor, forne&ccedil;a um cart&atilde;o de cr&eacute;dito v&aacute;lido.",
        equalTo: "Por favor, forne&ccedil;a o mesmo valor novamente.",
        accept: "Por favor, forne&ccedil;a um valor com uma extens&atilde;o v&aacute;lida.",
        maxlength: jQuery.validator.format("Por favor, forne&ccedil;a n&atilde;o mais que {0} caracteres."),
        minlength: jQuery.validator.format("Por favor, forne&ccedil;a ao menos {0} caracteres."),
        rangelength: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1} caracteres de comprimento."),
        range: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1}."),
        max: jQuery.validator.format("Por favor, forne&ccedil;a um valor menor ou igual a {0}."),
        min: jQuery.validator.format("Por favor, forne&ccedil;a um valor maior ou igual a {0}.")
    });

    $('.datetimepicker').each(function () {
        var value = $(this).val();
        $(this).datetimepicker({
            locale: 'pt-br',
            format: 'L',
            date: value,
            icons: {
                time: 'far fa-clock',
            }
        });
        $(this).val(value);
    });

    $('.datetimepicker-data-hora').each(function () {
        var value = $(this).val();
        $(this).datetimepicker({
            locale: 'pt-br',
            format: 'L H:m',
            date: value,
            icons: {
                time: 'far fa-clock',
            }
        });
        $(this).val(value);
    });
});
