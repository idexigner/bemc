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
                        <header class="panel-heading edit-link-title">
                            Advertisement Position List <span class="add-new-content"><a onclick="advertisementPositionObject.showAdvertisementPositionCreateModal()">Add New AdvertisementPosition</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Position Name</th>
                                    <th>Class Name</th>
                                    <th>Image Size</th>
                                    <th>Number of Advertisement</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="advertisementPosition-list">
                                <?php
                                foreach ($AllAdvertisementPosition AS $advertisementPosition) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="advertisementPositionObject.showAdvertisementPositionEditModal('.$advertisementPosition['ID'].')">'.$advertisementPosition['Name'].'</a></td>
                                    <td>'.$advertisementPosition['ClassName'].'</td>
                                    <td>'.$advertisementPosition['ImageWidth'].' * '.$advertisementPosition['ImageHeight'].'</td>
                                    <td>'.$advertisementPosition['NumberOfAdvertisement'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="advertisementPositionObject.showAdvertisementPositionEditModal('.$advertisementPosition['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="advertisementPositionObject.deleteAdvertisementPosition('.$advertisementPosition['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New AdvertisementPosition Modal Start -->
<div class="modal modal-fix" id="addAdvertisementPositionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Advertisement Position</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewAdvertisementPosition" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Name </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="AdvertisementPositionName" name="AdvertisementPositionName" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Class Name </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="ClassName" name="ClassName" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image Width </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="ImageWidth" name="ImageWidth" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image Height </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="ImageHeight" name="ImageHeight" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Number of Advertisement </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="NumberOfAdvertisement" name="NumberOfAdvertisement" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Interval </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="Interval" name="Interval" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Price in BDT </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="PriceInBDT" name="PriceInBDT" required>
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
                    <button id="advertisementPosition_modal" class="btn btn-info" type="button" onclick="advertisementPositionObject.submitAdvertisementPositionModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New AdvertisementPosition Modal End -->
