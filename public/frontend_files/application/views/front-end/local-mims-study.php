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
    <h2>MiMS Learning</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="in-page-advert mims-study-advert-top-left"></div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert mims-study-advert-top-right"></div>
        </div>
    </div>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="mims-study-list container">
                <?php
                foreach ($AllMimsStudy AS $report) {
                    $report_description = $report['Description'];
                    $report_description = strlen($report_description) > 120 ? substr($report_description, 0, 116) . ' ...' : $report_description;
                    echo '<div class="news-item row">
                    <div class="news-thumb col-3">
                        <img src="'.base_url('MimsStudyImages/'.$report['ImagePath']).'" alt="">
                    </div>
                    <div class="news-info col-9">
                        <h3 class="news-title">
                          <a class="news-title" href="'.site_url('MimsStudy/showIndividualMimsStudyDetail?MimsStudyID='.$report['ID']).'">'.$report['Title'].'</a>
                        </h3>
                        <p class="news-summary">'.$report_description.'</p>
                        <a href="'.site_url('MimsStudy/showIndividualMimsStudyDetail?MimsStudyID='.$report['ID']).'" class="read-more">Read More</a>
                    </div>
                </div>';
                }
                ?>
            </div>
            <div class="in-page-advert mims-study-advert-bottom"></div>
        </div>
		<div class="col-md-4 col-12">
			<div class="container">
				<div class="row side-bar-important-address-title">
					<!-- important addresses -->
					<div class="content-section col-12" style="padding: 0; max-height: none;">
						<div class="section-header own-pad">
							<span><img src="<?php echo base_url();?>application/views/images/icons/briefcase.svg" alt="*"></span>Important Information
						</div>
						<ul class="address-list sidebar-assress"></ul>
					</div>
				</div>
				<div class="row">
					<div class="in-page-advert side-col mims-study-sidebar-advert">
						<img src="<?php echo base_url();?>application/views/images/add-4.png" alt="">
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
<script>
    frontendCommonMethods.getSideBarData(['job', 'address', 'news', 'report']);
    frontendCommonMethods.getCommonAdvertisement(['special-report-sidebar-advert', 'special-report-advert-top-left', 'special-report-advert-top-right', 'special-report-advert-bottom']);
    frontendCommonMethods.mainMenuActivation('resource');
</script>
