@extends('admin.layout.main')


@push('title') Doctor @endpush

@section('main-section')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Doctor List</h1>
            </div>
            <div class="col-sm-6">

                <button type="button" class="btn float-sm-right btn-primary add_new">Add New Doctor</button>
           
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
            <form class="form-horizontal" id="create-form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add New Doctor Record</h4>
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
                                <input type="text" class="form-control" placeholder="Name" name="doctor_name" required data-parsley-maxlength="200">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email ID</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Email ID" name="doctor_email" data-parsley-type="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone No (Personal)</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Phone No (Personal)" name="doctor_phone_personal" data-parsley-pattern="/^[0-9+]+$/">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone No (Clinic)</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Phone No (Clinic)" name="doctor_phone_clinic" data-parsley-pattern="/^[0-9+]+$/">
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Specialization</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Specialization" name="doctor_specialization" data-parsley-maxlength="200">
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Specialization</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Specialization" name="doctor_specialization2[]"  style="width: 100%;">
                                    </select>                                
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Achievement</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Achievement" name="doctor_achievement" data-parsley-maxlength="200">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Experience</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Experience" name="doctor_experience" data-parsley-maxlength="200">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Profession Degree</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Profession Degree" name="doctor_profession_degree" data-parsley-maxlength="200">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Gender </label>
                                <div class="col-sm-9">
                                <select class="form-control" name="doctor_gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>                        
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Certificate</label>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="doctor_certificate" name="doctor_certificate">
                                        <label class="custom-file-label" for="doctor_certificate">Choose file</label>
                                      </div>
                                </div>
                            </div>
                             <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="doctor_image" name="doctor_image">
                                        <label class="custom-file-label" for="doctor_image">Choose file</label>
                                      </div>
                                </div>
                            </div>

                           
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Country</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" name="doctor_country_id">
                                        <option selected="selected">Select Item</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" name="doctor_state_id">
                                        <option selected="selected">Select Item</option>
                                      
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" name="doctor_city_id">
                                        <option selected="selected">Select Item</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Zip Code</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Zip Code" name="doctor_zip_code">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Bio Notes</label>
                                <div class="col-sm-9">
                                  <textarea id="doctor_bio_notes" name="doctor_bio_notes" class="summernote"></textarea>                          
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address </label>
                                <div class="col-sm-9">
                                  <textarea id="doctor_address" name="doctor_address" class="summernote"></textarea>                          
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Is Featured </label>
                                <div class="col-sm-9">
                                <select class="form-control" name="doctor_is_featured">
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                </select>                        
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Is Active </label>
                                <div class="col-sm-9">
                                <select class="form-control" name="doctor_is_active">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>                        
                                </div>
                            </div>


                            <input type="hidden" name="id">
                        

                       
                        </div>
                       
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" data-url="{{ route('doctor.store') }}" class="btn btn-primary" id="create_form_btn">Create</button>
                    <button type="submit" data-url="{{ route('doctor.update') }}" class="btn btn-primary" id="update_form_btn">Update</button>
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
            bsCustomFileInput.init();

            //Initializing summernote
            var str_summernote = '#doctor_bio_notes, #doctor_address';
            declareSummernote(str_summernote);

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
                        
                        var select2El = $('select[name="doctor_country_id"]');
                        
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
                
                var id = $("select[name=doctor_country_id]").val();
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
                        
                        var select2El = $('select[name="doctor_state_id"]');
                        
                        select2El.select2('destroy');
                        select2El.empty();
                        
                        select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));
                        
                        $.each(data, function(index, value) {
                            select2El.append($('<option></option>').attr('value', value.state_id).text(value.state_name));
                        });

                        select2El.select2();
                        shouldFetchCity = true;
                        if(selectedStateId != null){
                            $("select[name=doctor_state_id]").val(selectedStateId).trigger('change');

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

            $('select[name=doctor_country_id]').on('change', function(){
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
                var id = $("select[name=doctor_state_id]").val();
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
                        
                        var select2El = $('select[name="doctor_city_id"]');
                        
                        select2El.select2('destroy');
                        select2El.empty();
                        
                        select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));
                        
                        $.each(data, function(index, value) {
                            select2El.append($('<option></option>').attr('value', value.city_id).text(value.city_name));
                        });

                        select2El.select2();
                        if(selectedCityId != null){
                            $("select[name=doctor_city_id]").val(selectedCityId).trigger('change');
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

            $('select[name=doctor_state_id]').on('change', function(){
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
            var ajaxUrl = "{{ route('doctor.index') }}";
            var columnsArray = [                  
                    { data: 'doctor_name', name: 'doctor_name', title: 'Name'},
                    { data: 'doctor_email', name: 'doctor_email', title: 'Email'},
                    // { data: 'doctor_specialization', name: 'doctor_specialization', title: 'Specialization'},
                    {
                        data: null,
                        title: 'Specialization',
                        render: function(data, type, row) {
                            var temp =[];

                            $.each(row.specializations, function(index, value) {
                                temp.push(value.specialization_name);
                            });
                            // console.log(row,"row");.
                            console.log("temp=?",temp)
                            return temp.join(',');
                        },
                        orderable: false,
                        searchable: false
                    },
                    { data: 'doctor_experience', name: 'doctor_experience', title: 'Experience'},
                    { data: 'doctor_profession_degree', name: 'doctor_profession_degree', title: 'Professional Degre'},
                    {
                        data: null,
                        title: 'Action',
                        render: function(data, type, row) {
                            return '<a href="#" class="edit" data-id="'+row.doctor_id+'"><i class="fas fa-edit text-success"></i></a> <a href="#" class="delete" data-id="'+row.doctor_id+'"><i class="fas fa-trash text-danger"></i></a>';
                        },
                        orderable: false,
                        searchable: false
                    }
                ];           
            initializeDataTable(tableName, ajaxUrl, columnsArray);

   
            // Initializing dropdown
            fetchSpecialization();

            function fetchSpecialization(){
                $.ajax({
                    url: "{{ route('doctor.specialization.fetch') }}", 
                    type: 'GET',             
                    // data: $(this).serialize(), // new FormData($("#create-post-form")[0]), //
                    success: function(response) {
                        console.log("fetchSpecialization=>", response);
                        var data = response.data;
                        console.log(data);
                        
                        var select2El = $('select[name="doctor_specialization2[]"]');
                        
                        select2El.select2('destroy');
                        select2El.empty();
                        
                        // select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));
                        
                        $.each(data, function(index, value) {
                            select2El.append($('<option></option>').attr('value', value.specialization_id).text(value.specialization_name));
                        });

                        select2El.select2();
                    },
                    error: function(xhr, status, error) {
                        console.group("Error Block");
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        console.groupEnd();   

                        if(xhr.responseJSON.messages){

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


            
            // handle click event for "Add" button
            $('.add_new').on('click', function(){

                $("#create_form_btn").show();
                $("#update_form_btn").hide();
                $("#modal_create_form .modal-title").text("Add New Doctor Record");
                selectedCityId = null;
                selectedStateId = null;

                $("#create-form")[0].reset();   
                $("select[name='doctor_specialization2[]']").val('').trigger('change')
            
                
                $("#modal_create_form").modal('show');
            });
              

            //For Creating and updating the record
            $('#create-form').submit(function(e) {
                e.preventDefault();
                var url = $("#create_form_btn").data('url');
                var type = "POST";
                
                if($('#create_form_btn').is(':hidden')){
                    url = $("#update_form_btn").data('url');
                    // type = "PUT";
                }
                
                $.ajax({
                    url: url, 
                    type: type,             
                    data: new FormData(this),//$(this).serialize(), // new FormData($("#create-post-form")[0]), //
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log("resposne=->", response)
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
            
                $("#modal_create_form .modal-title").text("Update Doctor Form Record");

                var id = $(this).data('id');
                var url = "{{ route('doctor.edit', ':id') }}";
                url = url.replace(':id', id);
                
                
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        var data = response.data;  
                        console.log("data==>", data.generic_indication)

                        $("input[name=id]").val(data.doctor_id);
                        $("input[name=doctor_name]").val(data.doctor_name);
                        $("input[name=doctor_email]").val(data.doctor_email);
                        $("input[name=doctor_phone_personal]").val(data.doctor_phone_personal);
                        $("input[name=doctor_phone_clinic]").val(data.doctor_phone_clinic);
                        // $("input[name=doctor_specialization]").val(data.doctor_specialization);
                        $("input[name=doctor_achievement]").val(data.doctor_achievement);
                        $("input[name=doctor_experience]").val(data.doctor_experience);
                        $("input[name=doctor_profession_degree]").val(data.doctor_profession_degree);
                        $("select[name=doctor_gender]").val(data.doctor_gender);

                        

                        var doctor_specialization2 = [];
                        $.each(data.specializations, function(index, value) {
                            doctor_specialization2.push(value.specialization_id);
                        });

                        console.log("=-doctor_specialization2", doctor_specialization2)
                        $('select[name="doctor_specialization2[]"]').val(doctor_specialization2).trigger('change');


                        if (data.doctor_certificate) {
                            $("input[name=doctor_certificate]").next('.custom-file-label').addClass("selected").html(data.doctor_certificate.substring(data.doctor_certificate.lastIndexOf("__") + 2));
                        }else{
                            $("input[name=doctor_certificate]").next('.custom-file-label').addClass("selected").html('Choose file');
                        }

                        if (data.doctor_image) {
                            $("input[name=doctor_image]").next('.custom-file-label').addClass("selected").html(data.doctor_image.substring(data.doctor_image.lastIndexOf("__") + 2));
                        }else{
                            $("input[name=doctor_image]").next('.custom-file-label').addClass("selected").html('Choose file');
                        }


                        if(data.doctor_country_id != ''){
                            $("select[name=doctor_country_id]").val(data.doctor_country_id).trigger('change');                        

                        }
                        selectedStateId = data.doctor_state_id;
                        selectedCityId = data.doctor_city_id;

                        // $("select[name=doctor_state_id]").val(data.doctor_state_id).trigger('change');
                        // $("select[name=doctor_city_id]").val(data.doctor_city_id).trigger('change');

                        $("input[name=doctor_zip_code]").val(data.doctor_zip_code);
                        
                        $('textarea[name=doctor_bio_notes]').summernote({
                            focus: true
                        }).summernote('code', data.doctor_bio_notes);

                        $('textarea[name=doctor_address]').summernote({
                            focus: true
                        }).summernote('code', data.doctor_address);

                        $("select[name=doctor_is_active]").val(data.doctor_is_active);
                        $("select[name=doctor_is_featured]").val(data.doctor_is_featured);
                        
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
                        var url = "{{ route('doctor.destroy', ':id') }}";
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
                                    title: "Doctor record deleted successfully",
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