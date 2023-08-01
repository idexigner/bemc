@extends('frontend.layout.main')

@push('title') Job @endpush


@push('css-link')
<!-- Select2 -->
<link rel="stylesheet" href="{{ url('/')}}/admin/plugins/select2/css/select2.min.css">
@endpush
@section('main-section')



<style>
    .uk_tabs li.nav-item {
        border: none;
    }

    .uk_tabs ul#myTab li.nav-item a {
        color: #019A3D;
        font-weight: 900;
    }

    .uk_tabs ul#myTab li.nav-item .active {
        color: #495057 !important;
        background-color: #fff;
        border-color: #dee2e6 #dee2e6 #fff;
    }
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
    <h2>Job Circular</h2>
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
            <div class="content-section main p-3">
                {{-- <div class="section-header d-flex justify-content-between" style="margin-bottom: 0px; padding: 24px 30px 16px 30px;">
                    <span>Find Doctors</span> <i class="fas fa-filter d-md-none d-blocK"></i>
                </div> --}}


                <div class="uk_tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="medical_job-tab" data-toggle="tab" href="#medical_job" role="tab" aria-controls="medical_job" aria-selected="true">Medical</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pharma_job-tab" data-toggle="tab" href="#pharma_job" role="tab" aria-controls="pharma_job" aria-selected="false">Pharma</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="medical_job" role="tabpanel" aria-labelledby="medical_job-tab"></div>
                        <div class="tab-pane fade" id="pharma_job" role="tabpanel" aria-labelledby="pharma_job-tab"></div>

                        
                    </div>
                </div>
           
                
            </div>
        
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

<script src="{{ url('/')}}/admin/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(document).ready(function() {

        $('.select2').select2()


        getAdvertisements('job');
        jobMethods.getMedicalJob();
        jobMethods.getPharmaJob();

        sidebar.getSidebar();
      
    });


    

   

    var jobMethods = {
        getMedicalJob:function(){
            $.ajax({
                url: "{{ route('web_get_home_job')}}",
                type: 'GET',
                dataType: 'json',
                data: {
                    category: 'Medical',
                    limit: 100
                },
                success: function(response) {
                    console.log("get_home_job-> ", response);
                    $('#medical_job').html('');
                    $.each(response.data, function(index, job) {

                        var job_description = job.job_description.length > 65 ? job.job_description.substr(0, 65) + ' ...' : job.job_description;

                        $('#medical_job').append(`

                            <div class="row job">
                                <div class="col-md-9 col-10">
                                    <a href="{{ url('/') }}/job_detail/${job.job_id}"><h3 class="job-title">${job.job_title}</h3></a>
                                    <p class="job-post-date">Posted on <span>${job.job_publish_date}</span></p>
                                    <p class="job-info-summary"></p><p><u>${job.job_description}</u></p>
                                        <p></p>
                                    <a class="job-detail-btn no-outline" href="{{ url('/') }}/job_detail/${job.job_id}">View Job Detail</a>
                                </div>
                                <div class="col-md-3 col-2 p-0"><img class="job-img" src="{{ url('/') }}/storage/images/job/${job.job_organization_logo}" alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'"></div>
                            </div>
                            <hr>

                            
                        `);

                     
                    });

                   
                    
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
        getPharmaJob:function(){
            $.ajax({
                url: "{{ route('web_get_home_job')}}",
                type: 'GET',
                dataType: 'json',
                data: {
                    category: 'Pharma',
                    limit: 100
                },
                success: function(response) {
                    console.log("get_home_job-> ", response);
                    $('#pharma_job').html('');
                    $.each(response.data, function(index, job) {
                        var job_description = job.job_description.length > 65 ? job.job_description.substr(0, 65) + ' ...' : job.job_description;

                        $('#pharma_job').append(`

                            <div class="row job">
                                <div class="col-md-9 col-10">
                                    <a href="{{ url('/') }}/job_detail/${job.job_id}"><h3 class="job-title">${job.job_title}</h3></a>
                                    <p class="job-post-date">Posted on <span>${job.job_publish_date}</span></p>
                                    <p class="job-info-summary"></p><p><u>${job.job_description}</u></p>
                                        <p></p>
                                    <a class="job-detail-btn no-outline" href="{{ url('/') }}/job_detail/${job.job_id}">View Job Detail</a>
                                </div>
                                <div class="col-md-3 col-2 p-0"><img class="job-img" src="{{ url('/') }}/storage/images/job/${job.job_organization_logo}" alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'"></div>
                            </div>
                            <hr>

                            
                        `);
                       
                    });

                   
                    
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