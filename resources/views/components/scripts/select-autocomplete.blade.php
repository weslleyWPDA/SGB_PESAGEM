{{-- https://select2.org/   site onde tem o repositorio do autocomplete --}}

<link rel="stylesheet" href="{{ URL::asset('/publico/css/select2.min.css') }}" />
<script src="{{ URL::asset('/publico/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {

        $('.{{$select}}').select2({
                language: "ptbr"
            }

        );
    });
</script>
<style>
    .select2-selection--single {
        padding-top: 7px;
        padding-bottom: 5px;
        color: black;
    }

    .select2-selection {
        font-weight: 700;
        height: 45px !important;
        border-radius: 8px !important;
        margin-right: 3px;
        margin-left: 3px;
        color: black;
    }

    .select2-results__option--selectable {
        font-weight: 600;
        text-align: center !important;
        color: black;
    }
</style>
