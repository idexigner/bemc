@extends('frontend.layout.main')

@push('title') Disclaimer @endpush


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
    <h2>Disclaimer</h2>
</div>

<div class="container">
    <div class="row about-mims">
        <div class="col-md-8">
            <div class="about-content">
                <p class="about-text">
                    Mims Bangladesh online is an index of essential prescribing information designed to be used as a handy reference for routine prescribing of pharmaceutical products available in Bangladesh.
                </p>
                <p class="about-text">
                    Products information published herein are independently prepared by our own professional editorial staffs and are based on product literature and approved official reference sources from the respective pharmaceutical company.
                </p>
                <p class="about-text">
                    Although a great effort has been made in compiling and checking the information contained in this Mims Bangladesh online, to ensure it’s accuracy, the owner, authors, editors and their staffs or agents shall not be held responsible or in any way liable for the continued accuracy of the information or for any errors, omissions or inaccuracies in this publication whether arising from unfortunate, unintentional, bonafide mistakes occurred because of typing or any other means, howsoever, or for any consequences arising therefrom. The inclusion or exclusion of any product does not mean that the publisher advocates or rejects to use either generally or in any particular field or fields.
                </p>
                <p class="about-text">
                    The information contained herein should not be solely relied upon for final treatment decisions.
                </p>
                <p class="about-text">
                    The owner, authors and editors also expressly disclaim any and all liability to any person whosoever in respect of any kind of loss, damage, death, personal injury or other consequences whatsoever, howsoever caused or arising, suffered by any such person by their use of or reliance upon, in any way, the information contained in this online information.
                </p>
                <p class="about-text">
                    Mims Bangladesh online will be updated regularly.
                </p>
                <p class="about-text">
                    Mims Bangladesh online is a controlled online information solely for medical professionals in Bangladesh.
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
                <p class="about-text">
                    Affiliation Nil, PharmaMedica is an independent owner and is not affiliated with any pharmaceutical manufacturer; distributor or professional association.
                </p>
                <p class="about-text">
                    All rights of Mims Bangladesh online are reserved to PharmaMedica. No part of this online information may be reproduced in any language, stored in or introduced into a retrieval system, or transmitted, in any form or by any means (electronic, mechanical, photocopying, recording or otherwise), without the prior written permission of the owner and violation of which are actionable in both Civil & Criminal nature under the existing laws.
                </p>
                <p class="about-text">
                    Advertisements are subject to editorial acceptance and have no influence on editorial content or presentation, PharmaMedica does not directly or indirectly guarantees the quality or efficacy of any product or service described in the advertisements or other material which is commercial in nature.
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