<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var specialReportsObject = {
        activeSpecialReportID: '',
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#SpecialReportsTitle').val() == '') {
                is_valid = false;
                $('.special-reports-title-require-message').show();
            }
            if ($('#SpecialReportsLinkAddress').val() == '') {
                is_valid = false;
                $('.special-reports-link-address-require-message').show();
            }
            if ($('#SpecialReportsImagePath').val() == '') {
                is_valid = false;
                $('.special-reports-image-path-require-message').show();
            }

            return is_valid;
        },
        initSpecialReportsPage: function() {
            var today = new Date((new Date()).setHours(0, 0, 0, 0));
            $('.date-field').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                clearBtn: true,
                todayHighlight: true,
                startDate:today
            });
        },
        showSpecialReportsCreateModal: function () {
            specialReportsObject.activeSpecialReportID = '';
            $('.error-message').hide();
            $('#specialreports_modal').html('Create');
            $('#SpecialReportsTitle').val('');
            $('#SpecialReportDescription').val('');
            $('#SpecialReportsLinkAddress').val('');
            $('#SpecialReportsImagePathThumbnail').attr('src', '');
            $("#SpecialReportsIsActiveNo").prop("checked", true);
            $('#addSpecialReportsModal').modal('show');
        },
        deleteSpecialReports: function (specialreportsID) {
            console.log('Method Name: specialReportsObject.deleteSpecialReports');
            var formURL = "<?php echo site_url('SpecialReports/deleteSpecialReports');?>?SpecialReportID="+specialreportsID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'specialReportsObject.deleteSpecialReports', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Special Report', success_msg, 'Ok');
                    specialReportsObject.populateSpecialReportsList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Special Report', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitSpecialReportsModal: function () {
            var special_report_description = commonMethods.getRichTextValueByID('SpecialReportDescription');
            $('#SpecialReportDescription').val(special_report_description);

            var is_valid = specialReportsObject.validateForm();
            if (!is_valid) return;
            $('#addSpecialReportsModal').modal('hide');
            var formURL = specialReportsObject.activeSpecialReportID == '' ? "<?php echo site_url('SpecialReports/addSpecialReports');?>" : "<?php echo site_url('SpecialReports/updateSpecialReports');?>?SpecialReportID="+specialReportsObject.activeSpecialReportID;
            var form = $('form#addNewSpecialReports');
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
                    var user_event = specialReportsObject.activeSpecialReportID == '' ? 'Add' : 'Update';
                    if (data) {
                        if (data.error_msg != ''){
                            mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Special Report', data.error_msg, 'Ok');
                        } else if (data.result){
                            var success_msg = 'You have successfully added a specialreports.';
                            mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + 'Special Report', success_msg, 'Ok');
                            specialReportsObject.populateSpecialReportsList();
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
        populateSpecialReportsList: function() {
            var formURL = "<?php echo site_url('SpecialReports/getAllSpecialReports')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'specialReportsObject.getSpecialReportsList', function(specialreportsData){
                var specialreports_tr_text = '';
                $('tbody.specialreports-list').html('');
                for(var i = 0; i < specialreportsData.length; i++) {
                    specialreports_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="specialReportsObject.showSpecialReportsEditModal('+specialreportsData[i].ID+')">'+specialreportsData[i].Title+'</a></td>' +
                        '<td>' + specialreportsData[i].LinkAddress + '</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="specialReportsObject.showSpecialReportsEditModal('+specialreportsData[i].ID+')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="specialReportsObject.deleteSpecialReports('+specialreportsData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.specialreports-list').append(specialreports_tr_text);
                }
            });
        },
        showSpecialReportsEditModal: function (specialreportsID) {
            console.log('Method Name: specialReportsObject.showSpecialReportsEditModal');
            $('.error-message').hide();
            specialReportsObject.activeSpecialReportID = specialreportsID;
            var formURL = "<?php echo site_url('SpecialReports/getSpecialReportsDetailInformation')?>?SpecialReportID="+specialreportsID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'specialReportsObject.showSpecialReportsEditModal', function(specialreportsData){
                $('#SpecialReportsTitle').val(specialreportsData.Title);
                commonMethods.setRichTextValueByID('SpecialReportDescription', specialreportsData.Description);
                $('#SpecialReportsLinkAddress').val(specialreportsData.LinkAddress);
                $('#SpecialReportsImagePathThumbnail').attr('src', '<?php echo base_url()?>SpecialReportImages/'+specialreportsData.ImagePath);
                if (specialreportsData.IsActive) {
                    $("#SpecialReportsIsActiveYes").prop("checked", true);
                } else {
                    $("#SpecialReportsIsActiveNo").prop("checked", true);
                }
            });
            $('#specialreports_modal').html('Update');
            $('#addSpecialReportsModal').modal('show');
        },
        setSpecialReportsImagePathThumbnail: function (input, objectID) {
            console.log('specialReportsObject.setSpecialReportsImagePathThumbnail' + 'Params: input, objectID' + ' Values: ' + input + ' ' + objectID);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+objectID).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    specialReportsObject.initSpecialReportsPage();
</script>
