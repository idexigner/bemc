<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var resourceObject = {
        activeResourceID: '',
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#ResourceTitle').val() == '') {
                is_valid = false;
                $('.resource-title-require-message').show();
            }
            if ($('#ResourceLinkAddress').val() == '') {
                is_valid = false;
                $('.resource-link-address-require-message').show();
            }
            if ($('#ResourceImagePath').val() == '') {
                is_valid = false;
                $('.resource-image-path-require-message').show();
            }

            return is_valid;
        },
        initResourcePage: function() {
            var today = new Date((new Date()).setHours(0, 0, 0, 0));
            $('.date-field').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                clearBtn: true,
                todayHighlight: true,
                startDate:today
            });
        },
        showResourceCreateModal: function () {
            resourceObject.activeResourceID = '';
            $('.error-message').hide();
            $('#resource_modal').html('Create');
            $('#ResourceTitle').val('');
            // $('#ResourceDescription').val('');
            $('#ResourceLinkAddress').val('');
            $('#ResourceImagePathThumbnail').attr('src', '');
            $("#ResourceIsActiveNo").prop("checked", true);
            $('#addResourceModal').modal('show');
        },
        deleteResource: function (resourceID) {
            console.log('Method Name: resourceObject.deleteResource');
            var formURL = "<?php echo site_url('Resource/deleteResource');?>?ResourceID="+resourceID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'resourceObject.deleteResource', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Resource', success_msg, 'Ok');
                    resourceObject.populateResourceList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Resource', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitResourceModal: function () {
            console.log('Method Name: resourceObject.submitResourceModal');
			var is_valid = resourceObject.validateForm();
			if (!is_valid) return;
			mimsPopup.showLoaderModal('');
			$('#addResourceModal').modal('hide');
			var formURL = resourceObject.activeResourceID == '' ? "<?php echo site_url('Resource/addResource');?>" : "<?php echo site_url('Resource/updateResource');?>?ResourceID="+resourceObject.activeResourceID;
			var postData = $('form#addNewResource').serializeArray();
			mimsServerAPI.postDataToServer(formURL, postData, 'JSONp', 'resourceObject.submitResourceModal', function(data){
				$('#loaderModal').modal('hide');
				var user_event = resourceObject.activeResourceID == '' ? 'Added' : 'Updated';
				if (data) {
					if (data.error_msg != ''){
						mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Resource', data.error_msg, 'Ok');
					} else if (data.result){
						var success_msg = 'You have successfully '+user_event+' a resource.';
						mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + 'Resource', success_msg, 'Ok');
						resourceObject.populateResourceList();
					}
				}
			});
        },
        populateResourceList: function() {
            var formURL = "<?php echo site_url('Resource/getAllResource')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'resourceObject.getResourceList', function(resourceData){
                var resource_tr_text = '';
                $('tbody.resource-list').html('');
                for(var i = 0; i < resourceData.length; i++) {
                    resource_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="resourceObject.showResourceEditModal('+resourceData[i].ID+')">'+resourceData[i].Title+'</a></td>' +
                        '<td>' + resourceData[i].LinkAddress + '</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="resourceObject.showResourceEditModal('+resourceData[i].ID+')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="resourceObject.deleteResource('+resourceData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.resource-list').append(resource_tr_text);
                }
            });
        },
        showResourceEditModal: function (resourceID) {
            console.log('Method Name: resourceObject.showResourceEditModal');
            $('.error-message').hide();
            resourceObject.activeResourceID = resourceID;
            var formURL = "<?php echo site_url('Resource/getResourceDetailInformation')?>?ResourceID="+resourceID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'resourceObject.showResourceEditModal', function(resourceData){
                $('#ResourceTitle').val(resourceData.Title);
                // commonMethods.setRichTextValueByID('ResourceDescription', resourceData.Description);
                $('#ResourceLinkAddress').val(resourceData.LinkAddress);
                $('#ResourceImagePathThumbnail').attr('src', '<?php echo base_url()?>ResourceImages/'+resourceData.ImagePath);
                if (resourceData.IsActive) {
                    $("#ResourceIsActiveYes").prop("checked", true);
                } else {
                    $("#ResourceIsActiveNo").prop("checked", true);
                }
            });
            $('#resource_modal').html('Update');
            $('#addResourceModal').modal('show');
        },
        setResourceImagePathThumbnail: function (input, objectID) {
            console.log('resourceObject.setResourceImagePathThumbnail' + 'Params: input, objectID' + ' Values: ' + input + ' ' + objectID);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+objectID).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    resourceObject.initResourcePage();
</script>
