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
							Journal List
							<span class="tools pull-right"><a onclick="journalObject.showJournalCreateModal()">Add New Journal</a></span>
						</header>
						<div class="panel-body">
							<div class="adv-table">
								<table  class="display table table-bordered table-striped" id="dynamic-table">
									<thead>
									<tr>
										<th width="50%">Title</th>
										<th width="40%">Category</th>
										<th width="10%">Action</th>
									</tr>
									</thead>
									<tbody>
									<?php
									foreach ($AllJournal AS $journal) {
										echo '<tr class="table-row">
                                    <td><a class="link" onclick="journalObject.showJournalEditModal('.$journal['ID'].')">'.$journal['Title'].'</a></td>
                                    <td>'.$journal['CategoryName'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="journalObject.showJournalEditModal('.$journal['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="journalObject.deleteJournal('.$journal['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New Journal Modal Start -->
<div class="modal modal-fix" id="addJournalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Journal</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewJournal" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Title </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="JournalTitle" name="Title" required>
                            <span class="special-reports-title-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
					<div class="form-group">
						<label class="control-label col-md-4">Journal Category</label>
						<div class="col-md-6">
							<div class="radio">
								<label>
									<input checked="checked" type="radio" name="JournalCategoryID" id="JournalCategoryID1" value="1">Cardiovascular</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="JournalCategoryID" id="JournalCategoryID4" value="4">Dental</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="JournalCategoryID" id="JournalCategoryID5" value="5">Library</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="JournalCategoryID" id="JournalCategoryID2" value="2">Research Method</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="JournalCategoryID" id="JournalCategoryID3" value="3">Resource</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Journal Type</label>
						<div class="col-md-6">
							<div class="radio">
								<label>
									<input checked="checked" type="radio" name="JournalType" id="JournalTypePDF" value="pdf">PDF</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="JournalType" id="JournalTypeLink" value="link">Link</label>
							</div>
						</div>
					</div>
					<div class="form-group">
                        <label class="control-label col-md-4">
                            <span>File </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="JournalPath" name="JournalPath" type="file"/>
                            <span class="journal-image-path-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="JournalIsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="JournalIsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="journal_modal" class="btn btn-info" type="button" onclick="journalObject.submitJournalModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add New Journal Modal End -->
<script>
	$('#dynamic-table').dataTable( {
		"aaSorting": [[ 0, "asc" ]]
	} );

	$('div.adv-table div#dynamic-table_wrapper div.row-fluid').css('width', '100%');
	$('#dynamic-table thead tr th').css('font-weight', 'bold');
	$('#dynamic-table thead tr th').css('font-size', '15px');
</script>
