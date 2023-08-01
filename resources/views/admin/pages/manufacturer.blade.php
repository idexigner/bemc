@extends('admin.layout.main')


@push('title') Manufacturer @endpush

@push('css-link')
    <style>
        .note-editor {
            width: 100%;
        }
    </style>
@endpush

@section('main-section')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Manufacturer List</h1>
            </div>
            <div class="col-sm-6">

                <button type="button" class="btn float-sm-right btn-primary add_new">Add New Manufacturer</button>
           
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
    <!-- /.modal-dialog -->
    <div class="modal fade" id="modal_create_form">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
            <form class="form-horizontal" id="create-form">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add New Manufacturer Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-5 px-5">
                    <!-- <form class="form-horizontal"> -->

                        <div class="card-body">
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Name" name="manufacturer_name" required data-parsley-maxlength="100">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email ID</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Email ID" name="manufacturer_email" data-parsley-type="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone No</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Phone No" name="manufacturer_phone"  data-parsley-pattern="/^[0-9+]+$/" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mobile No</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Mobile No" name="manufacturer_mobile" data-parsley-pattern="/^[0-9+]+$/">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fax No</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Fax No" name="manufacturer_fax" data-parsley-pattern="/^[0-9+]+$/">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Country <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" name="manufacturer_country_id" required>
                                        <option selected>Select Item</option>
                                    </select>
              
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">State<span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" name="manufacturer_state_id" required>
                                        <option selected>Select Item</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">City<span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" name="manufacturer_city_id" required>
                                        <option selected>Select Item</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address<span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <textarea id="manufacturer_address" class="summernote form-control" name="manufacturer_address" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Longitude</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Longitude" name="manufacturer_longitude" data-parsley-pattern="^[0-9]+(\.[0-9]+)?$">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Latitude</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="Latitude" name="manufacturer_latitude" data-parsley-pattern="^[0-9]+(\.[0-9]+)?$">
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address<span class="text-red">*</span></label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" style="width: 100%;" name="manufacturer_location_id" required >
                                        <option selected="selected">Select Item</option>
                                       
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-primary add_address btn-block" >+</button>
                                </div>
                            </div> --}}
                            
                        

                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" >Is Active </label>
                                <div class="col-sm-9">
                                <select class="form-control" name="manufacturer_is_active">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>                        
                                </div>
                            </div>


                        </div>
                       
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" data-url="{{ route('manufacturer.store') }}" class="btn btn-primary" id="create_form_btn">Create</button>
                    <button type="submit" data-url="{{ route('manufacturer.update') }}" class="btn btn-primary" id="update_form_btn">Update</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
        </div>
    
    </div>
    <!-- /.modal -->

    <!-- /.modal-dialog -->
    <div class="modal fade" id="modal_location_form">
        <div class="modal-dialog modal-md">
            <div class="modal-content ">
            <form class="form-horizontal" id="location-form">
                @csrf
                
                <div class="modal-body">
                    <div class="card-body py-0">
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
                    </div>
                  </div>
                  
                
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" data-url="{{ route('setting.location.store') }}" class="btn btn-primary" id="create_location_btn">Add</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
        </div>
    
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
             var str_summernote = '#manufacturer_address';
            declareSummernote(str_summernote);


            // fetchAddress();
            function fetchAddress(){
             
                $.ajax({
                    url: "{{ route('setting.location.index') }}", 
                    type: 'GET',             
                    // data: $(this).serialize(), // new FormData($("#create-post-form")[0]), //
                    success: function(response) {

                        
                        console.log(response);
                        var data = response.data;
                        console.log(data);
                        
                        var select2El = $('select[name="manufacturer_location_id"]');
                        
                        select2El.select2('destroy');
                        select2El.empty();
                        
                        select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));
                        
                        $.each(data, function(index, value) {
                            select2El.append($('<option></option>').attr('value', value.location_id).text(value.location_address));
                        });

                        select2El.select2();                      
                    },
                    error: function(xhr, status, error) {
                        console.group("Error Block");
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        console.groupEnd();   

                        if(xhr.responseJSON.message){

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
                        
                        var select2El = $('select[name="manufacturer_country_id"]');
                        
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

                        if(xhr.responseJSON.message){

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
                console.log("fetchState Trigger")
                var id = $("select[name=manufacturer_country_id]").val();
                var url = "{{ route('setting.state.fetch_country', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url, 
                    type: 'GET',             
                    // data: $(this).serialize(), // new FormData($("#create-post-form")[0]), //
                    success: function(response) {
                        console.log(response);
                        var data = response.data;
                        console.log(data);
                        
                        var select2El = $('select[name="manufacturer_state_id"]');
                        
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

                        if(xhr.responseJSON.message){

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

            $('select[name=manufacturer_country_id]').on('change', function(){
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
                var id = $("select[name=manufacturer_state_id]").val();
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
                        
                        var select2El = $('select[name="manufacturer_city_id"]');
                        
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

                        if(xhr.responseJSON.message){

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

            $('select[name=manufacturer_state_id]').on('change', function(){
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
            var ajaxUrl = "{{ route('manufacturer.index') }}";
            var columnsArray = [                  
                    { data: 'manufacturer_name', name: 'manufacturer_name', title: 'Manufacturer Name'},
                    { data: 'manufacturer_email', name: 'manufacturer_email', title: 'Email'},
                    { data: 'manufacturer_phone', name: 'manufacturer_phone', title: 'Phone'},
                    // { data: 'location.location_address', name: 'location.location_address', title: 'Phone'},
                    {
                        data: null,
                        title: 'Action',
                        render: function(data, type, row) {
                            return '<a href="#" class="edit" data-id="'+row.manufacturer_id+'"><i class="fas fa-edit text-success"></i></a> <a href="#" class="delete" data-id="'+row.manufacturer_id+'"><i class="fas fa-trash text-danger"></i></a>';
                        },
                        orderable: false,
                        searchable: false
                    }
                ];           
            initializeDataTable(tableName, ajaxUrl, columnsArray);

            
            // //Initializing summernote
            // var str_summernote = '#manufacturer_address';
            // declareSummernote(str_summernote);

            // handle click event for "Add" button
            $('.add_new').on('click', function(){

                $("#create_form_btn").show();
                $("#update_form_btn").hide();
                $("#modal_create_form .modal-title").text("Add New Manufacturer Record");

                $("select[name=manufacturer_country_id]").val('').trigger('change')
                $("select[name=manufacturer_state_id]").val('').trigger('change')
                $("select[name=manufacturer_city_id]").val('').trigger('change')
                $("#create-form")[0].reset();               

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
            
                $("#modal_create_form .modal-title").text("Update Manufacturer Form Record");

                var id = $(this).data('id');
                var url = "{{ route('manufacturer.edit', ':id') }}";
                url = url.replace(':id', id);
                

                var select2El = $('select[name="manufacturer_state_id"]');
                select2El.empty();
                select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));

                var select2El = $('select[name="manufacturer_city_id"]');
                select2El.empty();
                select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));



                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        var data = response.data;  


                        $("input[name=id]").val(data.manufacturer_id);
                        $("input[name=manufacturer_name]").val(data.manufacturer_name);
                        $("input[name=manufacturer_email]").val(data.manufacturer_email);
                        $("input[name=manufacturer_phone]").val(data.manufacturer_phone);
                        $("input[name=manufacturer_mobile]").val(data.manufacturer_mobile);
                        // $("select[name=manufacturer_location_id]").val(data.manufacturer_location_id).trigger('change');

                        $("select[name=manufacturer_country_id]").val(data.manufacturer_country_id).trigger('change')
                        // $("select[name=manufacturer_state_id]").val(data.manufacturer_state_id).trigger('change')
                        // $("select[name=manufacturer_city_id]").val(data.manufacturer_city_id).trigger('change')

                        changeStateValue()
                        function changeStateValue(){
                            if($("select[name=manufacturer_state_id] option").length > 1){
                                console.log("if");
                                console.log($("select[name=manufacturer_state_id] option").length)
                                $("select[name=manufacturer_state_id]").val(data.manufacturer_state_id).trigger('change')
                            }else{
                                console.log("else");
                                setTimeout(() => {
                                    changeStateValue()
                                }, 500);
                            }                       
                        }

                        changeCityValue()
                        function changeCityValue(){
                            if($("select[name=manufacturer_city_id] option").length > 1){
                                console.log("if");
                                console.log($("select[name=manufacturer_city_id] option").length)
                                $("select[name=manufacturer_city_id]").val(data.manufacturer_city_id).trigger('change')
                            }else{
                                console.log("else");
                                setTimeout(() => {
                                    changeCityValue()
                                }, 500);
                            }                       
                        }

                        $('textarea[name=manufacturer_address]').summernote({
                            focus: true
                        }).summernote('code', data.manufacturer_address);

                        $("input[name=manufacturer_longitude]").val(data.manufacturer_longitude);
                        $("input[name=manufacturer_latitude]").val(data.manufacturer_latitude);


                        $("select[name=manufacturer_is_active]").val(data.manufacturer_is_active);                        

                        
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

            $('.add_address').on('click', function(){
                var selectedValue = $(this).val();

                $("#location-form")[0].reset();   
                $("textarea.summernote").each(function(){
                    $(this).summernote('code', '');
                });

                $("#modal_location_form").modal('show')
                // alert(selectedValue)
                // Do something with the selected value
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
                        var url = "{{ route('manufacturer.destroy', ':id') }}";
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
                                    title: "Manufacturer record deleted successfully",
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


            $('#location-form').submit(function(e) {
                e.preventDefault();
                var url = $("#create_location_btn").data('url');
                var type = "POST";
                
                // if($('#create_form_btn').is(':hidden')){
                //     url = $("#update_form_btn").data('url');
                //     type = "PUT";
                // }
                
                $.ajax({
                    url: url, 
                    type: type,             
                    data: $(this).serialize(), // new FormData($("#create-post-form")[0]), //
                    success: function(response) {
                        // $('#create-post-form')[0].reset();
                        table.DataTable().ajax.reload();
                        $("#modal_location_form").modal('hide');
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
            
        });
    </script>

@endpush