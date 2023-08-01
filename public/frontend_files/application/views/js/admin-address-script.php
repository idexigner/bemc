<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var addressObject = {
        activeAddressID: '',
        allAddressCategories: [],
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#AddressName').val() == '') {
                $('.address-name-require-message').show();
                is_valid = false;
            }
            if ($('#AddressCategoryID').val() == '') {
                $('.address-category-require-message').show();
                is_valid = false;
            }
            if ($('#Address').val() == '') {
                $('.address-detail-require-message').show();
                is_valid = false;
            }

            return is_valid;
        },
        initAddressAdminPage: function() {
            console.log('Method Name: addressObject.initAddressAdminPage');
            addressObject.getAllAddressCategories('');
            addressObject.activeAddressID = '';
        },
        getAllAddressCategories: function() {
            console.log('Method Name: addressObject.getAllAddressCategories');
            var formURL = "<?php echo site_url('Address/getAllAddressCategories')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'addressObject.getAllAddressCategories', function(categoryData){
                addressObject.allAddressCategories = categoryData;

                $('#AddressCategoryID')
                    .empty()
                    .append('<option selected="selected" value="">Select Category</option>');
                $.each(addressObject.allAddressCategories, function (i, item) {
                    $('#AddressCategoryID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });
            });
        },
        showAddressCreateModal: function () {
            console.log('Method Name: addressObject.showAddressCreateModal');
            $('.error-message').hide();
            addressObject.activeAddressID = '';
            $('#address_modal').html('Create');
            $('#AddressName').val('');
            $('#AddressCategoryID').val('');
            $('#Address').val('');
            $('#ContactNumber').val('');
            $("#AddressIsActiveNo").prop("checked", true);
            $('#addAddressModal').modal('show');
        },
        showAddressEditModal: function (addressID) {
            console.log('Method Name: addressObject.showAddressEditModal');
            $('.error-message').hide();
            addressObject.activeAddressID = addressID;
            var formURL = "<?php echo site_url('Address/getAddressDetail')?>?AddressID="+addressID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'addressObject.showAddressEditModal', function(addressData){
                $('#AddressName').val(addressData.Name);
                $('#AddressCategoryID').val(addressData.AddressCategoryID);
                commonMethods.setRichTextValueByID('Address', addressData.Address);
                $('#ContactNumber').val(addressData.ContactNumber);
                if (addressData.IsActive) {
                    $("#AddressIsActiveYes").prop("checked", true);
                } else {
                    $("#AddressIsActiveNo").prop("checked", true);
                }
            });
            $('#address_modal').html('Update');
            $('#addAddressModal').modal('show');
        },
        deleteAddress: function (addressID) {
            console.log('Method Name: addressObject.deleteAddress');
            var formURL = "<?php echo site_url('Address/deleteAddress');?>?AddressID="+addressID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'addressObject.deleteAddress', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Address', success_msg, 'Ok');
                    addressObject.populateAddressList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Address', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitAddressModal: function () {
            console.log('Method Name: addressObject.submitAddressModal');
            var address = commonMethods.getRichTextValueByID('Address');
            $('#Address').val(address);

            var is_valid = addressObject.validateForm();
            if (!is_valid) return;
            $('#addAddressModal').modal('hide');
            var formURL = addressObject.activeAddressID == '' ? "<?php echo site_url('Address/addAddress');?>" : "<?php echo site_url('Address/updateAddress');?>?AddressID="+addressObject.activeAddressID;
            var postData = $('form#addNewAddress').serializeArray();
            mimsServerAPI.postDataToServer(formURL, postData, 'JSONp', 'addressObject.submitAddressModal', function(data){
                var user_event = addressObject.activeAddressID == '' ? 'Add' : 'Update';
                if (data) {
                    if (data.error_msg != ''){
                        mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Address', data.error_msg, 'Ok');
                    } else if (data.result){
                        if ($('#AddressAddressID').val() == '') {
                            addressObject.getAllExistingLocation();
                        }
                        var success_msg = 'You have successfully added a address.';
                        mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + ' Address', success_msg, 'Ok');
                        addressObject.populateAddressList();
                    }
                }
            });
        },
        populateAddressList: function() {
            console.log('Method Name: addressObject.populateAddressList');
            var formURL = "<?php echo site_url('Address/getAllAddressInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'addressObject.getAddressList', function(addressData){
                var address_tr_text = '';
                $('tbody.address-list').html('');
                for(var i = 0; i < addressData.length; i++) {
                    address_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="addressObject.showAddressEditModal('+addressData[i].ID+')">'+addressData[i].Name+'</a></td>' +
                        '<td>'+addressData[i].AddressCategoryName+'</td>' +
                        '<td>'+addressData[i].ContactNumber+'</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="addressObject.showAddressEditModal('+addressData[i].ID+')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="addressObject.deleteAddress('+addressData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.address-list').append(address_tr_text);
                }
            });
        }
    }

    addressObject.initAddressAdminPage();
</script>
