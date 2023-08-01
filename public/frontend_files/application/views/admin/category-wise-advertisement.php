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

							Advertisement List for

							<span class="tools pull-right">

								<select id="AdvertisementListCategoryID" name="AdvertisementListCategoryID" onchange="categoryWiseAdvertisementObject.populateAdvertisementList(this.value)">

									<option value="">-Select Category-</option>

									<option value="1">Generic</option>

									<option value="2">Brand</option>

									<option value="3">Indication</option>

								</select>

								<a onclick="categoryWiseAdvertisementObject.showAdvertisementCreateModal()">Add New Advertisement</a>

							</span>

						</header>

						<div class="panel-body">

							<div class="adv-table">

								<table  class="display table table-bordered table-striped" id="dynamic-table">

									<thead>

									<tr>

										<th width="15%">Name</th>

										<th width="20%">Organization</th>

										<th width="15%">Title</th>

										<th width="10%">Publish Date</th>

										<th width="10%">Unpublished Date</th>

										<th width="20%">Position</th>

										<th width="10%">Action</th>

									</tr>

									</thead>

									<tbody class="advertisement-list"></tbody>

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

<!-- Add New Advertisement Modal Start -->

<div class="modal modal-fix" id="addAdvertisementModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h3 class="modal-title">Add New Advertisement</h3>

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>

            <form id="addNewAdvertisement" class="form-horizontal">

                <div class="modal-body">

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Organization </span>

                            <span class="required-field">*</span>

                        </label>

                        <div class="col-md-6">

                            <input id="AdvertisementOrganization" name="Organization" required>

                            <span class="advertisement-organization-require-message error-message error">This field is required.</span>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Advertisement For </span>

                            <span class="required-field">*</span>

                        </label>

                        <div class="col-md-6">

                            <select id="AdvertisementCategoryID" name="AdvertisementCategoryID" onchange="categoryWiseAdvertisementObject.loadCategoryValues(this.value, '')">

                                <option value="">-Select Category-</option>

                                <option value="1">Generic</option>

                                <option value="2">Brand</option>

                                <option value="3">Indication</option>

                            </select>

                            <span class="advertisement-category-id-require-message error-message error">This field is required.</span>

                        </div>

                    </div>

                    <div class="form-group advertisement-category-value" style="display: none">

                        <label class="control-label col-md-4">

                            <span id="advertisement-category-value-label"></span>

                            <span class="required-field">*</span>

                        </label>

                        <div class="col-md-6">

                            <select id="AdvertisementCategoryValue" name="AdvertisementCategoryValue"></select>

                            <span class="advertisement-category-value-require-message error-message error">This field is required.</span>

                        </div>

                    </div>

                    <div class="form-group advertisement-position-value">

                        <label class="control-label col-md-4">

                            <span>Advertisement Position </span>

                            <span class="required-field">*</span>

                        </label>

                        <div class="col-md-6">

                            <select id="AdvertisementPositionID" name="AdvertisementPositionID" required onclick="categoryWiseAdvertisementObject.changeAdvertisementPosition(this.value)"></select>

                            <span class="advertisement-position-require-message error-message error">This field is required.</span>

                        </div>

                    </div>

                    <div class="form-group advertisement-position-detail" style="display: none">

                        <label class="control-label col-md-4"></label>

                        <div class="col-md-6">

                            <textarea id="AdvertisementPositionDetail" rows="6" class="form-control ckeditor-rich-text" type="text" disabled></textarea>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Image </span>

                            <span class="required-field">*</span>

                        </label>

                        <div class="col-md-6">

                            <input id="AdvertisementImagePath" name="ImagePath" type="file" onchange="categoryWiseAdvertisementObject.setAdvertisementImagePathThumbnail(this, 'AdvertisementImagePathThumbnail')" />

                            <span class="advertisement-image-path-require-message error-message error">This field is required.</span>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Image Thumbnail</span>

                        </label>

                        <div class="col-md-6">

                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">

                                <img id="AdvertisementImagePathThumbnail" src='' alt="Thumbnail"/>

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Title </span>

                        </label>

                        <div class="col-md-6">

                            <input id="AdvertisementTitle" name="Title">

                            <span class="advertisement-title-require-message error-message error">This field is required.</span>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Body Text </span>

                        </label>

                        <div class="col-md-6">

                            <textarea id="AdvertisementBodyText" name="BodyText" rows="6" class="form-control ckeditor-rich-text" type="text" maxlength="500"></textarea>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Link URL </span>

                        </label>

                        <div class="col-md-6">

                            <input id="AdvertisementLinkURL" name="LinkURL">

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">Applicable For</label>

                        <div class="col-md-6">

                            <div class="radio">

                                <label><input checked="checked" type="radio" name="ApplicableFor" id="ApplicableForWeb" value="1">Web</label>

                            </div>

                            <div class="radio">

                                <label><input type="radio" name="ApplicableFor" id="ApplicableForMobile" value="2">Mobile</label>

                            </div>

                            <div class="radio">

                                <label><input type="radio" name="ApplicableFor" id="ApplicableForAll" value="0">Both</label>

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Publish Date </span>

                            <span class="required-field">*</span>

                        </label>

                        <div class="col-md-6">

                            <input id="AdvertisementPublishDate" name="PublishDate" required class="date-field">

                            <span class="advertisement-publish-date-require-message error-message error">This field is required.</span>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Unpublished Date </span>

                            <span class="required-field">*</span>

                        </label>

                        <div class="col-md-6">

                            <input id="AdvertisementUnpublishedDate" name="UnpublishedDate" required class="date-field">

                            <span class="advertisement-unpublished-date-require-message error-message error">This field is required.</span>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Contact Person </span>

                        </label>

                        <div class="col-md-6">

                            <input id="AdvertisementContactPerson" name="ContactPerson">

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Email </span>

                        </label>

                        <div class="col-md-6">

                            <input id="AdvertisementEmailID" name="EmailID">

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Mobile No </span>

                        </label>

                        <div class="col-md-6">

                            <input id="AdvertisementMobileNo" name="MobileNo">

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">Is Active</label>

                        <div class="col-md-6">

                            <div class="radio">

                                <label>

                                    <input checked="checked" type="radio" name="IsActive" id="AdvertisementIsActiveYes" value="1">Yes</label>

                            </div>

                            <div class="radio">

                                <label>

                                    <input type="radio" name="IsActive" id="AdvertisementIsActiveNo" value="0">No</label>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button id="advertisement_modal" class="btn btn-info" type="button" onclick="categoryWiseAdvertisementObject.submitAdvertisementModal()">Create</button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

    commonMethods.enableCKEditorByIDs(['AdvertisementBodyText']);

</script>

<!-- Add New Advertisement Modal End -->

<script>

	$('#dynamic-table').dataTable( {

		"aaSorting": [[ 0, "asc" ]]

	} );



	$('div.adv-table div#dynamic-table_wrapper div.row-fluid').css('width', '100%');

	$('#dynamic-table thead tr th').css('font-weight', 'bold');

	$('#dynamic-table thead tr th').css('font-size', '15px');

</script>

