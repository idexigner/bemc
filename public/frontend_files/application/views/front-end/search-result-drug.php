<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/18/2018
 * Time: 9:55 PM
 */
?>
<!-- banner -->
<div class="banner banner-small d-md-flex d-none">
    <div class="search-wrapper">
        <ul class="search-tabs group">
            <li class="brand <?=$_GET['Type']=='brand'?'active':''?>"><a onclick="drugObject.changeSearchOption('brand')" class="search_option_type search_by_brand">Brands</a></li>
            <li class="generic <?=$_GET['Type']=='generic'?'active':''?>"><a onclick="drugObject.changeSearchOption('generic')" class="search_option_type search_by_generic">Generic</a></li>
            <li class="indication <?=$_GET['Type']=='indication'?'active':''?>"><a onclick="drugObject.changeSearchOption('indication')" class="search_option_type search_by_indication">Indication</a></li>
            <li class="manufacture <?=$_GET['Type']=='manufacture'?'active':''?>"><a onclick="drugObject.changeSearchOption('manufacturer')" class="search_option_type search_by_manufacturer">Manufacturer</a></li>
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

<!-- advert -->
<!-- change the img tag accordingly (e.g: <ins> tag) -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="in-page-advert brand-advert-top-left">
                <img src="<?php echo base_url();?>application/views/images/add-6.png" alt="">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="in-page-advert brand-advert-top-right">
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
                <div class="brand-details">
					<div class="row">
						<div class="col-7">
							<h2 class="brand-title" ><?php echo $AllBrands[0]['Name'];?></h2>
							<div class="brand-info-table">
								<table class="table">
									<tbody>
									<tr>
										<td class="brand-info-title">Generic Name</td>
										<td style="color: blue">: <a href="<?php echo site_url('Brand/searchBrandInformation?Type=generic&ProductType=1&Value='.urlencode($AllBrands[0]['GenericName']));?>"><?php echo $AllBrands[0]['GenericName'];?></a></td>
									</tr>
									<tr>
										<td class="brand-info-title">Manufacturer Name</td>
										<td style="color: blue">: <a href="<?php echo site_url('Brand/searchBrandInformation?Type=manufacturer&ProductType=1&Value='.urlencode($AllBrands[0]['ManufacturerName']))?>"><?php echo $AllBrands[0]['ManufacturerName'];?></a></td>
									</tr>
									<?php if(!empty($AllBrands[0]['Classification'])) {
										?>
										<tr>
											<td class="brand-info-title">Drug Class</td>
											<td>: <?php echo $AllBrands[0]['Classification'];?></td>
										</tr>
										<?php
									} ?>
									<?php if(!empty($AllBrands[0]['SafetyRemark'])) {
										?>
										<tr>
											<td class="brand-info-title">Safety Remarks</td>
											<td>: <?php echo $AllBrands[0]['SafetyRemark'];?></td>
										</tr>
										<?php
									} ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-5 drug-image brand-advert-image" style="padding: 0px">
							<img src="<?php echo base_url().'';?>BrandImages/brand-ads.png">
						</div>
					</div>
					<div class="form-group">
						<div class="col-12">
							<div class="brand-description">
								<?php if(!empty($AllBrands[0]['Indication'])) {
									?>
									<div class="brand-description-point">
										<p class="brand-description-title">Indication</p>
										<p class="brand-description-text"><?php echo $AllBrands[0]['Indication'];?></p>
									</div>
									<?php
								} ?>
								<?php if(!empty($AllBrands[0]['DosageAdministration'])) {
									?>
									<div class="brand-description-point">
										<p class="brand-description-title">Dosage & Administration</p>
										<p class="brand-description-text"><?php echo $AllBrands[0]['DosageAdministration'];?></p>
									</div>
									<?php
								} ?>
								<?php if(!empty($AllBrands[0]['ContraindicationPrecaution'])) {
									?>
									<div class="brand-description-point">
										<p class="brand-description-title">Contraindication & Precaution</p>
										<p class="brand-description-text"><?php echo $AllBrands[0]['ContraindicationPrecaution'];?></p>
									</div>
									<?php
								} ?>
								<?php if(!empty($AllBrands[0]['SideEffect'])) {
									?>
									<div class="brand-description-point">
										<p class="brand-description-title">Side Effect</p>
										<p class="brand-description-text"><?php echo $AllBrands[0]['SideEffect'];?></p>
									</div>
									<?php
								} ?>
								<?php if(!empty($AllBrands[0]['PregnancyLactation'])) {
									?>
									<div class="brand-description-point">
										<p class="brand-description-title">Use in Pregnancy & Lactation</p>
										<p class="brand-description-text"><?php echo $AllBrands[0]['PregnancyLactation'];?></p>
									</div>
									<?php
								} ?>
							</div>
						</div>
					</div>
                </div>
            </div>
            <div class="content-section main" style="margin-top: 15px">
                <!-- more jobs -->
                <div class="section-header own-pad" style="margin-bottom: 10px; padding: 24px 30px 16px 30px;">Presentation</div>
                <div class="brand-generic-table brand-of-generic">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" style="width: 20%">Brand Name</th>
                            <th scope="col" style="width: 20%">Dosage Form</th>
                            <th scope="col" style="width: 30%">Strength</th>
                            <th scope="col" style="width: 20%">Pack Size</th>
                            <th scope="col" style="width: 10%">Price</th>
                        </tr>
                        </thead>
                        <tbody class="drug-list">
                        <?php
                        foreach ($AllBrands AS $brand) {
                            echo '<tr>';
                            echo '<td><a href="'.site_url('Brand/showBrandDetail').'?BrandID='.$brand['ID'].'">'.$brand['Name'].'</a></td>';
                            echo '<td>'.$brand['DosageForm'].'</td>';
                            echo '<td>'.$brand['StrengthName'].'</td>';
                            echo '<td>'.$brand['PackSize'].'</td>';
                            echo '<td>'.$brand['PriceInBDT'].' Tk</td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- pagination -->
            <nav class="mims-pagination" style="margin-top: 36px;">
                <ul class="pagination" id="search-brand-pagination"></ul>
            </nav>
            <div class="in-page-advert brand-advert-bottom">
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
</div>
<script>
    frontendCommonMethods.getSideBarData(['job', 'address', 'news', 'report', 'study']);
	drugObject.productType = <?php echo REGULAR_PRODUCT;?>;
    drugObject.searchOptionType = '<?php echo $OptionType;?>';
    drugObject.searchOptionValue = '<?php echo $OptionValue;?>';
    drugObject.perPageInformationNumber = <?php echo $PerPageInformationNumber;?>;
    drugObject.totalDrug = <?php echo isset($TotalBrand) ? $TotalBrand : 0;?>;
    drugObject.searchObjectID = 'search-brand-pagination';
	drugObject.populatePagination(drugObject.searchObjectID, 1, false, drugObject.searchOptionType, drugObject.searchOptionValue);
	drugObject.getAllDrugInfoForAutoComplete('brand');
    frontendCommonMethods.getCategoryWiseAdvertisement(2, drugObject.searchOptionValue, ['brand-sidebar-advert', 'brand-advert-top-left', 'brand-advert-top-right', 'brand-advert-bottom']);
	frontendCommonMethods.getCategoryWiseAdvertisementForSlider(2, drugObject.searchOptionValue, ['brand-advert-image']);
</script>
