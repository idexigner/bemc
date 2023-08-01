@extends('admin.layout.main')


@push('title') Job @endpush

@push('css-link')
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

@endpush
@section('main-section')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Job List</h1>
            </div>
            <div class="col-sm-6">

                
                <button type="button" class="btn float-sm-right btn-primary add_new">Add New Job</button>
                <button type="button" class="btn float-sm-right btn-danger delete_all mr-5">Delete All</button>
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
                
                <div class="modal-header">
                    <h4 class="modal-title">Add New Job Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-5 px-5">
                    <!-- <form class="form-horizontal"> -->
                        <div class="card-body">
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Category<span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                <select class="form-control" name="job_category" required>
                                    <option value="Pharma">Pharma</option>
                                    <option value="Medical">Medical</option>
                                </select>                        
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Title <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Title" name="job_title" required data-parsley-maxlength="200">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Organization <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Organization" name="job_organization" required data-parsley-maxlength="300">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Organization Logo<span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="job_organization_logo" name="job_organization_logo" required accept="image/*">
                                        <label class="custom-file-label" for="job_organization_logo">Choose file</label>
                                      </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Description<span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                  <textarea id="job_description" name="job_description" class="summernote"></textarea>                          
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Position <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Position" name="job_position" data-parsley-maxlength="100" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Application Deadline <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group date" id="applicationDeadline" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#applicationDeadline" name="job_application_deadline" required data-parsley-errors-container="#error-job_application_deadline"/>
                                        <div class="input-group-append" data-target="#applicationDeadline" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <div id="error-job_application_deadline"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Publish Date <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group date" id="publishDate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#publishDate" name="job_publish_date" required  data-parsley-errors-container="#error-job_publish_date"/>
                                        <div class="input-group-append" data-target="#publishDate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <div id="error-job_publish_date"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="job_image" name="job_image" accept="image/*">
                                        <label class="custom-file-label" for="job_image">Choose file</label>
                                      </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Salary</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Salary" name="job_salary">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Educational Requirement<span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                  <textarea id="job_educational_requirement" name="job_educational_requirement" class="summernote"></textarea>                          
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Experience Requirement<span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                  <textarea id="job_experience_requirement" name="job_experience_requirement" class="summernote"></textarea>                          
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Number of Vacancy</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Number of Vacancy" name="job_vacancy"> 
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Age Limit</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Age Limit" name="job_age_limit" data-parsley-maxlength="100">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Location</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Location" name="job_location" data-parsley-maxlength="200">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Job Source</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Job Source" name="job_source" data-parsley-maxlength="100">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Job Type</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Job Type" name="job_type" data-parsley-maxlength="100">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Employment Type</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Employment Type" name="job_employment_type" data-parsley-maxlength="100">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Job Nature</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Job Nature" name="job_nature" data-parsley-maxlength="100">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Applying Procedure</label>
                                <div class="col-sm-9">
                                  <textarea id="job_application_procedure" name="job_application_procedure" class="summernote"></textarea>                          
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Is Active </label>
                                <div class="col-sm-9">
                                <select class="form-control" name="job_is_active">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>                        
                                </div>
                            </div>
                    
                        </div>

                        <input type="hidden" name="id">
                      
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" data-url="{{ route('job.store') }}" class="btn btn-primary" id="create_form_btn">Create</button>
                    <button type="submit" data-url="{{ route('job.update') }}" class="btn btn-primary" id="update_form_btn">Update</button>
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


    <!-- InputMask -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/inputmask/jquery.inputmask.min.js"></script>

    <!-- date-range-picker -->
    <!-- <script src="plugins/daterangepicker/daterangepicker.js"></script> -->
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

     <!-- Page specific script -->
     <script>
        
        $(function () {

            
            var table = $('#table-standard');

            $('#create-form').parsley({
                trigger: 'focusout'
            });


            $('.select2').select2()
            bsCustomFileInput.init();
            

            $('#applicationDeadline').datetimepicker({
                format: 'L',
                icons: {
                    // Define the icons for Today and Clear buttons
                    today: 'far fa-calendar-check',
                    clear: 'far fa-trash-alt'
                },
                buttons: {
                    // Add Today and Clear buttons
                    // You can customize the titles and classes as needed
                    showToday: true,
                    showClear: true,
                    todayTitle: 'Select Today',
                    clearTitle: 'Clear Date',
                    todayClass: 'btn btn-primary btn-sm',
                    clearClass: 'btn btn-danger btn-sm'
                }
            });
            
            $('#publishDate').datetimepicker({
                format: 'L',
                icons: {
                    // Define the icons for Today and Clear buttons
                    today: 'far fa-calendar-check',
                    clear: 'far fa-trash-alt'
                },
                buttons: {
                    // Add Today and Clear buttons
                    // You can customize the titles and classes as needed
                    showToday: true,
                    showClear: true,
                    todayTitle: 'Select Today',
                    clearTitle: 'Clear Date',
                    todayClass: 'btn btn-primary btn-sm',
                    clearClass: 'btn btn-danger btn-sm'
                }
            });


             //initializing the datatable from main.blade.php function
            var tableName = '#table-standard';
            var ajaxUrl = "{{ route('job.index') }}";
            var columnsArray = [                  
                    { data: 'job_title', name: 'job_title', title: 'Title', width: '25%'},
                    { data: 'job_organization', name: 'job_organization', title: 'Organization', width: '18%'},
                    { data: 'job_position', name: 'job_position', title: 'Position', width: '18%'},
                    { data: 'job_publish_date', name: 'job_publish_date', title: 'Publish Date', width: '10%'},
                    { data: 'job_application_deadline', name: 'job_application_deadline', title: 'Application Date', width: '10%'},
                    {
                        data: null,
                        title: 'Action',
                        render: function(data, type, row) {
                            return '<a href="#" class="edit" data-id="'+row.job_id+'"><i class="fas fa-edit text-success"></i></a> <a href="#" class="delete" data-id="'+row.job_id+'"><i class="fas fa-trash text-danger"></i></a>';
                        },
                        orderable: false,
                        searchable: false
                    }
                ];           
            initializeDataTable(tableName, ajaxUrl, columnsArray);

             //Initializing summernote
             var str_summernote = '#job_description, #job_educational_requirement, #job_experience_requirement, #job_application_procedure';
            declareSummernote(str_summernote);

            // handle click event for "Add" button
            $('.add_new').on('click', function(){

                $("#create_form_btn").show();
                $("#update_form_btn").hide();
                $("#modal_create_form .modal-title").text("Add New Job Record");

                $('input[name=job_organization_logo]').attr('required');
                $('input[name=job_image]').attr('required');

                
                $("#create-form")[0].reset();               
                $("textarea.summernote").each(function(){
                    $(this).summernote('code', '');
                });
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
                
                console.log("url->", url);
                console.log("type->", type);
                $.ajax({
                    url: url, 
                    type: type,             
                    data: new FormData(this),//$(this).serialize(), // // new FormData($("#create-post-form")[0]), //
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
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
            
                $("#modal_create_form .modal-title").text("Update Job Form Record");

                var id = $(this).data('id');
                var url = "{{ route('job.edit', ':id') }}";
                url = url.replace(':id', id);
                
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        var data = response.data;  
                        console.log("data==>", data)
                        bsCustomFileInput.destroy();
                        bsCustomFileInput.init();

                        $('input[name=job_organization_logo]').removeAttr('required');
                        $('input[name=job_image]').removeAttr('required');

                        
                        
                        $("input[name=id]").val(data.job_id);
                        $("select[name=job_category]").val(data.job_category);
                        
                        $("input[name=job_title]").val(data.job_title);
                        $("input[name=job_organization]").val(data.job_organization);
                        if (data.job_organization_logo) {
                            $("input[name=job_organization_logo]").next('.custom-file-label').addClass("selected").html(data.job_organization_logo.substring(data.job_organization_logo.lastIndexOf("__") + 2));
                        }else{
                            $("input[name=job_organization_logo]").next('.custom-file-label').addClass("selected").html('Choose file');
                        }
                        $('textarea[name=job_description]').summernote().summernote('code', data.job_description);
                        $("input[name=job_position]").val(data.job_position);
                        
                        $("input[name=job_application_deadline]").val(formatDate(data.job_application_deadline));
                        $("input[name=job_publish_date]").val(formatDate(data.job_publish_date));
                        
                        
                        if (data.job_image) {
                            $("input[name=job_image]").next('.custom-file-label').addClass("selected").html(data.job_image.substring(data.job_image.lastIndexOf("__") + 2));
                        }else{
                            $("input[name=job_image]").next('.custom-file-label').addClass("selected").html('Choose file');
                        }

                        $("input[name=job_salary]").val(data.job_salary);
                        $('textarea[name=job_educational_requirement]').summernote().summernote('code', data.job_educational_requirement);
                        $('textarea[name=job_experience_requirement]').summernote().summernote('code', data.job_experience_requirement);
                        $("input[name=job_vacancy]").val(data.job_vacancy);
                        
                        $("input[name=job_age_limit]").val(data.job_age_limit);
                        $("input[name=job_location]").val(data.job_location);
                        $("input[name=job_source]").val(data.job_source);
                        $("input[name=job_type]").val(data.job_type);
                        $("input[name=job_employment_type]").val(data.job_employment_type);
                        $("input[name=job_nature]").val(data.job_nature);
                        $('textarea[name=job_application_procedure]').summernote().summernote('code', data.job_application_procedure);

                        $("select[name=job_is_active]").val(data.job_is_active);

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
                        var url = "{{ route('job.destroy', ':id') }}";
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
                                    title: "Job record deleted successfully",
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

            $('.delete_all').on('click', function(){
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
                    title: 'Are you sure you want to delete all Jobs?',
                    text: "You won't be able to revert this!",
                    }).then((result) => {
                    if (result.isConfirmed) {
                        var currentPage =  table.DataTable().page.info().page;
                        var url = "{{ route('job.destroy_all') }}";
                        
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
                                    title: "All Job record deleted successfully",
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