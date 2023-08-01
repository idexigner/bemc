<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var manufacturerObject = {
        activeManufacturerID: '',
        allExistingLocation: [],
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#ManufacturerName').val() == '') {
                is_valid = false;
                $('.manufacturer-name-require-message').show();
            }

            if($('#ManufacturerAddressID').val() == '') {
                if ($('#ManufacturerCountryID').val() == '') {
                    is_valid = false;
                    $('.manufacturer-country-require-message').show();
                }
                if ($('#ManufacturerStateID').val() == '') {
                    is_valid = false;
                    $('.manufacturer-state-require-message').show();
                }
                if ($('#ManufacturerCityID').val() == '') {
                    is_valid = false;
                    $('.manufacturer-city-require-message').show();
                }
                if ($('#ManufacturerAddress').val() == '') {
                    is_valid = false;
                    $('.manufacturer-address-require-message').show();
                }
            }

            return is_valid;
        },
        initManufacturerAdminPage: function() {
            console.log('Method Name: manufacturerObject.initManufacturerAdminPage');
            manufacturerObject.getAllExistingLocation();
            manufacturerObject.getAllLocationDate();
            $('#ManufacturerAddressID').val('');
            manufacturerObject.changeManufacturerAddress('');
        },
        getAllExistingLocation: function() {
            console.log('Method Name: manufacturerObject.getAllExistingLocation');
            var formURL = "<?php echo site_url('Address/getAllExistingLocation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'manufacturerObject.getAllExistingLocation', function(location){
                manufacturerObject.allExistingLocation = [];
                for (var i = 0; i < location.length; i++) {
                    location[i].AddressDetail = location[i].Address + ', ' + location[i].CityName + ', ' + location[i].StateName + ', ' + location[i].CountryName;
                    manufacturerObject.allExistingLocation[i] = location[i];
                }

                $('#ManufacturerAddressID')
                    .empty()
                    .append('<option selected="selected" value="">Add New Address</option>');
                $.each(manufacturerObject.allExistingLocation, function (i, item) {
                    $('#ManufacturerAddressID').append($('<option>', {
                        value: item.ID,
                        text : item.Address
                    }));
                });
            });
        },
        getAllLocationDate: function() {
            console.log('Method Name: manufacturerObject.getAllLocationDate');
            var formURL = "<?php echo site_url('Address/getAllLocationDate')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'manufacturerObject.getAllLocationDate', function(location){
                var all_country = location.AllCountry;

                $('#ManufacturerCountryID')
                    .empty()
                    .append('<option selected="selected" value="">Select Country</option>');
                $.each(all_country, function (i, item) {
                    $('#ManufacturerCountryID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });

                var all_state = location.AllState;

                $('#ManufacturerStateID')
                    .empty()
                    .append('<option selected="selected" value="">Select State</option>');
                $.each(all_state, function (i, item) {
                    $('#ManufacturerStateID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });

                var all_city = location.AllCity;

                $('#ManufacturerCityID')
                    .empty()
                    .append('<option selected="selected" value="">Select City</option>');
                $.each(all_city, function (i, item) {
                    $('#ManufacturerCityID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });
            });
        },
        getLocationDetail: function(locationID) {
            console.log('Method Name: manufacturerObject.getLocationDetail');
            var location_detail = [];
            for (var i = 0; i < manufacturerObject.allExistingLocation.length; i++) {
                if (locationID == manufacturerObject.allExistingLocation[i].ID) {
                    location_detail = manufacturerObject.allExistingLocation[i];
                    break;
                }
            }

            return location_detail;
        },
        changeManufacturerAddress: function(addressID) {
            console.log('Method Name: manufacturerObject.changeManufacturerAddress');
            if (addressID == '') {
                $('.manufacturer-existing-address').hide();
                $('.manufacturer-new-address').show();
            } else {
                $('.manufacturer-new-address').hide();
                $('.manufacturer-existing-address').show();
                var location_detail = manufacturerObject.getLocationDetail(addressID);
                // console.dir(location_detail);
                if (location_detail.AddressDetail != undefined) {
                    $('#ManufacturerAddressDetail').val(location_detail.AddressDetail);
                } else {
                    $('#ManufacturerAddressDetail').val('');
                }
            }
        },
        showManufacturerCreateModal: function () {
            console.log('Method Name: manufacturerObject.showManufacturerCreateModal');
            $('.error-message').hide();
            manufacturerObject.activeManufacturerID = '';
            $('#manufacturer_modal').html('Create');
            $('#ManufacturerName').val('');
            $('#EmailID').val('');
            $('#PhoneNo').val('');
            $('#MobileNo').val('');
            $('#FaxNo').val('');
            $('#ManufacturerAddressID').val('');
            $('#ManufacturerAddressDetail').val('');
            $('#ManufacturerCountryID').val('');
            $('#ManufacturerStateID').val('');
            $('#ManufacturerCityID').val('');
            $('#ManufacturerAddress').val('');
            $('#Longitude').val('');
            $('#Latitude').val('');
            $("#IsActiveYes").prop("checked", true);
            manufacturerObject.changeManufacturerAddress('');
            $('#addManufacturerModal').modal('show');
        },
        showManufacturerEditModal: function (manufacturerID) {
            console.log('Method Name: manufacturerObject.showManufacturerEditModal');
            $('.error-message').hide();
            manufacturerObject.activeManufacturerID = manufacturerID;
            var formURL = "<?php echo site_url('Manufacturer/getManufacturerInformation')?>?ManufacturerInformationID="+manufacturerID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'manufacturerObject.showManufacturerEditModal', function(manufacturerData){
                $('#ManufacturerName').val(manufacturerData.Name);
                $('#EmailID').val(manufacturerData.EmailID);
                $('#PhoneNo').val(manufacturerData.PhoneNo);
                $('#MobileNo').val(manufacturerData.MobileNo);
                $('#FaxNo').val(manufacturerData.FaxNo);
                $('#ManufacturerAddressID').val(manufacturerData.AddressID);
                $('#ManufacturerCountryID').val('');
                $('#ManufacturerStateID').val('');
                $('#ManufacturerCityID').val('');
                $('#ManufacturerAddress').val('');
                $('#Longitude').val('');
                $('#Latitude').val('');
                if (manufacturerData.IsActive) {
                    $("#IsActiveYes").prop("checked", true);
                } else {
                    $("#IsActiveNo").prop("checked", true);
                }
                manufacturerObject.changeManufacturerAddress(manufacturerData.AddressID);

            });
            $('#manufacturer_modal').html('Update');
            $('#addManufacturerModal').modal('show');
        },
        deleteManufacturer: function (manufacturerID) {
            console.log('Method Name: manufacturerObject.deleteManufacturer');
            var formURL = "<?php echo site_url('Manufacturer/deleteManufacturer');?>?ManufacturerID="+manufacturerID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'manufacturerObject.deleteManufacturer', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Manufacturer', success_msg, 'Ok');
                    manufacturerObject.populateManufacturerList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Manufacturer', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitManufacturerModal: function () {
            console.log('Method Name: manufacturerObject.submitManufacturerModal');
            var manufacturer_address = commonMethods.getRichTextValueByID('ManufacturerAddress');
            $('#ManufacturerAddress').val(manufacturer_address);

            var is_valid = manufacturerObject.validateForm();
            if (!is_valid) return;
            $('#addManufacturerModal').modal('hide');
            var formURL = manufacturerObject.activeManufacturerID == '' ? "<?php echo site_url('Manufacturer/addManufacturer');?>" : "<?php echo site_url('Manufacturer/updateManufacturer');?>?ManufacturerID="+manufacturerObject.activeManufacturerID;
            var postData = $('form#addNewManufacturer').serializeArray();
            mimsServerAPI.postDataToServer(formURL, postData, 'JSONp', 'manufacturerObject.submitManufacturerModal', function(data){
                var user_event = manufacturerObject.activeManufacturerID == '' ? 'Add' : 'Update';
                if (data) {
                    if (data.error_msg != ''){
                        mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Manufacturer', data.error_msg, 'Ok');
                    } else if (data.result){
                        if ($('#ManufacturerAddressID').val() == '') {
                            manufacturerObject.getAllExistingLocation();
                        }
                        var success_msg = 'You have successfully added a manufacturer.';
                        mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + ' Manufacturer', success_msg, 'Ok');
                        manufacturerObject.populateManufacturerList();
                    }
                }
            });
        },
        populateManufacturerList: function() {
            console.log('Method Name: manufacturerObject.populateManufacturerList');
            var formURL = "<?php echo site_url('Manufacturer/getAllActiveManufacturerInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'manufacturerObject.getManufacturerList', function(manufacturerData){
                var manufacturer_tr_text = '';
                $('tbody.manufacturer-list').html('');
                for(var i = 0; i < manufacturerData.length; i++) {
                    manufacturer_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="manufacturerObject.showManufacturerEditModal('+manufacturerData[i].ID+')">'+manufacturerData[i].Name+'</a></td>' +
                        '<td>'+manufacturerData[i].EmailID+'</a></td>' +
                        '<td>'+manufacturerData[i].PhoneNo+'</a></td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="manufacturerObject.showManufacturerEditModal('+manufacturerData[i].ID+')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="manufacturerObject.deleteManufacturer('+manufacturerData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.manufacturer-list').append(manufacturer_tr_text);
                }
            });
        }
    }

    manufacturerObject.initManufacturerAdminPage();
</script>
