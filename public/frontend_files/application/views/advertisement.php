<?php
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
                            Advertisement List <span class="add-new-content"><a onclick="advertisementObject.showAdvertisementCreateModal()">Add New Advertisement</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Organization</th>
                                    <th>Title</th>
                                    <th>Publish Date</th>
                                    <th>Unpublished Date</th>
                                    <th>Advertisement Position</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="advertisement-list">
                                <?php
                                foreach ($AllAdvertisement AS $advertisement) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="advertisementObject.showAdvertisementEditModal('.$advertisement['ID'].')">'.$advertisement['Organization'].'</a></td>
                                    <td>'.$advertisement['Organization'].'</td>
                                    <td>'.$advertisement['Title'].'</td>
                                    <td>'.$advertisement['PublishDate'].'</td>
                                    <td>'.$advertisement['UnpublishedDate'].'</td>
                                    <td>'.$advertisement['PositionName'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="advertisementObject.showAdvertisementEditModal('.$advertisement['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="advertisementObject.deleteAdvertisement('.$advertisement['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New Advertisement Modal Start -->
<div class="modal modal-fix" id="addAdvertisementModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Advertisement</h4>
            </div>
            <form id="addNewAdvertisement" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Organization </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="Organization" name="Organization" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Title </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="Title" name="Title" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Body Text </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="BodyText" name="BodyText" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Link URL </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="LinkURL" name="LinkURL" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Image Path </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="ImagePath" name="ImagePath" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Publish Date </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="PublishDate" name="PublishDate" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Unpublished Date </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="UnpublishedDate" name="UnpublishedDate" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Advertisement Position </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="AdvertisementPositionID" name="AdvertisementPositionID" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Name </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="AdvertisementName" name="AdvertisementName" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Contact Person </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="ContactPerson" name="ContactPerson" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Email </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="EmailID" name="EmailID" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">
                            <span>Mobile No </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="MobileNo" name="MobileNo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Is Active</label>
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
                    <button id="advertisement_modal" class="btn btn-info" type="button" onclick="advertisementObject.submitAdvertisementModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New Advertisement Modal End -->
