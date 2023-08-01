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
                            Classification List <span class="add-new-content"><a onclick="classificationObject.showClassificationCreateModal()">Add New Classification</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Classification Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="classification-list">
                                <?php
                                foreach ($AllClassification AS $classification) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="classificationObject.showClassificationEditModal('.$classification['ID'].')">'.$classification['Name'].'</a></td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="classificationObject.showClassificationEditModal('.$classification['ID'].', \''.$classification['Name'].'\')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="classificationObject.deleteClassification('.$classification['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New Classification Modal Start -->
<div class="modal modal-fix" id="addClassificationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Classification</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewClassification" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Name </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="ClassificationName" name="ClassificationName" required>
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
                    <button id="classification_modal" class="btn btn-info" type="button" onclick="classificationObject.submitClassificationModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New Classification Modal End -->
