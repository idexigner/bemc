<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
							MiMS Learning List
							<span class="tools pull-right"><a onclick="mimsLearningObject.showMiMSLearningCreateModal()">Add New MiMSLearning</a></span>
						</header>
						<div class="panel-body">
							<div class="adv-table">
								<table  class="display table table-bordered table-striped" id="dynamic-table">
									<thead>
									<tr>
										<th width="50%">Title</th>
										<th width="40%">Link Address</th>
										<th width="10%">Action</th>
									</tr>
									</thead>
									<tbody>
									<?php
									foreach ($AllMiMSLearning AS $mimslearning) {
										echo '<tr class="table-row">
                                    <td><a class="link" onclick="mimsLearningObject.showMiMSLearningEditModal('.$mimslearning['ID'].')">'.$mimslearning['Title'].'</a></td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="mimsLearningObject.showMiMSLearningEditModal('.$mimslearning['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="mimsLearningObject.deleteMiMSLearning('.$mimslearning['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New MiMS Learning Modal Start -->
<div class="modal modal-fix" id="addMiMSLearningModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New MiMSLearning</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewMiMSLearning" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Title </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="MiMSLearningTitle" name="Title" required>
                            <span class="special-reports-title-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
					<div class="form-group">
						<label class="control-label col-md-4">MiMS Learning Type</label>
						<div class="col-md-6">
							<div class="radio">
								<label>
									<input checked="checked" type="radio" name="MiMSLearningType" id="MiMSLearningTypePDF" value="pdf">PDF</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="MiMSLearningType" id="MiMSLearningTypeLink" value="link">Link</label>
							</div>
						</div>
					</div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="MiMSLearningPath" name="MiMSLearningPath" type="file" onchange="mimsLearningObject.setMiMSLearningImagePathThumbnail(this, 'MiMSLearningPathThumbnail')" />
                            <span class="special-reports-image-path-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image Thumbnail</span>
                        </label>
                        <div class="col-md-6">
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                <img id="MiMSLearningPathThumbnail" src='' alt="Thumbnail"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="MiMSLearningIsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="MiMSLearningIsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="mimslearning_modal" class="btn btn-info" type="button" onclick="mimsLearningObject.submitMiMSLearningModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New MiMS Learning Modal End -->
<script>
	$('#dynamic-table').dataTable( {
		"aaSorting": [[ 0, "asc" ]]
	} );

	$('div.adv-table div#dynamic-table_wrapper div.row-fluid').css('width', '100%');
	$('#dynamic-table thead tr th').css('font-weight', 'bold');
	$('#dynamic-table thead tr th').css('font-size', '15px');
</script>
