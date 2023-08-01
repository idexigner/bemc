@extends('admin.layout.main')


@push('title') Advertisement @endpush

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
            <h1>Advertisement List</h1>
            </div>
            <div class="col-sm-6">

                <button type="button" class="btn float-sm-right btn-primary add_new">Add New Advertisement</button>
           
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
                    <h4 class="modal-title">Add New Advertisement Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-5 px-5">
                    <!-- <form class="form-horizontal"> -->
                        <div class="card-body">
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Organization <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Name" name="advertisement_organization" required data-parsley-maxlength="200">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Advertisement Position <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                <select class="form-control select2" style="width:100%" required name="advertisement_position" onchange="changeAdvertisementPosition(this.value)">
                                    <option value="">Select Item</option>
 
                                </select>                        
                                </div>
                            </div>

                            <div class="form-group row d-none" id="advertisement_for">
                                <label class="col-sm-3 col-form-label">Advertisement For </label>
                                <div class="col-sm-9">
                                <select class="form-control" name="advertisement_category" onchange="changeAdvertisement(this.value)">
                                    <option value="">Select Item</option>
                                    <option value="generic">Generic</option>
                                    <option value="brand">Brand</option>
                                    <option value="indication">Indication</option>
                                    <option value="manufacturer">Manufacturer</option>
                                </select>                        
                                </div>
                            </div>
                            <div class="form-group row d-none" id="generic">
                                <label class="col-sm-3 col-form-label">Generic</label>
                                <div class="col-sm-9">
                                <select class="form-control select2" style="width:100%" name="advertisement_generic_id">
                                    <option value="">Select Item</option>
                                 
                                </select>                        
                                </div>
                            </div>
                            <div class="form-group row d-none" id="brand">
                                <label class="col-sm-3 col-form-label">Brand</label>
                                <div class="col-sm-9">
                                <select class="form-control select2" style="width:100%" name="advertisement_brand_id">
                                    <option value="">Select Item</option>
  
                                </select>                        
                                </div>
                            </div>
                            <div class="form-group row d-none" id="indication">
                                <label class="col-sm-3 col-form-label">Indication</label>
                                <div class="col-sm-9">
                                <select class="form-control select2" style="width:100%" name="advertisement_indication_id">
                                    <option value="">Select Item</option>
   
                                </select>                        
                                </div>
                            </div>
                            
                            <div class="form-group row d-none" id="manufacturer">
                                <label class="col-sm-3 col-form-label">Manufacturer</label>
                                <div class="col-sm-9">
                                <select class="form-control select2" style="width:100%" name="advertisement_manufacturer_id">
                                    <option value="">Select Item</option>
   
                                </select>                        
                                </div>
                            </div>
                            

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Image<span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="advertisement_image" required id="advertisement_image">
                                        <label class="custom-file-label" for="advertisement_image">Choose file</label>
                                      </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Title" name="advertisement_title" data-parsley-maxlength="200">
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Link</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Link" name="advertisement_link" data-parsley-maxlength="500">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Published Date <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group date" id="advertisement_publish" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#advertisement_publish" name="advertisement_publish" required/>
                                        
                                    </div>
                                    <div class="input-group-append" data-target="#advertisement_publish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Unpublished Date <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group date" id="advertisement_unpublish" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#advertisement_unpublish" name="advertisement_unpublish" required/>
                                        
                                    </div>
                                    <div class="input-group-append" data-target="#advertisement_unpublish" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row d-none" id="all_in">
                                <label class="col-sm-3 col-form-label">All in </label>
                                <div class="col-sm-9">
                                <select class="form-control" name="advertisement_is_featured">
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                </select>                        
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Is Active </label>
                                <div class="col-sm-9">
                                <select class="form-control" name="advertisement_is_active">
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
                    <button type="submit" data-url="{{ route('advertisement.store') }}" class="btn btn-primary" id="create_form_btn">Create</button>
                    <button type="submit" data-url="{{ route('advertisement.update') }}" class="btn btn-primary" id="update_form_btn">Update</button>
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

           
            $('#advertisement_publish').datetimepicker({
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
            $('#advertisement_unpublish').datetimepicker({
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


            fetchPosition();

            function fetchPosition(){
                $.ajax({
                    url: "{{ route('setting.advertisement.position.fetch') }}", 
                    type: 'GET',             
                    // data: $(this).serialize(), // new FormData($("#create-post-form")[0]), //
                    success: function(response) {
                        console.log(response);
                        var data = response.data;
                        console.log(data);
                        
                        var select2El = $('select[name="advertisement_position"]');
                        
                        select2El.select2('destroy');
                        select2El.empty();
                        
                        select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));
                        
                        $.each(data, function(index, value) {
                            select2El.append($('<option></option>').attr('value', value.advertisement_position_id).text(value.advertisement_position_name));
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


            //Initializing generic dropdown
            var genericUrl = "{{ route('generic.list') }}";
            var genericFormat = {
                id: function(item) {
                    return item.generic_id;
                },
                text: function(item) {
                    return item.generic_name;
                }
            };
            initSelect2Dropdown($('select[name=advertisement_generic_id]'), genericUrl, genericFormat);


            //Initializing brand dropdown
            var brandUrl = "{{ route('brand.list') }}";
            var brandFormat = {
                id: function(item) {
                    return item.brand_id;
                },
                text: function(item) {
                    return item.brand_name;
                }
            };
            initSelect2Dropdown($('select[name=advertisement_brand_id]'), brandUrl, brandFormat);


            //Initializing indication dropdown
            var indicationUrl = "{{ route('indication.list') }}";
            var indicationFormat = {
                id: function(item) {
                    return item.indication_id;
                },
                text: function(item) {
                    return item.indication_name;
                }
            };
            initSelect2Dropdown($('select[name=advertisement_indication_id]'), indicationUrl, indicationFormat);


            //Initializing manufacturer dropdown
            var manufacturerUrl = "{{ route('manufacturer.list') }}";
            var manufacturerFormat = {
                id: function(item) {
                    return item.manufacturer_id;
                },
                text: function(item) {
                    return item.manufacturer_name;
                }
            };
            initSelect2Dropdown($('select[name=advertisement_manufacturer_id]'), manufacturerUrl, manufacturerFormat);







            //generic function for dropdown
            function initSelect2Dropdown($dropdown, url, format) {
                $dropdown.select2({
                    ajax: {
                        url: url,
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                query: params.term
                            }
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: format.id(item),
                                        text: format.text(item)
                                    }
                                })
                            }
                        },
                        cache: true
                    },
                    placeholder: 'Select Item',
                    minimumInputLength: 1
                });
            }
            


             //initializing the datatable from main.blade.php function
            var tableName = '#table-standard';
            var ajaxUrl = "{{ route('advertisement.index') }}";
            var columnsArray = [                  
                    { data: 'advertisement_organization', name: 'advertisement_organization', title: 'Name'},
                    { data: 'advertisement_category', name: 'advertisement_category', title: 'Advertisement For'},
                    { data: 'advertisement_unpublish', name: 'advertisement_unpublish', title: 'Unpublish Date'},
                    { data: 'advertisement_position.advertisement_position_name', name: 'advertisement_position.advertisement_position_name', title: 'Position', searchable: false},

                    {
                        data: null,
                        title: 'Action',
                        render: function(data, type, row) {
                            console.log("data->", data);
                            console.log("type->", type);
                            console.log("row->", row);
                            // console.log("data->", data);
                            return '<a href="#" class="edit" data-id="'+row.advertisement_id+'"><i class="fas fa-edit text-success"></i></a> <a href="#" class="delete" data-id="'+row.advertisement_id+'"><i class="fas fa-trash text-danger"></i></a>';
                        },
                        orderable: false,
                        searchable: false
                    }
                ];           
            initializeDataTable(tableName, ajaxUrl, columnsArray);

            
            // handle click event for "Add" button
            $('.add_new').on('click', function(){

                $("select[name=advertisement_position]").val('').trigger('change')
                $("select[name=advertisement_brand_id]").val('').trigger('change')
                $("select[name=advertisement_indication_id]").val('').trigger('change')
                $("select[name=advertisement_manufacturer_id]").val('').trigger('change')
                $("select[name=advertisement_generic_id]").val('').trigger('change')
                $("#generic").addClass("d-none");
                $("#brand").addClass("d-none");
                $("#indication").addClass("d-none");
                $("#manufacturer").addClass("d-none");


                $("#create_form_btn").show();
                $("#update_form_btn").hide();
                $("#modal_create_form .modal-title").text("Add New Advertisement Record");
                $("#advertisement_image").attr('required', true)

                $("#create-form")[0].reset();               

                $("#modal_create_form").modal('show');
            });
              

            //For Creating and updating the record
            $('#create-form').submit(function(e) {
                e.preventDefault();
                v = $("select[name=advertisement_category]").val();
                if(v == "generic"){
                    $("select[name=advertisement_brand_id]").val(null).trigger('change');
                    $("select[name=advertisement_indication_id]").val(null).trigger('change');
                    $("select[name=advertisement_manufacturer_id]").val(null).trigger('change');

                } else if (v == "brand"){
                    $("select[name=advertisement_generic_id]").val(null).trigger('change');
                    $("select[name=advertisement_indication_id]").val(null).trigger('change');
                    $("select[name=advertisement_manufacturer_id]").val(null).trigger('change');

                } else if (v == "indication"){
                    $("select[name=advertisement_generic_id]").val(null).trigger('change');
                    $("select[name=advertisement_brand_id]").val(null).trigger('change');
                    $("select[name=advertisement_manufacturer_id]").val(null).trigger('change');

                } 
                else if (v == "manufacturer"){
                    $("select[name=advertisement_generic_id]").val(null).trigger('change');
                    $("select[name=advertisement_brand_id]").val(null).trigger('change');
                    $("select[name=advertisement_indication_id]").val(null).trigger('change');

                } 

                
                var url = $("#create_form_btn").data('url');
                var type = "POST";
                
                if($('#create_form_btn').is(':hidden')){
                    url = $("#update_form_btn").data('url');
                    // type = "PUT";
                }
                
                $.ajax({
                    url: url, 
                    type: type,             
                    data:  new FormData(this), // new FormData($("#create-post-form")[0]), //
                    processData: false,
                    contentType: false,
                    success: function(response) {

                        console.log("reson");
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

                $("#advertisement_image").attr('required', false)
                $("#modal_create_form .modal-title").text("Update Advertisement Form Record");

                var id = $(this).data('id');
                var url = "{{ route('advertisement.edit', ':id') }}";
                url = url.replace(':id', id);
                
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        var data = response.data;  
                        console.log("data==>", data)

                        $("#generic").addClass("d-none");
                        $("#brand").addClass("d-none");
                        $("#indication").addClass("d-none");
                        $("#manufacturer").addClass("d-none");

                        $("input[name=id]").val(data.advertisement_id);
                        $("input[name=advertisement_organization]").val(data.advertisement_organization);
                        $("select[name=advertisement_category]").val(data.advertisement_category);
                        


                        
                        // var url = "{{ route('generic.edit', ':id') }}";
                        // url = url.replace(':id', data.advertisement_generic_id);
                        // $.ajax({
                        //     url: url,
                        //     dataType: 'json',
                        //     success: function(d) {                                
                        //         var option = new Option(d.data.generic_name, d.data.generic_id, true, true);
                        //         $("select[name=advertisement_generic_id]").append(option).trigger('change');
                        //     }
                        // });

                        if(data.advertisement_category == 'brand'){
                            var option = new Option(data.brand.brand_name, data.brand.brand_id, true, true);
                            $("select[name=advertisement_brand_id]").append(option).trigger('change');
                            $("#brand").removeClass("d-none");
                        }else if(data.advertisement_category == 'indication'){
                            var option = new Option(data.indication.indication_name, data.indication.indication_id, true, true);
                            $("select[name=advertisement_indication_id]").append(option).trigger('change');
                            $("#indication").removeClass("d-none");
                        }else if(data.advertisement_category == 'generic'){
                            var option = new Option(data.generic.generic_name, data.generic.generic_id, true, true);
                            $("select[name=advertisement_generic_id]").append(option).trigger('change');
                            $("#generic").removeClass("d-none");
                        }else if(data.advertisement_category == 'manufacturer'){
                            var option = new Option(data.manufacturer.manufacturer_name, data.manufacturer.manufacturer_id, true, true);
                            $("select[name=advertisement_manufacturer_id]").append(option).trigger('change');
                            $("#manufacturer").removeClass("d-none");
                        }
                        

                        // var url = "{{ route('brand.edit', ':id') }}";
                        // url = url.replace(':id', data.advertisement_brand_id);
                        // $.ajax({
                        //     url: url,
                        //     dataType: 'json',
                        //     success: function(d) {                                
                                
                        //     }
                        // });

                        // var url = "{{ route('indication.edit', ':id') }}";
                        // url = url.replace(':id', data.advertisement_indication_id);
                        // $.ajax({
                        //     url: url,
                        //     dataType: 'json',
                        //     success: function(d) {                                
                        //         var option = new Option(d.data.generic_name, d.data.generic_id, true, true);
                        //         $("select[name=advertisement_indication_id]").append(option).trigger('change');
                        //     }
                        // });


                        
                        $("select[name=advertisement_position]").val(data.advertisement_position).trigger('change');

                        if (data.advertisement_image) {
                            $("input[name=advertisement_image]").next('.custom-file-label').addClass("selected").html(data.advertisement_image.substring(data.advertisement_image.lastIndexOf("__") + 2));
                        }else{
                            $("input[name=advertisement_image]").next('.custom-file-label').addClass("selected").html('Choose file');

                        }
                        $("input[name=advertisement_title]").val(data.advertisement_title);
                        $("input[name=advertisement_link]").val(data.advertisement_link);
                        $("input[name=advertisement_publish]").val(formatDate(data.advertisement_publish));
                        $("input[name=advertisement_unpublish]").val(formatDate(data.advertisement_unpublish));

                        $("select[name=advertisement_is_featured]").val(data.advertisement_is_featured);
                        $("select[name=advertisement_is_active]").val(data.advertisement_is_active);
                        
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
                        var url = "{{ route('advertisement.destroy', ':id') }}";
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
                                    title: "Advertisement record deleted successfully",
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

        function changeAdvertisement(v){
                    $("#generic").addClass("d-none");
                    $("#brand").addClass("d-none");
                    $("#indication").addClass("d-none");

                    if(v == "generic"){
                        $("#generic").removeClass("d-none");
                    } else if (v == "brand"){
                        $("#brand").removeClass("d-none");
                    } else if (v == "indication"){
                        $("#indication").removeClass("d-none");
                    } 
            }

        function changeAdvertisementPosition(p){
            console.log(p);

            // var values = [170, 171, 172, 173, 174, 175, 176, 177, 178, 179, 180, 181, 182, 183, 184, 185, 186, 199, 200, 224, 226];
            var values = ['171', '172', '173', '174', '175', '176', '177', '178', '179', '180', '181', '182', '183', '184', '185', '186', '199', '200', '224', '226'];


            if(values.includes(p)){
                $("#advertisement_for").removeClass('d-none');
                $("#all_in").removeClass('d-none');
                console.log("if");
            }else{
                $("#advertisement_for").addClass('d-none');
                $("#all_in").addClass('d-none');
                console.log("else ");
            }
        }

    </script>

@endpush