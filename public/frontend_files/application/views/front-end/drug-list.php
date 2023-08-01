<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/18/2018
 * Time: 9:55 PM
 */
?>
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul class="rslides add-brand-page-inner-left-523x52"></ul>
            </div>
            <div class="col-md-6">
                <ul class="rslides add-brand-page-inner-right-523x52"></ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="presentation">
                    <div class="presentation-table">
                        <h1><?php echo $PageTitle;?></h1>
                        <table class="table" id="product-list">
                            <thead>
                            <tr>
                                <th scope="col" style="width: 150px;">Brand Name</th>
                                <th scope="col">Manufacturer</th>
                                <th scope="col">Generic</th>
                                <th scope="col">Price</th>
                            </tr>
                            </thead>
                            <tbody class="drug-list">
                            <?php
                            foreach ($AllBrands AS $brand) {
                                echo '<tr>';
                                echo '<td><a href="'.site_url('Brand/searchBrandInformation?Type=brand&ProductType=1&Value=').urlencode($brand['Name']).'">'.$brand['Name'].'</a></td>';
                                echo '<td><a href="'.site_url('Brand/searchBrandInformation?Type=manufacturer&ProductType=1&Value=').urlencode($brand['ManufacturerName']).'">'.$brand['ManufacturerName'].'</a></td>';
                                echo '<td><a href="'.site_url('Brand/searchBrandInformation?Type=generic&ProductType=1&Value=').urlencode($brand['GenericName']).'">'.$brand['GenericName'].'</a></td>';
                                echo '<td>'.$brand['PriceInBDT'].' Tk</td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" id="drug-pagination"></ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="rslides add-brand-page-bottom-left-823x115"></ul>
                    </div>
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
						<div class="in-page-advert side-col brand-sidebar-advert">
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
        <div class="row">
            <div class="col-md-12">
                <section class="visitor">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <img src="<?php echo base_url().'application/views/';?>img/img-9.png" alt="image">
                            </div>
                            <div class="col-md-6 text-center">
                                <h3 class="title">Visitor</h3>
                                <span class="counter">123,45,67</span>
                            </div>
                            <div class="col-md-3 text-center">
                                <img src="<?php echo base_url().'application/views/';?>img/img-10.png" alt="image">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<script>
    frontendCommonMethods.getSideBarData(['job', 'address', 'news', 'report', 'study']);
    frontendCommonMethods.getAdvertisement(['add-brand-page-top-right-340x355', 'add-brand-page-bottom-left-823x115', 'add-brand-page-inner-left-523x52', 'add-brand-page-inner-right-523x52'], 3);
	drugObject.productType = <?php echo REGULAR_PRODUCT;?>;
    drugObject.populatePagination(1);
</script>
