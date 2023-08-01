@extends('admin.layout.main')


@push('title') Brand @endpush

@section('main-section')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Brand List</h1>
            </div>
            <div class="col-sm-6">

                <button type="button" class="btn float-sm-right btn-primary add_new">Add New Brand</button>
           
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
            <form class="form-horizontal" id="create-form"  enctype="multipart/form-data">
                
                <div class="modal-header">
                    <h4 class="modal-title">Add New Brand Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-5 px-5">
                    <!-- <form class="form-horizontal"> -->

                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Type <span class="text-red">*</span> </label>
                                <div class="col-sm-9">
                                  <select class="form-control" name="brand_type">
                                    <option value="Regular">Regular</option>
                                    <option value="Herbal">Herbal</option>
                                  </select>                        
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Name" name="brand_name" required data-parsley-maxlength="200">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Generic<span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" name="brand_generic_id" required >
                                        <option selected="selected">Select Item</option>
                                    </select>
                                </div>
                                
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Manufacturer<span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" name="brand_manufacturer_id" required >
                                        <option selected="selected">Select Item</option>
                                    </select>
                                </div>
                                
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Dosage Form<span class="text-red">*</span></label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" style="width: 100%;" name="brand_dosage_form_id" required >
                                        <option selected="selected">Select Item</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-primary add_dosage_form btn-block" >+</button>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Strength<span class="text-red">*</span></label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" style="width: 100%;" name="brand_strength_id" required >
                                        <option selected="selected">Select Item</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-primary add_strength btn-block" >+</button>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Pack Size<span class="text-red">*</span></label>
                                <div class="col-sm-8">
                                    <select class="form-control select2" style="width: 100%;" name="brand_pack_size_id" required >
                                        <option selected="selected">Select Item</option>
                                    </select>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-primary add_pack_size btn-block" >+</button>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Price In BDT <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="Price In BDT" name="brand_price" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="brand_image" name="brand_image">
                                        <label class="custom-file-label" for="brand_image">Choose file</label>
                                      </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Is Highlighted </label>
                                <div class="col-sm-9">
                                <select class="form-control" name="brand_is_hightlight" >
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>                        
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Is New Product </label>
                                <div class="col-sm-9">
                                <select class="form-control" name="brand_is_new_product">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>                        
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Is New Brand </label>
                                <div class="col-sm-9">
                                <select class="form-control" name="brand_is_new_brand">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>                        
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Is New Presentation </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="brand_is_new_presentation">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>                        
                                </div>
                            </div>
                         
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Is Active </label>
                                <div class="col-sm-9">
                                <select class="form-control" name="brand_is_active">
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
                    <button type="submit" data-url="{{ route('brand.store') }}" class="btn btn-primary" id="create_form_btn">Create</button>
                    <button type="submit" data-url="{{ route('brand.update') }}" class="btn btn-primary" id="update_form_btn">Update</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->



    <!-- /.modal-dialog -->
    <div class="modal fade" id="modal_subform">
        <div class="modal-dialog modal-md">
            <div class="modal-content ">
            <form class="form-horizontal" id="sub-create-form">
                @csrf
                
                <div class="modal-body">
                    <div class="card-body py-0">
                      <div class="form-group">
                        <label class="col-form-label"><span id="label_subform"></span> <span class="text-red">*</span></label>
                        <input type="text" class="form-control" placeholder="" name="" id="input_subform" required>
                      </div>                      
                    </div>
                </div>
                  
                
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" data-url="" class="btn btn-primary" id="create_subform_btn">Add</button>
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

            $('.select2').select2();
            bsCustomFileInput.init();
           
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
            initSelect2Dropdown($('select[name=brand_generic_id]'), genericUrl, genericFormat);

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
            initSelect2Dropdown($('select[name=brand_manufacturer_id]'), manufacturerUrl, manufacturerFormat);

            //Initializing dosageform dropdown
            var dosageformUrl = "{{ route('dosageform.list') }}";
            var dosageformFormat = {
                id: function(item) {
                    return item.dosageform_id;
                },
                text: function(item) {
                    return item.dosageform_name;
                }
            };
            initSelect2Dropdown($('select[name=brand_dosage_form_id]'), dosageformUrl, dosageformFormat);


            //Initializing strength dropdown
            var strengthUrl = "{{ route('strength.list') }}";
            var strengthFormat = {
                id: function(item) {
                    return item.strength_id;
                },
                text: function(item) {
                    return item.strength_name;
                }
            };
            initSelect2Dropdown($('select[name=brand_strength_id]'), strengthUrl, strengthFormat);


            //Initializing packsize dropdown
            var packsizeUrl = "{{ route('packsize.list') }}";
            var packsizeFormat = {
                id: function(item) {
                    return item.packsize_id;
                },
                text: function(item) {
                    return item.packsize_name;
                }
            };
            console.log("packsizeUrl->", packsizeUrl)
            initSelect2Dropdown($('select[name=brand_pack_size_id]'), packsizeUrl, packsizeFormat);


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
            var ajaxUrl = "{{ route('brand.index') }}";
            var columnsArray = [                  
                    { data: 'brand_name', name: 'brand_name', title: 'Brand Name'},
                    { data: 'dosage_form.dosageform_name', name: 'brand_name', title: 'Dosage Form'},
                    { data: 'brand_type', name: 'brand_name', title: 'Product Type'},
                    { data: 'generic.generic_name', name: 'generic.generic_name', title: 'Generic'},
                    { data: 'brand_price', name: 'brand_price', title: 'Price'},
                    { data: 'manufacturer.manufacturer_name', name: 'manufacturer.manufacturer_name', title: 'Manufacturer'},
                    {
                        data: null,
                        title: 'Action',
                        render: function(data, type, row) {
                            return '<a href="#" class="edit" data-id="'+row.brand_id+'"><i class="fas fa-edit text-success"></i></a> <a href="#" class="delete" data-id="'+row.brand_id+'"><i class="fas fa-trash text-danger"></i></a>';
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
                $("#modal_create_form .modal-title").text("Add New Brand Record");

                $('select[name="brand_generic_id"]').empty();
                $('select[name="brand_manufacturer_id"]').empty();
                $('select[name="brand_dosage_form_id"]').empty();
                $('select[name="brand_strength_id"]').empty();
                $('select[name="brand_pack_size_id"]').empty();

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
            
                console.log("edit trigger")
                $("#modal_create_form .modal-title").text("Update Brand Form Record");

                var id = $(this).data('id');
                var url = "{{ route('brand.edit', ':id') }}";
                url = url.replace(':id', id);
                
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        var data = response.data;  
                        console.log("data==>", data.generic_indication)

                        $("input[name=id]").val(data.brand_id);
                        $("select[name=brand_type]").val(data.brand_type);
                        $("input[name=brand_name]").val(data.brand_name);

                    
                        var url = "{{ route('generic.edit', ':id') }}";
                        url = url.replace(':id', data.brand_generic_id);
                        $.ajax({
                            url: url,
                            dataType: 'json',
                            success: function(d) {                                
                                var option = new Option(d.data.generic_name, d.data.generic_id, true, true);
                                $("select[name=brand_generic_id]").append(option).trigger('change');
                            }
                        });


                        var url = "{{ route('manufacturer.edit', ':id') }}";
                        url = url.replace(':id', data.brand_manufacturer_id);
                        $.ajax({
                            url: url,
                            dataType: 'json',
                            success: function(d) {                                
                                var option = new Option(d.data.manufacturer_name, d.data.manufacturer_id, true, true);
                                $("select[name=brand_manufacturer_id]").append(option).trigger('change');
                            }
                        });

                        var url = "{{ route('dosageform.edit', ':id') }}";
                        url = url.replace(':id', data.brand_dosage_form_id);
                        $.ajax({
                            url: url,
                            dataType: 'json',
                            success: function(d) {                                
                                var option = new Option(d.data.dosageform_name, d.data.dosageform_id, true, true);
                                $("select[name=brand_dosage_form_id]").append(option).trigger('change');
                            }
                        });

                        var url = "{{ route('strength.edit', ':id') }}";
                        url = url.replace(':id', data.brand_strength_id);
                        $.ajax({
                            url: url,
                            dataType: 'json',
                            success: function(d) {                                
                                var option = new Option(d.data.strength_name, d.data.strength_id, true, true);
                                $("select[name=brand_strength_id]").append(option).trigger('change');
                            }
                        });

                        var url = "{{ route('packsize.edit', ':id') }}";
                        url = url.replace(':id', data.brand_pack_size_id);
                        $.ajax({
                            url: url,
                            dataType: 'json',
                            success: function(d) {                                
                                var option = new Option(d.data.packsize_name, d.data.packsize_id, true, true);
                                $("select[name=brand_pack_size_id]").append(option).trigger('change');
                            }
                        });

                        $("input[name=brand_price]").val(data.brand_price);
                        

                        if (data.brand_image) {
                            $("input[name=brand_image]").next('.custom-file-label').addClass("selected").html(data.brand_image.substring(data.brand_image.lastIndexOf("__") + 2));
                        }else{
                            $("input[name=brand_image]").next('.custom-file-label').addClass("selected").html('Choose file');

                        }

                        $("select[name=brand_is_hightlight]").val(data.brand_is_hightlight);
                        $("select[name=brand_is_new_product]").val(data.brand_is_new_product);
                        $("select[name=brand_is_new_brand]").val(data.brand_is_new_brand);
                        $("select[name=brand_is_new_presentation]").val(data.brand_is_new_presentation);
                        $("select[name=brand_is_active]").val(data.brand_is_active);
                        
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
                        var url = "{{ route('brand.destroy', ':id') }}";
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
                                    title: "Brand record deleted successfully",
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


            // $('.add_generic').on('click', function(){                
            //     $("#sub-create-form")[0].reset();   
            //     $("#label_subform").text('Add Generic Name');
            //     $("#input_subform").attr('placeholder','Add Generic Name')
            //     $("#input_subform").attr('name','generic_name')
            //     $("#create_subform_btn").attr('data-url',"{{ route('generic.store') }}")
            //     $("#modal_subform").modal('show')
            // });

            // $('.add_manufacturer').on('click', function(){                
            //     $("#sub-create-form")[0].reset();   
            //     $("#label_subform").text('Add Manufacturer Name');
            //     $("#input_subform").attr('placeholder','Add Manufacturer Name')
            //     $("#input_subform").attr('name','manufacturer_name')
            //     $("#create_subform_btn").attr('data-url',"{{ route('manufacturer.store') }}")
            //     $("#modal_subform").modal('show')
            // });

            $('.add_dosage_form').on('click', function(){                
                $("#sub-create-form")[0].reset();   
                $("#label_subform").text('Add Dosage Form');
                $("#input_subform").attr('placeholder','Add Dosage Form')
                $("#input_subform").attr('name','dosageform_name')
                $("#create_subform_btn").data('url',"{{ route('dosageform.store') }}") // set the data-url attribute

                // $("#create_subform_btn").attr('data-url',"{{ route('dosageform.store') }}")
                $("#modal_subform").modal('show')
            });

            $('.add_strength').on('click', function(){                
                $("#sub-create-form")[0].reset();   
                $("#label_subform").text('Add Strength');
                $("#input_subform").attr('placeholder','Add Strength')
                $("#input_subform").attr('name','strength_name')
                $("#create_subform_btn").data('url',"{{ route('strength.store') }}") // set the data-url attribute

                // $("#create_subform_btn").attr('data-url',"{{ route('strength.store') }}")
                $("#modal_subform").modal('show')
            });

            $('.add_pack_size').on('click', function(){                
                $("#sub-create-form")[0].reset();   
                $("#label_subform").text('Add Pack Size');
                $("#input_subform").attr('placeholder','Add Pack Size')
                $("#input_subform").attr('name','packsize_name')
                $("#create_subform_btn").data('url',"{{ route('packsize.store') }}") // set the data-url attribute

                // $("#create_subform_btn").attr('data-url',"{{ route('packsize.store') }}")
                $("#modal_subform").modal('show')
            });


            $('#sub-create-form').submit(function(e) {
                e.preventDefault();
                var url = $("#create_subform_btn").data('url');
                console.log('url->', url);
                var type = "POST";
                
                $.ajax({
                    url: url, 
                    type: type,             
                    data: $(this).serialize(), // new FormData($("#create-post-form")[0]), //
                    success: function(response) {
                        
                        $("#modal_subform").modal('hide');
                        Toast.fire({
                            icon: 'success',
                            title: response.message, 
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