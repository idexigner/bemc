<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var classificationObject = {
        activeClassificationID: '',
        showClassificationCreateModal: function () {
            classificationObject.activeClassificationID = '';
            $('#classification_modal').html('Create');
            $('#ClassificationName').val('');
            $('#addClassificationModal').modal('show');
        },
        showClassificationEditModal: function (classificationID, classificationName) {
            classificationObject.activeClassificationID = classificationID;
            $('#classification_modal').html('Update');
            $('#ClassificationName').val(classificationName);
            $('#addClassificationModal').modal('show');
        },
        deleteClassification: function (classificationID) {
            console.log('Method Name: classificationObject.deleteClassification');
            var formURL = "<?php echo site_url('Classification/deleteClassification');?>?ClassificationID="+classificationID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'classificationObject.deleteClassification', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Classification', success_msg, 'Ok');
                    classificationObject.populateClassificationList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Classification', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitClassificationModal: function () {
            $('#addClassificationModal').modal('hide');
            var formURL = classificationObject.activeClassificationID == '' ? "<?php echo site_url('Classification/addClassification');?>" : "<?php echo site_url('Classification/updateClassification');?>?ClassificationID="+classificationObject.activeClassificationID;
            var postData = $('form#addNewClassification').serializeArray();
            mimsServerAPI.postDataToServer(formURL, postData, 'JSONp', 'classificationObject.submitClassificationModal', function(data){
                var user_event = classificationObject.activeClassificationID == '' ? 'Add' : 'Update';
                if (data) {
                    if (data.error_msg != ''){
                        mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Classification', 'Data is not deleted successfully!', 'Ok');
                    } else if (data.result){
                        var success_msg = 'You have successfully added a classification.';
                        mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + ' Classification', success_msg, 'Ok');
                        classificationObject.populateClassificationList();
                    }
                }
            });
        },
        populateClassificationList: function() {
            var formURL = "<?php echo site_url('Classification/getAllActiveClassificationInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'classificationObject.getClassificationList', function(classificationData){
                var classification_tr_text = '';
                $('tbody.classification-list').html('');
                for(var i = 0; i < classificationData.length; i++) {
                    classification_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="classificationObject.showClassificationEditModal('+classificationData[i].ID+')">'+classificationData[i].Name+'</a></td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="classificationObject.showClassificationEditModal('+classificationData[i].ID+',\''+classificationData[i].Name+'\')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="classificationObject.deleteClassification('+classificationData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.classification-list').append(classification_tr_text);
                }
            });
        }
    }
</script>
