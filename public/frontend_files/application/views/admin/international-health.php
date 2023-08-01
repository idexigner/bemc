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
                            <h2>Study Club List</h2>
                            <span class="add-new-content"><a onclick="internationalHealthObject.showInternationalHealthCreateModal()">Add New Study Club</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Publish Date</th>
                                    <th>Unpublished Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="international-health-list">
                                <?php
                                foreach ($AllInternationalHealths AS $internationalHealth) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="internationalHealthObject.showInternationalHealthEditModal('.$internationalHealth['ID'].')">'.$internationalHealth['Title'].'</a></td>
                                    <td>'.$internationalHealth['PublishDateTime'].'</td>
                                    <td>'.$internationalHealth['UnpublishedDateTime'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="internationalHealthObject.showInternationalHealthEditModal('.$internationalHealth['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="internationalHealthObject.deleteInternationalHealth('.$internationalHealth['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New InternationalHealth Modal Start -->
<div class="modal modal-fix" id="addInternationalHealthModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Study Club</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewInternationalHealth" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Title </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="InternationalHealthTitle" name="Title" required>
                            <span class="international-health-title-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Description </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="InternationalHealthDescription" name="Description" rows="6" class="form-control ckeditor-rich-text" type="text" maxlength="5000"></textarea>
                            <span class="international-health-description-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Publish Date </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="InternationalHealthPublishDate" name="PublishDate" required class="date-field">
                            <span class="international-health-publish-date-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Unpublished Date </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="InternationalHealthUnpublishedDate" name="UnpublishedDate" required class="date-field">
                            <span class="international-health-unpublished-date-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="InternationalHealthImagePath" name="InternationalHealthImagePath" type="file" onchange="internationalHealthObject.setInternationalHealthImagePathThumbnail(this, 'InternationalHealthImagePathThumbnail')" />
                            <span class="international-health-image-path-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image Thumbnail</span>
                        </label>
                        <div class="col-md-6">
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                <img id="InternationalHealthImagePathThumbnail" src='' alt="Thumbnail"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="InternationalHealthIsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="InternationalHealthIsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="international_health_modal" class="btn btn-info" type="button" onclick="internationalHealthObject.submitInternationalHealthModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    commonMethods.enableCKEditorByIDs(['InternationalHealthDescription']);
</script>
<!-- Add New Study Club Modal End -->
