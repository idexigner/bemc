@extends('frontend.layout.main')

@push('title') Doctor @endpush


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
    <h2>Doctors</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row" id="my_left_r">
        {{-- <div class="col-md-6 col-12">
            <div class="in-page-advert doctor-advert-top-left"></div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert doctor-advert-top-right"></div>
        </div> --}}
      
    </div>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="content-section main">
                <div class="section-header d-flex justify-content-between" style="margin-bottom: 0px; padding: 24px 30px 16px 30px;">
                    <span>Find Doctors</span> <i class="fas fa-filter d-md-none d-blocK"></i>
                </div>
                <!-- doctor search -->
                <div class="container" style="padding-bottom: 20px">
                    <div class="address-search row">
                        <div class="col-md-5 col-12 address-search-col">
                            <div class="theme-select">
                                <select class="form-control select2" id="doctorCountry" name="doctorCountry">
                                    <option value="">Search by Country</option>

                                </select>
                                <div class="theme-down-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-12 address-search-col">
                            <div class="theme-select">
                                <select class=" select2 form-control" id="doctorCity" name="doctorCity">
                                    <option value="">Search by City</option>

                                </select>
                                <div class="theme-down-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-12 address-search-col"></div>
                    </div>
                    <div class="address-search row">
                        <div class="col-md-5 col-12 address-search-col">
                            <div class="theme-select">
                                <select class="form-control select2" id="doctorSpecialty" name="doctorSpecialty">
                                    <option value="">Search by Specialty</option>

                                </select>
                                <div class="theme-down-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-12 address-search-col">
                            <div class="theme-select">
                                <select class="form-control" id="doctorGender" name="doctorGender">
                                    <option value="">Search by Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                                <div class="theme-down-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-12 address-search-col">
                            <button class="btn theme-btn" style="width: 100%;" onclick="doctorMethods.getDoctor(1)">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="doctor-list container" id="doctor-info-list">
                {{-- <?php
                        foreach ($AllDoctors as $doctor) {
                            $image_path = empty($doctor['ImagePath']) ? base_url() . 'application/views/images/doctor.png' : base_url() . 'application/views/img/' . $doctor['ImagePath'];
                            $hotline_info = empty($doctor['Hotline']) ? '' : '<br>Hotline: ' . $doctor['Hotline'];
                            $PhoneNo = empty($doctor['PhoneNo']) ? '' : '<p class="number">' . $doctor['PhoneNo'] . '</p>';
                            $MobileNo1 = empty($doctor['MobileNo1']) ? '' : '<p class="number">' . $doctor['MobileNo1'] . '</p>';
                            $MobileNo2 = empty($doctor['MobileNo2']) ? '' : '<p class="number">' . $doctor['MobileNo2'] . '</p>';
                            $MobileNo3 = empty($doctor['MobileNo3']) ? '' : '<p class="number">' . $doctor['MobileNo3'] . '</p>';
                            $mobile_info = $PhoneNo . $MobileNo1 . $MobileNo2 . $MobileNo3;
                            $mobile_info = empty($mobile_info) ? '' : '<p class="doctor-info-title">
                                        <i class="fas fa-phone" style="transform: scaleX(-1);"></i>  Phone No.
                                    </p>
                                    <p class="doctor-info-description">' . $mobile_info . '</p>';
                            echo '<div class="doctor row">
                    <div class="col-md-2 col-3 doctor-img">
                        <img src="' . $image_path . '" alt="">
                    </div>
                    <div class="col-md-10 col-9">
                        <h3 class="doctor-name">' . $doctor['Name'] . '</h3>
                        <div class="doctor-info d-md-block d-none">
                            <div class="row">
                                <div class="col-6">
                                    <p class="doctor-info-title">' . $doctor['Specialization'] . '</p>
                                    <p class="doctor-info-description">' . $doctor['ProfessionDegree'] . '</p>
                                </div>
                                <div class="col-6">
                                    <p class="doctor-info-title">
                                        <i class="fas fa-map-marker-alt"></i> Chamber
                                    </p>
                                    <p class="doctor-info-description">' . $doctor['ChamberAddress'] . $hotline_info . '</p>' . $mobile_info . '
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-md-none d-block">
                          <div class="doctor-info">
                              <div class="row">
                                  <div class="col-12">
                                    <p class="doctor-info-title">' . $doctor['Specialization'] . '</p>
                                    <p class="doctor-info-description">' . $doctor['ProfessionDegree'] . '</p>
                                  </div>
                                  <div class="col-12">
                                    <p class="doctor-info-title">
                                      <i class="fas fa-map-marker-alt"></i> Chamber
                                    </p>
                                    <p class="doctor-info-description">' . $doctor['ChamberAddress'] . $hotline_info . '</p>
                                  </div>
                                  <div class="col-12">' . $mobile_info . '</div>
                                </div>
                          </div>
                      </div>
                </div>';
                        }
                        ?>--}}
            </div>
            <!-- pagination -->
            {{-- <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination" id="doctor-pagination"></ul>
            </nav> --}}
            <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination" id="doctor-pagination">
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
                        <a href="https://www.dental-practice.biz/emagazine/dpbangladesh1-1/"> <img src="{{ url('/') }}/images/dantal.jpeg" alt=""></a>
                    </div>
                </div>
                <div class="row">
                    <div class="in-page-advert side-col doctor-sidebar-advert">
                      
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
</div>

{{-- <script>
    frontendCommonMethods.getSideBarData(['job', 'address', 'news', 'report', 'study']);
    frontendCommonMethods.getCommonAdvertisement(['doctor-sidebar-advert', 'doctor-advert-top-left', 'doctor-advert-top-right', 'doctor-advert-bottom']);
    doctorObject.totalDoctor = <?php echo isset($TotalDoctor) ? $TotalDoctor : 0; ?>;
    doctorObject.populatePagination(1);
    frontendCommonMethods.mainMenuActivation('doctor');
</script>
 --}}



<script>
    $('.banner').css('background-image', '../frontend/images/banner-bg.jpg');
    $('.slick-prev.slick-arrow:before').css('background-image', '../frontend/images/icons/left-arrow-white.png');
    $('.slick-next.slick-arrow:before').css('background-image', '../frontend/images/icons/right-arrow-white.png');
    $('.slick-prev.slick-arrow.slick-disabled:before').css('background-image', '../frontend/images/icons/left-arrow-white.png');
    $('.slick-next.slick-arrow.slick-dbefore').css('background-image', '../frontend/images/icons/right-arrow-white.png');
    // frontendCommonMethods2.getAdvertisement(['home-product-slider'], 3);
    // frontendCommonMethods.getCommonAdvertisement(['home-advert-container-top', 'home-advert-container-mid']);
    // drugObject.productType = "REGULAR_PRODUCT";
    // drugObject.getSpecialReports();
    // // drugObject.getMimsLearning();
    // drugObject.getJobCirculars();
    // drugObject.getLocalNews();
    // drugObject.getInternationalHealth();
    // drugObject.getImportantAddress();
    // drugObject.getNewBrands(0);
    // drugObject.getNewPresentations(0);
    // drugObject.getNewProducts(0);
    // drugObject.getHighlightedBrands();
    // frontendCommonMethods.getNumberOfVisitor();
    // drugObject.getAllDrugInfoForAutoComplete('brand');
    // frontendCommonMethods.mainMenuActivation('home');
    $(document).ready(function() {
        // $.getScript("http://connect.facebook.net/en_US/all.js# xfbml=1", function () {
        // 	FB.init({ appId: 'xxxxxxxx', status: true, cookie: true, xfbml: true });
        // });
    });
    // youTubeVideos = "";
    // var individual_youtube = '';
    // var youtube_title = '';
    // for (var youtube_no = 0; youtube_no < 4; youtube_no++) {
    //     youtube_title = youTubeVideos[youtube_no].Title;
    //     youtube_title = youtube_title.length > 65 ? youtube_title.substr(0, 60) + ' ...' : youtube_title;
    //     individual_youtube = '<div class="home-special-report-slide">' +
    //         '<a onclick="frontendCo mmonMethods.youtubeFullScreen(' + youtube_no + ')"><img src="' + youTubeVideos[youtube_no].thumbnail + '"  alt="">' +
    //         '<p class="home-special-report-slide-title">' + youtube_title + '</p>' +
    //         '</di v>';
    //     $('.home-youtube-list').append(individual_youtube);
    // }
    // $('#home-youtube-slider').slick({
    //     slidesToScroll: 1,
    //     slidesToShow: 4,
    //     autoplay: true,
    //     autoplaySpeed: 1000,
    //     infinite: false,
    //     arrows: true,
    //     responsive: [{
    //         breakpoint: 480,
    //         settings: {
    //             slidesToShow: 2,
    //             arrows: false,
    //         }
    //     }]
    // });
</script>

<script>
    jQuery(document).ready(function($) {
        $('.slider').slick({
            dots: false,
            infinite: true,
            speed: 500,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            responsive: [{
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 400,
                    settings: {
                        arrows: false,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>
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
        
        getAdvertisements('doctor');
        doctorMethods.getCountry();
        doctorMethods.getCity();
        doctorMethods.getSpecialization();
        doctorMethods.getDoctor(1);

        sidebar.getSidebar();
      
    });


    

   

    var doctorMethods = {
        getCountry: function() {
            $.ajax({
                url: "{{ route('web_country')}}",
                type: 'GET',
                dataType: 'json',
                // data: {
                //     condition: 'brand_is_new_product',
                //     limit: 7
                // },
                success: function(response) {
                    console.log("response get country", response);

                    var data = response.data;


                    var select2El = $('#doctorCountry');

                    select2El.select2('destroy');
                    select2El.empty();

                    select2El.append($('<option value="" selected="selected"></option>').text('Search By Country'));

                    $.each(data, function(index, value) {
                        select2El.append($('<option></option>').attr('value', value.country_id).text(value.country_name));
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


                    var select2El = $('#doctorCity');

                    select2El.select2('destroy');
                    select2El.empty();

                    select2El.append($('<option value="" selected="selected"></option>').text('Search By City'));

                    $.each(data, function(index, value) {
                        select2El.append($('<option></option>').attr('value', value.city_id).text(value.city_name));
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
        getSpecialization: function() {
            $.ajax({
                url: "{{ route('web_specialization')}}",
                type: 'GET',
                dataType: 'json',
                // data: {
                //     condition: 'brand_is_new_product',
                //     limit: 7
                // },
                success: function(response) {
                    // console.log(response);

                    var data = response.data;


                    var select2El = $('#doctorSpecialty');

                    select2El.select2('destroy');
                    select2El.empty();

                    select2El.append($('<option value="" selected="selected"></option>').text('Search By Speciality'));

                    $.each(data, function(index, value) {
                        select2El.append($('<option></option>').attr('value', value.specialization_id).text(value.specialization_name));
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
        getDoctor: function(page) {

            var data = {};
            data.page = page;
            if ($('#doctorCountry').val() != '') {
                data.country_id = $('#doctorCountry').val();
            }
            if ($('#doctorCity').val() != '') {
                data.city_id = $('#doctorCity').val();
            }
            if ($('#doctorSpecialty').val() != '') {
                data.specialization_id = $('#doctorSpecialty').val();
            }
            if ($('#doctorGender').val() != '') {
                data.gender_id = $('#doctorGender').val();
            }
            // 
            console.log("doctorCountry-->", $('#doctorCountry').val())
            console.log("doctorCity-->", $('#doctorCity').val())
            console.log("doctorSpecialty-->", $('#doctorSpecialty').val())
            console.log("data-->", data)
            $.ajax({
                url: "{{ route('web_get_doctor')}}",
                type: 'GET',
                dataType: 'json',
                data: data,
                // data: { page: page,
                //     country_id: country_id,
                //     city_id: city_id,
                //     specialization_id: specialization_id
                // },
                // data: {
                //     condition: 'brand_is_new_product',
                //     limit: 7
                // },
                success: function(response) {


                    console.log("web_get_doctor-> ", response)
                    var data = response.data.data;
                    var currentPage = response.current_page;
                    var lastPage = response.last_page;
                    var maxPagesToShow = 5; // maximum number of pages to show at a time
                    var halfMaxPagesToShow = Math.floor(maxPagesToShow / 2); // half of maxPagesToShow rounded down


                    console.log(currentPage)
                    console.log(lastPage)
                    $('#doctor-info-list').html('');
                    $.each(data, function(index, doctor) {

                        var specializations = '';
                        $.each(doctor.specializations, function(i,specialization){
                            specializations +=  specialization.specialization_name + ", ";
                        });
                        specializations = specializations.slice(0, -2);
                        
                        doctor_image = doctor.doctor_image;
                        console.log("doctor", doctor)

                        var country_state_city = '';
                        if (doctor.country != null) {
                            country_state_city = `
                            <br>
                            
                            ${(doctor.country != null) ? `\n<br>Country: ${doctor.country.country_name}` : ''}
							${(doctor.state != null) ? `\n<br>State: ${doctor.state.state_name}` : ''}
							${(doctor.city != null) ? `\n<br>City: ${doctor.city.city_name}` : ''}
                            `;
                        }

                        var doctor_phone_personal = 'Phone: ';
                        if (doctor.doctor_phone_personal != null) {
                            doctor_phone_personal += doctor.doctor_phone_personal;
                        }

                        var doctor_phone_clinic = 'Clinic: ';
                        if (doctor.doctor_phone_clinic != null) {
                            doctor_phone_clinic += doctor.doctor_phone_clinic;
                        }

                        if (doctor_image == null || doctor_image ==  '') {
                            doctor_image = 'https://mimsbangladesh.com/application/views/images/doctor.png';
                        }else{
                            doctor_image =  "{{url('/')}}/storage/images/doctor/"+doctor.doctor_image;
                        }
                        $('#doctor-info-list').append(`
                        <div class="doctor row">
                            <div class="col-md-2 col-3 doctor-img">
                                <img src="${doctor_image}" alt="">
                            </div>
                            <div class="col-md-10 col-9">
                                <h3 class="doctor-name">${doctor.doctor_name}</h3>
                                <div class="doctor-info d-md-block d-none">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="doctor-info-title">${specializations}</p>
                                            <p class="doctor-info-description">${doctor.doctor_profession_degree}</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="doctor-info-title">
                                                <i class="fas fa-map-marker-alt"></i> Chamber
                                            </p>
                                            <p class="doctor-info-description">${doctor.doctor_address}
                                                ${country_state_city}
                                               
                                            </p>
                                            ${doctor_phone_personal} <br> ${doctor_phone_clinic}
                                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-md-none d-block">
                                <div class="doctor-info">
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="doctor-info-title">${doctor.doctor_specialization}</p>
                                            <p class="doctor-info-description">${doctor.doctor_profession_degree}</p>
                                        </div>
                                        <div class="col-12">
                                            <p class="doctor-info-title">
                                            <i class="fas fa-map-marker-alt"></i> Chamber
                                            </p>
                                            <p class="doctor-info-description">${doctor.doctor_address}</p>${doctor.doctor_phone_personal} ${doctor.doctor_phone_clinic}
                                            ${country_state_city}
                                        </div>
                                        <div class="col-12">${doctor_phone_personal} <br> ${doctor_phone_clinic}</div> 
                                        </div>
                                </div>
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
                        paginationHtml += '<li class="page-item"><a class="page-link" href="#" onclick="doctorMethods.getDoctor(' + (currentPage - 1) + ')"><i class="fas fa-angle-double-left"></i></a></li>';
                    } else {
                        paginationHtml += '<li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>';
                    }

                    // show page numbers within sliding window
                    for (var i = startPage; i <= endPage; i++) {
                        if (i == currentPage) {
                            paginationHtml += '<li class="page-item active"><a class="page-link" href="#">' + i + '</a></li>';
                        } else {
                            paginationHtml += '<li class="page-item"><a class="page-link" href="#" onclick="doctorMethods.getDoctor(' + i + ')">' + i + '</a></li>';
                        }
                    }

                    // show "Next" button if not on last page
                    if (currentPage < lastPage) {
                        paginationHtml += '<li class="page-item"><a class="page-link" href="#" onclick="doctorMethods.getDoctor(' + (currentPage + 1) + ')"><i class="fas fa-angle-double-right"></i></a></li>';
                    } else {
                        paginationHtml += '<li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>';
                    }

                    console.log("paginationHtml->", paginationHtml);
                    $('#doctor-pagination').html(paginationHtml);



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