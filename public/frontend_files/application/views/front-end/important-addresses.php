<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 8/14/2018
 * Time: 12:26 AM
 */
?>
<!-- banner -->
<div class="banner title-banner d-md-flex d-none">
    <h2>Important Information</h2>
</div>

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="in-page-advert address-advert-top-left">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert address-advert-top-right">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="content-section main">
                <div class="section-header d-flex justify-content-between" style="margin-bottom: 0px; padding: 24px 30px 16px 30px;">
                    <span>Find Address</span>
                </div>
                <!-- address search -->
                <div class="container" style="padding-bottom: 20px">
                    <div class="address-search row">
                        <div class="col-md-5 col-12 address-search-col">
                            <div class="theme-select">
                                <select class="form-control" id="addressCity">
                                    <option value="0">Search by City</option>
                                    <?php
                                    foreach ($Cities AS $city) {
                                        echo '<option value="'.$city['Name'].'">'.$city['Name'].'</option>';
                                    }
                                    ?>
                                </select>
                                <div class="theme-down-arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-12 address-search-col">
                            <select class="form-control" id="addressCategory">
                                <option value="">Search by Category</option>
                                <?php
                                foreach ($AllAddressCategory AS $category) {
                                    echo '<option value="'.$category['ID'].'">'.$category['Name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2 col-12 address-search-col">
                            <button class="btn theme-btn" style="width: 100%;" onclick="addressObject.getLocationWiseAddresses()">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- use "selected" class on the selected items -->
            <div class="content-section main">
                <div class="container address-table table-responsive">
                    <table class="table" id="address-list-table">
                        <thead>
                        <tr>
                            <th scope="col name-col" style="width: 30%">Name</th>
                            <th scope="col address-col" style="width: 35%">Address</th>
                            <th scope="col contact-col" style="width: 35%">Contact</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($AllAddress AS $address) {
                            echo '<tr>
                                    <td>'.$address['Name'].'</td>
                                    <td>'.$address['Address'].'</td>
                                    <td>'.$address['ContactNumber'].'</td>
                                </tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- pagination -->
            <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination" id="address-pagination"></ul>
            </nav>
            <div class="in-page-advert address-advert-bottom">
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
					<div class="in-page-advert side-col address-sidebar-advert">
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
    frontendCommonMethods.getSideBarData(['job', 'news', 'report', 'study']);
    addressObject.toggleFilterOption();
    frontendCommonMethods.getCommonAdvertisement(['address-sidebar-advert', 'address-advert-top-left', 'address-advert-top-right', 'address-advert-bottom']);
    addressObject.totalAddress = <?php echo isset($TotalAddress) ? $TotalAddress : 0;?>;
    addressObject.populatePagination(1);
    $('#addressCategory').val(<?php echo $AddressCategoryID ? $AddressCategoryID : "''";?>);
</script>
