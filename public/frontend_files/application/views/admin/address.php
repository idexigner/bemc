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
							Address List
							<span class="tools pull-right"><a onclick="addressObject.showAddressCreateModal()">Add New Address</a></span>
						</header>
						<div class="panel-body">
							<div class="adv-table">
								<table  class="display table table-bordered table-striped" id="dynamic-table">
									<thead>
									<tr>
										<th width="50%">Name</th>
										<th width="20%">Category</th>
										<th width="20%">Contact Number</th>
										<th width="10%">Action</th>
									</tr>
									</thead>
									<tbody>
									<?php
									foreach ($AllAddress AS $address) {
										echo '<tr class="table-row">
                                    <td><a class="link" onclick="addressObject.showAddressEditModal('.$address['ID'].')">'.$address['Name'].'</a></td>
                                    <td>'.$address['AddressCategoryName'].'</td>
                                    <td>'.$address['ContactNumber'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="addressObject.showAddressEditModal('.$address['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="addressObject.deleteAddress('.$address['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New Address Modal Start -->
<div class="modal modal-fix" id="addAddressModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Address</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewAddress" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Name </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="AddressName" name="AddressName" required>
                            <span class="address-name-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Category </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="AddressCategoryID" name="AddressCategoryID" required></select>
                            <span class="address-category-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Address Detail</span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="Address" name="Address" rows="6" class="form-control ckeditor-rich-text" type="text" maxlength="500" required></textarea>
                            <span class="address-detail-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Contact Number </span>
                        </label>
                        <div class="col-md-6">
                            <input id="ContactNumber" name="ContactNumber">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label><input checked="checked" type="radio" name="IsActive" id="AddressIsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="AddressIsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="address_modal" class="btn btn-info" type="button" onclick="addressObject.submitAddressModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    commonMethods.enableCKEditorByIDs(['Address']);
</script>
<!-- Add New Address Modal End -->
<script>
	$('#dynamic-table').dataTable( {
		"aaSorting": [[ 0, "asc" ]]
	} );

	$('div.adv-table div#dynamic-table_wrapper div.row-fluid').css('width', '100%');
	$('#dynamic-table thead tr th').css('font-weight', 'bold');
	$('#dynamic-table thead tr th').css('font-size', '15px');
</script>
