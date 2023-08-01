@extends('frontend.layout.main')

@push('title') Journal @endpush


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
    <h2>Journals </h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row" id="my_left_r">
        {{-- <div class="col-md-6 col-12">
            <div class="in-page-advert journal-advert-top-left"></div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert journal-advert-top-right"></div>
        </div> --}}
       
    </div>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
			<div class="journal-list container">
				{{-- <?php
				foreach ($AllJournals as $journal) {
					if ($journal['JournalType'] == 'pdf') { ?>
						<a class="journal row d-flex align-items-center" target="_blank" href="<?= site_url('Journal/getJournalDetail') . '?JournalID=' . $journal['ID'] ?>">
                    <div class="journal-icon d-md-flex d-none">
					<img src="<?= 'https://'.$_SERVER['HTTP_HOST'].'/'.('application/views/images/icons/')?>pdf-icon-4.png">
                    </div>
                    <div class="journal-info">
                        <p class="journal-name"><?= $journal['Title'] ?></p>
                        <p class="journal-type">
                            PDF
                        </p>
                    </div>
                </a> <?php 
					} else if ($journal['JournalType'] == 'link') { ?>
						<a class="journal row d-flex align-items-center" target="_blank" href="<?= $journal['JournalType'] ?>">
                    <div class="journal-icon d-md-flex d-none">
                        <!-- <i class="material-icons">language</i> -->
						<img src="<?= 'https://'.$_SERVER['HTTP_HOST'].'/'.('application/views/images/icons/')?>website-icon-11.png">
                    </div>
                    <div class="journal-info">
                        <p class="journal-name"><?=$journal['Title'] ?></p>
                        <p class="journal-type">
                            Web Link
                        </p>
                    </div>
                </a><?php 
					}
				}
				?> --}}
			</div>
			<div class="in-page-advert advert-bottom">
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
                    <div class="in-page-advert side-col journal-sidebar-advert">
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
    
    $(document).ready(function() {
        // $.getScript("http://connect.facebook.net/en_US/all.js# xfbml=1", function () {
        // 	FB.init({ appId: 'xxxxxxxx', status: true, cookie: true, xfbml: true });
        // });
    });
    
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

        getAdvertisements('journal');
        journalMethods.getJournalList();
        // doctorMethods.getCity();
        // doctorMethods.getSpecialization();
        // doctorMethods.getDoctor(1);

        sidebar.getSidebar();
      
    });


    

   

    var journalMethods = {
        getJournalList: function() {
            $.ajax({
                url: "{{ route('web_get_journal_list', ['category' => $category])}}",
                type: 'GET',
                dataType: 'json',
                // data: {
                //     condition: 'brand_is_new_product',
                //     limit: 7
                // },
                success: function(response) {
                    console.log("web_get_journal_list", response);

                    var data = response.data;

                    $('.journal-list').html('');
                    $.each(data, function(index, journal) {
                        // ?= 'https://'.$_SERVER['HTTP_HOST'].'/'.('application/views/images/icons/')?pdf-icon-4.png
                        // ?= 'https://'.$_SERVER['HTTP_HOST'].'/'.('application/views/images/icons/')?>website-icon-11.png
                        var html = '';
                        if (journal.journal_type == 'pdf' || journal.journal_type == 'PDF' ) { 
                            html += '<a class="journal row d-flex align-items-center" target="_blank" href="{{ url('/') }}/storage/images/journal/'+journal.journal_image+'">';
                            html += '<div class="journal-icon d-md-flex d-none">';
                            html += '<img class="img-fluid" src="{{ url('/') }}/images/icons/pdf-icon-4.png">';
                            html += '</div>';
                            html += '<div class="journal-info">';
                            html += '<p class="journal-name">'+journal.journal_title+'</p>';
                            html += '<p class="journal-type">PDF</p>';
                            html += '</div></a>'; 
                            
                        } else if (journal.journal_type == 'link' || journal.journal_type == 'LINK') { 
                            html += '<a class="journal row d-flex align-items-center" target="_blank" href="'+journal.journal_type+'">';
                            html += '<div class="journal-icon d-md-flex d-none">';
                            html += '<img class="img-fluid" src="{{ url('/') }}/images/icons/website-icon-11.png">';
                            html += '</div>';
                            html += '<div class="journal-info">';
                            html += '<p class="journal-name">'+journal.journal_title+'</p>';
                            html += '<p class="journal-type">Web Link</p>';
                            html += '</div></a>';      
                                
                            }
                        
                        $('.journal-list').append(html);

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
                        doctor_image = doctor.doctor_image;
                        console.log("doctor", doctor)

                        var country_state_city = '';
                        if (doctor.country != null) {
                            country_state_city = `
                            <br>
                            Country: ${doctor.country.country_name}
                            State: ${doctor.state.state_name}
                            City: ${doctor.city.city_name}
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

                        if (doctor_image == null) {
                            doctor_image = 'https://mimsbangladesh.com/application/views/images/doctor.png';
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
                                            <p class="doctor-info-title">${doctor.doctor_specialization}</p>
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