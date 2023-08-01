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
							Job List
							<span class="tools pull-right"><a onclick="jobObject.showJobCreateModal()">Add New Job</a></span>
						</header>
						<div class="panel-body">
							<div class="adv-table">
								<table  class="display table table-bordered table-striped" id="dynamic-table">
									<thead>
									<tr>
										<th width="30%">Title</th>
										<th width="20%">Organization</th>
										<th width="20%">Position</th>
										<th width="10%">Publish Date</th>
										<th width="10%">Application Deadline</th>
										<th width="10%">Action</th>
									</tr>
									</thead>
									<tbody>
									<?php
									foreach ($AllJobs AS $job) {
										echo '<tr class="table-row">
                                    <td><a class="link" onclick="jobObject.showJobEditModal('.$job['ID'].')">'.$job['Title'].'</a></td>
                                    <td>'.$job['Organization'].'</td>
                                    <td>'.$job['Position'].'</td>
                                    <td>'.$job['PublishDate'].'</td>
                                    <td>'.$job['ApplicationDeadline'].'</td>
                                    <td>
                                        <div class="actions">
                                            <a onclick="jobObject.showJobEditModal('.$job['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>
                                            <a onclick="jobObject.deleteJob('.$job['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>
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
<!-- Add New Job Modal Start -->
<div class="modal modal-fix" id="addJobModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Job</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewJob" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">Category</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label><input checked="checked" type="radio" name="JobCategory" id="JobCategoryPharma" value="1">Pharma</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="JobCategory" id="JobCategoryMedical" value="2">Medical</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Title </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobTitle" name="Title" required>
                            <span class="job-title-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Organization </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobOrganization" name="Organization" required>
                            <span class="job-organization-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Organization Logo </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="OrganizationLogo" name="OrganizationLogo" type="file" onchange="jobObject.setJobImagePathThumbnail(this, 'OrganizationLogoThumbnail')" />
                            <span class="job-circular-image-path-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Organization Logo Thumbnail</span>
                        </label>
                        <div class="col-md-6">
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                <img id="OrganizationLogoThumbnail" src='' alt="Thumbnail"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Description </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="JobDescription" name="Description" rows="6" class="form-control ckeditor-rich-text" type="text" maxlength="500"></textarea>
                            <span class="job-description-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Position </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobPosition" name="Position">
                            <span class="job-position-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Application Deadline </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobApplicationDeadline" name="ApplicationDeadline" required class="date-field">
                            <span class="job-application-deadline-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Publish Date </span>
                            <span class="required-field">*</span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobPublishDate" name="PublishDate" required class="date-field">
                            <span class="job-publish-date-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobCircularImagePath" name="JobCircularImagePath" type="file" onchange="jobObject.setJobImagePathThumbnail(this, 'JobCircularImagePathThumbnail')" />
                            <span class="job-circular-image-path-require-message error-message error">This field is required.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Image Thumbnail</span>
                        </label>
                        <div class="col-md-6">
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                <img id="JobCircularImagePathThumbnail" src='' alt="Thumbnail"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Salary </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobSalary" name="Salary" required type="number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Educational Requirement </span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="JobEducationalRequirement" name="EducationalRequirement" rows="6" class="form-control ckeditor-rich-text" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Experience Requirement </span>
                        </label>
                        <div class="col-md-6">
                            <textarea id="JobExperienceRequirement" name="ExperienceRequirement" rows="6" class="form-control ckeditor-rich-text" type="text" maxlength="500"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Number of Vacancy </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobNumberOfVacancy" name="NumberOfVacancy" type="number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Age Limit </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobAgeLimit" name="AgeLimit" type="number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Location </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobLocation" name="Location">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Job Source </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobSource" name="JobSource">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Job Type </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobType" name="JobType">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Employment Type </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobEmploymentType" name="EmploymentType">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Job Nature </span>
                        </label>
                        <div class="col-md-6">
                            <input id="JobNature" name="JobNature">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Applying Procedure </span>
                        </label>
                        <div class="col-md-6">
							<textarea id="JobApplyingProcedure" name="ApplyingProcedure" rows="6" class="form-control ckeditor-rich-text" type="text" maxlength="1000"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Is Active</label>
                        <div class="col-md-6">
                            <div class="radio">
                                <label>
                                    <input checked="checked" type="radio" name="IsActive" id="JobIsActiveYes" value="1">Yes</label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="IsActive" id="JobIsActiveNo" value="0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="job_modal" class="btn btn-info" type="button" onclick="jobObject.submitJobModal()">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    commonMethods.enableCKEditorByIDs(['JobDescription', 'JobEducationalRequirement', 'JobExperienceRequirement']);
</script>
<!-- Add New Job Modal End -->
<script>
	$('#dynamic-table').dataTable( {
		"aaSorting": [[ 0, "asc" ]]
	} );

	$('div.adv-table div#dynamic-table_wrapper div.row-fluid').css('width', '100%');
	$('#dynamic-table thead tr th').css('font-weight', 'bold');
	$('#dynamic-table thead tr th').css('font-size', '15px');
</script>
