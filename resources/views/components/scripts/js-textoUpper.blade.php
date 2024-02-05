<script src="{{ URL::asset('/publico/js/jquery-3.7.1.min.js') }}"></script>
<script>
    jQuery('.upper').keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
</script>
