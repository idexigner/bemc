<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var packSizeObject = {
        activePackSizeID: '',
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#PackSizeName').val() == '') {
                is_valid = false;
                $('.pack-size-name-require-message').show();
            }

            return is_valid;
        },
        showPackSizeCreateModal: function () {
            packSizeObject.activePackSizeID = '';
            $('.error-message').hide();
            $('#packsize_modal').html('Create');
            $('#PackSizeName').val('');
            $('#addPackSizeModal').modal('show');
        },
        showPackSizeEditModal: function (packsizeID, packsizeName) {
            packSizeObject.activePackSizeID = packsizeID;
            $('.error-message').hide();
            $('#packsize_modal').html('Update');
            $('#PackSizeName').val(packsizeName);
            $('#addPackSizeModal').modal('show');
        },
        deletePackSize: function (packSizeID) {
            console.log('Method Name: packSizeObject.deletePackSize');
            var formURL = "<?php echo site_url('PackSize/deletePackSize');?>?PackSizeID="+packSizeID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'packSizeObject.deletePackSize', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Pack Size', success_msg, 'Ok');
                    packSizeObject.populatePackSizeList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Pack Size', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitPackSizeModal: function () {
            var is_valid = packSizeObject.validateForm();
            if (!is_valid) return;
            $('#addPackSizeModal').modal('hide');
            var formURL = packSizeObject.activePackSizeID == '' ? "<?php echo site_url('PackSize/addPackSize');?>" : "<?php echo site_url('PackSize/updatePackSize');?>?PackSizeID="+packSizeObject.activePackSizeID;
            var postData = $('form#addNewPackSize').serializeArray();
            mimsServerAPI.postDataToServer(formURL, postData, 'JSONp', 'packSizeObject.submitPackSizeModal', function(data){
                var user_event = packSizeObject.activePackSizeID == '' ? 'Add' : 'Update';
                if (data) {
                    if (data.error_msg != ''){
                        mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Pack Size', data.error_msg, 'Ok');
                    } else if (data.result){
                        var success_msg = 'You have successfully added a pack size.';
                        mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + ' Pack Size', success_msg, 'Ok');
                        packSizeObject.populatePackSizeList();
                    }
                }
            });
        },
        populatePackSizeList: function() {
            var formURL = "<?php echo site_url('PackSize/getAllActivePackSizeInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'packSizeObject.getPackSizeList', function(packsizeData){
                var packsize_tr_text = '';
                $('tbody.packsize-list').html('');
                for(var i = 0; i < packsizeData.length; i++) {
                    packsize_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="packSizeObject.showPackSizeEditModal('+packsizeData[i].ID+')">'+packsizeData[i].Name+'</a></td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="packSizeObject.showPackSizeEditModal('+packsizeData[i].ID+',\''+packsizeData[i].Name+'\')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="packSizeObject.deletePackSize('+packsizeData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.packsize-list').append(packsize_tr_text);
                }
            });
        }
    }
</script>
