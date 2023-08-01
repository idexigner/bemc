<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script>

    var doctorObject = {

        activeDoctorID: '',

        allExistingLocation: [],

        validateForm: function() {

            $('.error-message').hide();

            var is_valid = true;

            // if ($('#DoctorName').val() == '') {

            //     is_valid = false;

            //     $('.doctor-name-require-message').show();

            // }

            // var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

            
            // if ($('#email_id').val() == '' ) {

            //     is_valid = false;

            //     $('.email_id-require-message').show();

            // }

            // if ($('#Specialization').val() == '') {

            //     is_valid = false;

            //     $('.specialization-require-message').show();

            // }

            // if ($('#ProfessionDegree').val() == '') {

            //     is_valid = false;

            //     $('.profession-degree-require-message').show();

            // }

            // if ($('#DoctorGender').val() == '') {

            //     is_valid = false;

            //     $('.doctor-gender-require-message').show();

            // }



            // if($('#HomeAddressID').val() == '') {

            //     if ($('#HomeCountryID').val() == '') {

            //         is_valid = false;

            //         $('.home-country-require-message').show();

            //     }

            //     if ($('#HomeStateID').val() == '') {

            //         is_valid = false;

            //         $('.home-state-require-message').show();

            //     }

            //     if ($('#HomeCity').val() == '') {

            //         is_valid = false;

            //         $('.home-city-require-message').show();

            //     }

            //     if ($('#HomeAddress').val() == '') {

            //         is_valid = false;

            //         $('.home-address-require-message').show();

            //     }

            // }



            // if($('#ChamberAddressID').val() == '') {

            //     if ($('#ChamberCountryID').val() == '') {

            //         is_valid = false;

            //         $('.chamber-country-require-message').show();

            //     }

            //     if ($('#ChamberStateID').val() == '') {

            //         is_valid = false;

            //         $('.chamber-state-require-message').show();

            //     }

            //     if ($('#ChamberCityID').val() == '') {

            //         is_valid = false;

            //         $('.chamber-city-require-message').show();

            //     }

            //     if ($('#ChamberAddress').val() == '') {

            //         is_valid = false;

            //         $('.chamber-address-require-message').show();

            //     }

            // }



            return is_valid;

        },

        initDoctorAdminPage: function() {

            console.log('Method Name: doctorObject.initDoctorAdminPage');

            doctorObject.getAllExistingLocation();

            doctorObject.getAllLocationDate();

            $('#HomeAddressID').val('');

            $('#ChamberAddressID').val('');

            doctorObject.changeDoctorHomeAddress('');

            doctorObject.changeDoctorChamberAddress('');

        },

        getAllExistingLocation: function() {

            console.log('Method Name: doctorObject.getAllExistingLocation');

            var formURL = "<?php echo site_url('Address/getAllExistingLocation')?>";

            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'doctorObject.getAllExistingLocation', function(location){

                doctorObject.allExistingLocation = [];

                for (var i = 0; i < location.length; i++) {

                    location[i].AddressDetail = location[i].Address + ', ' + location[i].CityName + ', ' + location[i].StateName + ', ' + location[i].CountryName;

                    doctorObject.allExistingLocation[i] = location[i];

                }



                $('#HomeAddressID')

                    .empty()

                    .append('<option selected="selected" value="">Add New Address</option>');

                $.each(doctorObject.allExistingLocation, function (i, item) {

                    $('#HomeAddressID').append($('<option>', {

                        value: item.ID,

                        text : item.Address

                    }));

                });



                $('#ChamberAddressID')

                    .empty()

                    .append('<option selected="selected" value="">Add New Address</option>');

                $.each(doctorObject.allExistingLocation, function (i, item) {

                    $('#ChamberAddressID').append($('<option>', {

                        value: item.ID,

                        text : item.Address

                    }));

                });

            });

        },

        getAllLocationDate: function() {

            console.log('Method Name: doctorObject.getAllLocationDate');

            var formURL = "<?php echo site_url('Address/getAllLocationDate')?>";

            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'doctorObject.getAllLocationDate', function(location){

                var all_country = location.AllCountry;

                var all_state = location.AllState;

                var all_city = location.AllCity;



                $('#clinic_country_id').empty().append('<option selected="selected" value="">Select Country</option>');
                    $.each(all_country, function (i, item) 
                    {
                        if(item.ID ==1){
                            $('#clinic_country_id').append(
                                $('<option>', {
                                value: item.ID,
                                text : item.Name,
                                selected:'selected'
                            }));
                        }else{
                            $('#clinic_country_id').append(
                                $('<option>', {
                                value: item.ID,
                                text : item.Name,
                            }));
                        }
                        
                    });

                    $('#clinic_state_id').empty().append('<option selected="selected" value="">Select State</option>');
                        $.each(all_state, function (i, item) {
                            $('#clinic_state_id').append($('<option>', {
                                value: item.ID,
                                text : item.Name
                            }));
                        });
                $('#clinic_city_id').empty().append('<option selected="selected" value="">Select City</option>');
                $.each(all_city, function (i, item) {

                    $('#clinic_city_id').append($('<option>', {

                        value: item.ID,

                        text : item.Name

                    }));

                });




                    $('#HomeCountryID').empty().append('<option selected="selected" value="">Select Country</option>');

                    $.each(all_country, function (i, item) {

                        $('#HomeCountryID').append($('<option>', {

                            value: item.ID,

                            text : item.Name

                        }));

                    }); 



                $('#HomeStateID')

                    .empty()

                    .append('<option selected="selected" value="">Select State</option>');

                $.each(all_state, function (i, item) {

                    $('#HomeStateID').append($('<option>', {

                        value: item.ID,

                        text : item.Name

                    }));

                });



                $('#HomeCityID')

                    .empty()

                    .append('<option selected="selected" value="">Select City</option>');

                $.each(all_city, function (i, item) {

                    $('#HomeCityID').append($('<option>', {

                        value: item.ID,

                        text : item.Name

                    }));

                });



                $('#ChamberCountryID')

                    .empty()

                    .append('<option selected="selected" value="">Select Country</option>');

                $.each(all_country, function (i, item) {

                    $('#ChamberCountryID').append($('<option>', {

                        value: item.ID,

                        text : item.Name

                    }));

                });



                $('#ChamberStateID')

                    .empty()

                    .append('<option selected="selected" value="">Select State</option>');

                $.each(all_state, function (i, item) {

                    $('#ChamberStateID').append($('<option>', {

                        value: item.ID,

                        text : item.Name

                    }));

                });



                $('#ChamberCityID')

                    .empty()

                    .append('<option selected="selected" value="">Select City</option>');

                $.each(all_city, function (i, item) {

                    $('#ChamberCityID').append($('<option>', {

                        value: item.ID,

                        text : item.Name

                    }));

                });

            });

        },

        getLocationDetail: function(locationID) {

            console.log('Method Name: doctorObject.getLocationDetail');

            var location_detail = [];

            for (var i = 0; i < doctorObject.allExistingLocation.length; i++) {

                if (locationID == doctorObject.allExistingLocation[i].ID) {

                    location_detail = doctorObject.allExistingLocation[i];

                    break;

                }

            }



            return location_detail;

        },


        changeDoctorHomeAddress: function(addressID) {

            console.log('Method Name: doctorObject.changeDoctorHomeAddress');

            if (addressID == '') {

                $('.home-existing-address').hide();

                $('.home-new-address').show();

            } else {

                $('.home-new-address').hide();

                $('.home-existing-address').show();

                var location_detail = doctorObject.getLocationDetail(addressID);

                if (location_detail.AddressDetail != undefined) {

                    $('#HomeAddressDetail').val(location_detail.AddressDetail);

                } else {

                    $('#HomeAddressDetail').val('');

                }

            }

        },

        changeDoctorChamberAddress: function(addressID) {

            console.log('Method Name: doctorObject.changeDoctorChamberAddress');

            if (addressID == '') {

                $('.chamber-existing-address').hide();

                $('.chamber-new-address').show();

            } else {

                $('.chamber-new-address').hide();

                $('.chamber-existing-address').show();

                var location_detail = doctorObject.getLocationDetail(addressID);

                if (location_detail.AddressDetail != undefined) {

                    $('#ChamberAddressDetail').val(location_detail.AddressDetail);

                } else {

                    $('#ChamberAddressDetail').val('');

                }

            }

        },

        showDoctorCreateModal: function () {

            console.log('Method Name: doctorObject.showDoctorCreateModal');

            $('.error-message').hide();

            doctorObject.activeDoctorID = '';

            $('#doctor_modal').html('Create');

            $('#DoctorName').val('');

            $('#Specialization').val('');
            $('#bio_notes').val('');
 
            // $('#ProfessionDegree').val('');

            // $('#DoctorGender').val(1);

            $('#DoctorImagePathThumbnail').attr('src','');

            // $('#HomeAddressID').val('');

            // $('#HomeAddressDetail').val('');

            // $('#HomeCountryID').val('');

            // $('#HomeStateID').val('');

            // $('#HomeCityID').val('');

            // $('#HomeAddress').val('');

            // $('#HomeLongitude').val('');

            // $('#HomeLatitude').val('');

            // $('#ChamberAddressID').val('');

            // $('#ChamberAddressDetail').val('');

            // $('#ChamberCountryID').val('');

            // $('#ChamberStateID').val('');

            // $('#ChamberCityID').val('');

            // $('#ChamberAddress').val('');

            // $('#ChamberLongitude').val('');

            // $('#ChamberLatitude').val('');

            // $('#DoctorPhoneNo').val('');

            // $('#DoctorMobileNo1').val('');

            // $('#DoctorMobileNo2').val('');

            // $('#DoctorMobileNo3').val('');

            // $('#DoctorHotline').val('');

            // $("#DoctorIsActiveNo").prop("checked", true);

            // doctorObject.changeDoctorHomeAddress('');

            // doctorObject.changeDoctorChamberAddress('');
            doctorObject.getAllLocationDate('');

            $('#addDoctorModal').modal('show');

        },

        showDoctorEditModal: function (doctorID) {

            console.log('Method Name: doctorObject.showDoctorEditModal');

            $('.error-message').hide();

            doctorObject.activeDoctorID = doctorID;

            var formURL = "<?php echo site_url('Doctor/getDoctorDetailInformation')?>?DoctorID="+doctorID;

            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'doctorObject.showDoctorEditModal', function(doctorData){

                $('#DoctorName').val(doctorData.Name);
                $('#bio_notes').val(doctorData.bio_notes);
                $('#email_id').val(doctorData.email_id);
                $('#clinic_phone').val(doctorData.clinic_phone);
                $('#achievement').val(doctorData.achievement);
                $('#experiance').val(doctorData.experiance);

                $('#Specialization').val(doctorData.Specialization);

                $('#ProfessionDegree').val(doctorData.ProfessionDegree);

                $('#DoctorGender').val(doctorData.Gender);

                $('#DoctorImagePathThumbnail').attr('src','<?php echo base_url()?>DoctorImages/'+doctorData.ImagePath);

                $('#HomeAddressID').val(doctorData.HomeAddressID);

                $('#HomeCountryID').val('');

                $('#HomeStateID').val('');

                $('#HomeCityID').val('');

                $('#HomeAddress').val('');

                $('#HomeLongitude').val('');

                $('#HomeLatitude').val('');

                $('#ChamberAddressID').val(doctorData.ChamberAddressID);

                $('#ChamberCountryID').val('');

                $('#ChamberStateID').val('');

                $('#ChamberCityID').val('');

                $('#ChamberAddress').val('');

                $('#ChamberLongitude').val('');

                $('#ChamberLatitude').val('');

                $('#DoctorPhoneNo').val(doctorData.PhoneNo);

                $('#DoctorMobileNo1').val(doctorData.MobileNo1);

                $('#DoctorMobileNo2').val(doctorData.MobileNo2);

                $('#DoctorMobileNo3').val(doctorData.MobileNo3);

                $('#DoctorHotline').val(doctorData.Hotline);

                if (doctorData.IsActive) {

                    $("#DoctorIsActiveYes").prop("checked", true);

                } else {

                    $("#DoctorIsActiveNo").prop("checked", true);

                }

                doctorObject.changeDoctorHomeAddress(doctorData.HomeAddressID);

                doctorObject.changeDoctorChamberAddress(doctorData.ChamberAddressID);

            });

            $('#doctor_modal').html('Update');

            $('#addDoctorModal').modal('show');

        },

        deleteDoctor: function (doctorID) {

            console.log('Method Name: doctorObject.deleteDoctor');

            var formURL = "<?php echo site_url('Doctor/deleteDoctor');?>?DoctorID="+doctorID;

            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'doctorObject.deleteDoctor', function(response){

                if (response) {

                    var success_msg = 'You have successfully deleted data!';

                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Doctor', success_msg, 'Ok');

                    doctorObject.populateDoctorList();

                } else {

                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Doctor', 'Data is not deleted successfully!', 'Ok');

                }

            });

        },

        submitDoctorModal: function () {

            // var home_address = commonMethods.getRichTextValueByID('HomeAddress');

            // $('#HomeAddress').val(home_address);

            // var chamber_address = commonMethods.getRichTextValueByID('ChamberAddress');

            // $('#ChamberAddress').val(chamber_address);

            var clinic_address = commonMethods.getRichTextValueByID('clinic_address');

            $('#clinic_address').val(clinic_address);



            var is_valid = doctorObject.validateForm();

            if (!is_valid) return;

            $('#addDoctorModal').modal('hide');

            var formURL = doctorObject.activeDoctorID == '' ? "<?php echo site_url('Doctor/addDoctor');?>" : "<?php echo site_url('Doctor/updateDoctor');?>?DoctorID="+doctorObject.activeDoctorID;

            var form = $('form#addNewDoctor');

            if (window.FormData){

                var postData = new FormData(form[0]);

            } else {

                return false;

            }



            var new_location_added = false;

            if ($('#ChamberAddressID') == '') new_location_added = true;

            if ($('#HomeAddressID') == '') new_location_added = true;

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

                    if (new_location_added) {

                        doctorObject.getAllLocationDate();

                    }

                    var data = serverResponse.response;

                    var user_event = doctorObject.activeDoctorID == '' ? 'Add' : 'Update';

                    if (data) {

                        if (data.error_msg != ''){

                            mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Doctor', data.error_msg, 'Ok');

                        } else if (data.result){

                            var success_msg = 'You have successfully added a doctor.';

                            mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + ' Doctor', success_msg, 'Ok');

                            doctorObject.populateDoctorList();

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

        populateDoctorList: function() {

            console.log('Method Name: doctorObject.populateDoctorList');

            var formURL = "<?php echo site_url('Doctor/getAllDoctors')?>";

            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'doctorObject.getDoctorList', function(doctorData){

                var doctor_tr_text = '';

                $('tbody.doctor-list').html('');

                for(var i = 0; i < doctorData.length; i++) {

                    doctor_tr_text = '<tr class="table-row">' +

                        '<td><a class="link" onclick="doctorObject.showDoctorEditModal('+doctorData[i].ID+')">'+doctorData[i].Name+'</a></td>' +

                        '<td>'+doctorData[i].Specialization+'</td>' +

                        '<td>' +

                        '<div class="actions">' +

                        '<a onclick="doctorObject.showDoctorEditModal('+doctorData[i].ID+')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +

                        '<a onclick="doctorObject.deleteDoctor('+doctorData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +

                        '</div>' +

                        '</td>' +

                        '</tr>';

                    $('tbody.doctor-list').append(doctor_tr_text);

                }

            });

        },

        setDoctorImagePathThumbnail: function (input, objectID) {

            console.log('doctorObject.setDoctorImagePathThumbnail' + 'Params: input, objectID' + ' Values: ' + input + ' ' + objectID);

            if (input.files && input.files[0]) {

                var reader = new FileReader();



                reader.onload = function (e) {

                    $('#'+objectID).attr('src', e.target.result);

                }



                reader.readAsDataURL(input.files[0]);

            }

        }

    }



    doctorObject.initDoctorAdminPage();

</script>

