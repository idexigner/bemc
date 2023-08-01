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
                        <header class="panel-heading edit-link-title">
                            <h2>Resource List</h2>
                            <span class="add-new-content"><a onclick="resourceObject.showResourceCreateModal()">Add New Resource</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Link Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="resource-list">
                                <?php
                                foreach ($AllResource AS $resource) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="resourceObject.showResourceEditModal('.$resource['ID'].')">'.$resource['Title'].'</a></td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="resourceObject.showResourceEditModal('.$resource['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="resourceObject.deleteResource('.$resource['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
                                        </div>
                                    </td>
                                </tr>';
                                }
                                ?>
                                </tbody>
                            </table>
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
<!-- Add New Resource Modal Start -->
<div class="modal modal-fix" id="addResourceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Resource</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewResource" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Title </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="ResourceTitle" name="Title" required>
                            <span class="special-reports-title-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
					<div class="form-group">
						<label class="control-label col-md-4">Resource Type</label>
						<div class="col-md-6">
							<div class="radio">
								<label>
									<input checked="checked" type="radio" name="ResourceType" id="ResourceTypePDF" value="pdf">PDF</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="ResourceType" id="ResourceTypeLink" value="link">Link</label>
							</div>
						</div>
					</div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="ResourcePath" name="ResourcePath" type="file" onchange="resourceObject.setResourceImagePathThumbnail(this, 'ResourcePathThumbnail')" />
                            <span class="special-reports-image-path-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image Thumbnail</span>
                        </label>
                        <div class="col-md-6">
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                <img id="ResourcePathThumbnail" src='' alt="Thumbnail"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="ResourceIsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="ResourceIsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="resource_modal" class="btn btn-info" type="button" onclick="resourceObject.submitResourceModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New Resource Modal End -->
