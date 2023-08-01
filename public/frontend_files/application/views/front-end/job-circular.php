<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 8/14/2018
 * Time: 12:56 AM
 */
?>
<!-- banner -->
<div class="banner title-banner d-md-flex d-none">
    <h2>Job Circular</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="in-page-advert job-circular-list-advert-top-left">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert job-circular-list-advert-top-right">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="section-tab section-job">
                <ul class="nav nav-tabs job-category-ul" role="tablist">
                    <li class="nav-item medical-li">
                        <a class="nav-link" data-toggle="tab" href="#medicalTab" role="tab" aria-controls="medicalTab" aria-selected="false" onclick="jobObject.changeJobCategoryCircularPage(2)">Medical</a>
                    </li>
					<li class="nav-item pharma-li">
						<a class="nav-link active" data-toggle="tab" href="#pharmaTab" role="tab" aria-controls="pharmaTab" aria-selected="true" onclick="jobObject.changeJobCategoryCircularPage(1)">Pharma</a>
					</li>
				</ul>
                <div class="tab-content" id="job-circular-category-tab">
                    <div class="tab-pane fade" id="pharmaTab" role="tabpanel" aria-labelledby="pharma-tab">
                        <div class="job-list job-list-page container">
                            <?php
                            foreach ($AllJobs1 AS $job) {
								$organization_logo = empty($job['OrganizationLogo']) ? '': '<div class="col-md-3 col-2 p-0"><img class="job-img" src="'.base_url().'JobImages/'.$job['OrganizationLogo'].'" alt=""></div>';
								$new_teg = $job['NumberOfDatePublished'] < 4 ? '<img src="'.base_url('application/views/images/new-tag.png').'" style="max-width: 37px" alt="">' : '';
                                echo '<div class="row job">
                                <div class="col-md-9 col-10">
                                    <a href="'.site_url('Job/showJobDetail?JobID='.$job['ID']).'"><h3 class="job-title">'.$job['Title'].$new_teg.'</h3></a>
                                    <p class="job-post-date">Posted on <span>'.$job['PublishDate'].'</span></p>
                                    <p class="job-info-summary">'.substr($job['Description'], 0, 150).'</p>
                                    <a class="job-detail-btn no-outline" href="'.site_url('Job/showJobDetail?JobID='.$job['ID']).'">View Job Detail</a>
                                </div>
                                '.$organization_logo.'
                            </div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="medicalTab" role="tabpanel" aria-labelledby="medical-tab">
                        <div class="job-list job-list-page container">
                            <?php
                            foreach ($AllJobs2 AS $job) {
								$organization_logo = empty($job['OrganizationLogo']) ? '': '<div class="col-md-3 col-2 p-0"><img class="job-img" src="'.base_url().'JobImages/'.$job['OrganizationLogo'].'" alt=""></div>';
                                $new_teg = $job['NumberOfDatePublished'] < 4 ? '<img src="'.base_url('application/views/images/new-tag.png').'" style="max-width: 37px" alt="">' : '';
                                echo '<div class="row job">
                                <div class="col-md-9 col-10">
                                    <a href="'.site_url('Job/showJobDetail?JobID='.$job['ID']).'"><h3 class="job-title">'.$job['Title'].$new_teg.'</h3></a>
                                    <p class="job-post-date">Posted on <span>'.$job['PublishDate'].'</span></p>
                                    <p class="job-info-summary">'.substr($job['Description'], 0, 150).'</p>
                                    <a class="job-detail-btn no-outline" href="'.site_url('Job/showJobDetail?JobID='.$job['ID']).'">View Job Detail</a>
                                </div>
                                '.$organization_logo.'
                            </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- pagination -->
            <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination" id="job-circular-pagination-pharma"></ul>
                <ul class="pagination" id="job-circular-pagination-medical"></ul>
            </nav>
            <div class="in-page-advert job-circular-list-advert-bottom">
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
					<div class="in-page-advert side-col job-circular-list-sidebar-advert">
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
    frontendCommonMethods.getSideBarData(['address', 'news', 'report', 'study']);
    frontendCommonMethods.getCommonAdvertisement(['job-circular-list-sidebar-advert', 'job-circular-list-advert-top-left', 'job-circular-list-advert-top-right', 'job-circular-list-advert-bottom']);
    jobObject.totalJob1 = <?php echo isset($TotalJob1) ? $TotalJob1 : 0;?>;
    jobObject.totalJob2 = <?php echo isset($TotalJob2) ? $TotalJob2 : 0;?>;
    jobObject.perPageInformationNumber = <?php echo config_item('per_page_job_information_number');?>;
    jobObject.activeJobCategory = 2;
    jobObject.populatePagination(1);
    $('#job-circular-pagination-medical').hide();
    jobObject.activeJobCategory = 1;
    jobObject.populatePagination(1);
    jobObject.changeJobCategoryCircularPage(<?php echo $JobCategory;?>);
</script>
