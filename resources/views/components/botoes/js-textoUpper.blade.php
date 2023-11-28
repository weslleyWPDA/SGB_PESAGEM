<script src="{{ URL::asset('/publico/js/jquery.js') }}"></script>
<script>
    jQuery('.upper').keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
</script>
