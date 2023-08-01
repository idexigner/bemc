<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var mimsLearningObject = {
        activeMiMSLearningID: '',
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#MiMSLearningTitle').val() == '') {
                is_valid = false;
                $('.mimslearning-title-require-message').show();
            }
            if ($('#MiMSLearningLinkAddress').val() == '') {
                is_valid = false;
                $('.mimslearning-link-address-require-message').show();
            }
            if ($('#MiMSLearningImagePath').val() == '') {
                is_valid = false;
                $('.mimslearning-image-path-require-message').show();
            }

            return is_valid;
        },
        initMiMSLearningPage: function() {
            var today = new Date((new Date()).setHours(0, 0, 0, 0));
            $('.date-field').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                clearBtn: true,
                todayHighlight: true,
                startDate:today
            });
        },
        showMiMSLearningCreateModal: function () {
            mimsLearningObject.activeMiMSLearningID = '';
            $('.error-message').hide();
            $('#mimslearning_modal').html('Create');
            $('#MiMSLearningTitle').val('');
            $('#MiMSLearningDescription').val('');
            $('#MiMSLearningLinkAddress').val('');
            $('#MiMSLearningImagePathThumbnail').attr('src', '');
            $("#MiMSLearningIsActiveNo").prop("checked", true);
            $('#addMiMSLearningModal').modal('show');
        },
        deleteMiMSLearning: function (mimslearningID) {
            console.log('Method Name: mimsLearningObject.deleteMiMSLearning');
            var formURL = "<?php echo site_url('MiMSLearning/deleteMiMSLearning');?>?MiMSLearningID="+mimslearningID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'mimsLearningObject.deleteMiMSLearning', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete MiMSLearning', success_msg, 'Ok');
                    mimsLearningObject.populateMiMSLearningList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete MiMSLearning', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitMiMSLearningModal: function () {
            var special_report_description = commonMethods.getRichTextValueByID('MiMSLearningDescription');
            $('#MiMSLearningDescription').val(special_report_description);

            var is_valid = mimsLearningObject.validateForm();
            if (!is_valid) return;
            $('#addMiMSLearningModal').modal('hide');
            var formURL = mimsLearningObject.activeMiMSLearningID == '' ? "<?php echo site_url('MiMSLearning/addMiMSLearning');?>" : "<?php echo site_url('MiMSLearning/updateMiMSLearning');?>?MiMSLearningID="+mimsLearningObject.activeMiMSLearningID;
            var form = $('form#addNewMiMSLearning');
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
                    var user_event = mimsLearningObject.activeMiMSLearningID == '' ? 'Add' : 'Update';
                    if (data) {
                        if (data.error_msg != ''){
                            mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' MiMSLearning', data.error_msg, 'Ok');
                        } else if (data.result){
                            var success_msg = 'You have successfully added a mimslearning.';
                            mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + 'MiMSLearning', success_msg, 'Ok');
                            mimsLearningObject.populateMiMSLearningList();
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
        populateMiMSLearningList: function() {
            var formURL = "<?php echo site_url('MiMSLearning/getAllMiMSLearning')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'mimsLearningObject.getMiMSLearningList', function(mimslearningData){
                var mimslearning_tr_text = '';
                $('tbody.mimslearning-list').html('');
                for(var i = 0; i < mimslearningData.length; i++) {
                    mimslearning_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="mimsLearningObject.showMiMSLearningEditModal('+mimslearningData[i].ID+')">'+mimslearningData[i].Title+'</a></td>' +
                        '<td>' + mimslearningData[i].LinkAddress + '</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="mimsLearningObject.showMiMSLearningEditModal('+mimslearningData[i].ID+')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="mimsLearningObject.deleteMiMSLearning('+mimslearningData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.mimslearning-list').append(mimslearning_tr_text);
                }
            });
        },
        showMiMSLearningEditModal: function (mimslearningID) {
            console.log('Method Name: mimsLearningObject.showMiMSLearningEditModal');
            $('.error-message').hide();
            mimsLearningObject.activeMiMSLearningID = mimslearningID;
            var formURL = "<?php echo site_url('MiMSLearning/getMiMSLearningDetailInformation')?>?MiMSLearningID="+mimslearningID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'mimsLearningObject.showMiMSLearningEditModal', function(mimslearningData){
                $('#MiMSLearningTitle').val(mimslearningData.Title);
                commonMethods.setRichTextValueByID('MiMSLearningDescription', mimslearningData.Description);
                $('#MiMSLearningLinkAddress').val(mimslearningData.LinkAddress);
                $('#MiMSLearningImagePathThumbnail').attr('src', '<?php echo base_url()?>MiMSLearningImages/'+mimslearningData.ImagePath);
                if (mimslearningData.IsActive) {
                    $("#MiMSLearningIsActiveYes").prop("checked", true);
                } else {
                    $("#MiMSLearningIsActiveNo").prop("checked", true);
                }
            });
            $('#mimslearning_modal').html('Update');
            $('#addMiMSLearningModal').modal('show');
        },
        setMiMSLearningImagePathThumbnail: function (input, objectID) {
            console.log('mimsLearningObject.setMiMSLearningImagePathThumbnail' + 'Params: input, objectID' + ' Values: ' + input + ' ' + objectID);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+objectID).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    mimsLearningObject.initMiMSLearningPage();
</script>
