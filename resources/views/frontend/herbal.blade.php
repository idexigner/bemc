@extends('frontend.layout.main')

@push('title') Herbal @endpush


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
    <h2>Herbal</h2>
</div>

<div class="container">
    <div class="row" id="my_left_r">
        {{-- <div class="col-md-6 col-12">
            <div class="in-page-advert herbal-advert-top-left"></div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert herbal-advert-top-right"></div>
        </div> --}}
      
    </div>
</div>



<div class="container">
	<div class="row">
		<div class="col-md-8 col-12">
			<div class="content-section main">
				<div class="section-header own-pad" style="margin-bottom: 10px; padding: 24px 30px 16px 30px;">
					Herbal
				</div>
				<div class="brand-generic-table">
					{{-- <table class="table">
						<thead>
						<tr>
							<th scope="col" style="width: 150px;">Brand Name</th>
							<th scope="col">Generic</th>
							<th scope="col">Dosage Form</th>
							<th scope="col">Strength</th>
							<th scope="col">Price</th>
						</tr>
						</thead>
						<tbody class="drug-list">
						{{ <?php
						foreach ($AllBrands AS $brand) {
							echo '<tr>';
							echo '<td><a href="'.site_url('Brand/showBrandDetail').'?BrandID='.$brand['ID'].'">'.$brand['Name'].'</a></td>';
							echo '<td><a href="'.site_url('Brand/searchBrandInformation?Type=generic&ProductType=2&Value=').$brand['GenericName'].'">'.$brand['GenericName'].'</a></td>';
							echo '<td>'.$brand['DosageForm'].'</td>';
							echo '<td>'.$brand['StrengthName'].'</td>';
							echo '<td>'.$brand['PriceInBDT'].' Tk</td>';
							echo '</tr>';
						}
						?> }}
						</tbody>
					</table>  table-bordered table-striped --}}
                    <table id="table-standard" class="table">
                       
                    </table>
				</div>
			</div>
			<!-- pagination -->
			{{-- <nav class="mims-pagination" style="margin-top: 36px;">
				<ul class="pagination" id="search-herbal-pagination"></ul>
			</nav> --}}
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
                    <div class="in-page-advert side-col herbal-sidebar-advert">
                        <img src="{{ url('/') }}/application/views/images/add-4.png" alt="">
                    </div>
                </div> --}}

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
    //     responsive: [{getAD
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


<!-- DataTables  & Plugins -->
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

        getAdvertisements('herbal');
        herbalMethods.getHerbal();
        // doctorMethods.getCountry();
        // doctorMethods.getCity();
        // doctorMethods.getSpecialization();
        // doctorMethods.getDoctor(1);

        sidebar.getSidebar();
      
    });


    

   

    var herbalMethods = {
        getHerbal: function() {

            var table = $('#table-standard');
            var tableName = '#table-standard';
            var ajaxUrl = "{{ route('web_get_herbal_list') }}";


            var columnsArray = [                  
                    // { data: 'brand_name', name: 'brand_name', title: 'Brand Name'},
                    {
                        data: null,
                        title: 'Brand Name',
                        render: function(data, type, row) {
                            return '<a href="{{ url('/')}}/brand_detail/'+row.brand_id+'"  >'+row.brand_name+'</a> ';
                        },
                        orderable: false,
                        searchable: false
                    },
                    // { data: 'generic.generic_name', name: 'generic.generic_name', title: 'Generic'},
                    {
                        data: null,
                        title: 'Generic',
                        render: function(data, type, row) {
                            return '<a href="{{ url('/')}}/generic_detail/'+row.generic.generic_id+'" class="edit" >'+row.generic.generic_name+'</a> ';
                        },
                        orderable: false,
                        searchable: false
                    },
                    { data: 'dosage_form.dosageform_name', name: 'dosage_form.dosageform_name', title: 'Dosage Form'},
                    { data: 'strength.strength_name', name: 'strength.strength_name', title: 'Strength'},
                    { data: 'brand_price', name: 'brand_price', title: 'Price'},
                    
                ];  
                
            // var table = $(tableName).DataTable({
            //     processing: true,
            //     serverSide: true,
            //     ajax: ajaxUrl,
            //     columns: columnsArray,
            //     "order": [],
            //     "language": {
            //         "search": "Search Records:",
            //         "lengthMenu": "Show _MENU_ Records",
            //         "zeroRecords": "No matching records found",
            //         "info": "Showing _START_ to _END_ of _TOTAL_ records",
            //         "infoEmpty": "Showing 0 to 0 of 0 records",
            //         "infoFiltered": "(filtered from _MAX_ total records)",
            //         "paginate": {
            //         "first": "First",
            //         "last": "Last",
            //         "next": "Next",
            //         "previous": "Previous"
            //         }
            //     },
            //     "pageLength": 10
            // });


            var table = $(tableName).DataTable({
                processing: true,
                serverSide: true,
                ajax: ajaxUrl,
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

            // var table = $(tableName).DataTable({
            //     processing: true,
            //     serverSide: true,
            //     ajax: ajaxUrl,
            //     columns: columnsArray,
            //     order: [],
            //     language: {
            //         search: "Search Records:",
            //         lengthMenu: "Show _MENU_ Records",
            //         zeroRecords: "No matching records found",
            //         info: "Showing _START_ to _END_ of _TOTAL_ records",
            //         infoEmpty: "Showing 0 to 0 of 0 records",
            //         infoFiltered: "(filtered from _MAX_ total records)",
            //         paginate: {
            //             first: "<<",
            //             last: ">>",
            //             next: ">",
            //             previous: "<"
            //         }
            //     },
            //     pageLength: 10,
            //     // pagingType: "full_numbers",
            //     dom: '<"mims-pagination" <"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>>t'
            // });
            
        },
      

    }

   
</script>

@endpush