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
							<span class="tools pull-right"><a onclick="mimsStudyObject.showMimsStudyCreateModal()">Add New MiMS Learning</a></span>
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
									foreach ($AllMimsStudy AS $mimsstudy) {
										echo '<tr class="table-row">
                                    <td><a class="link" onclick="mimsStudyObject.showMimsStudyEditModal('.$mimsstudy['ID'].')">'.$mimsstudy['Title'].'</a></td>
                                    <td>'.$mimsstudy['LinkAddress'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="mimsStudyObject.showMimsStudyEditModal('.$mimsstudy['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="mimsStudyObject.deleteMimsStudy('.$mimsstudy['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New MimsStudy Modal Start -->
<div class="modal modal-fix" id="addMimsStudyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New MiMS Learning</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewMimsStudy" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Title </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="MimsStudyTitle" name="Title" required>
                            <span class="mims-study-title-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Description </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="MimsStudyDescription" name="Description" rows="6" class="form-control ckeditor-rich-text" type="text" maxlength="12000"></textarea>
                            <span class="news-description-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Link Address </span>
                        </label>
                        <div class="col-md-6">
                            <input id="MimsStudyLinkAddress" name="LinkAddress" maxlength="300">
                            <span class="mims-study-link-address-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="MimsStudyImagePath" name="ImagePath" type="file" onchange="mimsStudyObject.setMimsStudyImagePathThumbnail(this, 'MimsStudyImagePathThumbnail')" />
                            <span class="mims-study-image-path-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image Thumbnail</span>
                        </label>
                        <div class="col-md-6">
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                <img id="MimsStudyImagePathThumbnail" src='' alt="Thumbnail"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="MimsStudyIsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="MimsStudyIsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="mimsstudy_modal" class="btn btn-info" type="button" onclick="mimsStudyObject.submitMimsStudyModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    commonMethods.enableCKEditorByIDs(['MimsStudyDescription']);
</script>
<!-- Add New MimsStudy Modal End -->
<script>
	$('#dynamic-table').dataTable( {
		"aaSorting": [[ 0, "asc" ]]
	} );

	$('div.adv-table div#dynamic-table_wrapper div.row-fluid').css('width', '100%');
	$('#dynamic-table thead tr th').css('font-weight', 'bold');
	$('#dynamic-table thead tr th').css('font-size', '15px');
</script>
