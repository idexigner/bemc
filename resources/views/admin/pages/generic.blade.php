@extends('admin.layout.main')


@push('title') Generic @endpush
@push('css-link')
    <style>
        .modal-dialog {
            max-height: 90vh !important; /* Set the maximum height of the modal dialog */
        }
        
        .modal-body {
            overflow-y: auto !important; /* Add a vertical scroll bar to the modal body */
        }
        .modal-content {
            max-height: 90vh;
            overflow-y: auto;
        }
    </style>

@endpush

@section('main-section')

<!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Generic List</h1>
            </div>
            <div class="col-sm-6">

            <button type="button" class="btn float-sm-right btn-primary add_new">Add New Generic</button>
            <!--             
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
            </ol> -->
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
            <form class="form-horizontal" id="create-generic-form">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add New Generic Record</h4>
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
                                <input type="text" class="form-control" name="generic_name" placeholder="Name" required data-parsley-maxlength="100">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Classification <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="generic_classification" placeholder="Classification" required data-parsley-maxlength="100">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Safety Remark <span class="text-red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="generic_safety_remark" placeholder="Safety Remark" required data-parsley-maxlength="100">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Indication </label>
                                <div class="col-sm-9">
                                    <textarea id="generic_indication" name="generic_indication" class="summernote"></textarea>                          
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Indication Tags</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="generic_indication_tags" placeholder="Indication Tags" data-parsley-maxlength="300">
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Indication Tags</label>
                                <div class="col-sm-8">
                                    <div class="indication_tag2">                                       
                                        <select class="form-control select2" multiple="multiple" data-placeholder="Indication Tags" name="generic_indication_tags2[]"  style="width: 100%;">
                                          
                                        </select>
                                    </div>
                                {{-- <input type="text" class="form-control" name="generic_indication_tags" placeholder="Indication Tags" data-parsley-maxlength="300"> --}}
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-primary add_indication btn-block" >+</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Dosage Administration </label>
                                <div class="col-sm-9">
                                    <textarea id="generic_dosage_administration" name="generic_dosage_administration" class="summernote"></textarea>                          
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Contraindication Precaution </label>
                                <div class="col-sm-9">
                                    <textarea id="generic_contraindication_precaution" name="generic_contraindication_precaution" class="summernote"></textarea>                          
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Composition </label>
                                <div class="col-sm-9">
                                    <textarea id="generic_composition" name="generic_composition" class="summernote"></textarea>                          
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Pharmacology </label>
                                <div class="col-sm-9">
                                    <textarea id="generic_pharmacology" name="generic_pharmacology" class="summernote"></textarea>                          
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Interaction </label>
                                <div class="col-sm-9">
                                    <textarea id="generic_interaction" name="generic_interaction" class="summernote"></textarea>                          
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Side Effect</label>
                                <div class="col-sm-9">
                                    <textarea id="generic_side_effect" name="generic_side_effect" class="summernote"></textarea>                          
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Overdose Effect </label>
                                <div class="col-sm-9">
                                    <textarea id="generic_overdose_effect" name="generic_overdose_effect" class="summernote"></textarea>                          
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Storage Condition </label>
                                <div class="col-sm-9">
                                    <textarea id="generic_storage_condition" name="generic_storage_condition" class="summernote"></textarea>                          
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Pregnancy Lactation </label>
                                <div class="col-sm-9">
                                    <textarea id="generic_pregnancy_lactation" name="generic_pregnancy_lactation" class="summernote"></textarea>                          
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Is Active </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="generic_is_active">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                    </select>                        
                                </div>
                            </div>

                            <input type="hidden" name="id" class="d-none">
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" data-url="{{ route('generic.store') }}" class="btn btn-primary" id="create_form_btn">Create</button>
                    <button type="submit" data-url="{{ route('generic.update') }}" class="btn btn-primary" id="update_form_btn">Update</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- /.modal-dialog -->
    <div class="modal fade" id="modal_indication_form">
        <div class="modal-dialog modal-md">
            <div class="modal-content ">
            <form class="form-horizontal" id="indication-form">
                @csrf
                

                <div class="modal-body">
                    <div class="card-body py-0">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Add New Indication <span class="text-red">*</span></label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Add New Indication" name="indication_name" required data-parsley-maxlength="200">
                            </div>
                        </div>

                    
                    </div>
                  </div>
                  
                
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" data-url="{{ route('generic.indication.store') }}" class="btn btn-primary" id="create_indication_btn">Add</button>
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

            $('#create-generic-form').parsley({
                trigger: 'focusout'
            });

             //initializing the datatable from main.blade.php function
            var tableName = '#table-standard';
            var ajaxUrl = "{{ route('generic.index') }}";
            var columnsArray = [                  
                    { data: 'generic_name', name: 'generic_name', title: 'Generic Name'},
                    // { data: 'generic_indication_tags', name: 'generic_indication_tags', title: 'Indication Tags', width: '40%' },

                   
                    {
                        data: null,
                        title: 'Indication Tags',
                        width: '40%',
                        render: function(data, type, row) {
                            var temp =[];

                            $.each(row.indications, function(index, value) {
                                temp.push(value.indication_name);
                            });
                            console.log(row,"row");
                            return temp.join(',');
                        },
                        orderable: false,
                        searchable: false
                    },
                    { data: 'generic_classification', name: 'generic_classification', title: 'Classification'},
                    { data: 'generic_safety_remark', name: 'generic_safety_remark', title: 'Safety Remark'},
                    {
                        data: null,
                        title: 'Action',
                        render: function(data, type, row) {
                            return '<a href="#" class="edit" data-id="'+row.generic_id+'"><i class="fas fa-edit text-success"></i></a> <a href="#" class="delete" data-id="'+row.generic_id+'"><i class="fas fa-trash text-danger"></i></a>';
                        },
                        orderable: false,
                        searchable: false
                    }
                ];
            initializeDataTable(tableName, ajaxUrl, columnsArray);

            $('.select2').select2()
            // Initializing dropdown
            fetchIndication();

            function fetchIndication(){
                $.ajax({
                    url: "{{ route('generic.indication.fetch') }}", 
                    type: 'GET',             
                    // data: $(this).serialize(), // new FormData($("#create-post-form")[0]), //
                    success: function(response) {
                        console.log("fetchIndication=>", response);
                        var data = response.data;
                        console.log(data);
                        
                        var select2El = $('select[name="generic_indication_tags2[]"]');
                        
                        select2El.select2('destroy');
                        select2El.empty();
                        
                        // select2El.append($('<option value="" selected="selected"></option>').text('Select Item'));
                        
                        $.each(data, function(index, value) {
                            select2El.append($('<option></option>').attr('value', value.indication_id).text(value.indication_name));
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

                $("#modal_create_form .modal-title").text("Add New Generic Record");

                $("#create_form_btn").show();
                $("#update_form_btn").hide();

                $("#create-generic-form")[0].reset();
                $("textarea.summernote").each(function(){
                    $(this).summernote('code', '');
                });
                $("select[name='generic_indication_tags2[]']").val('').trigger('change')

                $("#modal_create_form").modal('show');
            });
              
            //Initializing summernote
            var str_summernote = '#generic_indication, #generic_dosage_administration, #generic_contraindication_precaution, #generic_composition, #generic_pharmacology, #generic_interaction, #generic_side_effect, #generic_overdose_effect, #generic_storage_condition, #generic_pregnancy_lactation';
            declareSummernote(str_summernote);
       

            //For Creating and updating the record
            $('#create-generic-form').submit(function(e) {
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
            });

            // handle click event for "Edit" button
            table.on('click', '.edit', function() {
            
                $("#modal_create_form .modal-title").text("Update Generic Record");

                var id = $(this).data('id');
                var url = "{{ route('generic.edit', ':id') }}";
                url = url.replace(':id', id);
                
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        var data = response.data;  
                        console.log("data==>", data)
                        console.log("data==>", data.indications)
                        $("input[name=id]").val(data.generic_id);
                        $("input[name=generic_name]").val(data.generic_name);
                        $("input[name=generic_classification]").val(data.generic_classification);
                        $("input[name=generic_safety_remark]").val(data.generic_safety_remark);
                        $('textarea[name=generic_indication]').summernote({
                            focus: true
                        }).summernote('code', data.generic_indication);

                    // $("input[name=generic_indication_tags]").val(data.generic_indication_tags);

                        var generic_indication_tags2 = [];
                        $.each(data.indications, function(index, value) {
                            generic_indication_tags2.push(value.indication_id);
                        });

                        $('select[name="generic_indication_tags2[]"]').val(generic_indication_tags2).trigger('change');

                        // indication_tag2
                        $('textarea[name=generic_dosage_administration]').summernote().summernote('code', data.generic_dosage_administration);

                        $('textarea[name=generic_contraindication_precaution]').summernote().summernote('code', data.generic_contraindication_precaution);

                        $('textarea[name=generic_composition]').summernote().summernote('code', data.generic_composition);

                        $('textarea[name=generic_pharmacology]').summernote().summernote('code', data.generic_pharmacology);

                        $('textarea[name=generic_interaction]').summernote().summernote('code', data.generic_interaction);

                        $('textarea[name=generic_side_effect]').summernote().summernote('code', data.generic_side_effect);

                        $('textarea[name=generic_overdose_effect]').summernote().summernote('code', data.generic_overdose_effect);

                        $('textarea[name=generic_storage_condition]').summernote().summernote('code', data.generic_storage_condition);

                        $('textarea[name=generic_pregnancy_lactation]').summernote().summernote('code', data.generic_pregnancy_lactation);
                        $("select[name=generic_is_active]").val(data.generic_is_active);
                        
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
                        var url = "{{ route('generic.destroy', ':id') }}";
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
                                    title: "Generic record deleted successfully",
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


            $('.add_indication').on('click', function(){
                var selectedValue = $(this).val();

                $("input[name=address_new_category]").val('');
                $("#modal_indication_form").modal('show')
                // alert(selectedValue)
                // Do something with the selected value
            });
            


            //For Creating and updating the record
            $('#indication-form').submit(function(e) {
                e.preventDefault();
                var url = $("#create_indication_btn").data('url');
                var type = "POST";

                
                $.ajax({
                    url: url, 
                    type: type,             
                    data: $(this).serialize(), // new FormData($("#create-post-form")[0]), //
                    success: function(response) {
                        // $('#create-post-form')[0].reset();
                        table.DataTable().ajax.reload();
                        $("#modal_indication_form").modal('hide');
                        fetchIndication();
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