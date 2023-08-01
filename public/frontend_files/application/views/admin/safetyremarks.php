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
                            Safety Remarks List <span class="add-new-content"><a onclick="safetyRemarksObject.showSafetyRemarksCreateModal()">Add New Safety Remark</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Safety Remarks</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="safetyremarks-list">
                                <?php
                                foreach ($AllSafetyRemarks AS $safetyremarks) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="safetyRemarksObject.showSafetyRemarksEditModal('.$safetyremarks['ID'].')">'.$safetyremarks['Remarks'].'</a></td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="safetyRemarksObject.showSafetyRemarksEditModal('.$safetyremarks['ID'].', \''.$safetyremarks['Remarks'].'\')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="safetyRemarksObject.deleteSafetyRemarks('.$safetyremarks['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New SafetyRemarks Modal Start -->
<div class="modal modal-fix" id="addSafetyRemarksModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Safety Remark</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewSafetyRemarks" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Remarks </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="SafetyRemark" name="SafetyRemark" required>
                            <span class="safety-remark-require-message error-message error">This field is required.</span>
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
                    <button id="safetyremarks_modal" class="btn btn-info" type="button" onclick="safetyRemarksObject.submitSafetyRemarksModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New SafetyRemarks Modal End -->
