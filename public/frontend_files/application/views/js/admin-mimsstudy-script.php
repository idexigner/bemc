<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var mimsStudyObject = {
        activeMimsStudyID: '',
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#MimsStudyTitle').val() == '') {
                is_valid = false;
                $('.mims-study-title-require-message').show();
            }
            if ($('#MimsStudyLinkAddress').val() == '') {
                is_valid = false;
                $('.mims-study-link-address-require-message').show();
            }
            if ($('#MimsStudyImagePath').val() == '') {
                is_valid = false;
                $('.mims-study-image-path-require-message').show();
            }

            return is_valid;
        },
        initMimsStudyPage: function() {
            var today = new Date((new Date()).setHours(0, 0, 0, 0));
            $('.date-field').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                clearBtn: true,
                todayHighlight: true,
                startDate:today
            });
        },
        showMimsStudyCreateModal: function () {
            mimsStudyObject.activeMimsStudyID = '';
            $('.error-message').hide();
            $('#mimsstudy_modal').html('Create');
            $('#MimsStudyTitle').val('');
            $('#MimsStudyDescription').val('');
            $('#MimsStudyLinkAddress').val('');
            $('#MimsStudyImagePathThumbnail').attr('src', '');
            $("#MimsStudyIsActiveNo").prop("checked", true);
            $('#addMimsStudyModal').modal('show');
        },
        deleteMimsStudy: function (mimsstudyID) {
            console.log('Method Name: mimsStudyObject.deleteMimsStudy');
            var formURL = "<?php echo site_url('MimsStudy/deleteMimsStudy');?>?MimsStudyID="+mimsstudyID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'mimsStudyObject.deleteMimsStudy', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Special Report', success_msg, 'Ok');
                    mimsStudyObject.populateMimsStudyList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Special Report', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitMimsStudyModal: function () {
            var special_report_description = commonMethods.getRichTextValueByID('MimsStudyDescription');
            $('#MimsStudyDescription').val(special_report_description);

            var is_valid = mimsStudyObject.validateForm();
            if (!is_valid) return;
            $('#addMimsStudyModal').modal('hide');
            var formURL = mimsStudyObject.activeMimsStudyID == '' ? "<?php echo site_url('MimsStudy/addMimsStudy');?>" : "<?php echo site_url('MimsStudy/updateMimsStudy');?>?MimsStudyID="+mimsStudyObject.activeMimsStudyID;
            var form = $('form#addNewMimsStudy');
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
                    var user_event = mimsStudyObject.activeMimsStudyID == '' ? 'Add' : 'Update';
                    if (data) {
                        if (data.error_msg != ''){
                            mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Special Report', data.error_msg, 'Ok');
                        } else if (data.result){
                            var success_msg = 'You have successfully added a mimsstudy.';
                            mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + 'Special Report', success_msg, 'Ok');
                            mimsStudyObject.populateMimsStudyList();
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
        populateMimsStudyList: function() {
            var formURL = "<?php echo site_url('MimsStudy/getAllMimsStudy')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'mimsStudyObject.getMimsStudyList', function(mimsstudyData){
                var mimsstudy_tr_text = '';
                $('tbody.mimsstudy-list').html('');
                for(var i = 0; i < mimsstudyData.length; i++) {
                    mimsstudy_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="mimsStudyObject.showMimsStudyEditModal('+mimsstudyData[i].ID+')">'+mimsstudyData[i].Title+'</a></td>' +
                        '<td>' + mimsstudyData[i].LinkAddress + '</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="mimsStudyObject.showMimsStudyEditModal('+mimsstudyData[i].ID+')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="mimsStudyObject.deleteMimsStudy('+mimsstudyData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.mimsstudy-list').append(mimsstudy_tr_text);
                }
            });
        },
        showMimsStudyEditModal: function (mimsstudyID) {
            console.log('Method Name: mimsStudyObject.showMimsStudyEditModal');
            $('.error-message').hide();
            mimsStudyObject.activeMimsStudyID = mimsstudyID;
            var formURL = "<?php echo site_url('MimsStudy/getMimsStudyDetailInformation')?>?MimsStudyID="+mimsstudyID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'mimsStudyObject.showMimsStudyEditModal', function(mimsstudyData){
                $('#MimsStudyTitle').val(mimsstudyData.Title);
                commonMethods.setRichTextValueByID('MimsStudyDescription', mimsstudyData.Description);
                $('#MimsStudyLinkAddress').val(mimsstudyData.LinkAddress);
                $('#MimsStudyImagePathThumbnail').attr('src', '<?php echo base_url()?>MimsStudyImages/'+mimsstudyData.ImagePath);
                if (mimsstudyData.IsActive) {
                    $("#MimsStudyIsActiveYes").prop("checked", true);
                } else {
                    $("#MimsStudyIsActiveNo").prop("checked", true);
                }
            });
            $('#mimsstudy_modal').html('Update');
            $('#addMimsStudyModal').modal('show');
        },
        setMimsStudyImagePathThumbnail: function (input, objectID) {
            console.log('mimsStudyObject.setMimsStudyImagePathThumbnail' + 'Params: input, objectID' + ' Values: ' + input + ' ' + objectID);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+objectID).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    mimsStudyObject.initMimsStudyPage();
</script>
