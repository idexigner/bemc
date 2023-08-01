<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var internationalHealthObject = {
        activeInternationalHealthID: '',
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#InternationalHealthTitle').val() == '') {
                is_valid = false;
                $('.international-health-title-require-message').show();
            }
            if ($('#InternationalHealthDescription').val() == '') {
                is_valid = false;
                $('.international-health-description-require-message').show();
            }
            if ($('#InternationalHealthPublishDate').val() == '') {
                is_valid = false;
                $('.international-health-publish-date-require-message').show();
            }
            if ($('#InternationalHealthUnpublishedDate').val() == '') {
                is_valid = false;
                $('.international-health-unpublished-date-require-message').show();
            }
            if ($('#InternationalHealthImagePath').val() == '') {
                is_valid = false;
                $('.international-health-image-path-require-message').show();
            }

            return is_valid;
        },
        initInternationalHealthPage: function() {
            var today = new Date((new Date()).setHours(0, 0, 0, 0));
            $('.date-field').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                clearBtn: true,
                todayHighlight: true,
                startDate:today
            });
        },
        showInternationalHealthCreateModal: function () {
            internationalHealthObject.activeInternationalHealthID = '';
            $('.error-message').hide();
            $('#international_health_modal').html('Create');
            $('#InternationalHealthTitle').val('');
            $('#InternationalHealthDescription').val('');
            $('#InternationalHealthImagePathThumbnail').attr('src', '');
            $('#InternationalHealthPublishDate').val('');
            $('#InternationalHealthUnpublishedDate').val('');
            $("#InternationalHealthIsActiveNo").prop("checked", true);
            $('#addInternationalHealthModal').modal('show');
        },
        deleteInternationalHealth: function (internationalHealthID) {
            console.log('Method Name: internationalHealthObject.deleteInternationalHealth');
            var formURL = "<?php echo site_url('InternationalHealth/deleteInternationalHealth');?>?InternationalHealthID="+internationalHealthID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'internationalHealthObject.deleteInternationalHealth', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Study Club Information', success_msg, 'Ok');
                    internationalHealthObject.populateInternationalHealthList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Study Club Information', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitInternationalHealthModal: function () {
            var international_health_description = commonMethods.getRichTextValueByID('InternationalHealthDescription');
            $('#InternationalHealthDescription').val(international_health_description);

            var is_valid = internationalHealthObject.validateForm();
            if (!is_valid) return;
            $('#addInternationalHealthModal').modal('hide');
            var formURL = internationalHealthObject.activeInternationalHealthID == '' ? "<?php echo site_url('InternationalHealth/addInternationalHealth');?>" : "<?php echo site_url('InternationalHealth/updateInternationalHealth');?>?InternationalHealthID="+internationalHealthObject.activeInternationalHealthID;
            var form = $('form#addNewInternationalHealth');
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
                    var user_event = internationalHealthObject.activeInternationalHealthID == '' ? 'Add' : 'Update';
                    if (data) {
                        if (data.error_msg != ''){
                            mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Study Club Information', data.error_msg, 'Ok');
                        } else if (data.result){
                            var success_msg = 'You have successfully added a international health.';
                            mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + ' Study Club Information', success_msg, 'Ok');
                            internationalHealthObject.populateInternationalHealthList();
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
        populateInternationalHealthList: function() {
            var formURL = "<?php echo site_url('InternationalHealth/getAllInternationalHealths')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'internationalHealthObject.getInternationalHealthList', function(internationalHealthData){
                var international_health_tr_text = '';
                $('tbody.international-health-list').html('');
                for(var i = 0; i < internationalHealthData.length; i++) {
                    international_health_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="internationalHealthObject.showInternationalHealthEditModal('+internationalHealthData[i].ID+')">'+internationalHealthData[i].Title+'</a></td>' +
                        '<td>' + internationalHealthData[i].PublishDateTime + '</td>' +
                        '<td>' + internationalHealthData[i].UnpublishedDateTime + '</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="internationalHealthObject.showInternationalHealthEditModal('+internationalHealthData[i].ID+')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="internationalHealthObject.deleteInternationalHealth('+internationalHealthData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.international-health-list').append(international_health_tr_text);
                }
            });
        },
        showInternationalHealthEditModal: function (internationalHealthID) {
            console.log('Method Name: internationalHealthObject.showInternationalHealthEditModal');
            $('.error-message').hide();
            internationalHealthObject.activeInternationalHealthID = internationalHealthID;
            var formURL = "<?php echo site_url('InternationalHealth/getInternationalHealthDetail')?>?InternationalHealthID="+internationalHealthID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'internationalHealthObject.showInternationalHealthEditModal', function(internationalHealthData){
                $('#InternationalHealthTitle').val(internationalHealthData.Title);
                commonMethods.setRichTextValueByID('InternationalHealthDescription', internationalHealthData.Description);
                $('#InternationalHealthImagePathThumbnail').attr('src', '<?php echo base_url()?>InternationalHealthImages/'+internationalHealthData.ImagePath);
                $('#InternationalHealthPublishDate').datepicker('setValue', internationalHealthData.PublishDateTime);
                $('#InternationalHealthUnpublishedDate').datepicker('setValue', internationalHealthData.UnpublishedDateTime);
                if (internationalHealthData.IsActive) {
                    $("#InternationalHealthIsActiveYes").prop("checked", true);
                } else {
                    $("#InternationalHealthIsActiveNo").prop("checked", true);
                }
            });
            $('#international_health_modal').html('Update');
            $('#addInternationalHealthModal').modal('show');
        },
        setInternationalHealthImagePathThumbnail: function (input, objectID) {
            console.log('internationalHealthObject.setInternationalHealthImagePathThumbnail' + 'Params: input, objectID' + ' Values: ' + input + ' ' + objectID);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+objectID).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    internationalHealthObject.initInternationalHealthPage();
</script>
