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
							Pack Size List
							<span class="tools pull-right"><a onclick="packSizeObject.showPackSizeCreateModal()">Add New Pack Size</a></span>
						</header>
						<div class="panel-body">
							<div class="adv-table">
								<table  class="display table table-bordered table-striped" id="dynamic-table">
									<thead>
									<tr>
										<th width="80%">Pack Size Name</th>
										<th width="20%">Action</th>
									</tr>
									</thead>
									<tbody>
									<?php
									foreach ($AllPackSize AS $packsize) {
										echo '<tr class="table-row">
                                    <td><a class="link" onclick="packSizeObject.showPackSizeEditModal('.$packsize['ID'].')">'.$packsize['Name'].'</a></td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="packSizeObject.showPackSizeEditModal('.$packsize['ID'].', \''.$packsize['Name'].'\')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="packSizeObject.deletePackSize('.$packsize['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New PackSize Modal Start -->
<div class="modal modal-fix" id="addPackSizeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Pack Size</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewPackSize" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Pack Size </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="PackSizeName" name="PackSizeName" required>
                            <span class="pack-size-name-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="IsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="IsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="packsize_modal" class="btn btn-info" type="button" onclick="packSizeObject.submitPackSizeModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New PackSize Modal End -->
<script>
	$('#dynamic-table').dataTable( {
		"aaSorting": [[ 0, "asc" ]]
	} );

	$('div.adv-table div#dynamic-table_wrapper div.row-fluid').css('width', '100%');
	$('#dynamic-table thead tr th').css('font-weight', 'bold');
	$('#dynamic-table thead tr th').css('font-size', '15px');
</script>
