<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var journalObject = {
        activeJournalID: '',
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#JournalTitle').val() == '') {
                is_valid = false;
                $('.journal-title-require-message').show();
            }
            if ($('#JournalCategoryID').val() == '') {
                is_valid = false;
                $('.journal-link-address-require-message').show();
            }
            if ($('#JournalTypePDF').is(':checked') && $('#JournalPath').val() == '') {
                is_valid = false;
                $('.journal-image-path-require-message').show();
            }

            return is_valid;
        },
        initJournalPage: function() {
            var today = new Date((new Date()).setHours(0, 0, 0, 0));
            $('.date-field').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                clearBtn: true,
                todayHighlight: true,
                startDate:today
            });
        },
        showJournalCreateModal: function () {
            journalObject.activeJournalID = '';
            $('.error-message').hide();
            $('#journal_modal').html('Create');
            $('#JournalTitle').val('');
            $('#JournalDescription').val('');
            $('#JournalCategoryID').val('');
            $("#JournalIsActiveNo").prop("checked", true);
            $('#addJournalModal').modal('show');
        },
        deleteJournal: function (journalID) {
            console.log('Method Name: journalObject.deleteJournal');
            var formURL = "<?php echo site_url('Journal/deleteJournal');?>?JournalID="+journalID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'journalObject.deleteJournal', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Journal', success_msg, 'Ok');
                    journalObject.populateJournalList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Journal', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitJournalModal: function () {
            var is_valid = journalObject.validateForm();
            if (!is_valid) return;
            $('#addJournalModal').modal('hide');
            var formURL = journalObject.activeJournalID == '' ? "<?php echo site_url('Journal/addJournal');?>" : "<?php echo site_url('Journal/updateJournal');?>?JournalID="+journalObject.activeJournalID;
            var form = $('form#addNewJournal');
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
                    var user_event = journalObject.activeJournalID == '' ? 'Add' : 'Update';
                    if (data) {
                        if (data.error_msg != ''){
                            mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Journal', data.error_msg, 'Ok');
                        } else if (data.result){
                            var success_msg = 'You have successfully added a journal.';
                            mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + 'Journal', success_msg, 'Ok');
                            journalObject.populateJournalList();
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
        populateJournalList: function() {
            var formURL = "<?php echo site_url('Journal/getAllJournal')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'journalObject.getJournalList', function(journalData){
                var journal_tr_text = '';
                $('tbody.journal-list').html('');
                for(var i = 0; i < journalData.length; i++) {
                    journal_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="journalObject.showJournalEditModal('+journalData[i].ID+')">'+journalData[i].Title+'</a></td>' +
                        '<td>' + journalData[i].JournalCategoryID + '</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="journalObject.showJournalEditModal('+journalData[i].ID+')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="journalObject.deleteJournal('+journalData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.journal-list').append(journal_tr_text);
                }
            });
        },
        showJournalEditModal: function (journalID) {
            console.log('Method Name: journalObject.showJournalEditModal');
            $('.error-message').hide();
            journalObject.activeJournalID = journalID;
            var formURL = "<?php echo site_url('Journal/getJournalDetailInformation')?>?JournalID="+journalID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'journalObject.showJournalEditModal', function(journalData){
                $('#JournalTitle').val(journalData.Title);
                commonMethods.setRichTextValueByID('JournalDescription', journalData.Description);
                $('#JournalCategoryID').val(journalData.JournalCategoryID);
                if (journalData.IsActive) {
                    $("#JournalIsActiveYes").prop("checked", true);
                } else {
                    $("#JournalIsActiveNo").prop("checked", true);
                }
            });
            $('#journal_modal').html('Update');
            $('#addJournalModal').modal('show');
        }
    }

    journalObject.initJournalPage();
</script>
