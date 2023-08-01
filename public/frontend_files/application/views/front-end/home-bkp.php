<!-- banner -->
<!-- Study Club -->
<!-- Brand Detail -->
<!-- Search click event -->
<div class="container-fluid text-scroller">
	<div class="simple-marquee-container">
		<div class="marquee-sibling"><?php echo $ScrollData['scroll_title'];?></div>
		<marquee width="100%" direction="left" height="100%" style="color: #ffffff; padding-top: 10px;">
			<?php echo $ScrollData['scroller_text'];?>
		</marquee>
	</div>
</div>

<div class="banner d-md-flex d-none">
    <div class="search-wrapper">
        <ul class="search-tabs group">
            <li class="brand active"><a onclick="drugObject.changeSearchOption('brand')" class="search_option_type search_by_brand">Brand</a></li>
            <li class="generic"><a onclick="drugObject.changeSearchOption('generic')" class="search_option_type search_by_generic">Generic</a></li>
            <li class="indication"><a onclick="drugObject.changeSearchOption('indication')" class="search_option_type search_by_indication">Indication</a></li>
            <li class="manufacture"><a onclick="drugObject.changeSearchOption('manufacturer')" class="search_option_type search_by_manufacturer">Manufacturer</a></li>
        </ul>
        <div class="search">
            <input class="search-bar no-outline" type="text" id="searchDrugOption">
            <button class="search-btn no-outline" onclick="drugObject.searchBrandInformation()" id="searchInformation"><img src="<?php echo base_url().'application/views/';?>images/icons/magnifying-glass.svg" class="search-icon" alt=""></button>
        </div>
        <div class="alphabets">
            <a onclick="drugObject.searchAlphabetically('a')" class="alphabet-link">A</a>
            <a onclick="drugObject.searchAlphabetically('b')" class="alphabet-link">B</a>
            <a onclick="drugObject.searchAlphabetically('c')" class="alphabet-link">C</a>
            <a onclick="drugObject.searchAlphabetically('d')" class="alphabet-link">D</a>
            <a onclick="drugObject.searchAlphabetically('e')" class="alphabet-link">E</a>
            <a onclick="drugObject.searchAlphabetically('f')" class="alphabet-link">F</a>
            <a onclick="drugObject.searchAlphabetically('g')" class="alphabet-link">G</a>
            <a onclick="drugObject.searchAlphabetically('h')" class="alphabet-link">H</a>
            <a onclick="drugObject.searchAlphabetically('i')" class="alphabet-link">I</a>
            <a onclick="drugObject.searchAlphabetically('j')" class="alphabet-link">J</a>
            <a onclick="drugObject.searchAlphabetically('k')" class="alphabet-link">K</a>
            <a onclick="drugObject.searchAlphabetically('l')" class="alphabet-link">L</a>
            <a onclick="drugObject.searchAlphabetically('m')" class="alphabet-link">M</a>
            <a onclick="drugObject.searchAlphabetically('n')" class="alphabet-link">N</a>
            <a onclick="drugObject.searchAlphabetically('o')" class="alphabet-link">O</a>
            <a onclick="drugObject.searchAlphabetically('p')" class="alphabet-link">P</a>
            <a onclick="drugObject.searchAlphabetically('q')" class="alphabet-link">Q</a>
            <a onclick="drugObject.searchAlphabetically('r')" class="alphabet-link">R</a>
            <a onclick="drugObject.searchAlphabetically('s')" class="alphabet-link">S</a>
            <a onclick="drugObject.searchAlphabetically('t')" class="alphabet-link">T</a>
            <a onclick="drugObject.searchAlphabetically('u')" class="alphabet-link">U</a>
            <a onclick="drugObject.searchAlphabetically('v')" class="alphabet-link">V</a>
            <a onclick="drugObject.searchAlphabetically('w')" class="alphabet-link">W</a>
            <a onclick="drugObject.searchAlphabetically('x')" class="alphabet-link">X</a>
            <a onclick="drugObject.searchAlphabetically('y')" class="alphabet-link">Y</a>
            <a onclick="drugObject.searchAlphabetically('z')" class="alphabet-link">Z</a>
        </div>
    </div>
</div>

<!-- home product slider -->
<div class="home-product-slider-container container">
    <div class="home-product-slider-wrapper">
        <div id="home-product-slider"></div>
    </div>
</div>

<!-- home advert -->
<div class="container advert-container home-advert-container1 home-advert-container-top"></div>

<!-- content -->
<div class="container">
    <div class="row">
        <!-- drug update -->
        <div class="col-md-8 col-12">
            <div class="content-section">
                <div class="section-header drug-update-header">
                    <span><img src="<?php echo base_url().'application/views/';?>images/icons/medicine.svg" alt="*"></span>Drug Update
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 section-col new-product-information" style="padding-left: 5px; padding-right: 5px"></div>
                        <div class="col-md-4 section-col new-brand-information" style="padding-left: 5px; padding-right: 5px"></div>
                        <div class="col-md-4 section-col new-presentation-information" style="padding-left: 5px; padding-right: 5px"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- star product -->
        <div class="col-md-4 col-12">
            <div class="star-product" id="highlighted-product">

            </div>
        </div>
    </div>
</div>
<!-- <div class="home-mimslearning-slider-container container">
	<div class="home-mimslearning-slider-wrapper content-section">
		<div class="section-header" style="margin-bottom: 24px;">
			<span><img src="<?php //echo base_url().'application/views/';?>images/icons/mims-learning.svg" alt="*"></span>Learning Modules from MIMS Learning, UK Medical Education Provider
			<a class="section-header-view-all-btn no-outline" href="<?php //echo site_url('MiMSLearning/getAllActiveMiMSLearningInformation')?>">See All Modules</a>
		</div>
		<div class="home-mimslearning-list"></div>
	</div>
</div> -->

<!-- special reports slider -->
<div class="home-special-report-slider-container container">
	<div class="home-special-report-slider-wrapper content-section">
		<div class="section-header" style="margin-bottom: 24px;">
			<span><img src="<?php echo base_url().'application/views/';?>images/icons/briefcase.svg" alt="*"></span>Special Reports
			<a class="section-header-view-all-btn no-outline" href="<?php echo site_url('SpecialReports/getAllLocalSpecialReports')?>">See All Special Reports</a>
		</div>
		<div id="home-special-report-slider" class="home-special-report-list"></div>
	</div>
</div>

<!-- special reports slider -->
<!-- <div class="pharmatimes-news-feeds container">
	<div class="" style="background-color: var(--section-bg); padding: 24px; margin-top: 30px; border-radius: 4px; box-shadow: var(--section-box-shadow);">
		<div class="section-header" style="margin-bottom: 24px;">
			<span><img src="<?php //echo base_url().'application/views/';?>images/rss-logo.png" alt="*"></span> RSS feeds</div> -->
		<!-- start sw-rss-feed code -->
		<!-- <script type="text/javascript">
            rssfeed_url = new Array();
            rssfeed_url[0]="https://rssfeeds.webmd.com/rss/rss.aspx?RSSSource=RSS_PUBLIC";
			rssfeed_url[1]="http://www.pharmatimes.com/rss/news_rss.rss";
			rssfeed_url[2]="https://pmj.bmj.com/rss/recent.xml";
			rssfeed_url[3]="https://pmj.bmj.com/rss/current.xml";
			rssfeed_url[4]="https://pmj.bmj.com/rss/ahead.xml";
			rssfeed_url[5]="https://pmj.bmj.com/rss/mfr.xml";
			rssfeed_frame_width="1060";
            rssfeed_frame_height="430";
            rssfeed_scroll="on";
            rssfeed_scroll_step="6";
            rssfeed_scroll_bar="off";
            rssfeed_target="_blank";
            rssfeed_font_size="12";
            rssfeed_font_face="";
            rssfeed_border="on";
            rssfeed_css_url="<?php echo base_url();?>application/views/css/rss-feed.css";
            rssfeed_title="off";
            rssfeed_title_name="";
            rssfeed_title_bgcolor="#3366ff";
            rssfeed_title_color="#fff";
            rssfeed_title_bgimage="";
            rssfeed_footer="off";
            rssfeed_footer_name="rss feed";
            rssfeed_footer_bgcolor="#fff";
            rssfeed_footer_color="#333";
            rssfeed_footer_bgimage="";
            rssfeed_item_title_length="50";
            rssfeed_item_title_color="#666";
            rssfeed_item_bgcolor="#fff";
            rssfeed_item_bgimage="";
            rssfeed_item_border_bottom="on";
            rssfeed_item_source_icon="off";
            rssfeed_item_date="on";
            rssfeed_item_description="on";
            rssfeed_item_description_length="120";
            rssfeed_item_description_color="#666";
            rssfeed_item_description_link_color="#333";
            rssfeed_item_description_tag="on";
            rssfeed_no_items="0";
            rssfeed_cache = "3eebe78ba6516f9f22ca2f864598b0d4";
		</script>
		<script type="text/javascript" src="<?php //echo base_url();?>application/views/js/rss-feed.js"></script> -->
	<!-- </div>
</div> -->

<!-- home advert -->    

<div class="container advert-container home-advert-container2 home-advert-container-mid" style="padding-top: 30px;"></div>
<!-- MiMS Learning slider -->
<!-- content -->
<div class="container">
	<div class="row">
		<!-- job circular -->
		<div class="col-md-4 col-12">
			<div class="content-section" style="padding: 0; max-height: none;">
				<div class="section-header own-pad" style="margin-bottom: 16px;">
					<span><img src="<?php echo base_url().'application/views/';?>images/icons/briefcase.svg" alt="*"></span>Job Circular
					<a class="section-header-view-all-btn no-outline" href="<?php echo site_url('Job/getAllJobInformation')?>">See All jobs</a>
				</div>
				<div class="section-tab own-pad">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#pharmaTab" role="tab" aria-controls="pharmaTab" aria-selected="false">Pharma</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#medicalTab" role="tab" aria-controls="medicalTab" aria-selected="true">Medical</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade" id="pharmaTab" role="tabpanel" aria-labelledby="pharma-tab">
							<div class="home-job-circular-list"></div>
						</div>
						<div class="tab-pane fade show active" id="medicalTab" role="tabpanel" aria-labelledby="medical-tab">
							<div class="home-job-circular-list"></div>
						</div>
					</div>
				</div>
				<!-- <div class="container home-job-circular-list"></div> -->
			</div>
		</div>
		<!-- local news -->
		<div class="col-md-4 col-12">
			<div class="content-section" style="padding: 0 0 24px 0; max-height: none;">
				<div class="section-header own-pad" style="margin-bottom: 16px;">
					<span><img src="<?php echo base_url().'application/views/';?>images/icons/newspaper.svg" alt="*"></span>Pharma News
					<a class="section-header-view-all-btn no-outline" href="<?php echo site_url('News/getAllLocalNews')?>">See All News</a>
				</div>
				<div class="container home-local-news-list"></div>
			</div>
		</div>
        <div class="col-md-4 col-12" style="height: fit-content;">
            <div class="content-section min-height">
                <div class="section-header own-pad" style="margin-bottom: 24px;">
                    <span><img src="<?php echo base_url().'application/views/';?>images/icons/briefcase.svg" alt="*"></span>Important Information
                </div>
                <ul class="address-list home-address-list"></ul>
            </div>
        </div>
	</div>
    <!-- special reports slider -->
    
    <div class="row home-special-report-slider-container container">
        <div class="home-special-report-slider-wrapper content-section">
            <div class="section-header" style="margin-bottom: 24px;">
                <span><img src="<?php echo base_url().'application/views/';?>images/icons/videoclip.svg" alt="*"></span>Video Gallery
                <a class="section-header-view-all-btn no-outline" href="<?php echo site_url('Video/getAllVideo')?>">See All Videos</a>
            </div>
            <!--<div id="home-youtube-slider" class="home-youtube-list"></div>-->
            
            <div class="slider">
	  	      <div class="youtube-video">
	  	          <img src="https://i.ytimg.com/vi/sR_ENFxSPPw/hqdefault.jpg">
	  	          <h4> Dr. Shahnaz Perveen NSW, Sydney, Australia. Topic : Diabetics </h4>
	  	      </div>
	  	      <div class="youtube-video"><img src="https://i.ytimg.com/vi/sR_ENFxSPPw/hqdefault.jpg">
	  	        <h4> Dr. Shahnaz Perveen NSW, Sydney, Australia. Topic : Diabetics </h4>
	  	      </div>
	  	      <div class="youtube-video"><img src="https://i.ytimg.com/vi/sR_ENFxSPPw/hqdefault.jpg">
	  	        <h4> Dr. Shahnaz Perveen NSW, Sydney, Australia. Topic : Diabetics </h4>
	  	      </div>
	  	      <div class="youtube-video"><img src="https://i.ytimg.com/vi/sR_ENFxSPPw/hqdefault.jpg">
	  	        <h4> Dr. Shahnaz Perveen NSW, Sydney, Australia. Topic : Diabetics </h4>
	  	      </div>
	  	      <div class="youtube-video"><img src="https://i.ytimg.com/vi/sR_ENFxSPPw/hqdefault.jpg">
	  	        <h4> Dr. Shahnaz Perveen NSW, Sydney, Australia. Topic : Diabetics </h4>
	  	      </div>
	  	      <div class="youtube-video"><img src="https://i.ytimg.com/vi/sR_ENFxSPPw/hqdefault.jpg">
	  	        <h4> Dr. Shahnaz Perveen NSW, Sydney, Australia. Topic : Diabetics </h4>
	  	      </div>
	  	      <div class="youtube-video"><img src="https://i.ytimg.com/vi/sR_ENFxSPPw/hqdefault.jpg">
	  	        <h4> Dr. Shahnaz Perveen NSW, Sydney, Australia. Topic : Diabetics </h4>
	  	      </div>
	  	      
	        </div>
        </div>
    </div>
    <div class="row">
        <!-- international health -->
        <!-- <div class="col-md-8 col-12" style="height: fit-content;">
            <div class="content-section" style="padding: 0; max-height: none;">
                <div class="section-header own-pad" style="margin-bottom: 16px;">
                    <span><img src="<?php //echo base_url().'application/views/';?>images/icons/briefcase.svg" alt="*"></span>Study Club
                    <a class="section-header-view-all-btn no-outline" href="<?php //echo site_url('InternationalHealth/getAllInternationalHealth')?>">See All Study Club</a>
                </div>
                <div id="internationalHealthList" class="container"></div>
            </div>
        </div> -->
        <!-- important addresses -->
        
    </div>
</div>


<!-- dev@ -->
<!-- bottom quote section -->
<!-- <div class="bottom-quote-section container home-bottom-quote-section">
    <div class="row">
        <div class="col-md-4 col-12 quote">
            <img src="<?php echo base_url().'application/views/';?>images/h-1.png" alt="">
        </div>
        <div class="col-md-4 col-12 quote">
            <img src="<?php //echo base_url().'application/views/';?>images/visitor.jpg" alt="">
            <div class="visitor">
                <p>visitor</p>
                <p class="visitor-count"></p>
            </div> 
        </div>
        <div class="col-md-4 col-12 quote">
            <img src="<?php //echo base_url().'application/views/';?>images/H-3.png" alt="">
        </div>
    </div>
</div> -->
<div style="display: none" id="youtubeFullScreenModal" class="fullScreenImage">
	<div style="height: 60px">
<!--		<div class="fb-share-button" data-href="http://localhost/mims/Video/getAllVideo?id=q-1TAxlkOvg" data-layout="box_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fmims%2FVideo%2FgetAllVideo%3Fid%3Dq-1TAxlkOvg&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>-->
		<a style="float: right; padding: 10px" class="btn-closeView" onclick="frontendCommonMethods.closeYoutubeScreen()" title="Close"><img width="40px" height="40px" src="<?php echo base_url()?>application/views/images/icons/close.png"></a>
<!--		<a style="float: right; padding: 10px" class="btn-closeView" onclick="frontendCommonMethods.facebookShare()" title="Facebook Share"><img width="40px" height="40px" src="--><?php //echo base_url()?><!--application/views/images/icons/facebook-share.png"></a>-->
	</div>
	<div id="youtube-fullScreen" style="display: none; padding: 0px 50px 50px 50px; height: 100%" class="full-screen-photo-holder"></div>
</div>
<script>
    $('.banner').css('background-image', '<?php echo base_url().'application/views/';?>images/banner-bg.jpg');
    $('.slick-prev.slick-arrow:before').css('background-image', '<?php echo base_url().'application/views/';?>images/icons/left-arrow-white.png');
    $('.slick-next.slick-arrow:before').css('background-image', '<?php echo base_url().'application/views/';?>images/icons/right-arrow-white.png');
    $('.slick-prev.slick-arrow.slick-disabled:before').css('background-image', '<?php echo base_url().'application/views/';?>images/icons/left-arrow-white.png');
    $('.slick-next.slick-arrow.slick-disabled:before').css('background-image', '<?php echo base_url().'application/views/';?>images/icons/right-arrow-white.png');
    frontendCommonMethods.getAdvertisement(['home-product-slider'], 3);
    frontendCommonMethods.getCommonAdvertisement(['home-advert-container-top', 'home-advert-container-mid']);
    drugObject.productType = <?php echo REGULAR_PRODUCT;?>;
    drugObject.getSpecialReports();
    // drugObject.getMimsLearning();
    drugObject.getJobCirculars();
    drugObject.getLocalNews();
    drugObject.getInternationalHealth();
    drugObject.getImportantAddress();
    drugObject.getNewBrands(0);
    drugObject.getNewPresentations(0);
    drugObject.getNewProducts(0);
    drugObject.getHighlightedBrands();
    frontendCommonMethods.getNumberOfVisitor();
    drugObject.getAllDrugInfoForAutoComplete('brand');
    frontendCommonMethods.mainMenuActivation('home');

	$(document).ready(function()
	{
		// $.getScript("http://connect.facebook.net/en_US/all.js#xfbml=1", function () {
		// 	FB.init({ appId: 'xxxxxxxx', status: true, cookie: true, xfbml: true });
		// });
	});

	youTubeVideos = <?php echo json_encode($YouTubeData)?>;
    var individual_youtube = '';
    var youtube_title = '';
    for (var youtube_no = 0; youtube_no < 4; youtube_no++) {
        youtube_title = youTubeVideos[youtube_no].Title;
        youtube_title = youtube_title.length > 65 ? youtube_title.substr(0, 60) + ' ...' : youtube_title;
        individual_youtube = '<div class="home-special-report-slide">' +
            '<a onclick="frontendCommonMethods.youtubeFullScreen('+youtube_no+')"><img src="'+youTubeVideos[youtube_no].thumbnail+'"  alt="">'+
            '<p class="home-special-report-slide-title">'+youtube_title+'</p>'+
            '</div>';

        $('.home-youtube-list').append(individual_youtube);
    }


    $('#home-youtube-slider').slick({
        slidesToScroll: 1,
        slidesToShow: 4,
        autoplay: true,
        autoplaySpeed: 1000,
        infinite: false,
        arrows: true,
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                }
            }
        ]
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
        }]
    });
});
</script>
