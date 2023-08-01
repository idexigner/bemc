@extends('frontend.layout.main')

@push('title') About @endpush


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
    <h2>About us</h2>
</div>

<div class="container">
    <div class="row about-mims">
        <div class="col-md-8">
            <div class="about-content">
                <h4 class="about-header">
                    Mims Print Publication
                </h4>
                <p class="about-text">
                    First published in 1999, Mims Bangladesh has already grown to be the essential prescribing and clinical reference for general medical practice.
                </p>
                <p class="about-text">
                    Mims Bangladesh (Mims) – is the medical publishing division of PharmaMedica – is Bangladesh’s leading publisher of reference information to the medical profession.
                </p>
                <p class="about-text">
                    Our audience includes GPs, Specialists, Pharmacists, Pharmacy Assistants and other Health Care Professionals.
                </p>
                <p class="about-text">
                    Mims produces a host of publications in the print and digital media. The range of Mims medicine resources has since expanded progressively to support prescribers and dispensers of medicines across every sector of the healthcare system across multiple platforms.
                </p>
                <p class="about-text">
                    Core products in the print medium include Mims Bi-annual – widely regarded as the doctor’s most trusted prescription tool – consisting of abbreviated package insert information on most prescription medicines available in Bangladesh. The accompanying website www.mimsbangladesh.com is the country’s leading online resources for locally prescribed generic medicines. It has been designed as an essential information tool in a physician’s daily workflow, Mims has grown from a desk top drug directory delivering the most up to date and complete drug information, to a new generation drug and medical reference tool available at every point of care.
                </p>
                <p class="about-text">
                    In the Herbal, Ayurvedic and Yuonani we publish Mims Natural Medicine, consisting of abbreviated package insert information on most herbal medicines available in Bangladesh.
                </p>
                <p class="about-text">
                    With over 20 years’ experience, Mims is Bangladesh leading publisher of medical reference information for Health Care Professionals.
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="about-img">
                <img src="{{ url('/') }}/images/mims-aboutus2.png" alt="">
            </div>
        </div>
        <div class="col-md-12">
            <div class="about-content">
                <h4 class="about-header">
                    Receiving Mims
                </h4>
                <p class="about-text">
                    Mims is published in print half yearly, in June and December of each year. Print copies are sent free of charge to Bangladesh-based GPs through our pharmaceutical companies.
                </p>
                <p class="about-text">
                    If you have already registered and need to change your mailing address, please email <a href = "mailto: rxmimsbd@gmail.com">rxmimsbd@gmail.com</a> or <a href = "mailto: mims@citechco.net">mims@citechco.net</a> including your name, updated address and contact number.
                </p>
                <p class="about-text">
                    Other relevant Health Care Professionals may subscribe to Mims by emailing <a href = "mailto: rxmimsbd@gmail.com">rxmimsbd@gmail.com</a> or by completing the Mims subscription form online.
                </p>
                <br>
                <h4 class="about-header">
                    Mims Online
                </h4>
                <p class="about-text">
                    Mims is one of the most up-to-date prescribing references for Health Care Professionals. Mims updates constantly in online, with hundreds of changes incorporated every month including the addition of new drugs and formulations and the removal of products that are no longer available.
                </p>
                <p class="about-text">
                    Look inside an issue.
                </p>
                <br>
                <h4 class="about-header">
                    Advertising information
                </h4>
                <p class="about-text">
                    Advertisement enquiries can be directed to our advertising team, details of which can be found on our Mims advertising information page.
                </p>
                <h4 class="about-header">
                    Insight from Mims
                </h4>
                <p class="about-text">
                    Mims regularly conducts research into the delivery of education and clinical information in the primary care sector.
                </p>
            </div>
        </div>
    </div>
</div>






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

       


        // journalMethods.getJournalList();
        // // doctorMethods.getCity();
        // // doctorMethods.getSpecialization();
        // // doctorMethods.getDoctor(1);

        // sidebar.getSidebar();
      
    });


    

   

   

   
</script>

@endpush