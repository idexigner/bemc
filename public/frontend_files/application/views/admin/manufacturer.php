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
                <div class="col-lg-12">
					<section class="panel">
						<header class="panel-heading">
							Manufacturer List
							<span class="tools pull-right"><a onclick="manufacturerObject.showManufacturerCreateModal()">Add New Manufacturer</a></span>
						</header>
						<div class="panel-body">
							<div class="adv-table">
								<table  class="display table table-bordered table-striped" id="dynamic-table">
									<thead>
									<tr>
										<th width="40%">Manufacturer Name</th>
										<th width="25%">Email ID</th>
										<th width="25%">Phone No</th>
										<th width="10%">Action</th>
									</tr>
									</thead>
									<tbody>
									<?php
									foreach ($AllManufacturer AS $manufacturer) {
										echo '<tr class="table-row">
                                    <td><a class="link" onclick="manufacturerObject.showManufacturerEditModal('.$manufacturer['ID'].')">'.$manufacturer['Name'].'</a></td>
                                    <td>'.$manufacturer['EmailID'].'</td>
                                    <td>'.$manufacturer['PhoneNo'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="manufacturerObject.showManufacturerEditModal('.$manufacturer['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="manufacturerObject.deleteManufacturer('.$manufacturer['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New Manufacturer Modal Start -->
<div class="modal modal-fix" id="addManufacturerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Manufacturer</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewManufacturer" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Name </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="ManufacturerName" name="ManufacturerName" required>
                            <span class="manufacturer-name-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Email ID </span>
                        </label>
                        <div class="col-md-6">
                            <input id="EmailID" name="EmailID" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Phone No </span>
                        </label>
                        <div class="col-md-6">
                            <input id="PhoneNo" name="PhoneNo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Mobile No </span>
                        </label>
                        <div class="col-md-6">
                            <input id="MobileNo" name="MobileNo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Fax No </span>
                        </label>
                        <div class="col-md-6">
                            <input id="FaxNo" name="FaxNo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Address </span>
                        </label>
                        <div class="col-md-6">
                            <select id="ManufacturerAddressID" name="AddressID" onclick="manufacturerObject.changeManufacturerAddress(this.value)"></select>
                        </div>
                    </div>
                    <div class="form-group manufacturer-existing-address">
                        <label class="control-label col-md-4">
                            <span>Address Detail</span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="ManufacturerAddressDetail" rows="6" class="form-control" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group manufacturer-new-address">
                        <label class="control-label col-md-4">
                            <span>Country </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="ManufacturerCountryID" name="CountryID"></select>
                            <span class="manufacturer-country-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group manufacturer-new-address">
                        <label class="control-label col-md-4">
                            <span>State </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="ManufacturerStateID" name="StateID"></select>
                            <span class="manufacturer-state-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group manufacturer-new-address">
                        <label class="control-label col-md-4">
                            <span>City </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="ManufacturerCityID" name="CityID"></select>
                            <span class="manufacturer-city-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group manufacturer-new-address">
                        <label class="control-label col-md-4">
                            <span>Address</span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="ManufacturerAddress" rows="6" class="form-control ckeditor-rich-text" type="text" maxlength="500" name="Address"></textarea>
                            <span class="manufacturer-address-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group manufacturer-new-address">
                        <label class="control-label col-md-4">
                            <span>Longitude </span>
                        </label>
                        <div class="col-md-6">
                            <input id="Longitude" name="Longitude" type="number" maxlength="17">
                        </div>
                    </div>
                    <div class="form-group manufacturer-new-address">
                        <label class="control-label col-md-4">
                            <span>Latitude </span>
                        </label>
                        <div class="col-md-6">
                            <input id="Latitude" name="Latitude" type="number" maxlength="17">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label><input checked="checked" type="radio" name="IsActive" id="IsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="IsActive" id="IsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="manufacturer_modal" class="btn btn-info" type="button" onclick="manufacturerObject.submitManufacturerModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    commonMethods.enableCKEditorByIDs(['ManufacturerAddress']);
</script>
<!-- Add New Manufacturer Modal End -->
<script>
	$('#dynamic-table').dataTable( {
		"aaSorting": [[ 0, "asc" ]]
	} );

	$('div.adv-table div#dynamic-table_wrapper div.row-fluid').css('width', '100%');
	$('#dynamic-table thead tr th').css('font-weight', 'bold');
	$('#dynamic-table thead tr th').css('font-size', '15px');
</script>
