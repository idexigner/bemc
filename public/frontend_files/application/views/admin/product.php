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
                            Drug List <span class="add-new-content"><a onclick="productObject.showProductCreateModal()">Add New Drug</a></span>
                        </header>
                        <div class="panel-body" style="display: block;">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>Generic</th>
                                    <th>Brand Name</th>
                                    <th>Price</th>
                                    <th>Manufacturer</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody class="product-list">
                                <?php
                                foreach ($AllDrug AS $drug) {
                                    echo '<tr class="table-row">
                                    <td><a class="link" onclick="productObject.showProductEditModal('.$drug['DrugID'].')">'.$drug['GenericName'].'</a></td>
                                    <td>'.$drug['BrandName'].'</td>
                                    <td>'.$drug['PriceInBDT'].' Tk</td>
                                    <td>'.$drug['ManufacturerName'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="productObject.showProductEditModal('.$drug['DrugID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="productObject.deleteProduct('.$drug['DrugID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New Drug Modal Start -->
<div class="modal modal-fix" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Drug</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewDrug" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Generic </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="GenericID" name="GenericID" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Brand </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="BrandID" name="BrandID" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Manufacturer </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="ManufacturerID" name="ManufacturerID" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Dosage Form </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="DosageFormID" name="DosageFormID" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Strength </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="StrengthID" name="StrengthID" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Pack Size </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <select id="PackSizeID" name="PackSizeID" required></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Price In BDT </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="PriceInBDT" name="PriceInBDT" max="10" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Highlighted</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsHighlighted" id="IsHighlightedYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsHighlighted" id="IsHighlightedNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Feature Product</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsNewProduct" id="IsNewProductYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsNewProduct" id="IsNewProductNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="DrugIsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="DrugIsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="product_modal" class="btn btn-info" type="button" onclick="productObject.submitProductModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New Drug Modal End -->
