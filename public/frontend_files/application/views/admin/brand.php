<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 8/17/2018
 * Time: 10:01 PM
 */
?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
						<header class="panel-heading">
							Brand List
							<span class="tools pull-right"><a onclick="brandObject.showBrandCreateModal()">Add New Brand</a></span>
						</header>
						<div class="panel-body">
							<div class="adv-table">
								<table  class="display table table-bordered table-striped" id="dynamic-table">
									<thead>
									<tr>
										<th width="25%">Brand Name</th>
										<th width="10%">Dosage Form</th>
										<th width="10%">Product Type</th>
										<th width="15%">Generic</th>
										<th width="10%">Price</th>
										<th width="20%">Manufacturer</th>
										<th width="10%">Action</th>
									</tr>
									</thead>
									<tbody>
									<?php
									foreach ($AllBrand AS $brand) {
										$product_type = $brand['ProductType'] == 1 ? 'Regular' : 'Herbal';
										echo '<tr class="table-row">
                                    <td><a class="link" onclick="brandObject.showBrandEditModal('.$brand['ID'].')">'.$brand['Name'].'</a></td>
                                    <td>'.$brand['DosageForm'].'</td>
                                    <td>'.$product_type.'</td>
                                    <td>'.$brand['GenericName'].'</td>
                                    <td>'.$brand['PriceInBDT'].' Tk</td>
                                    <td>'.$brand['ManufacturerName'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="brandObject.showBrandEditModal('.$brand['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="brandObject.deleteBrand('.$brand['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
                                        </div>
                                    </td>
                                </tr>';
									}
									?>
									</tbody>
								</table>
							</div>
						</div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
</section>
<!--common script init for all pages-->
<!-- Add New Brand Modal Start -->
<div class="modal modal-fix" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Brand</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewBrand" class="form-horizontal">
                <div class="modal-body">
					<div class="form-group">
						<label class="control-label col-md-4"><span>Product Type </span><span class="required-field">*</span></label>
						<div class="col-md-6">
							<div class="radio"><label><input checked="checked" type="radio" name="ProductType" id="ProductTypeRegular" value="1">Regular</label></div>
							<div class="radio"><label><input type="radio" name="ProductType" id="ProductTypeHerbal" value="2">Herbal</label></div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">
							<span>Name </span>
							<span class="required-field">*</span>
						</label>
						<div class="col-md-6">
							<input id="BrandName" name="BrandName" required>
							<span class="brand-name-require-message error-message error">This field is required.</span>
						</div>
					</div>
					<div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Generic </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="GenericID" name="GenericID" required></select>
                            <span class="generic-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Manufacturer </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="ManufacturerID" name="ManufacturerID" required></select>
                            <span class="manufacturer-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Dosage Form </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="DosageFormID" name="DosageFormID" style="width: 50%"></select>
							or
							<input id="DosageForm" name="DosageForm" style="width: 40%">
                            <span class="dosage-form-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Strength </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="StrengthID" name="StrengthID" style="width: 50%"></select>
							or
							<input id="Strength" name="Strength" style="width: 40%">
                            <span class="strength-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Pack Size </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="PackSizeID" name="PackSizeID" style="width: 50%"></select>
							or
							<input id="PackSize" name="PackSize" style="width: 40%">
                            <span class="pack-size-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Price In BDT </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="PriceInBDT" name="PriceInBDT" max="10" required>
                            <span class="price-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image </span>
                        </label>
                        <div class="col-md-6">
                            <input id="BrandImagePath" name="ImagePath" type="file" onchange="brandObject.setBrandImagePathThumbnail(this, 'BrandImagePathThumbnail')" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image Thumbnail</span>
                        </label>
                        <div class="col-md-6">
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                <img id="BrandImagePathThumbnail" src='' alt="Thumbnail"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Highlighted</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsHighlighted" id="IsHighlightedYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsHighlighted" id="IsHighlightedNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is New Product</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsNewProduct" id="IsNewProductYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsNewProduct" id="IsNewProductNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is New Brand</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsNewBrand" id="IsNewBrandYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsNewBrand" id="IsNewBrandNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is New Presentation</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsNewPresentation" id="IsNewPresentationYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsNewPresentation" id="IsNewPresentationNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="BrandIsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="BrandIsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="brand_modal" class="btn btn-info" type="button" onclick="brandObject.submitBrandModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New Brand Modal End -->
<script>
	$('#dynamic-table').dataTable( {
		"aaSorting": [[ 0, "asc" ]]
	} );

	$('div.adv-table div#dynamic-table_wrapper div.row-fluid').css('width', '100%');
	$('#dynamic-table thead tr th').css('font-weight', 'bold');
	$('#dynamic-table thead tr th').css('font-size', '15px');
</script>
