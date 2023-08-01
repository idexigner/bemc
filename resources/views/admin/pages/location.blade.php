@extends('admin.layout.main')


@push('title') Location @endpush

@section('main-section')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Location List</h1>
            </div>
            <div class="col-sm-6">

                <button type="button" class="btn float-sm-right btn-primary add_new">Add New Location</button>
           
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            

            <div class="card">
            
                <div class="card-body">
                    <table id="table-standard" class="table table-bordered table-striped">
                       
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="modal_create_form">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
            <form class="form-horizontal" id="create-form">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add New Location Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-5 px-5">
                    <!-- <form class="form-horizontal"> -->
                        <div class="card-body">

                               <div class="form-group">
                                    <label class="col-form-label">Country <span class="text-red">*</span></label>
                                    <select class="form-control select2" style="width: 100%;" name="location_country_id" required>
                                        <option selected>Select Item</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label class="col-form-label">State <span class="text-red">*</span></label>
                                    <select class="form-control select2" style="width: 100%;" name="location_state_id" required>
                                        <option selected>Select Item</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label class="col-form-label">City <span class="text-red">*</span></label>
                                    <select class="form-control select2" style="width: 100%;" name="location_city_id" required>
                                        <option selected>Select Item</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Address <span class="text-red">*</span></label>
                                    <textarea id="location_address" class="summernote form-control" name="location_address" required></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label class="col-form-label">Longitude</label>
                                    <input type="text" class="form-control" placeholder="Longitude" name="location_longitude" data-parsley-pattern="^[0-9]+(\.[0-9]+)?$">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label class="col-form-label">Latitude</label>
                                    <input type="text" class="form-control" placeholder="Latitude" name="location_latitude" data-parsley-pattern="^[0-9]+(\.[0-9]+)?$">
                                    </div>
                                </div>
                            
                            
                                <div class="form-group">
                                    <label class="col-form-label">Is Active</label>
                                    <select class="form-control" name="location_is_active">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>                                 
                                </div>

                           


                            <input type="hidden" name="id">
                        

                       
                        </div>
                       
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" data-url="{{ route('setting.location.store') }}" class="btn btn-primary" id="create_form_btn">Create</button>
                    <button type="submit" data-url="{{ route('setting.location.update') }}" class="btn btn-primary" id="update_form_btn">Update</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection

@push('js-link')

     <!-- Page specific script -->
     <script>
        $(function () {

            
            var table = $('#table-standard');

            $('#create-form').parsley({
                trigger: 'focusout'
            });

            $('.select2').select2()


            //Initializing summernote
            var str_summernote = '#location_address';
            declareSummernote(str_summernote);

           

            fetchCountry();

            var shouldFetchState = false;
            var shouldFetchCity = false;

            function fetchCountry(){
                shouldFetchState = false;
                $.ajax({
                    url: "{{ route('setting.country.index') }}", 
                    type: 'GET',             
                    // data: $(this).serialize(), // new FormData($("#create-post-form")[0]), //
                    success: function(response) {

                        
                        console.log(response);
                        var data = response.data;
                        console.log(data);
                        
                        var select2El = $('select[name="location_country_id"]');
                        
                        select2El.select2('destroy');
                        select2El.empty();
                        
                        select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));
                        
                        $.each(data, function(index, value) {
                            select2El.append($('<option></option>').attr('value', value.country_id).text(value.country_name));
                        });

                        select2El.select2();
                        shouldFetchState = true;
                    },
                    error: function(xhr, status, error) {
                        console.group("Error Block");
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        console.groupEnd();   

                        if(xhr.responseJSON && xhr.responseJSON.message){

                            Toast.fire({
                                icon: 'error',
                                title: xhr.responseJSON.message, //"Generic record deleted successfully",
                                timer: 3000,
                            });

                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong', //"Generic record deleted successfully",
                                timer: 3000,
                            });
                        }
                                        
                    }
                });
            }
    
            function fetchState(){
                console.log("fetchState Trigger");
             
                var id = $("select[name=location_country_id]").val();
                console.log("id->", id)
                var url = "{{ route('setting.state.fetch_country', ':id') }}";
                url = url.replace(':id', id);
                if(id != ''){
                    $.ajax({
                    url: url, 
                    type: 'GET',             
                    // data: $(this).serialize(), // new FormData($("#create-post-form")[0]), //
                    success: function(response) {
                        console.log(response);
                        var data = response.data;
                        console.log(data);
                        
                        var select2El = $('select[name="location_state_id"]');
                        
                        select2El.select2('destroy');
                        select2El.empty();
                        
                        select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));
                        
                        $.each(data, function(index, value) {
                            select2El.append($('<option></option>').attr('value', value.state_id).text(value.state_name));
                        });

                        select2El.select2();
                        shouldFetchCity = true;
                    },
                    error: function(xhr, status, error) {
                        console.group("Error Block");
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        console.groupEnd();   

                        if(xhr.responseJSON && xhr.responseJSON.message){

                            Toast.fire({
                                icon: 'error',
                                title: xhr.responseJSON.message, //"Generic record deleted successfully",
                                timer: 3000,
                            });

                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong', //"Generic record deleted successfully",
                                timer: 3000,
                            });
                        }
                                        
                    }
                });
                }
                
            }

            $('select[name=location_country_id]').on('change', function(){
                console.log('onchange trigger')
                console.log(shouldFetchState)
                if (shouldFetchState) {
                    console.log('onchange if trigger');
                    fetchState();
                } else {
                    shouldFetchState = true;
                }
            });


            function fetchCity(){
                console.log("fetchCity Trigger")
                var id = $("select[name=location_state_id]").val();
                var url = "{{ route('setting.city.fetch_city', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url, 
                    type: 'GET',             
                    // data: $(this).serialize(), // new FormData($("#create-post-form")[0]), //
                    success: function(response) {
                        console.log(response);
                        var data = response.data;
                        console.log(data);
                        
                        var select2El = $('select[name="location_city_id"]');
                        
                        select2El.select2('destroy');
                        select2El.empty();
                        
                        select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));
                        
                        $.each(data, function(index, value) {
                            select2El.append($('<option></option>').attr('value', value.city_id).text(value.city_name));
                        });

                        select2El.select2();
                    },
                    error: function(xhr, status, error) {
                        console.group("Error Block");
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        console.groupEnd();   

                        if(xhr.responseJSON && xhr.responseJSON.message){

                            Toast.fire({
                                icon: 'error',
                                title: xhr.responseJSON.message, //"Generic record deleted successfully",
                                timer: 3000,
                            });

                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong', //"Generic record deleted successfully",
                                timer: 3000,
                            });
                        }
                                        
                    }
                });
            }

            $('select[name=location_state_id]').on('change', function(){
                console.log('onchange trigger')
                console.log(shouldFetchCity)
                if (shouldFetchCity) {
                    console.log('onchange if trigger');
                    fetchCity();
                } else {
                    shouldFetchCity = true;
                }
            });



            


             //initializing the datatable from main.blade.php function
            var tableName = '#table-standard';
            var ajaxUrl = "{{ route('setting.location.index') }}";
            var columnsArray = [                  
                    // { data: 'location_name', name: 'location_name', title: 'Location Name', width: '75%'},
                    { data: 'country.country_name', name: 'country.country_name', title: 'Country'},
                    { data: 'state.state_name', name: 'state.state_name', title: 'State'},
                    { data: 'city.city_name', name: 'city.city_name', title: 'City'},
                    { data: 'location_address', name: 'location_address', title: 'Address'},

                    {
                        data: null,
                        title: 'Action',
                        render: function(data, type, row) {
                            return '<a href="#" class="edit" data-id="'+row.location_id+'"><i class="fas fa-edit text-success"></i></a> <a href="#" class="delete" data-id="'+row.location_id+'"><i class="fas fa-trash text-danger"></i></a>';
                        },
                        orderable: false,
                        searchable: false
                    }
                ];           
            initializeDataTable(tableName, ajaxUrl, columnsArray);

            
            // handle click event for "Add" button
            $('.add_new').on('click', function(){

                $("#create_form_btn").show();
                $("#update_form_btn").hide();
                $("#modal_create_form .modal-title").text("Add New Location Record");


                $("#create-form")[0].reset();               
                $("textarea.summernote").each(function(){
                    $(this).summernote('code', '');
                });

                    var select2El = $('select[name="location_state_id"]');
                    select2El.empty();
                    select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));
                    var select2El = $('select[name="location_city_id"]');
                    select2El.empty();
                    select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));
                    $('select[name="location_country_id"]').val('').trigger('change')

                    // fetchAddress();

                $("#modal_create_form").modal('show');
            });
              

            //For Creating and updating the record
            $('#create-form').submit(function(e) {
                e.preventDefault();
                var url = $("#create_form_btn").data('url');
                var type = "POST";
                
                if($('#create_form_btn').is(':hidden')){
                    url = $("#update_form_btn").data('url');
                    type = "PUT";
                }
                
                $.ajax({
                    url: url, 
                    type: type,             
                    data: $(this).serialize(), // new FormData($("#create-post-form")[0]), //
                    success: function(response) {
                        // $('#create-post-form')[0].reset();
                        table.DataTable().ajax.reload();
                        $("#modal_create_form").modal('hide');
                        Toast.fire({
                            icon: 'success',
                            title: response.message, //"Generic record deleted successfully",
                            timer: 3000,
                        });


                        // alert(response.message);
                    },
                    error: function(xhr, status, error) {
                        console.group("Error Block");
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        console.groupEnd();   

                        if(xhr.responseJSON && xhr.responseJSON.message){

                            Toast.fire({
                                icon: 'error',
                                title: xhr.responseJSON.message, //"Generic record deleted successfully",
                                timer: 3000,
                            });

                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong', //"Generic record deleted successfully",
                                timer: 3000,
                            });
                        }
                                        
                    }
                });
            });

            // handle click event for "Edit" button
            table.on('click', '.edit', function() {
            
                $("#modal_create_form .modal-title").text("Update Location Form Record");

                var id = $(this).data('id');
                var url = "{{ route('setting.location.edit', ':id') }}";
                url = url.replace(':id', id);


                var select2El = $('select[name="location_state_id"]');
                select2El.empty();
                select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));

                var select2El = $('select[name="location_city_id"]');
                select2El.empty();
                select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        var data = response.data;  
                        

                        $("input[name=id]").val(data.location_id);

                        $('textarea[name=location_address]').summernote({
                            focus: true
                        }).summernote('code', data.location_address);

                        $("input[name=location_longitude]").val(data.location_longitude);
                        $("input[name=location_latitude]").val(data.location_latitude);

                        $("select[name=location_is_active]").val(data.location_is_active);
                        
                        $("select[name=location_country_id]").val(data.location_country_id).trigger('change')
                        
                        changeStateValue()
                        function changeStateValue(){
                            if($("select[name=location_state_id] option").length > 1){
                                console.log("if");
                                console.log($("select[name=location_state_id] option").length)
                                $("select[name=location_state_id]").val(data.location_state_id).trigger('change')
                            }else{
                                console.log("else");
                                setTimeout(() => {
                                    changeStateValue()
                                }, 100);
                            }                       
                        }

                        changeCityValue()
                        function changeCityValue(){
                            if($("select[name=location_city_id] option").length > 1){
                                console.log("if");
                                console.log($("select[name=location_city_id] option").length)
                                $("select[name=location_city_id]").val(data.location_city_id).trigger('change')
                            }else{
                                console.log("else");
                                setTimeout(() => {
                                    changeCityValue()
                                }, 100);
                            }                       
                        }

                        $("#modal_create_form").modal('show');
                        $("#create_form_btn").hide();
                        $("#update_form_btn").show();


                        
                    },
                    error: function(xhr, status, error) {
                        console.group("Error Block");
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        console.groupEnd();   

                        if(xhr.responseJSON && xhr.responseJSON.message){

                            Toast.fire({
                                icon: 'error',
                                title: xhr.responseJSON.message, //"Generic record deleted successfully",
                                timer: 3000,
                            });

                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong', //"Generic record deleted successfully",
                                timer: 3000,
                            });
                        }
                                        
                    }
                });
            });

            // handle click event for "Delete" button
            table.on('click', '.delete', function() {
                var id = $(this).data('id');
             

                Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    timer: 5000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    }).fire({
                    icon: 'warning',
                    title: 'Are you sure you want to delete the row?',
                    text: "You won't be able to revert this!",
                    }).then((result) => {
                    if (result.isConfirmed) {
                        var currentPage =  table.DataTable().page.info().page;
                        var url = "{{ route('setting.location.destroy', ':id') }}";
                        url = url.replace(':id', id);
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                console.log(response);
                                
                                Toast.fire({
                                    icon: 'success',
                                    title: "Location record deleted successfully",
                                    timer: 3000,
                                });
                                // reload the table
                                table.DataTable().ajax.reload();
                                table.DataTable().page(currentPage).draw('page');
                            }
                        });
                    } 
                })
            });
            
        });
    </script>

@endpush