<script src="{{ URL::asset('/publico/js/jquery.mask.min.js') }}"></script>
<script>
    // jQuery Mask Plugin v1.14.11
    // https://github.com/igorescobar/jQuery-Mask-Plugin?tab=readme-ov-file
    // composer require igorescobar/jquery-mask-plugin
    var cpfMascara = function(val) {
            return val.replace(/\D/g, '').length > 11 ? '00.000.000/0000-00' : '000.000.000-009';
        },
        cpfOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(cpfMascara.apply({}, arguments), options);
            }
        };
    $('.mascara-cpfcnpj').mask(cpfMascara, cpfOptions);
</script>
