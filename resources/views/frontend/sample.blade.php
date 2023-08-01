@extends('frontend.layout.main')

@push('title') Home @endpush


@section('main-section')










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



@push('js-link')

<script>

    $(document).ready(function() {


        // drugUpdate.getNewProduct();
        // drugUpdate.getNewBrand();
        // drugUpdate.getNewPresentation();
        // homeMethods.getDoctor();
        // homeMethods.getSpecialReport();
        // homeMethods.getMedicalJob();
        // homeMethods.getPharmaJob();
        // homeMethods.getNews();
        // homeMethods.getVideo();
    });


    var drugUpdate = {
        getNewProduct: function(){
            $.ajax({
                url: "{{ route('web_get_brand')}}",
                type: 'GET',
                dataType: 'json',
                data: {
                    condition: 'brand_is_new_product',
                    limit: 7
                },
                success: function(response) {
                    // console.log(response);
                

                    $('.new-product-information').html('<h4>New Products</h4>');
                    $.each(response.data, function(index, brand) {

                        $('.new-product-information').append(
                            `<a href='${brand.brand_id}'>${brand.brand_name.toUpperCase()}</a>`
                        );
                    });
                    $('.new-product-information').append(`<a href='showall'>See More</a>`);
                    
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
        getNewBrand: function(){
            $.ajax({
                url: "{{ route('web_get_brand')}}",
                type: 'GET',
                dataType: 'json',
                data: {
                    condition: 'brand_is_new_brand',
                    limit: 7
                },
                success: function(response) {
                    // console.log(response);
                

                    $('.new-brand-information').html('<h4>New Brands</h4>');
                    $.each(response.data, function(index, brand) {

                        $('.new-brand-information').append(
                            `<a href='${brand.brand_id}'>${brand.brand_name.toUpperCase()}</a>`
                        );
                    });
                    $('.new-brand-information').append(`<a href='showall'>See More</a>`);
                    
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
        getNewPresentation: function(){
            $.ajax({
                url: "{{ route('web_get_brand')}}",
                type: 'GET',
                dataType: 'json',
                data: {
                    condition: 'brand_is_new_presentation',
                    limit: 7
                },
                success: function(response) {
                    // console.log(response);
                

                    $('.new-presentation-information').html('<h4>New Products</h4>');
                    $.each(response.data, function(index, brand) {

                        $('.new-presentation-information').append(
                            `<a href='${brand.brand_id}'>${brand.brand_name.toUpperCase()}</a>`
                        );
                    });
                    $('.new-presentation-information').append(`<a href='showall'>See More</a>`);
                    
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

    var homeMethods = {
        getDoctor: function(){
            $.ajax({
                url: "{{ route('web_get_home_doctor')}}",
                type: 'GET',
                dataType: 'json',
                // data: {
                //     condition: 'brand_is_new_product',
                //     limit: 7
                // },
                success: function(response) {
                    // console.log(response);
                
                    $.each(response.data, function(index, doctor) {

                        $('.doctor_row').append(`
                            <div class="col-md-4">
                                <div class="single-person">
                                    <div class="person-image">
                                        <span class="icon">
                                            <i class="fa-solid fa-user-doctor"></i>
                                        </span>
                                    </div>
                                    <div class="person-info">
                                        <h3 class="full-name"> <a href="index.php/Doctor/getAllDoctorInformation">${doctor.doctor_name} </a>
                                        </h3>
                                        <span class="speciality"> ${doctor.doctor_specialization} </span>
                                    </div>
                                </div>
                            </div>
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
        getSpecialReport:function(){
            $.ajax({
                url: "{{ route('web_get_home_special_report')}}",
                type: 'GET',
                dataType: 'json',
                // data: {
                //     condition: 'brand_is_new_product',
                //     limit: 7
                // },
                success: function(response) {
                    console.log("get_home_special_report-> ", response);
                    $('#home-special-report-slider').html('');
                    $.each(response.data, function(index, specialReport) {
                        special_report_title = specialReport.special_report_title.length > 65 ? specialReport.special_report_title.substr(0, 65) + ' ...' : specialReport.special_report_title;

                        $('#home-special-report-slider').append(`
                            <div class="home-special-report-slide">
                                <img src="{{ url('/') }}/storage/images/special_report/${specialReport.special_report_image}"  alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">
                                <p class="home-special-report-slide-title"><a href="${specialReport.special_report_id}">${specialReport.special_report_title}</a></p>
                            </div>
                        `);
                       
                    });

                    $('#home-special-report-slider').slick({
                        slidesToScroll: 1,
                        slidesToShow: 4,
                        autoplay: false,
                        autoplaySpeed: 1000,
                        infinite: false,
                        arrows: false,
                        responsive: [
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 4,
                                    arrows: false,
                                }
                            }
                        ]
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
        getMedicalJob:function(){
            $.ajax({
                url: "{{ route('web_get_home_job')}}",
                type: 'GET',
                dataType: 'json',
                data: {
                    category: 'Medical'
                },
                success: function(response) {
                    console.log("get_home_job-> ", response);
                    $('#medical_job').html('');
                    $.each(response.data, function(index, job) {

                        $('#medical_job').append(`
                            <a href="#">
                                <div class="media-list-left-image">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{ url('/') }}/storage/images/job/${job.job_organization_logo}" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <span class="bahuthard">New</span>
                                            <h4 class="media-heading">
                                                ${job.job_title}
                                            </h4>
                                            <p>
                                                ${job.job_organization}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
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
                    category: 'Pharma'
                },
                success: function(response) {
                    console.log("get_home_job-> ", response);
                    $('#pharma_job').html('');
                    $.each(response.data, function(index, job) {

                        $('#pharma_job').append(`
                            <a href="#">
                                <div class="media-list-left-image">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{ url('/') }}/storage/images/job/${job.job_organization_logo}" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <span class="bahuthard">New</span>
                                            <h4 class="media-heading">
                                                ${job.job_title}
                                            </h4>
                                            <p>
                                                ${job.job_organization}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
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
        getNews:function(){
            $.ajax({
                url: "{{ route('web_get_home_news')}}",
                type: 'GET',
                dataType: 'json',
                // data: {
                //     category: 'Pharma'
                // },
                success: function(response) {
                    console.log("web_get_home_news-> ", response);
                    $('.pharma_news').html('');
                    $.each(response.data, function(index, news) {
                        news_description = news.news_description.length > 50 ? news.news_description.substr(0, 50) + ' ...' : news.news_description;

                        $('.pharma_news').append(`
                            <a href="#">
                                <div class="media-list-left-image">
                                    <div class="media">
                                        <div class="media-left">

                                            <img src="{{ url('/') }}/storage/images/news/${news.news_image}" class="media-object">

                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                ${news.news_title}
                                            </h4>
                                            <p>
                                                ${news_description}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
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
        getVideo:function(){
            $.ajax({
                url: "{{ route('web_get_home_video')}}",
                type: 'GET',
                dataType: 'json',
                // data: {
                //     category: 'Pharma'
                // },
                success: function(response) {
                    console.log("web_get_home_video-> ", response);
                    $('#home-youtube-video-slider').html('');
                    $.each(response.data, function(index, video) {
              
                        $('#home-youtube-video-slider').append(`
                            <div class="youtube-video">
                                <a href="#" onclick="frontCommonMethods.youtubeFullScreen('${video.video_link}')" tabindex="0">
                                    <div class="youtube-video-wrapper" style="background-image: url(http://127.0.0.1:8000/storage/images/news/d8935b1118e631102d0971fc79d6379a.jpg);">
                                        <img src="http://127.0.0.1:8000/storage/images/news/d8935b1118e631102d0971fc79d6379a.jpg" alt="Video thumbnail">
                                    </div>
                                </a>
                                <h4 class="mt-3">
                                    <a href="#" onclick="frontCommonMethods.youtubeFullScreen('${video.video_link}')" tabindex="0">
                                        ${video.video_title}
                                    </a>
                                </h4>
                            </div>
                        `);
                       
                    });

                    $('#home-youtube-video-slider').slick({
                        slidesToScroll: 1,
                        slidesToShow: 4,
                        autoplay: false,
                        autoplaySpeed: 1000,
                        infinite: false,
                        arrows: true,
                        responsive: [
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 4,
                                    arrows: false,
                                }
                            }
                        ]
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
        }

        
    }

</script>

@endpush
