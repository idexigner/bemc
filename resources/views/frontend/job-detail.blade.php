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
                
                <div class="job-details">
                    
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

        getAdvertisements('job_detail');
        
        jobMethods.getJobDetail({{$id}});
        // jobMethods.getPharmaJob();

        sidebar.getSidebar();
      
    });


    

   

    var jobMethods = {
      
        getJobDetail: function(id) {
            $.ajax({
                url: "{{ url('/')}}/get_job_detail/"+id,
                type: 'GET',
                dataType: 'json',
                // data: {
                //     condition: 'brand_is_new_product',
                //     limit: 7
                // },
                success: function(response) {
                    console.log("get_job_detail", response);

                    var data = response.data;
                    var job_image = '';
					if(data.job_image != ''){
						job_image = `<tr>
							<td>Job Circular Image</td>
							<td>: <img class="img-fluid" src="{{url('/')}}/storage/images/job/${data.job_image}" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'"/></td>
						</tr>`;
					}
					
					
                    $('.job-details').append(`
                        <h2 class="job-title">${data.job_title}</h2>
                        <p >Posted on ${data.job_publish_date}<span>- ${data.job_organization}</span></p>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-12 pl-0">
                                    <!-- job info table -->
                                    <div class="job-info-table">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Category</td>
                                                    <td>: ${data.job_category}</td>
                                                </tr>
                                                <tr>
                                                    <td>Title</td>
                                                    <td>: ${data.job_title}</td>
                                                </tr>
                                                <tr>
                                                    <td>Organization</td>
                                                    <td>: ${data.job_organization}</td>
                                                </tr>
                                                <tr>
                                                    <td>Description</td>
                                                    <td>: ${data.job_description}</td>
                                                </tr>
                                                <tr>
                                                    <td>Position</td>
                                                    <td>: ${data.job_position}</td>
                                                </tr>
                                                <tr>
                                                    <td>Application Deadline</td>
                                                    <td>: ${data.job_application_deadline.split(' ')[0]}</td>
                                                </tr>
                                                <tr>
                                                    <td>Publish Date</td>
                                                    <td>: ${data.job_publish_date.split(' ')[0]}</td>
                                                </tr>
                                                <tr>
                                                    <td>Salary</td>
                                                    <td>: ${data.job_salary ? data.job_salary : '-'}</td>
                                                </tr>
                                                <tr>
                                                    <td>Education Requirement</td>
                                                    <td>: ${data.job_educational_requirement}</td>
                                                </tr>
                                                <tr>
                                                    <td>Experience Requirement</td>
                                                    <td>: ${data.job_experience_requirement}</td>
                                                </tr>
                                                <tr>
                                                    <td>Number of Vacancy</td>
                                                    <td>: ${data.job_vacancy ? data.job_vacancy : '-'}</td>
                                                </tr>
												${data.job_age_limit ? '<tr><td>Age Limit</td><td>:' + data.job_age_limit + '</td></tr>' : ''}
                                                
                                                <tr>
                                                    <td>Location</td>
                                                    <td>: ${data.job_location ? data.job_location : '-'}</td>
                                                </tr>
												${data.job_source ? '<tr><td>Job Source</td><td>:' + data.job_source + '</td></tr>' : ''}
                                              
												${data.job_type ? '<tr><td>Job Type</td><td>:' + data.job_type + '</td></tr>' : ''}
                                                ${data.job_employment_type ? '<tr><td>Employment Type</td><td>:' + data.job_employment_type + '</td></tr>' : ''}
												${data.job_nature ? '<tr><td>Job Nature</td><td>:' + data.job_nature + '</td></tr>' : ''}
                                                    
                                               
                                                <tr>
                                                    <td>Applying Procedure</td>
                                                    <td>: ${data.job_application_procedure ? data.job_application_procedure : '-'}</td>
                                                </tr>
                                                
                                                
                                                ${job_image}
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- job circular image -->
                            </div>
                        </div>
                    `);
                    // $(".news-image").attr("src", "{{url('/')}}/storage/images/special_report/"+data.special_report_image);
                    
                    // $(".news-title").html(data.special_report_title);
                    // $(".news-description").html(data.special_report_description);
                    // $("#see_article").attr("href", data.special_report_link_address);

                    // $("#generic_name").html(`<a href="{{url('/')}}/generic_detail/${data.generic.generic_id}">${data.generic.generic_name}</a>`);
                    // $("#manufacturer_name").html(`<a href="{{url('/')}}/manufacturer_detail/${data.manufacturer.manufacturer_id}">${data.manufacturer.manufacturer_name}</a>`);

                    // // $("#manufacturer_name").html(data.manufacturer.manufacturer_name);
                    // $("#drug_class").html(data.generic.generic_classification);
                    // $("#safety_remark").html(data.generic.generic_safety_remark);
                    // $("#dosage_form").html(data.dosage_form.dosageform_name);
                    // $("#strength_name").html(data.strength.strength_name);
                    // $("#pack_size").html(data.pack_size.packsize_name);
                    // $("#price").html(data.brand_price + " Tk");
                    // $("#indication_para").html(data.generic.generic_indication);
                    // $("#dosage_administration").html(data.generic.generic_dosage_administration);
                    // $("#contraindication_precaution").html(data.generic.generic_contraindication_precaution);
                    // $("#side_effect").html(data.generic.generic_side_effect);
                    // $("#pregnancy_lactation").html(data.generic.generic_pregnancy_lactation);
                  
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