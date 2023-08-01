<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/18/2018
 * Time: 9:55 PM
 */
?>
<!-- banner -->
<div class="banner title-banner d-md-flex d-none">
    <h2>Video Gallery</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="in-page-advert video-advert-top-left">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert video-advert-top-right">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="video-list container row"></div>
            <!-- pagination -->
            <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination" id="video-pagination"></ul>
            </nav>
            <div class="in-page-advert video-advert-bottom">
                <img src="<?php echo base_url();?>application/views/images/add-12.png" alt="">
            </div>
        </div>
		<div class="col-md-4 col-12">
			<div class="container">
				<div class="row side-bar-mimslearning-title">
					<!-- special reports -->
					<div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
					<a href="https://www.dental-practice.biz/emagazine/dpbangladesh1-1/"> <img src="<?php echo base_url(); ?>application/views/images/dantal.jpeg" alt=""></a>
					</div>
				</div>
				<div class="row">
					<div class="in-page-advert side-col video-sidebar-advert">
						<img src="<?php echo base_url();?>application/views/images/add-4.png" alt="">
					</div>
				</div>
				<div class="row side-bar-important-address-title">
					<!-- important addresses -->
					<div class="content-section col-12" style="padding: 0; max-height: none;">
						<div class="section-header own-pad">
							<span><img src="<?php echo base_url();?>application/views/images/icons/briefcase.svg" alt="*"></span>Important Information
						</div>
						<ul class="address-list sidebar-assress"></ul>
					</div>
				</div>
				<div class="row side-bar-job-circular-title">
					<!-- job circular -->
					<div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
						<div class="section-header own-pad" style="margin-bottom: 16px;">
							<span><img src="<?php echo base_url();?>application/views/images/icons/briefcase.svg" alt="*"></span>Job Circular
						</div>
						<div class="section-tab sidebar-tab">
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#pharmaTab" role="tab" aria-controls="pharmaTab" aria-selected="true">Pharma</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#medicalTab" role="tab" aria-controls="medicalTab" aria-selected="false">Medical</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade show active" id="pharmaTab" role="tabpanel" aria-labelledby="pharma-tab">
									<div class="container sidebar-jobs"></div>
								</div>
								<div class="tab-pane fade" id="medicalTab" role="tabpanel" aria-labelledby="medical-tab">
									<div class="container sidebar-jobs"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row side-bar-special-report-title">
					<!-- special reports -->
					<div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
						<div class="section-header own-pad">
							<span><img src="<?php echo base_url();?>application/views/images/icons/briefcase.svg" alt="*"></span>Special Reports
						</div>
						<div class="container sidebar-special-reports"></div>
					</div>
				</div>
				<div class="row side-bar-news-title">
					<!-- local news -->
					<div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
						<div class="section-header own-pad">
							<span><img src="<?php echo base_url();?>application/views/images/icons/newspaper.svg" alt="*"></span>Pharma News
						</div>
						<div class="container sidebar-news"></div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<div style="display: none" id="youtubeFullScreenModal" class="fullScreenImage">
	<div style="height: 60px">
		<a style="float: right; padding: 10px" class="btn-closeView" onclick="frontendCommonMethods.closeYoutubeScreen()" title="Close"><img width="40px" height="40px" src="<?php echo base_url()?>application/views/images/icons/close.png"></a>
<!--		<a style="float: right; padding: 10px" class="btn-closeView" onclick="frontendCommonMethods.facebookShare()" title="Facebook Share"><img width="40px" height="40px" src="--><?php //echo base_url()?><!--application/views/images/icons/facebook-share.png"></a>-->
	</div>
	<div id="youtube-fullScreen" style="display: none; padding: 0px 50px 50px 50px; height: 100%" class="full-screen-photo-holder"></div>
</div>

<script>
    frontendCommonMethods.getSideBarData(['job', 'address', 'report', 'study', 'news']);
    frontendCommonMethods.getCommonAdvertisement(['video-sidebar-advert', 'video-advert-top-left', 'video-advert-top-right', 'video-advert-bottom']);
    videoObject.totalVideo = <?php echo isset($TotalVideo) ? $TotalVideo : 0;?>;
    videoObject.perPageInformationNumber = <?php echo config_item('per_page_video_information_number');?>;
    videoObject.populatePagination(1, true);
    <?php
			if (!empty($VideoInfo)) {
				echo '$("#youtube-fullScreen").html(\'<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'.$VideoInfo['ID'].'?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=1" frameborder="0" allowfullscreen></iframe>\');';
				echo '$("#youtube-fullScreen").show();';
				echo '$("#youtubeFullScreenModal").show();';
			}
	?>
</script>
