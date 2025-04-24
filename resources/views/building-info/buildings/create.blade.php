@extends('layouts.dashboard')
@section('title', $page_title)
@section('content')

    @include('layouts.components.error-list')
    <div class="card card-info">
        {!! Form::open([
            'url' => 'building-info/buildings',
            'id' => 'prevent-multiple-submits',
            'files' => true,
           
        ]) !!}
        @include('building-info.buildings.partial-form', ['submitButtomText' => 'Save'])
        {!! Form::close() !!}
    </div><!-- /.card -->
@stop



@push('scripts')
<script>
    var usecatgs = @json($usecatgsJson);

    // Searchable Dropdown for Sewer Code
     selectedSewerCode = localStorage.getItem("selectedSewerCode");
     optionHtmlSewerCode = selectedSewerCode 
                ? `<option selected=${selectedSewerCode}>${selectedSewerCode}</option>` 
                : `<option selected=""></option>`;
    $('#sewer_code').prepend(optionHtmlSewerCode).select2({
                ajax: {
                    url: "{{ route('sewerlines.get-sewer-names') }}",
                    data: function (params) {
                        return {
                            search: params.term,
                            page: params.page || 1
                        };
                    },
                },
                placeholder: 'Sewer Code',
                allowClear: true,
                closeOnSelect: true,
                width: '84%',
            });

            // Searchable Dropdown for Water Code
            selectedWaterCode = localStorage.getItem("selectedWaterCode");
            optionHtmlWaterCode = selectedWaterCode 
                ? `<option selected=${selectedWaterCode}>${selectedWaterCode}</option>` 
                : `<option selected=""></option>`;
            $('#watersupply_pipe_code').prepend(optionHtmlWaterCode).select2({
                ajax: {
                    url: "{{ route('watersupply.get-watersupply-code') }}",
                    data: function (params) {
                        return {
                            search: params.term,
                            page: params.page || 1
                        };
                    },
                },
                placeholder: 'Water Supply Pipe Line Code',
                allowClear: true,
                closeOnSelect: true,
                width: '84%',
            });

            // Searchable Dropdown for Drain Code
            selectedDrainCode = localStorage.getItem("selectedDrainCode");
            optionHtmlDrainCode = selectedDrainCode 
                ? `<option selected=${selectedDrainCode}>${selectedDrainCode}</option>` 
                : `<option selected=""></option>`;

            $('#drain_code').prepend(optionHtmlDrainCode).select2({
                ajax: {
                    url: "{{ route('drains.get-drain-names') }}",
                    data: function (params) {
                        return {
                            search: params.term,
                            page: params.page || 1
                        };
                    },
                },
                placeholder: 'Drain Code',
                allowClear: true,
                closeOnSelect: true,
                width: '84%',
            });

            //Searchable Dropdown for Road Code
            selectedRoadCode = localStorage.getItem("selectedRoadCode");
            optionHtmlRoadCode = selectedRoadCode 
                ? `<option value=${roadCode} selected=${selectedRoadCode}>${selectedRoadCode}</option>` 
                : `<option selected=""></option>`;
            $('#road_code').prepend(optionHtmlRoadCode).select2({
                ajax: {
                    url: "{{ route('roadlines.get-road-names') }}",
                    data: function (params) {
                        return {
                            search: params.term,
                            page: params.page || 1
                        };
                    },
                },
                placeholder: 'Road Code',
                allowClear: true,
                closeOnSelect: true,
                width: '84%',
                });

                // Searchable Dropdown for BIN of Pre Connected Building
                selectedBINValue  = localStorage.getItem("selectedBINValue");
                optionHtmlBIN = selectedBINValue 
                ? `<option value=${selectedBINValue} selected=${selectedBINText}>${selectedBINText}</option>` 
                : `<option selected=""></option>`;
            $('#build_contain').prepend(optionHtmlBIN).select2({
                ajax: {
                    url: "{{ route('building.get-house-numbers-containments') }}",
                    data: function (params) {
                        return {
                            search: params.term,
                            page: params.page || 1
                        };
                    },
                },
                placeholder: 'BIN of Pre Connected Building',
                allowClear: true,
                closeOnSelect: true,
                width: '84%',
            });

            // Searchable Dropdown for Building Associated To
            selectedAssociatedValue = localStorage.getItem("selectedAssociatedValue");
            optionHtmlBIN = selectedAssociatedValue 
                ? `<option value=${selectedAssociatedValue} selected="${selectedAssociatedValue}">${selectedAssociatedValue}</option>` 
                : `<option selected=""></option>`;
          $('#building_associated_to').prepend(optionHtmlBIN).select2({
            ajax: {
                url: "{{ route('building.get-house-numbers-all') }}",
                data: function (params) {
                    return {
                        search: params.term,
                        page: params.page || 1
                    };
                },
            },
            placeholder: 'BIN of Main Building',
            allowClear: true,
            closeOnSelect: true,
            width: '84%',
            });

            // Searchable Dropdown for Containment Drain Code
            selectedDrainCode = localStorage.getItem("selectedDrainCode");
            optionHtmlDrainCode = selectedDrainCode 
                ? `<option selected=${selectedDrainCode}>${selectedDrainCode}</option>` 
                : `<option selected=""></option>`;

            $('#containment-drain-code select').prepend(optionHtmlDrainCode).select2({
                ajax: {
                    url: "{{ route('drains.get-drain-names') }}",
                    data: function (params) {
                        return {
                            search: params.term,
                            page: params.page || 1
                        };
                    },
                },
                placeholder: 'Drain Code',
                allowClear: true,
                closeOnSelect: true,
                width: '84%',
            });

            // Searchable Dropdown for Sewer Code Containment
                selectedSewerCode = localStorage.getItem("selectedSewerCode");
                optionHtmlSewerCode = selectedSewerCode 
                ? `<option selected=${selectedSewerCode}>${selectedSewerCode}</option>` 
                : `<option selected=""></option>`;
                $('#containment-sewer-code select').prepend(optionHtmlSewerCode).select2({
                ajax: {
                    url: "{{ route('sewerlines.get-sewer-names') }}",
                    data: function (params) {
                        return {
                            search: params.term,
                            page: params.page || 1
                        };
                    },
                },
                placeholder: 'Sewer Code',
                allowClear: true,
                closeOnSelect: true,
                width: '84%',
            });

            //To calculate volume of cylinder
        document.addEventListener('DOMContentLoaded', function() {
            var diameterField = document.querySelector('input[name="pit_diameter"]');
            var depthField = document.querySelector('input[name="pit_depth"]');
            var volumeField = document.querySelector('input[name="size"]');
            var calculateVolume = function() {
                var diameter = parseFloat(diameterField.value) || 0;
                var depth = parseFloat(depthField.value) || 0;

                // Calculate radius
                var radius = diameter / 2;
                // Calculate volume
                var volume = Math.PI * Math.pow(radius, 2) * depth;
                // Update the volume field with the calculated value
                volumeField.value = volume.toFixed(2); // Round to 2 decimal places
                if ( diameterField.value >= 1 || depthField.value >= 1 ) {
                    volumeField.readOnly = true; // Set as readonly to prevent editing
                }
                else
                {
                    volumeField.readOnly = false; // Set as not readonly
                }  

            };
            // Add event listeners to trigger volume calculation on input change
            diameterField.addEventListener('input', calculateVolume);
            depthField.addEventListener('input', calculateVolume);
        });


    //To calculate volume of recatangle
    document.addEventListener('DOMContentLoaded', function() {
        var lengthField = document.querySelector('input[name="tank_length"]');
        var widthField = document.querySelector('input[name="tank_width"]');
        var depthField = document.querySelector('input[name="depth"]');
        var volumeField = document.querySelector('input[name="size"]');

        var calculateVolume = function() {
            var length = parseFloat(lengthField.value) || 0;
            var width = parseFloat(widthField.value) || 0;
            var depth = parseFloat(depthField.value) || 0;

            // Calculate volume
            var volume = length * width * depth;

            // Update the volume field with the calculated value
            volumeField.value = volume.toFixed(2); // Round to 2 decimal places

            // Make the 'size' field readonly after the value is calculated
            if (lengthField.value >= 1 || widthField.value >= 1 || depthField.value >= 1 ) {
                volumeField.readOnly = true; // Set as readonly to prevent editing
            }
            else
            {
                volumeField.readOnly = false; // Set as not readonly
            }
        };

            // Add event listeners to trigger volume calculation on input change
            lengthField.addEventListener('input', calculateVolume);
            widthField.addEventListener('input', calculateVolume);
            depthField.addEventListener('input', calculateVolume);
    });

     $('#building_associated_to').on('change', function() {
        var selectedAssociatedValue = $(this).find('option:selected').attr('value');
        var selectedAssociatedText = $(this).find('option:selected').text();
        localStorage.setItem("selectedAssociatedValue", selectedAssociatedValue);
        localStorage.setItem("selectedAssociatedText", selectedAssociatedText);
        });

        // Using local storage to save input values of road_code
        $('.road_code').on('change', function() {
        var selectedRoadCode = $(this).find('option:selected').text();
        localStorage.setItem("selectedRoadCode", selectedRoadCode);
        });

        // Using local storage to save input values of watersupply_pipe_code
        $('#watersupply_pipe_code').on('change', function() {
        var selectedWaterCode = $(this).find('option:selected').text();
        localStorage.setItem("selectedWaterCode", selectedWaterCode);
        });

        // Using local storage to save input values of sewer_code
        $('.sewer_code').on('change', function() {
        var selectedSewerCode = $(this).find('option:selected').text();
        localStorage.setItem("selectedSewerCode", selectedSewerCode);
        });

        // Using local storage to save input values of drain_code
        $('#drain_code').on('change', function() {
        var selectedDrainCode = $(this).find('option:selected').text();
        localStorage.setItem("selectedDrainCode", selectedDrainCode);
        });

        // Using local storage to save input values of build_contain
        $('#build_contain').on('change', function() {
        var selectedBINValue = $(this).find('option:selected').attr('value');
        var selectedBINText = $(this).find('option:selected').text();
        localStorage.setItem("selectedBINValue", selectedBINValue);
        localStorage.setItem("selectedBINText", selectedBINText);
        });

        // Using local storage to save input values of build_contain
        $('#type_id').on('change', function() {
        var containmentTypeValue = $(this).find('option:selected').attr('value');
        var containmentTypeText = $(this).find('option:selected').text();
        localStorage.setItem("containmentTypeValue", containmentTypeValue);
        localStorage.setItem("containmentTypeText", containmentTypeText);
        });

        // Using local storage to save input values of use_category_id
        $('#use_category_id').on('change', function() {
        var selectedUseCategory = $(this).find('option:selected').attr('value');
        localStorage.setItem("selectedUseCategory", selectedUseCategory);
        });
</script>
    <script src="{{ asset('js/building.js') }}">
      
        $(document).ready(function() {
           
            // Check if a div with the alert class exists, if yes then clear local storage
            let selectedAssociatedValue = null;
            let selectedAssociatedText = null;
            let selectedRoadCode = null;
            let selectedWaterCode = null;
            let selectedSewerCode = null;
            let selectedDrainCode = null;
            let selectedBINText = null;
            let selectedBINValue = null;
            let containmentTypeText = null;
            let containmentTypeValue = null;
            let selectedUseCategory = null;
            

            if ($('.alert.alert-danger.alert-dismissible').length == 0) {
                localStorage.removeItem("selectedAssociatedValue");
                localStorage.removeItem("selectedAssociatedText");
                localStorage.removeItem("selectedRoadCode");
                localStorage.removeItem("selectedWaterCode");
                localStorage.removeItem("selectedSewerCode");
                localStorage.removeItem("selectedDrainCode");
                localStorage.removeItem("selectedBINText");
                localStorage.removeItem("selectedBINValue");
                localStorage.removeItem("containmentTypeText");
                localStorage.removeItem("containmentTypeValue");
                localStorage.removeItem("selectedUseCategory");
            }
            else{
                selectedAssociatedValue = localStorage.getItem("selectedAssociatedValue");
                selectedAssociatedText = localStorage.getItem("selectedAssociatedText");
                selectedRoadCode = localStorage.getItem("selectedRoadCode");
                selectedWaterCode = localStorage.getItem("selectedWaterCode");
                selectedSewerCode = localStorage.getItem("selectedSewerCode");
                selectedDrainCode = localStorage.getItem("selectedDrainCode");
                selectedBINText = localStorage.getItem("selectedBINText");
                selectedBINValue = localStorage.getItem("selectedBINValue");
                containmentTypeText = localStorage.getItem("containmentTypeText");
                containmentTypeValue = localStorage.getItem("containmentTypeValue");
                selectedUseCategory = localStorage.getItem("selectedUseCategory");
                if(selectedRoadCode)
                {
                    var roadCode = selectedRoadCode.split(" - ")[0];
                }
            }
          // searchable dropdown for building_associated_to
          
                          
        });

       // code that checks house image greater than 5MB from frontend
    $('#house_image').on('change', function() {
        validateFileSize(document.querySelector('#house_image'),'fileSizeHintImg','5');
    });
    
     // code that checks geom greater than 1MB from frontend
     $('#geom').on('change', function() {
        validateFileSize(document.querySelector('#geom'),'fileSizeHintKML','1');
    });

</script>
   
@endpush
