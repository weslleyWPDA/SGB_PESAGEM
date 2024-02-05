{{-- select2  e so colocar na classe do select a classe sel --}}
@push('script')
    {{-- <script src="{{ URL::asset('/select2/js/jquery-3.7.0.min.js') }}"></script> --}}
    <script src="/select2/js/select2.min.js"></script>
    <link href="/select2/css/select2.min.css" rel="stylesheet" />
    <script>
        $(".sel").select2({
            width: 'resolve', // need to override the changed default
            placeholder: "Selecione",
            language: "ptbr",
            allowClear: false,
            "language": {
                "noResults": function() {
                    return 'Não encontrado';
                }
            },
        });
    </script>
@endpush
@push('css')
    <style>
        .select2-search__field {
            text-transform: uppercase !important;
        }

        .select2-selection--single {
            font-size: 16px !important;
            color: black !important;
        }

        .select2-selection {
            font-weight: 500 !important;
            font-size: 16px !important;
            color: black !important;
            height: 30px !important;
        }

        .select2-results__option--selectable {
            font-weight: 500 !important;
            font-size: 16px !important;
            color: black !important;
        }

        .select2-results__option,
        .select2-selection__rendered,
        .select2-selection__placeholder {
            font-weight: 500 !important;
            text-align: center !important;
            font-size: 14px !important;
            color: black !important;
        }
    </style>
@endpush
