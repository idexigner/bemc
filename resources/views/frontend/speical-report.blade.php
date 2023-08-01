@extends('frontend.layout.main')

@push('title') Special Report @endpush


@push('css-link')
<!-- Select2 -->
<link rel="stylesheet" href="{{ url('/')}}/admin/plugins/select2/css/select2.min.css">
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
    <h2>Special Reports</h2>
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
            
            <div class="doctor-list container" id="speical-report-list">
                
            </div>
            <!-- pagination -->
            
            <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination" id="speical-report-pagination">
                    <li class="page-item active"><a class="page-link" href="#" data-page="1">1</a></li>
                    <!-- Add more page links here -->
                </ul>
            </nav>
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

<script src="{{ url('/')}}/admin/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(document).ready(function() {

        $('.select2').select2()


        getAdvertisements('special_report');
        speicalreportMethods.getSpecialReport(1);

        sidebar.getSidebar();
      
    });


    

   

    var speicalreportMethods = {
     
        getSpecialReport: function(page) {

            var data = {};
            data.page = page;
           
            $.ajax({
                url: "{{ route('web_get_special_report') }}",
                type: 'GET',
                dataType: 'json',
                data: data,
                
                success: function(response) {


                    console.log("web_get_special_report-> ", response)
                    var data = response.data.data;
                    var currentPage = response.current_page;
                    var lastPage = response.last_page;
                    var maxPagesToShow = 5; // maximum number of pages to show at a time
                    var halfMaxPagesToShow = Math.floor(maxPagesToShow / 2); // half of maxPagesToShow rounded down


                    $('#speical-report-list').html('');
                    $.each(data, function(index, special_report) {

                        special_report_description = special_report.special_report_description != null && special_report.special_report_description.length > 100 ? special_report.special_report_description.substr(0, 100) + ' ...' : special_report.special_report_description;

                      
                        $('#speical-report-list').append(`
                        <div class="news-item row">
                            <div class="news-thumb col-3">
                                <img src="{{ url('/') }}/storage/images/special_report/${special_report.special_report_image}"  alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">
                            </div>
                            <div class="news-info col-9">
                                <h3 class="news-title">
                                <a class="news-title" href="{{ url('/') }}/special_report_detail/${special_report.special_report_id}">${special_report.special_report_title}</a>
                                </h3>
                                <p class="news-summary">${special_report_description}</p>
                                <a href="{{ url('/') }}/special_report_detail/${special_report.special_report_id}" class="read-more">Read More</a>
                            </div>
                        </div>
                        
                        `);
                    });

                    // Update the pagination links


                    // handle pagination links
                    var paginationHtml = '';

                    // calculate start and end pages of the sliding window
                    var startPage = Math.max(1, currentPage - halfMaxPagesToShow);
                    var endPage = Math.min(lastPage, startPage + maxPagesToShow - 1);

                    // show "Previous" button if not on first page
                    if (currentPage > 1) {
                        paginationHtml += '<li class="page-item"><a class="page-link" href="#" onclick="speicalreportMethods.getSpecialReport(' + (currentPage - 1) + ')"><i class="fas fa-angle-double-left"></i></a></li>';
                    } else {
                        paginationHtml += '<li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>';
                    }

                    // show page numbers within sliding window
                    for (var i = startPage; i <= endPage; i++) {
                        if (i == currentPage) {
                            paginationHtml += '<li class="page-item active"><a class="page-link" href="#">' + i + '</a></li>';
                        } else {
                            paginationHtml += '<li class="page-item"><a class="page-link" href="#" onclick="speicalreportMethods.getSpecialReport(' + i + ')">' + i + '</a></li>';
                        }
                    }

                    // show "Next" button if not on last page
                    if (currentPage < lastPage) {
                        paginationHtml += '<li class="page-item"><a class="page-link" href="#" onclick="speicalreportMethods.getSpecialReport(' + (currentPage + 1) + ')"><i class="fas fa-angle-double-right"></i></a></li>';
                    } else {
                        paginationHtml += '<li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>';
                    }

                    console.log("paginationHtml->", paginationHtml);
                    $('#speical-report-pagination').html(paginationHtml);



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

    }

   
</script>

@endpush