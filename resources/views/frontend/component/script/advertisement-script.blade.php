
                
                <style>
                    #home-product-slider {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                
                    .home-product-slide {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        width: 100%;
                        height: 100%;
                        background-position: center;
                        background-repeat: no-repeat;
                        background-size: cover;
                    }
                </style>
                
                <script>
                    function getAdvertisements(v, id=null){
                
                
                        $("#my_left_r").html(`
                            <div class="col-md-6 col-12">
                                <div class="in-page-advert advert-top-left"></div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="in-page-advert advert-top-right"></div>
                            </div>
                        `);
                        
                        // <a href="https://www.dental-practice.biz/emagazine/dpbangladesh1-1/"> <img src="{{ url('/') }}/images/dantal.jpeg" alt=""></a>

                        $("#sidebar").append(`
                            <div class="row side-bar-mimslearning-title">
                                <!-- special reports -->
                                <div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
                                    <a href="{{ getSiteSetting('sidebar_link') }}"> <img src="{{ url('/') }}/storage/images/sidebar/{{ getSiteSetting('sidebar_image') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="in-page-advert side-col sidebar-advert">
                                    
                                </div>
                            </div>
                            
                        `);
                
                        switch(v){
                            case 'home':
                                advertisementMethods.home();
                            break;
                            case 'doctor':
                                advertisementMethods.page('Doctor');
                            break;
                            case 'herbal':
                                advertisementMethods.page('Herbal Related');
                            break;
                            case 'journal':
                                advertisementMethods.page('Journal');
                            break;
                            case 'job':
                                advertisementMethods.page('Job Circular');
                            break;
                            case 'job_detail':
                                advertisementMethods.page('Job Circular Detail');
                            break;
                            case 'video':
                                advertisementMethods.page('Video Gallery');
                            break;
                            case 'special_report':
                                advertisementMethods.page('Special Report');
                            break;
                            case 'news':
                                advertisementMethods.page('Local News');
                            break;
                            case 'address':
                                advertisementMethods.page('Address');
                            break;
                            case 'brand_info':
                                advertisementMethods.pageWithId('Brand Search Result', id, 'advertisement_brand_id');
                            break;
                            case 'generic':
                                advertisementMethods.pageWithId('Generic Search Result', id, 'advertisement_generic_id');
                            break;
                            case 'manufacturer':
                                advertisementMethods.pageWithId('Manufacturer Search Result', id, 'advertisement_manufacturer_id');
                            break;
                            case 'indication':
                                advertisementMethods.pageWithId('Indication Search Result', id, 'advertisement_indication_id');
                            break;
                            
                
                            default:
                        }
                    }
                
                    var advertisementMethods = {
                
                        home: function(){
                            $.ajax({
                                url: "{{ route('get_home_advertisement')}}",
                                type: 'GET',
                                dataType: 'json',
                            
                                success: function(response) {
                                    console.log("get_home_advertisement-> ", response);
                                    advertisementMethods.slider(response.data.home_product_slider, "#home-product-slider")
                                    advertisementMethods.single(response.data.home_advert_container_top[0], ".home-advert-container-top", 40)
                                    advertisementMethods.custom_home_page_middle(response.data.home_page_middle_side, ".home_page_middle_side")
                                    advertisementMethods.single(response.data.home_advert_container_mid[0], ".home-advert-container-mid")
                
                                    
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
                        page: function(param){
                            $.ajax({
                                url: "{{ route('get_page_advertisement')}}",
                                type: 'GET',
                                dataType: 'json',
                                data: {
                                    position: [param+' Page Sidebar Advertisement', param+' Page Top Left Advertisement', param+' Page Top Right Advertisement', param+' Page Bottom Advertisement'],
                                },
                                success: function(response) {
                                    console.log("get_doctor_advertisement-> ", response);
                                    advertisementMethods.single(response.data.sidebar_advert, ".sidebar-advert")
                                    advertisementMethods.single(response.data.advert_top_left, ".advert-top-left")
                                    advertisementMethods.single(response.data.advert_top_right, ".advert-top-right")
                                    advertisementMethods.single(response.data.advert_bottom, ".advert-bottom")
                
                                    
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
                        pageWithId: function(param, id, condition){
                            $.ajax({
                                url: "{{ route('get_page_id_advertisement')}}",
                                type: 'GET',
                                dataType: 'json',
                                data: {
                                    position: [param+' Page Sidebar Advertisement', param+' Page Top Left Advertisement', param+' Page Top Right Advertisement', param+' Page Bottom Advertisement'],
                                    id: id,
                                    condition: condition
                                },
                                success: function(response) {
                                    console.log("get_doctor_advertisement-> ", response);
                                    advertisementMethods.single(response.data.sidebar_advert, ".sidebar-advert")
                                    advertisementMethods.single(response.data.advert_top_left, ".advert-top-left")
                                    advertisementMethods.single(response.data.advert_top_right, ".advert-top-right")
                                    advertisementMethods.single(response.data.advert_bottom, ".advert-bottom")
                
                                    
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
                        journal: function(){
                            $.ajax({
                                url: "{{ route('get_journal_advertisement')}}",
                                type: 'GET',
                                dataType: 'json',
                            
                                success: function(response) {
                                    console.log("get_journal_advertisement-> ", response);
                                    advertisementMethods.single(response.data.journal_sidebar_advert[0], ".journal-sidebar-advert")
                                    advertisementMethods.single(response.data.journal_advert_top_left[0], ".journal-advert-top-left")
                                    advertisementMethods.single(response.data.journal_advert_top_right[0], ".journal-advert-top-right")
                                    advertisementMethods.single(response.data.journal_advert_bottom[0], ".journal-advert-bottom")
                
                                    
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
                        slider: function(data, target){
                
                            $(target).html('');
                
                            // $.each(data, function(index, adv) {            
                                // var slide = '<div class="m-2 p-2"><a href="' + adv.advertisement_link + '" class="home-product-slide" style="background-image: url({{url('/')}}/storage/images/advertisement/'+adv.advertisement_image.replace(/ /g, '%20')+'); min-height: '+adv.advertisement_position.advertisement_position_height+'px; color: transparent; width: '+($(target).width()/3-20)+'px">..</a></div>';
                                // $(target).append(slide);                       
                            // });    
                
                            // $(target).slick({
                                // slidesToScroll: 1,
                                // slidesToShow: 3,
                                // autoplay: true,
                                // autoplaySpeed: 3000,
                                // infinite: true,
                                // arrows: false,
                                // responsive: [{
                                    // breakpoint: 480,
                                    // settings: {
                                    // slidesToShow: 1,
                                    // }
                                // }]
                            // });
							
							
							$.each(data, function(index, adv) {            
								var minHeight = (window.innerWidth < 480) ? '90px' : '240px';
								var slide = '<div class="m-2 p-2"><a href="' + adv.advertisement_link + '" class="home-product-slide" style="background-image: url({{url('/')}}/storage/images/advertisement/'+adv.advertisement_image.replace(/ /g, '%20')+'); min-height: ' + minHeight + '; color: transparent;"></a></div>';
								$(target).append(slide);                      
							});    

							$(target).slick({
								slidesToScroll: 1,
								slidesToShow: 3,
								autoplay: true,
								autoplaySpeed: 3000,
								infinite: true,
								arrows: false,
								responsive: [{
									breakpoint: 480,
									settings: {
										slidesToShow: 2,
									}
								}]
							});

                
                        },
                        single: function(data, target, mobile_height=0){
                            if(data != null){
								var height = mobile_height;	
								var temp_height = data.advertisement_position.advertisement_position_height;
								
								
								height = (window.innerWidth < 480) ? mobile_height : temp_height;
                                $(target).html('<a href="' + data.advertisement_link + '" class="advert no-outline" style="background-image: url({{url('/')}}/storage/images/advertisement/'+data.advertisement_image.replace(/ /g, '%20')+'); min-height: '+height+'px; background-position: center; background-size: cover; color: transparent; display: flex;">..</a>');
                            }
                
                        },
                        custom_home_page_middle: function(data, target){
                
                            console.log("data", data)
                            $.each(data, function(index, adv) {            
                                $(target).append(`
                                    <div class="col-md-4 col-12">
                                        <div class="content-section">
                                            <div class="important-information-col">
                                                <a href="${adv.advertisement_link}" style="background-image: url({{url('/')}}/storage/images/advertisement/${adv.advertisement_image.replace(/ /g, '%20')}); min-height: ${adv.advertisement_position.advertisement_position_height}px; color: transparent; display:flex; align-items: center; justify-content: center; background-position: center; background-repeat: no-repeat; background-size: cover;">..</a>
                                            </div>
                                        </div>
                                    </div>
                                `);                     
                            });
                
                            
                            
                        }
                    }
                </script>