<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var strengthObject = {
        activeStrengthID: '',
        validateForm: function() {
            var is_valid = true;
            return is_valid;
        },
        showStrengthCreateModal: function () {
            strengthObject.activeStrengthID = '';
            $('.error-message').hide();
            $('#strength_modal').html('Create');
            $('#StrengthName').val('');
            $('#addStrengthModal').modal('show');
        },
        showStrengthEditModal: function (strengthID, strengthName) {
            strengthObject.activeStrengthID = strengthID;
            $('.error-message').hide();
            $('#strength_modal').html('Update');
            $('#StrengthName').val(strengthName);
            $('#addStrengthModal').modal('show');
        },
        deleteStrength: function (strengthID) {
            console.log('Method Name: strengthObject.deleteStrength');
            var formURL = "<?php echo site_url('Strength/deleteStrength');?>?StrengthID="+strengthID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'strengthObject.deleteStrength', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Strength', success_msg, 'Ok');
                    strengthObject.populateStrengthList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Strength', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitStrengthModal: function () {
            var is_valid = strengthObject.validateForm();
            if (!is_valid) return;
            $('#addStrengthModal').modal('hide');
            var formURL = strengthObject.activeStrengthID == '' ? "<?php echo site_url('Strength/addStrength');?>" : "<?php echo site_url('Strength/updateStrength');?>?StrengthID="+strengthObject.activeStrengthID;
            var postData = $('form#addNewStrength').serializeArray();
            mimsServerAPI.postDataToServer(formURL, postData, 'JSONp', 'strengthObject.submitStrengthModal', function(data){
                var user_event = strengthObject.activeStrengthID == '' ? 'Add' : 'Update';
                if (data) {
                    if (data.error_msg != ''){
                        mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Strength', data.error_msg, 'Ok');
                    } else if (data.result){
                        var success_msg = 'You have successfully added a strength.';
                        mimsPopup.showGeneralPopup('success', 'Success!!!', ' Strength', success_msg, 'Ok');
                        strengthObject.populateStrengthList();
                    }
                }
            });
        },
        populateStrengthList: function() {
            var formURL = "<?php echo site_url('Strength/getAllActiveStrengthInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'strengthObject.getStrengthList', function(strengthData){
                var strength_tr_text = '';
                $('tbody.strength-list').html('');
                for(var i = 0; i < strengthData.length; i++) {
                    strength_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="strengthObject.showStrengthEditModal('+strengthData[i].ID+')">'+strengthData[i].Name+'</a></td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="strengthObject.showStrengthEditModal('+strengthData[i].ID+',\''+strengthData[i].Name+'\')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="strengthObject.deleteStrength('+strengthData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.strength-list').append(strength_tr_text);
                }
            });
        }
    }
</script>
