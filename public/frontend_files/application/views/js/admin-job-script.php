<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var jobObject = {
        activeJobID: '',
        allExistingPosition: [],
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#JobTitle').val() == '') {
                is_valid = false;
                $('.job-title-require-message').show();
            }
            if ($('#JobOrganization').val() == '') {
                is_valid = false;
                $('.job-organization-require-message').show();
            }
            if ($('#JobDescription').val() == '') {
                is_valid = false;
                $('.job-description-require-message').show();
            }
            if ($('#JobApplicationDeadline').val() == '') {
                is_valid = false;
                $('.job-application-deadline-require-message').show();
            }
            if ($('#JobPublishDate').val() == '') {
                is_valid = false;
                $('.job-publish-date-require-message').show();
            }

            return is_valid;
        },
        initJobPage: function() {
            var today = new Date((new Date()).setHours(0, 0, 0, 0));
            $('.date-field').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                clearBtn: true,
                todayHighlight: true,
                startDate:today
            });
        },
        showJobCreateModal: function () {
            jobObject.activeJobID = '';
            $('.error-message').hide();
            $('#job_modal').html('Create');
            $('#JobTitle').val('');
            $('#JobOrganization').val('');
            $('#OrganizationLogoThumbnail').attr('src', '');
			mimsTextMethods.setRichTextValueByID('JobDescription','');
            $('#JobPosition').val('');
            $('#OrganizationLogo').val('');
            $('#JobCircularImagePath').val('');
            $('#JobCircularImagePathThumbnail').attr('src', '');
            $('#JobApplicationDeadline').val('');
            $('#JobPublishDate').val('');
            $('#JobSalary').val('Negotiable');
			mimsTextMethods.setRichTextValueByID('JobEducationalRequirement', '');
			mimsTextMethods.setRichTextValueByID('JobExperienceRequirement', '');
            $('#JobNumberOfVacancy').val('');
            $('#JobAgeLimit').val('');
            $('#JobLocation').val('Anywhere in Bangladesh');
            $('#JobSource').val('Online job portal');
            $('#JobType').val('');
            $('#JobEmploymentType').val('');
            $('#JobNature').val('Full-Time');
            $('#JobApplyingProcedure').val('Follow job Circular image');
            $("#JobIsActiveNo").prop("checked", true);
            $('#addJobModal').modal('show');
        },
        deleteJob: function (jobID) {
            console.log('Method Name: jobObject.deleteJob');
            var formURL = "<?php echo site_url('Job/deleteJob');?>?JobID="+jobID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'jobObject.deleteJob', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Job', success_msg, 'Ok');
                    jobObject.populateJobList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Job', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitJobModal: function () {
            var job_description = commonMethods.getRichTextValueByID('JobDescription');
            $('#JobDescription').val(job_description);
            var job_educational_requirement = commonMethods.getRichTextValueByID('JobEducationalRequirement');
            $('#JobEducationalRequirement').val(job_educational_requirement);
            var job_experience_requirement = commonMethods.getRichTextValueByID('JobExperienceRequirement');
            $('#JobExperienceRequirement').val(job_experience_requirement);

            var is_valid = jobObject.validateForm();
            if (!is_valid) return;
            $('#addJobModal').modal('hide');
            var formURL = jobObject.activeJobID == '' ? "<?php echo site_url('Job/addJob');?>" : "<?php echo site_url('Job/updateJob');?>?JobID="+jobObject.activeJobID;
            var form = $('form#addNewJob');
            if (window.FormData){
                var postData = new FormData(form[0]);
            } else {
                return false;
            }

            $.ajax({
                url         : formURL,
                data        : postData,
                cache       : false,
                contentType : false,
                processData : false,
                type        : 'POST',
                dataType    : "JSONp",
                beforeSend:function(){

                },
                success:function(serverResponse, textStatus, jqXHR)
                {
                    var data = serverResponse.response;
                    var user_event = jobObject.activeJobID == '' ? 'Add' : 'Update';
                    if (data) {
                        if (data.error_msg != ''){
                            mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Job', data.error_msg, 'Ok');
                        } else if (data.result){
                            var success_msg = 'You have successfully added a job.';
                            mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + ' Job', success_msg, 'Ok');
                            jobObject.populateJobList();
                        }
                    }
                },
                error: function(jqXHR, textStatus, errorThrown)
                {

                },
                statusCode: {

                },
                complete: function(){

                },
                timeout: 300000
            });
        },
        populateJobList: function() {
            var formURL = "<?php echo site_url('Job/getAllJobs')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'jobObject.getJobList', function(jobData){
                var job_tr_text = '';
                $('tbody.job-list').html('');
                for(var i = 0; i < jobData.length; i++) {
                    job_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="jobObject.showJobEditModal('+jobData[i].ID+')">'+jobData[i].Title+'</a></td>' +
                        '<td>' + jobData[i].Organization + '</td>' +
                        '<td>' + jobData[i].Position + '</td>' +
                        '<td>' + jobData[i].PublishDate + '</td>' +
                        '<td>' + jobData[i].ApplicationDeadline + '</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="jobObject.showJobEditModal('+jobData[i].ID+',\''+jobData[i].Name+'\')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="jobObject.deleteJob('+jobData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.job-list').append(job_tr_text);
                }
            });
        },
        showJobEditModal: function (jobID) {
            console.log('Method Name: jobObject.showJobEditModal');
            $('.error-message').hide();
            jobObject.activeJobID = jobID;
            var formURL = "<?php echo site_url('Job/getJobDetailInformation')?>?JobID="+jobID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'jobObject.showJobEditModal', function(jobData){
                if (jobData.JobCategory == 1) {
                    $("#JobCategoryPharma").prop("checked", true);
                } else if (jobData.JobCategory == 2) {
                    $("#JobCategoryMedical").prop("checked", true);
                }
                $('#JobTitle').val(jobData.Title);
                $('#JobOrganization').val(jobData.Organization);
                $('#OrganizationLogoThumbnail').attr('src', '<?php echo base_url()?>JobImages/'+jobData.OrganizationLogo);
                $('#JobPosition').val(jobData.Position);
                $('#JobCircularImagePathThumbnail').attr('src', '<?php echo base_url()?>JobImages/'+jobData.JobCircularImagePath);
                $('#JobApplicationDeadline').datepicker('setValue', jobData.ApplicationDeadline);
                $('#JobPublishDate').datepicker('setValue', jobData.PublishDate);
                $('#JobSalary').val(jobData.Salary);
                $('#JobNumberOfVacancy').val(jobData.NumberOfVacancy);
                $('#JobAgeLimit').val(jobData.AgeLimit);
                $('#JobLocation').val(jobData.Location);
                $('#JobSource').val(jobData.JobSource);
                $('#JobType').val(jobData.JobType);
                $('#JobEmploymentType').val(jobData.EmploymentType);
                $('#JobNature').val(jobData.JobNature);
                $('#JobApplyingProcedure').val(jobData.ApplyingProcedure);
                commonMethods.setRichTextValueByID('JobDescription', jobData.Description);
                commonMethods.setRichTextValueByID('JobEducationalRequirement', jobData.EducationalRequirement);
                commonMethods.setRichTextValueByID('JobExperienceRequirement', jobData.ExperienceRequirement);
                if (jobData.IsActive) {
                    $("#JobIsActiveYes").prop("checked", true);
                } else {
                    $("#JobIsActiveNo").prop("checked", true);
                }
            });
            $('#job_modal').html('Update');
            $('#addJobModal').modal('show');
        },
        setJobImagePathThumbnail: function (input, objectID) {
            console.log('jobObject.setJobImagePathThumbnail' + 'Params: input, objectID' + ' Values: ' + input + ' ' + objectID);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+objectID).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    jobObject.initJobPage();
</script>
