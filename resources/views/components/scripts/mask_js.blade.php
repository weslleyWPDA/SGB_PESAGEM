
<script src="{{ URL::asset('/publico/js/jquery.js') }}"></script>
<script src="{{ URL::asset('/publico/js/jquery.mask.min.js') }}"></script>
<script>
    $(document).ready(function () {
    var $seuCampoCpf = $("#cpf");
    var $seuCampoDinheiro = $("#dinheiro");
    $seuCampoCpf.mask('000.000.000-00', {reverse: true});
    $seuCampoDinheiro.mask('000.000.000,00', {reverse: true});
});
</script>
