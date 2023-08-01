@extends('admin.layout.main')


@push('title') Scroller @endpush

@section('main-section')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Scroller</h1>
            </div>
            <div class="col-sm-6">

                {{-- <button type="button" class="btn float-sm-right btn-primary add_new">Add New Scroller</button> --}}
           
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
                <!-- <div class="card-header">
                  <h3 class="card-title">Generic List</h3>
                </div> -->
                <!-- /.card-header -->
                <div class="card-body m-5 px-5">
                    <form class="form-horizontal" id="create-form" enctype="multipart/form-data">
                      
  
                      <div class="form-group row">
                          <label class="col-form-label">Title <span class="text-red">*</span></label>
                          <input type="text" class="form-control" placeholder="Title" name="scroller_title" required data-parsley-maxlength="200" value="{{ getSiteSetting('scroller_title') }}">
                      </div>
                      <div class="form-group row">
                          <label class="col-form-label">Text<span class="text-red">*</span></label>
                          <textarea class="form-control"  id=""  rows="10"  name="scroller_text" required>{{ getSiteSetting('scroller_text') }}</textarea>
                         
                      </div>

                      <hr>
                      <div class="form-group row">
                            <label class="col-form-label">Sidebar Link <span class="text-red">*</span></label>
                            <input type="text" class="form-control" placeholder="Sidebar Link" name="sidebar_link" required data-parsley-maxlength="1200" value="{{ getSiteSetting('sidebar_link') }}">
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sidebar Image<span class="text-red">*</span></label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="sidebar_image" name="sidebar_image" accept="image/*">
                                    <label class="custom-file-label" for="sidebar_image">Choose file</label>
                                  </div>
                            </div>
                        </div>

  
                      <div class="form-group row">
                        <button type="submit" data-url="{{ route('scroller.update') }}" class="btn btn-primary" id="update_form_btn">Update</button>

                      </div>
  
                  </form>
  
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

@endsection

@push('js-link')

    <!-- Page specific script -->
    <script>
        $(function () {

            
            var table = $('#table-standard');

            $('#create-form').parsley({
                trigger: 'focusout'
            });

            bsCustomFileInput.init();

            var sidebar_image = "{{ getSiteSetting('sidebar_image') }}";

            if (sidebar_image) {
                $("input[name=sidebar_image]").next('.custom-file-label').addClass("selected").html(sidebar_image.substring(sidebar_image.lastIndexOf("__") + 2));
            }else{
                $("input[name=sidebar_image]").next('.custom-file-label').addClass("selected").html('Choose file');
            }

             //initializing the datatable from main.blade.php function
            var tableName = '#table-standard';
            var ajaxUrl = "{{ route('strength.index') }}";
            var columnsArray = [                  
                    { data: 'strength_name', name: 'strength_name', title: 'Strength Name', width: '75%'},
                    {
                        data: null,
                        title: 'Action',
                        render: function(data, type, row) {
                            return '<a href="#" class="edit" data-id="'+row.strength_id+'"><i class="fas fa-edit text-success"></i></a> <a href="#" class="delete" data-id="'+row.strength_id+'"><i class="fas fa-trash text-danger"></i></a>';
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
                $("#modal_create_form .modal-title").text("Add New Strength Record");


                $("#create-form")[0].reset();               

                $("#modal_create_form").modal('show');
            });
              

            //For Creating and updating the record
            $('#create-form').submit(function(e) {
                e.preventDefault();
                var url = $("#update_form_btn").data('url');
                var type = "POST";
            
                $.ajax({
                    url: url, 
                    type: type,    
                    data: new FormData(this),  
                    processData: false,
                    contentType: false,       
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    // data: $(this).serialize(), // new FormData($("#create-post-form")[0]), //
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

           
            
        });
    </script>

@endpush