@extends('admin.layout.main')


@push('title') User @endpush

@section('main-section')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>User List</h1>
            </div>
            <div class="col-sm-6">

                <button type="button" class="btn float-sm-right btn-primary add_new">Add New User</button>
           
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
                    <h4 class="modal-title">Add New User Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-5 px-5">
                    <!-- <form class="form-horizontal"> -->
                        <div class="card-body">
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">User Name <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Name" name="username" required data-parsley-maxlength="200">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Email" name="email" required data-parsley-type="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password <span class="text-red password_input">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Password" name="password" required >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Title" name="title" data-parsley-maxlength="100">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">First name</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="First Name" name="firstname" data-parsley-maxlength="100">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Last name</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Last Name" name="lastname" data-parsley-maxlength="100">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Profession</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Profession" name="profession" data-parsley-maxlength="100">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Organization</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Organization" name="organization" data-parsley-maxlength="100">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Country</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" name="country_id">
                                        <option selected="selected">Select Item</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" name="state_id">
                                        <option selected="selected">Select Item</option>
                                      
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" name="city_id">
                                        <option selected="selected">Select Item</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Zipcode</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Zipcode" name="zipcode" data-parsley-maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Address" name="address" data-parsley-maxlength="250">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Telephone</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Telephone" name="telephone" data-parsley-maxlength="20">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Fax</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Fax" name="fax" data-parsley-maxlength="20">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">All Module</label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input " type="checkbox" name="module_generic" value="1">
                                        <label class="form-check-label">Generic</label>
                                    </div> 
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_brand" value="1">
                                        <label class="form-check-label">Brand</label>
                                    </div>  
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_manufacturer" value="1">
                                        <label class="form-check-label">Manufacturer</label>
                                    </div>                                
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_dosage_form" value="1">
                                        <label class="form-check-label">Dosage Form</label>
                                    </div>  
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_strength" value="1">
                                        <label class="form-check-label">Strength</label>
                                    </div>  
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_pack_size" value="1">
                                        <label class="form-check-label">Pack Size</label>
                                    </div>  
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_indication" value="1">
                                        <label class="form-check-label">Indication</label>
                                    </div>  
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_scroller" value="1">
                                        <label class="form-check-label">Scroller</label>
                                    </div>  
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_doctor" value="1">
                                        <label class="form-check-label">Doctor</label>
                                    </div>  
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_job" value="1">
                                        <label class="form-check-label">Job</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_news" value="1">
                                        <label class="form-check-label">News</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_journal" value="1">
                                        <label class="form-check-label">Journal</label>
                                    </div>  
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_address" value="1">
                                        <label class="form-check-label">Address</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_advertisement" value="1">
                                        <label class="form-check-label">Advertisement</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_special_report" value="1">
                                        <label class="form-check-label">Special Report</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_video" value="1">
                                        <label class="form-check-label">Video</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="module_setting" value="1">
                                        <label class="form-check-label">Setting</label>
                                    </div>

                                </div>
                            </div>
                            



                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Is Active </label>
                                <div class="col-sm-9">
                                <select class="form-control" name="is_active">
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                </select>                        
                                </div>
                            </div>


                            <input type="hidden" name="id">
                        

                       
                        </div>
                       
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" data-url="{{ route('user.store') }}" class="btn btn-primary" id="create_form_btn">Create</button>
                    <button type="submit" data-url="{{ route('user.update') }}" class="btn btn-primary" id="update_form_btn">Update</button>
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
            fetchCountry();

            var shouldFetchState = false;
            var shouldFetchCity = false;

            var selectedStateId = null;
            var selectedCityId = null;
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
                        
                        var select2El = $('select[name="country_id"]');
                        
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
                
                var id = $("select[name=country_id]").val();
                if(id == ''){
                    return false;
                }
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
                        
                        var select2El = $('select[name="state_id"]');
                        
                        select2El.select2('destroy');
                        select2El.empty();
                        
                        select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));
                        
                        $.each(data, function(index, value) {
                            select2El.append($('<option></option>').attr('value', value.state_id).text(value.state_name));
                        });

                        select2El.select2();
                        shouldFetchCity = true;
                        if(selectedStateId != null){
                            $("select[name=state_id]").val(selectedStateId).trigger('change');

                        }
                        
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

            $('select[name=country_id]').on('change', function(){
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
                var id = $("select[name=state_id]").val();
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
                        
                        var select2El = $('select[name="city_id"]');
                        
                        select2El.select2('destroy');
                        select2El.empty();
                        
                        select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));
                        
                        $.each(data, function(index, value) {
                            select2El.append($('<option></option>').attr('value', value.city_id).text(value.city_name));
                        });

                        select2El.select2();
                        if(selectedCityId != null){
                            $("select[name=city_id]").val(selectedCityId).trigger('change');
                        }
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

            $('select[name=state_id]').on('change', function(){
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
            var ajaxUrl = "{{ route('user.index') }}";
            var columnsArray = [                  
                    { data: 'username', name: 'username', title: 'User Name'},
                    { data: 'email', name: 'email', title: 'Email'},
                    { data: 'profession', name: 'profession', title: 'Profession'},
                    { data: 'telephone', name: 'telephone', title: 'Telephone'},
                    {
                        data: null,
                        title: 'Action',
                        render: function(data, type, row) {
                            return '<a href="#" class="edit" data-id="'+row.id+'"><i class="fas fa-edit text-success"></i></a> <a href="#" class="delete" data-id="'+row.id+'"><i class="fas fa-trash text-danger"></i></a>';
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
                $("#modal_create_form .modal-title").text("Add New User Record");

                $("input[type=checkbox]").prop('checked', false);
                $("input[name=password]").prop('required', true);
                $(".password_input").removeClass('d-none');
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
            });

            // handle click event for "Edit" button
            table.on('click', '.edit', function() {
            
                $("#modal_create_form .modal-title").text("Update User Form Record");

                var id = $(this).data('id');
                var url = "{{ route('user.edit', ':id') }}";
                url = url.replace(':id', id);
                
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        var data = response.data;  
                        console.log("data==>", data.generic_indication)

                        $("input[name=password]").prop('required', false)
                        $(".password_input").addClass('d-none');
                        $("input[name=id]").val(data.id);
                        $("input[name=username]").val(data.username);
                        $("input[name=email]").val(data.email);
                        $("input[name=password]").val('');
                        $("input[name=title]").val(data.title);
                        $("input[name=firstname]").val(data.firstname);
                        $("input[name=lastname]").val(data.lastname);
                        $("input[name=profession]").val(data.profession);
                        $("input[name=organization]").val(data.organization);
                        $("input[name=zipcode]").val(data.zipcode);
                        $("input[name=address]").val(data.address);
                        $("input[name=telephone]").val(data.telephone);
                        $("input[name=fax]").val(data.fax);

                        $("input[name=module_generic]").prop('checked',(data.user_mapping.module_generic == 1) ? true : false);
                        $("input[name=module_brand]").prop('checked',(data.user_mapping.module_brand == 1) ? true : false);
                        $("input[name=module_manufacturer]").prop('checked',(data.user_mapping.module_manufacturer == 1) ? true : false);
                        $("input[name=module_dosage_form]").prop('checked',(data.user_mapping.module_dosage_form == 1) ? true : false);
                        $("input[name=module_strength]").prop('checked',(data.user_mapping.module_strength == 1) ? true : false);
                        $("input[name=module_pack_size]").prop('checked',(data.user_mapping.module_pack_size == 1) ? true : false);
                        $("input[name=module_indication]").prop('checked',(data.user_mapping.module_indication == 1) ? true : false);
                        $("input[name=module_scroller]").prop('checked',(data.user_mapping.module_scroller == 1) ? true : false);
                        $("input[name=module_doctor]").prop('checked',(data.user_mapping.module_doctor == 1) ? true : false);
                        $("input[name=module_job]").prop('checked',(data.user_mapping.module_job == 1) ? true : false);
                        $("input[name=module_news]").prop('checked',(data.user_mapping.module_news == 1) ? true : false);
                        $("input[name=module_journal]").prop('checked',(data.user_mapping.module_journal == 1) ? true : false);
                        $("input[name=module_address]").prop('checked',(data.user_mapping.module_address == 1) ? true : false);
                        $("input[name=module_advertisement]").prop('checked',(data.user_mapping.module_advertisement == 1) ? true : false);
                        $("input[name=module_special_report]").prop('checked',(data.user_mapping.module_special_report == 1) ? true : false);
                        $("input[name=module_video]").prop('checked',(data.user_mapping.module_video == 1) ? true : false);
                        $("input[name=module_setting]").prop('checked',(data.user_mapping.module_setting == 1) ? true : false);


                        if(data.country_id != ''){
                            $("select[name=country_id]").val(data.country_id).trigger('change');                        

                        }
                        selectedStateId = data.state_id;
                        selectedCityId = data.city_id;

                        $("select[name=user_is_active]").val(data.user_is_active);
                        
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
                        var url = "{{ route('user.destroy', ':id') }}";
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
                                    title: "User record deleted successfully",
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