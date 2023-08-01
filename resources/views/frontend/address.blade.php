@extends('frontend.layout.main')

@push('title') Address @endpush


@push('css-link')
<!-- Select2 -->
<link rel="stylesheet" href="{{ url('/')}}/admin/plugins/select2/css/select2.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('/')}}/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('/')}}/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('/')}}/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


@endpush
@section('main-section')



<style>
    div#my_left_r {
        display: flex;
    }

    div#my_left_r .in-page-advert {
        width: 100%;
        margin-left: 0px !important;
    }

    div#my_left_r .in-page-advert a.advert.no-outline {
        text-align: left !important;
        margin-left: 0px !important;
        display: block;
        padding-left: 0px !important;
    }

    div#my_left_r .in-page-advert a.advert.no-outline img {
        object-fit: contain;
        margin: 0 !important;
        padding: 0 !important;
    }

    div#my_left_r .col-md-6.col-12 {
        display: flex;
        margin-left: 0px !important;
        padding-left: 0px !important;
    }

    .select2 {
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .select2:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .select2-selection__rendered {
        line-height: 1.5;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        border: none;
        background: transparent;
        padding-top: inherit;
    }

    .select2-container--default .select2-selection--single {
        border: none;
    }

    .select2-selection__arrow {
        display: none !important;
    }
</style>



<div class="banner title-banner d-md-flex d-none">
    <h2>Important Information</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row" id="my_left_r">
        {{-- <div class="col-md-6 col-12">
            <div class="in-page-advert doctor-advert-top-left"></div>
            <div class="in-page-advert doctor-advert-top-right"></div>
        </div>
        <div class="col-md-6 col-12">
            <img src="https://dev.mimsbangladesh.com/application/views/images/logo/Gv2.png" alt="" width="80%px" style="
    padding: 30px;
    background: white;
    margin-top: 30px;
">
        </div> --}}
    </div>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="content-section main">
                <div class="section-header d-flex justify-content-between" style="margin-bottom: 0px; padding: 24px 30px 16px 30px;">
                    <span>Find Address</span> <i class="fas fa-filter d-md-none d-blocK"></i>
                </div>
                <!-- doctor search -->
                <div class="container" style="padding-bottom: 20px">
                    <div class="address-search row">
                        
                        <div class="col-md-5 col-12 address-search-col">
                            <div class="theme-select">
                                <select class=" select2 form-control" id="addressCity" name="addressCity">
                                    <option value="">Search by City</option>

                                </select>
                                <div class="theme-down-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-12 address-search-col">
                            <div class="theme-select">
                                <select class="form-control select2" id="addressCategory" name="addressCategory">
                                    <option value="">Search by Category</option>

                                </select>
                                <div class="theme-down-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-12 address-search-col">
                            <button class="btn theme-btn" id="searchBtn" style="width: 100%;" >Search</button>
                        </div>
                        
                    </div>
                    
                </div>
            </div>

            <div class="content-section main">
                <div class="container address-table table-responsive">
                    <table id="table-standard" class="table">
                                        
                    </table>
                </div>
            </div>

            
            {{-- <div class="doctor-list container" id="doctor-info-list">
               
            </div> --}}
            <!-- pagination -->
           
            {{-- <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination" id="doctor-pagination">
                    <li class="page-item active"><a class="page-link" href="#" data-page="1">1</a></li>
                    <!-- Add more page links here -->
                </ul>
            </nav> --}}
            <div class="in-page-advert advert-bottom">
                {{-- <img src="" alt=""> --}}
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="container" id="sidebar">
                {{-- <div class="row side-bar-mimslearning-title">
                    <!-- special reports -->
                    <div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
                        <a href="https://www.dental-practice.biz/emagazine/dpbangladesh1-1/"> <img src="{{ url('/') }}/application/views/images/dantal.jpeg" alt=""></a>
                    </div>
                </div>
                <div class="row">
                    <div class="in-page-advert side-col doctor-sidebar-advert">
                        <img src="{{ url('/') }}/application/views/images/add-4.png" alt="">
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
</div>



<script>
    // number count for stats, using jQuery animate

    $('.counting').each(function() {
        var $this = $(this),
            countTo = $this.attr('data-count');

        $({
            countNum: $this.text()
        }).animate({
                countNum: countTo
            },

            {

                duration: 3000,
                easing: 'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                    //alert('finished');
                }

            });


    });
</script>



@endsection


@include('frontend.component.script.frontend-sidebar-script')
@push('js-link')


<script src="{{ url('/')}}/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<script src="{{ url('/')}}/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('/')}}/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<script src="{{ url('/')}}/admin/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(document).ready(function() {

        $('.select2').select2()

        getAdvertisements('address');
        
        addressMethods.getCity();
        addressMethods.getCategory();

        
        

        sidebar.getSidebar();
      
    });


    
    $("#searchBtn").click(function(){
        $('#table-standard').html('');
        $('#table-standard').DataTable().destroy();
        addressMethods.getAddress();
    })
   

    var addressMethods = {
       
        getCity: function() {
            $.ajax({
                url: "{{ route('web_city')}}",
                type: 'GET',
                dataType: 'json',
                // data: {
                //     condition: 'brand_is_new_product',
                //     limit: 7
                // },
                success: function(response) {
                    // console.log(response);

                    var data = response.data;


                    var select2El = $('#addressCity');

                    select2El.select2('destroy');
                    select2El.empty();

                    select2El.append($('<option value="" selected="selected"></option>').text('Search By City'));

                    $.each(data, function(index, value) {
                        select2El.append($('<option></option>').attr('value', value.city_name).text(value.city_name));
                    });

                    select2El.select2();

                },
                error: function(xhr, status, error) {
                    console.group("Error Block");
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                    console.groupEnd();
                }
            });
        },
        getCategory: function() {
            $.ajax({
                url: "{{ route('web_get_address_category')}}",
                type: 'GET',
                dataType: 'json',
                // data: {
                //     condition: 'brand_is_new_product',
                //     limit: 7
                // },
                success: function(response) {
                    // console.log(response);

                    var data = response.data;


                    var select2El = $('#addressCategory');

                    select2El.select2('destroy');
                    select2El.empty();

                    select2El.append($('<option value="" selected="selected"></option>').text('Search By Category'));

                    $.each(data, function(index, value) {
                        select2El.append($('<option></option>').attr('value', value.address_category_id).text(value.address_category_title));
                    });

                    select2El.select2();

                    var addressCategory = "{{$address_category}}";
                    console.log("addressCategory-->", addressCategory);
                    if(addressCategory != ''){
                        $('#addressCategory').val(addressCategory).trigger('change');
                    }
                    addressMethods.getAddress();

                },
                error: function(xhr, status, error) {
                    console.group("Error Block");
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                    console.groupEnd();
                }
            });
        },
        getAddress: function() {

            console.log("getAddress---------------------")
            

            var table = $('#table-standard');
            var tableName = '#table-standard';
            var ajaxUrl = "{{ route('web_page_get_address') }}";
       


                var columnsArray = [  
                    { data: 'address_title', name: 'address_title', title: 'Name'},
                    {
                        data: null,
                        title: 'Address',
                        render: function(data, type, row) {
                            // var htmlString = row.address_detail;
                            // htmlString = $(htmlString).text();
                            // return htmlString;

                            var htmlString = row.address_detail;
                            htmlString = $(document.createElement('div')).html(htmlString).text(); // Decode any HTML entities in the string
                            var address = encodeURIComponent(htmlString); // Encode the address string
                            return $('<div>').append($('<a>').text(htmlString).attr('href', 'https://maps.google.com/maps?q=' + address)).html(); // Create a link with the encoded address string
                        },
                        // orderable: false,
                        // searchable: false
                    },
                    
                    // { data: 'address_detail', name: 'address_detail', title: 'Address'},
                    { data: 'address_contact', name: 'address_contact', title: 'Contact'},
                        
                    ];  
                    



                var table = $(tableName).DataTable({
                    processing: true,
                    serverSide: true,
                    // ajax: ajaxUrl,
                    ajax: {
                        url: ajaxUrl,
                        data: function (d) {
                            d.city_id = $('#addressCity').val(),
                            d.address_category_id =  $('#addressCategory').val()
                        }
                    },
                    columns: columnsArray,
                    order: [],
                    language: {
                        search: "Search Records:",
                        lengthMenu: "Show _MENU_ Records",
                        zeroRecords: "No matching records found",
                        info: "",
                        infoEmpty: "",
                        infoFiltered: "",
                        paginate: {
                        first: "<<",
                        last: ">>",
                        next: ">",
                        previous: "<"
                        }
                    },
                    pageLength: 10,
                    dom: 't<"mims-pagination" <"row"<"col-sm-12 col-md-12"p>>>'
                });


                // Reload the table with the new data
                table.ajax.reload();
            
            
        },

    }

   
</script>

@endpush