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
    <h2>Video Gallery</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row" id="my_left_r">
        <div class="col-md-6 col-12">
            <div class="in-page-advert doctor-advert-top-left"></div>
            <div class="in-page-advert doctor-advert-top-right"></div>
        </div>
        <div class="col-md-6 col-12">
            <img src="https://dev.mimsbangladesh.com/application/views/images/logo/Gv2.png" alt="" width="80%px" style="
    padding: 30px;
    background: white;
    margin-top: 30px;
">
        </div>
    </div>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
            
            <div class="doctor-list container" id="videos-list">
                
            </div>
            <!-- pagination -->
            
            <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination" id="news-pagination">
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

<div style="display: none" id="youtubeFullScreenModal" class="fullScreenImage">
    <div style="height: 60px">
        <!--		<div class="fb-share-button" data-href="http://localhost/mims/Video/getAllVideo?id=q-1TAxlkOvg" data-layout="box_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fmims%2FVideo%2FgetAllVideo%3Fid%3Dq-1TAxlkOvg&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>-->
        <a style="float: right; padding: 10px" class="btn-closeView" onclick="frontendCommonMethods.closeYoutubeScreen()" title="Close"><img width="40px" height="40px" src="https://mimsbangladesh.com/application/views/images/icons/close.png"></a>
        <!--		<a style="float: right; padding: 10px" class="btn-closeView" onclick="frontendCommonMethods.facebookShare()" title="Facebook Share"><img width="40px" height="40px" src="-->

        <!--application/views/images/icons/facebook-share.png"></a>-->
    </div>
    <div id="youtube-fullScreen" style="display: none; padding: 0px 50px 50px 50px; height: 100%" class="full-screen-photo-holder"></div>
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

        getAdvertisements('video');
      
        videosMethods.getVideos(1);

        sidebar.getSidebar();
      
    });


    

   

    var videosMethods = {
     
        getVideos: function(page) {

            var data = {};
            data.page = page;
           
            $.ajax({
                url: "{{ route('web_get_videos') }}",
                type: 'GET',
                dataType: 'json',
                data: data,
                
                success: function(response) {


                    console.log("web_get_videos-> ", response)
                    var data = response.data.data;
                    var currentPage = response.current_page;
                    var lastPage = response.last_page;
                    var maxPagesToShow = 5; // maximum number of pages to show at a time
                    var halfMaxPagesToShow = Math.floor(maxPagesToShow / 2); // half of maxPagesToShow rounded down


                    $('#videos-list').html('');
                    $.each(data, function(index, video) {

                        // news_description = news.news_description != null && news.news_description.length > 100 ? news.news_description.substr(0, 100) + ' ...' : news.news_description;

                      
                        $('#videos-list').append(`
                            <div class="row my-2">
                                <div class="col-md-6">
                                    <div class="youtube-video"><img width="100%" height="150" src="{{url('/')}}/storage/images/video/${video.video_image}" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <p style="font-weight: bold;">${video.video_title}</p>
                                    <p style="text-align: center">
                                        <a onclick="frontCommonMethods.youtubeFullScreen('${video.video_link}')"><img style="width: 90px;"
                                                src="https://mimsbangladesh.com/application/views/images/icons/youtube_play_button.png"></a>
                                    </p>
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
                        paginationHtml += '<li class="page-item"><a class="page-link" href="#" onclick="videosMethods.getVideos(' + (currentPage - 1) + ')"><i class="fas fa-angle-double-left"></i></a></li>';
                    } else {
                        paginationHtml += '<li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-angle-double-left"></i></a></li>';
                    }

                    // show page numbers within sliding window
                    for (var i = startPage; i <= endPage; i++) {
                        if (i == currentPage) {
                            paginationHtml += '<li class="page-item active"><a class="page-link" href="#">' + i + '</a></li>';
                        } else {
                            paginationHtml += '<li class="page-item"><a class="page-link" href="#" onclick="videosMethods.getVideos(' + i + ')">' + i + '</a></li>';
                        }
                    }

                    // show "Next" button if not on last page
                    if (currentPage < lastPage) {
                        paginationHtml += '<li class="page-item"><a class="page-link" href="#" onclick="videosMethods.getVideos(' + (currentPage + 1) + ')"><i class="fas fa-angle-double-right"></i></a></li>';
                    } else {
                        paginationHtml += '<li class="page-item disabled"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>';
                    }

                    console.log("paginationHtml->", paginationHtml);
                    $('#news-pagination').html(paginationHtml);



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