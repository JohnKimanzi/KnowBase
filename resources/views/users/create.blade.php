@extends('layouts.theme', ['title' => 'users'])
@section('content')
    <div class="page-wrapper" id="app">
        <!-- Page Content -->
        <div class="content container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">User details</h4>
                        </div>
                        <div class="card-body">
                            <!--Your Form-->
                            <create-user :users="{{ $users }}" :countries="{{ $countries }}" :genders="{{ $genders }}" :marital_statuses="{{ $marital_statuses }}" :references="{{ $references }}" :work_experiences="{{ $work_experiences }}" :education_levels="{{ $education_levels }}"> </create-user>
                            <!--/Your Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    @endsection
    @section('custom_js') 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script> 
    <script>
        var datalist = jQuery('datalist');
        var options = jQuery('datalist option');
        var optionsarray = jQuery.map(options, function(option) {
            return option.value;
        });
        var input = jQuery('input[list]');
        var inputcommas = (input.val().match(/,/g) || []).length;
        var separator = ',';

        function filldatalist(prefix) {
            if (input.val().indexOf(separator) > -1 && options.length > 0) {
                datalist.empty();
                for (i = 0; i < optionsarray.length; i++) {
                    if (prefix.indexOf(optionsarray[i]) < 0) {
                        datalist.append('<option value="' + prefix + optionsarray[i] + '">');
                    }
                }
            }
        }
        input.bind("change paste keyup", function() {
            var inputtrim = input.val().replace(/^\s+|\s+$/g, "");
            //console.log(inputtrim);
            var currentcommas = (input.val().match(/,/g) || []).length;
            //console.log(currentcommas);
            if (inputtrim != input.val()) {
                if (inputcommas != currentcommas) {
                    var lsIndex = inputtrim.lastIndexOf(separator);
                    var str = (lsIndex != -1) ? inputtrim.substr(0, lsIndex) + ", " : "";
                    filldatalist(str);
                    inputcommas = currentcommas;
                }
                input.val(inputtrim);
            }
        });
    </script> 
     @endsection 
