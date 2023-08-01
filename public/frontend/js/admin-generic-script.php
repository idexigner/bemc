<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var genericObject = {
        activeGenericID: '',
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#GenericName').val() == '') {
                is_valid = false;
                $('.generic-name-require-message').show();
            }
            if ($('#Classification').val() == '') {
                is_valid = false;
                $('.classification-require-message').show();
            }
            if ($('#SafetyRemark').val() == '') {
                is_valid = false;
                $('.safety-remark-require-message').show();
            }

            return is_valid;
        },
        showGenericCreateModal: function () {
            genericObject.activeGenericID = '';
            $('.error-message').hide();
            $('#generic_modal').html('Create');
            $('#GenericName').val('');
            $('#Classification').val('');
            $('#SafetyRemark').val('');
            $('#Indication').val('');
            $('#IndicationTags').val('');
            $('#DosageAdministration').val('');
			$('#ContraindicationPrecaution').val('');
			$('#Composition').val('');
			$('#Pharmacology').val('');
			$('#Interaction').val('');
			$('#SideEffect').val('');
			$('#OverdoseEffect').val('');
			$('#StorageCondition').val('');
			$('#PregnancyLactation').val('');
            $('#addGenericModal').modal('show');
        },
        showGenericEditModal: function (genericID, genericName) {
            console.log('Method Name: productObject.showProductEditModal');
            $('.error-message').hide();
            genericObject.activeGenericID = genericID;
            $('#generic_modal').html('Update');
            var formURL = "<?php echo site_url('Generic/getGenericDetail')?>?GenericID="+genericID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'genericObject.showGenericEditModal', function(genericData){
                $('#GenericName').val(genericData.Name);
                $('#Classification').val(genericData.Classification);
                $('#SafetyRemark').val(genericData.SafetyRemark);
                $('#IndicationTags').val(genericData.IndicationTags);
                commonMethods.setRichTextValueByID('Indication', genericData.Indication);
                commonMethods.setRichTextValueByID('DosageAdministration', genericData.DosageAdministration);
				commonMethods.setRichTextValueByID('ContraindicationPrecaution', genericData.ContraindicationPrecaution);
				commonMethods.setRichTextValueByID('Composition', genericData.Composition);
				commonMethods.setRichTextValueByID('Pharmacology', genericData.Pharmacology);
				commonMethods.setRichTextValueByID('Interaction', genericData.Interaction);
				commonMethods.setRichTextValueByID('SideEffect', genericData.SideEffect);
				commonMethods.setRichTextValueByID('OverdoseEffect', genericData.OverdoseEffect);
				commonMethods.setRichTextValueByID('StorageCondition', genericData.StorageCondition);
				commonMethods.setRichTextValueByID('PregnancyLactation', genericData.PregnancyLactation);
            });
            $('#addGenericModal').modal('show');
        },
        deleteGeneric: function (genericID) {
            console.log('Method Name: genericObject.deleteGeneric');
            var formURL = "<?php echo site_url('Generic/deleteGeneric');?>?GenericID="+genericID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'genericObject.deleteGeneric', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Generic', success_msg, 'Ok');
                    genericObject.populateGenericList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Generic', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitGenericModal: function () {
            var indication = commonMethods.getRichTextValueByID('Indication');
            $('#Indication').val(indication);
            var dosage_administration = commonMethods.getRichTextValueByID('DosageAdministration');
            $('#DosageAdministration').val(dosage_administration);
			var contraindication_precaution = commonMethods.getRichTextValueByID('ContraindicationPrecaution');
			$('#ContraindicationPrecaution').val(contraindication_precaution);
			var composition = commonMethods.getRichTextValueByID('Composition');
			$('#Composition').val(composition);
			var pharmacology = commonMethods.getRichTextValueByID('Pharmacology');
			$('#Pharmacology').val(pharmacology);
			var interaction = commonMethods.getRichTextValueByID('Interaction');
			$('#Interaction').val(interaction);
			var side_effect = commonMethods.getRichTextValueByID('SideEffect');
            $('#SideEffect').val(side_effect);
			var overdose_effect = commonMethods.getRichTextValueByID('OverdoseEffect');
			$('#OverdoseEffect').val(overdose_effect);
			var storage_condition = commonMethods.getRichTextValueByID('StorageCondition');
			$('#StorageCondition').val(storage_condition);
			var pregnancy_lactation = commonMethods.getRichTextValueByID('PregnancyLactation');
            $('#PregnancyLactation').val(pregnancy_lactation);

            var is_valid = genericObject.validateForm();
            if (!is_valid) return;
            $('#addGenericModal').modal('hide');
            var formURL = genericObject.activeGenericID == '' ? "<?php echo site_url('Generic/addGeneric');?>" : "<?php echo site_url('Generic/updateGeneric');?>?GenericID="+genericObject.activeGenericID;
            var postData = $('form#addNewGeneric').serializeArray();
            mimsServerAPI.postDataToServer(formURL, postData, 'JSONp', 'genericObject.submitGenericModal', function(data){
                var user_event = genericObject.activeGenericID == '' ? 'Add' : 'Update';
                if (data) {
                    if (data.error_msg != ''){
                        mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Generic', data.error_msg, 'Ok');
                    } else if (data.result){
                        var success_msg = 'You have successfully added a generic.';
                        mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + ' Generic', success_msg, 'Ok');
                        genericObject.populateGenericList();
                    }
                }
            });
        },
        populateGenericList: function() {
            var formURL = "<?php echo site_url('Generic/getAllGenericInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'genericObject.getGenericList', function(genericData){
                var generic_tr_text = '';
                $('tbody.generic-list').html('');
                for(var i = 0; i < genericData.length; i++) {
                    generic_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="genericObject.showGenericEditModal('+genericData[i].ID+')">'+genericData[i].Name+'</a></td>' +
                        '<td>'+genericData[i].IndicationTags+'</td>' +
                        '<td>'+genericData[i].Classification+'</td>' +
                        '<td>'+genericData[i].SafetyRemark+'</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="genericObject.showGenericEditModal('+genericData[i].ID+')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="genericObject.deleteGeneric('+genericData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.generic-list').append(generic_tr_text);
                }
            });
        }
    }
</script>
