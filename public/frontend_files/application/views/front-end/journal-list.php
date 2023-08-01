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
	<h2>Journals</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
	<div class="row">
		<div class="col-md-6 col-12">
			<div class="in-page-advert journal-advert-top-left">
				<img src="<?php echo base_url(); ?>application/views/images/add-6.png" alt="">
			</div>
		</div>
		<div class="col-md-6 col-12">
			<div class="in-page-advert journal-advert-top-right">
				<img src="<?php echo base_url(); ?>application/views/images/add-6.png" alt="">
			</div>
		</div>
	</div>
</div>
<style>
	.journal-icon.d-md-flex.d-none img {
    width: 100%;
    height: 100%;
}
	</style>

<!-- content -->
<div class="container">
	<div class="row">
		<div class="col-md-8 col-12">
			<div class="journal-list container">
				<?php
				foreach ($AllJournals as $journal) {
					if ($journal['JournalType'] == 'pdf') { ?>
						<a class="journal row d-flex align-items-center" target="_blank" href="<?= site_url('Journal/getJournalDetail') . '?JournalID=' . $journal['ID'] ?>">
                    <div class="journal-icon d-md-flex d-none">
					<img src="<?= 'https://'.$_SERVER['HTTP_HOST'].'/'.('application/views/images/icons/')?>pdf-icon-4.png">
                    </div>
                    <div class="journal-info">
                        <p class="journal-name"><?= $journal['Title'] ?></p>
                        <p class="journal-type">
                            PDF
                        </p>
                    </div>
                </a> <?php 
					} else if ($journal['JournalType'] == 'link') { ?>
						<a class="journal row d-flex align-items-center" target="_blank" href="<?= $journal['JournalType'] ?>">
                    <div class="journal-icon d-md-flex d-none">
                        <!-- <i class="material-icons">language</i> -->
						<img src="<?= 'https://'.$_SERVER['HTTP_HOST'].'/'.('application/views/images/icons/')?>website-icon-11.png">
                    </div>
                    <div class="journal-info">
                        <p class="journal-name"><?=$journal['Title'] ?></p>
                        <p class="journal-type">
                            Web Link
                        </p>
                    </div>
                </a><?php 
					}
				}
				?>
			</div>
			<div class="in-page-advert journal-advert-bottom">
				<img src="<?php echo base_url(); ?>application/views/images/add-12.png" alt="">
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
					<div class="in-page-advert side-col journal-sidebar-advert">
						<img src="<?php echo base_url(); ?>application/views/images/add-4.png" alt="">
					</div>
				</div>
				<div class="row side-bar-important-address-title">
					<!-- important addresses -->
					<div class="content-section col-12" style="padding: 0; max-height: none;">
						<div class="section-header own-pad">
							<span><img src="<?php echo base_url(); ?>application/views/images/icons/briefcase.svg" alt="*"></span>Important Information
						</div>
						<ul class="address-list sidebar-assress"></ul>
					</div>
				</div>
				<div class="row side-bar-job-circular-title">
					<!-- job circular -->
					<div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
						<div class="section-header own-pad" style="margin-bottom: 16px;">
							<span><img src="<?php echo base_url(); ?>application/views/images/icons/briefcase.svg" alt="*"></span>Job Circular
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
							<span><img src="<?php echo base_url(); ?>application/views/images/icons/briefcase.svg" alt="*"></span>Special Reports
						</div>
						<div class="container sidebar-special-reports"></div>
					</div>
				</div>
				<div class="row side-bar-news-title">
					<!-- local news -->
					<div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
						<div class="section-header own-pad">
							<span><img src="<?php echo base_url(); ?>application/views/images/icons/newspaper.svg" alt="*"></span>Pharma News
						</div>
						<div class="container sidebar-news"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	frontendCommonMethods.getSideBarData(['job', 'address', 'news', 'report', 'study']);
	frontendCommonMethods.getCommonAdvertisement(['journal-sidebar-advert', 'journal-advert-top-left', 'journal-advert-top-right', 'journal-advert-bottom']);
	frontendCommonMethods.mainMenuActivation('journal');
</script>