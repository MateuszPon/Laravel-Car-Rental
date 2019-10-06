@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2>{{__('dictionary.Find_a_car')}}</h2>
                </div>
                @include('forms.searchOffer')
            </div>
        </div>

    </div>
@endsection
@section('javascript')
    <script>
        $("#brandCar").select2({
            placeholder: "{{__('dictionary.Choose_a_brand')}}",
            allowClear: true,
            params: {
                contentType: "application/json; charset=utf-8",
            },
            multiple: false,
            ajax: {
                method: 'GET',
                url: "{{ url('/select2-autocomplete-ajaxGetBrand') }}",
                data: function (params) {
                    var query = {
                        search: params.term,
                    }
                    return query;
                },
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
            }

        });


        $("#modelCar").select2({
            placeholder: "{{__('choose_a_model')}}",
            allowClear: true,
            params: {
                contentType: "application/json; charset=utf-8",
            },
            multiple: false,
            language: {
                noResults: function (params) {
                    return "Brak wyników";
                }
            },
        });

        $('select#brandCar').change(function(){
            var brandId = $(this).val();
            $old = $('.modelsForBrand').remove();
            $.getJSON(('{{url('/models/')}}'+'/'+brandId+'/') , function(data){

                $.each(data, function(index, element){
                    $('select#modelCar').append('<option value="'+element.id+'" class="modelsForBrand">'+element.name+'</option>')
                });
            });
        });

    </script>
@stop
