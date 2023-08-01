@extends('frontend.layout.main')

@push('title') Brand Detail @endpush


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




@include('frontend.component.search')

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
    margin-top: 30px;">
        </div> --}}
    </div>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="content-section main">
                <div class="brand-details">
                    <h2 class="brand-title generic_name"></h2>
                    <div class="brand-info-table">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="brand-info-title">Generic Name</td>
                                <td>: <span class="generic_name"></span></td>
                            </tr>
                                                            <tr>
                                    <td class="brand-info-title">Drug Class</td>
                                    <td>: <span id="drug_class"></span></td>
                                </tr>
                                                                                            <tr>
                                    <td class="brand-info-title">Safety Remarks</td>
                                    <td>: <span id="safety_remark"></span></td>
                                </tr>
                                                            </tbody>
                        </table>
                    </div>
                    <div class="brand-description">
                                                    <div class="brand-description-point">
                                <p class="brand-description-title">Indication</p>
                                <p class="brand-description-text" id="indication_para"></p>
                            </div>
                                                                                <div class="brand-description-point">
                                <p class="brand-description-title">Dosage &amp; Administration</p>
                                <p class="brand-description-text" id="dosage_administration"></p>
                            </div>
                            													<div class="brand-description-point">
								<p class="brand-description-title">Contraindication &amp; Precaution</p>
								<p class="brand-description-text" id="contraindication_precaution"></p>

							</div>
																										<div class="brand-description-point">
								<p class="brand-description-title">Pharmacology</p>
								<p class="brand-description-text" id="pharmacology"></p>

							</div>
																			                            <div class="brand-description-point">
                                <p class="brand-description-title">Side Effect</p>
                                <p class="brand-description-text" id="side_effect"></p>
                            </div>
                            																		                            <div class="brand-description-point">
                                <p class="brand-description-title">Use in Pregnancy &amp; Lactation</p>
                                <p class="brand-description-text" id="pregnancy_lactation"></p>
                            </div>
                                                </div>
                </div>
            </div>
            <div class="content-section main" style="margin-top: 15px">
                <!-- more jobs -->
                <div class="section-header own-pad" style="margin-bottom: 10px; padding: 24px 30px 16px 30px;">
                    Brand of <span class="generic_name"></span>                </div>
                <div class="brand-generic-table brand-of-generic">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Manufacturer Name</th>
                        </tr>
                        </thead>
                        <tbody class="generic-list">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- pagination -->
            <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination" id="search-generic-pagination" style="display: none;"><li class="page-item active"><a class="page-link" href="#">1</a></li></ul>
            </nav>
            <div class="in-page-advert advert-bottom"></div>
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

        getAdvertisements('generic', {{$id}});
        genericMethod.getDetail({{$id}});
        sidebar.getSidebar();
      
    });


    

   

    var genericMethod = {
        getDetail: function(id) {
            $.ajax({
                url: "{{ url('/')}}/get_generic_detail/"+id,
                type: 'GET',
                dataType: 'json',
                // data: {
                //     condition: 'brand_is_new_product',
                //     limit: 7
                // },
                success: function(response) {
                    console.log("get_generic_detail", response);

                    var data = response.data;
                   
                    // $(".generic_name").html(data.generic_name);
                    $(".generic_name").html(`<a href="{{url('/')}}/generic_detail/${data.generic_id}">${data.generic_name}</a>`);

                    $("#drug_class").html(data.generic_classification);
                    $("#safety_remark").html(data.generic_safety_remark);
                    $("#indication_para").html(data.generic_indication);
                    $("#dosage_administration").html(data.generic_dosage_administration);
                    $("#contraindication_precaution").html(data.generic_contraindication_precaution);
                    $("#pharmacology ").html(data.generic_pharmacology);
                    $("#side_effect").html(data.generic_side_effect);
                    $("#pregnancy_lactation").html(data.generic_pregnancy_lactation);

                    $.each(data.brands, function(index, brand){
                        $(".generic-list").append(`
                            <tr>
                                <td><a href="{{ url('/') }}/brand_information/${brand.brand_id}">${brand.brand_name}</a></td>
                                <td><a href="{{ url('/') }}/manufacturer_detail/${brand.manufacturer.manufacturer_id}">${brand.manufacturer.manufacturer_name}</a></td>
                            </tr>
                        `);
                    })


                    // $("#manufacturer_name").html(data.manufacturer.manufacturer_name);
                    
                    // $("#dosage_form").html(data.dosage_form.dosageform_name);
                    // $("#strength_name").html(data.strength.strength_name);
                    // $("#pack_size").html(data.pack_size.packsize_name);
                    // $("#price").html(data.brand_price + " Tk");
                  
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