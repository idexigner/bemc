@extends('admin.layout.main')


@push('title') News @endpush

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
            <h1>News List</h1>
            </div>
            <div class="col-sm-6">

                <button type="button" class="btn float-sm-right btn-primary add_new">Add New News</button>
           
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
                    <h4 class="modal-title">Add New News Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-5 px-5">
                    <!-- <form class="form-horizontal"> -->
                        <div class="card-body">                            
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Title <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Title" name="news_title" required data-parsley-maxlength="200">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Description<span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                  <textarea id="news_description" name="news_description" class="summernote"></textarea>                          
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Publish Date <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group date" id="publishDate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#publishDate" name="news_publish_date" required data-parsley-errors-container="#error-news_publish_date"/>
                                        <div class="input-group-append" data-target="#publishDate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <div id="error-news_publish_date"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Unpublish Date <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group date" id="unpublishDate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#unpublishDate" name="news_unpublish_date" required data-parsley-errors-container="#error-news_unpublish_date"/>
                                        <div class="input-group-append" data-target="#unpublishDate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <div id="error-news_unpublish_date"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Image<span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="news_image" name="news_image" required accept="image/*">
                                        <label class="custom-file-label" for="news_image">Choose file</label>
                                      </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Is Active </label>
                                <div class="col-sm-9">
                                <select class="form-control" name="news_is_active">
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
                    <button type="submit" data-url="{{ route('news.store') }}" class="btn btn-primary" id="create_form_btn">Create</button>
                    <button type="submit" data-url="{{ route('news.update') }}" class="btn btn-primary" id="update_form_btn">Update</button>
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
            
            $('#unpublishDate').datetimepicker({
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
            var ajaxUrl = "{{ route('news.index') }}";
            var columnsArray = [                  
                    { data: 'news_title', name: 'news_title', title: 'Title', width: '55%'},
                    { data: 'news_publish_date', name: 'news_publish_date', title: 'Publish Date'},
                    { data: 'news_unpublish_date', name: 'news_unpublish_date', title: 'Unpublish Date'},
                    {
                        data: null,
                        title: 'Action',
                        render: function(data, type, row) {
                            return '<a href="#" class="edit" data-id="'+row.news_id+'"><i class="fas fa-edit text-success"></i></a> <a href="#" class="delete" data-id="'+row.news_id+'"><i class="fas fa-trash text-danger"></i></a>';
                        },
                        orderable: false,
                        searchable: false
                    }
                ];           
            initializeDataTable(tableName, ajaxUrl, columnsArray);

             //Initializing summernote
             var str_summernote = '#news_description';
            declareSummernote(str_summernote);

            // handle click event for "Add" button
            $('.add_new').on('click', function(){

                $("#create_form_btn").show();
                $("#update_form_btn").hide();
                $("#modal_create_form .modal-title").text("Add New News Record");
                
                $('input[name=news_image]').attr('required');
                
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
            
                $("#modal_create_form .modal-title").text("Update News Form Record");

                var id = $(this).data('id');
                var url = "{{ route('news.edit', ':id') }}";
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

                        $('input[name=news_organization_logo]').removeAttr('required');
                        $('input[name=news_image]').removeAttr('required');

                        
                        
                        $("input[name=id]").val(data.news_id);
                        $("input[name=news_title]").val(data.news_title);
                        $('textarea[name=news_description]').summernote().summernote('code', data.news_description);
                        if (data.news_image) {
                            $("input[name=news_image]").next('.custom-file-label').addClass("selected").html(data.news_image.substring(data.news_image.lastIndexOf("__") + 2));
                        }else{
                            $("input[name=news_image]").next('.custom-file-label').addClass("selected").html('Choose file');
                        }

                        $("input[name=news_publish_date]").val(formatDate(data.news_publish_date));
                        $("input[name=news_unpublish_date]").val(formatDate(data.news_unpublish_date));
                        
                        $("select[name=news_is_active]").val(data.news_is_active);

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
                        var url = "{{ route('news.destroy', ':id') }}";
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
                                    title: "News record deleted successfully",
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