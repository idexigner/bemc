<?php defined('BASEPATH') OR exit('No direct script access allowed');  ?>
<script>
    var safetyRemarksObject = {
        activeSafetyRemarksID: '',
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#SafetyRemark').val()) {
                is_valid = false;
                $('.safety-remark-require-message').show();
            }

            return is_valid;
        },
        showSafetyRemarksCreateModal: function () {
            safetyRemarksObject.activeSafetyRemarksID = '';
            $('.error-message').hide();
            $('#safetyremarks_modal').html('Create');
            $('#SafetyRemark').val('');
            $('#addSafetyRemarksModal').modal('show');
        },
        showSafetyRemarksEditModal: function (safetyremarksID, safetyremark) {
            safetyRemarksObject.activeSafetyRemarksID = safetyremarksID;
            $('.error-message').hide();
            $('#safetyremarks_modal').html('Update');
            $('#SafetyRemark').val(safetyremark);
            $('#addSafetyRemarksModal').modal('show');
        },
        deleteSafetyRemarks: function (safetyRemarksID) {
            console.log('Method Name: safetyRemarksObject.deleteSafetyRemarks');
            var formURL = "<?php echo site_url('SafetyRemarks/deleteSafetyRemarks');?>?SafetyRemarksID="+safetyRemarksID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'safetyRemarksObject.deleteSafetyRemarks', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Safety Remark', success_msg, 'Ok');
                    safetyRemarksObject.populateSafetyRemarksList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Safety Remark', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitSafetyRemarksModal: function () {
            var is_valid = safetyRemarksObject.validateForm();
            if (!is_valid) return;
            $('#addSafetyRemarksModal').modal('hide');
            var formURL = safetyRemarksObject.activeSafetyRemarksID == '' ? "<?php echo site_url('SafetyRemarks/addSafetyRemarks');?>" : "<?php echo site_url('SafetyRemarks/updateSafetyRemarks');?>?SafetyRemarksID="+safetyRemarksObject.activeSafetyRemarksID;
            var postData = $('form#addNewSafetyRemarks').serializeArray();
            mimsServerAPI.postDataToServer(formURL, postData, 'JSONp', 'safetyRemarksObject.submitSafetyRemarksModal', function(data){
                var user_event = safetyRemarksObject.activeSafetyRemarksID == '' ? 'Add' : 'Update';
                if (data) {
                    if (data.error_msg != ''){
                        mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Safety Remark', data.error_msg, 'Ok');
                    } else if (data.result){
                        var success_msg = 'You have successfully added a safety remarks.';
                        mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + ' Safety Remark', success_msg, 'Ok');
                        safetyRemarksObject.populateSafetyRemarksList();
                    }
                }
            });
        },
        populateSafetyRemarksList: function() {
            var formURL = "<?php echo site_url('SafetyRemarks/getAllActiveSafetyRemarks')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'safetyRemarksObject.getSafetyRemarksList', function(safetyremarksData){
                var safetyremarks_tr_text = '';
                $('tbody.safetyremarks-list').html('');
                for(var i = 0; i < safetyremarksData.length; i++) {
                    safetyremarks_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="safetyRemarksObject.showSafetyRemarksEditModal('+safetyremarksData[i].ID+')">'+safetyremarksData[i].Remarks+'</a></td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="safetyRemarksObject.showSafetyRemarksEditModal('+safetyremarksData[i].ID+',\''+safetyremarksData[i].Remarks+'\')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="safetyRemarksObject.deleteSafetyRemarks('+safetyremarksData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.safetyremarks-list').append(safetyremarks_tr_text);
                }
            });
        }
    }
</script>
