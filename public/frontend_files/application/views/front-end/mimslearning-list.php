<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/18/2018
 * Time: 9:55 PM
 */
?>
<!-- banner -->
<!-- web link needed -->
<div class="banner title-banner d-md-flex d-none">
    <h2 style="text-transform: capitalize;">Learning Modules from MIMS Learning, UK Medical Education Provider</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="in-page-advert mimslearning-advert-top-left">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert mimslearning-advert-top-right">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="mimslearning-list container">
                <?php
                foreach ($AllMiMSLearning As $mimslearning) {
                    if ($mimslearning['MiMSLearningType'] == 'pdf') {
                        echo '<a class="mimslearning row d-flex align-items-center" target="_blank" href="'.site_url('MiMSLearning/getMiMSLearningDetail').'?MiMSLearningID='.$mimslearning['ID'].'">
                    <div class="mimslearning-icon d-md-flex d-none"><span><img src="'.base_url().'application/views/images/icons/mims-learning.png" style="width: 32px; height: 32px;"></span></div>
                    <div class="mimslearning-info">
                        <p class="mimslearning-name">'.$mimslearning['Title'].'</p>
                        <p class="mimslearning-type">
                            PDF
                        </p>
                    </div>
                </a>';
                    } else if ($mimslearning['MiMSLearningType'] == 'link') {
                        echo '<a class="mimslearning row d-flex align-items-center" target="_blank" href="'.$mimslearning['MiMSLearningPath'].'">
                    <div class="mimslearning-icon d-md-flex d-none"><span><img src="'.base_url().'application/views/images/icons/mims-learning.png" style="width: 32px; height: 32px;"></span></div>
                    <div class="mimslearning-info">
                        <p class="mimslearning-name">'.$mimslearning['Title'].'</p>
                        <p class="mimslearning-type">
                            Web Link
                        </p>
                    </div>
                </a>';
                    }
                }
                ?>
            </div>
            <div class="in-page-advert mimslearning-advert-bottom">
                <img src="<?php echo base_url();?>application/views/images/add-12.png" alt="">
            </div>
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
					<div class="in-page-advert side-col mimslearning-sidebar-advert">
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
    frontendCommonMethods.getCommonAdvertisement(['mimslearning-sidebar-advert', 'mimslearning-advert-top-left', 'mimslearning-advert-top-right', 'mimslearning-advert-bottom']);
    frontendCommonMethods.mainMenuActivation('mimslearning');
</script>
