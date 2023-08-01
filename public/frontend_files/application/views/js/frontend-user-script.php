<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var UserObject = {
        validateRegistrationForm: function() {
            console.log('Method Name: UserObject.validateRegistrationForm');
            $('.error').hide();
            var is_valid = true;
            var title = $('#UserRegistrationTitle').val();
            if (title == 'Other') {
                if ($('#UserRegistrationOtherTitle').val() == '') {
                    is_valid = false;
                    $('.user-title-error').show();
                }
            }

            var first_name = $('#UserRegistrationFirstName').val();
            if (first_name == '') {
                is_valid = false;
                $('.registration-first-name-error').show();
            }

            var last_name = $('#UserRegistrationLastName').val();
            if (last_name == '') {
                is_valid = false;
                $('.registration-last-name-error').show();
            }

            var user_name = $('#UserRegistrationUserName').val();
            if (user_name == '') {
                is_valid = false;
                $('.registration-user-name-error').show();
            }

            var email_id = $('#UserRegistrationEmailID').val();
            if (email_id == '') {
                is_valid = false;
                $('.registration-email-error').show();
            } else {
                if (!frontendCommonMethods.isValidEmail(email_id)) {
                    is_valid = false;
                    $('.invalid-email-id').show();
                }
            }

            var password = $('#UserRegistrationUserPass').val();
            if (password == '') {
                is_valid = false;
                $('.registration-password-error').show();
            } else {
                var confirm_password = $('#UserRegistrationConfirmPass').val();
                if (password != confirm_password) {
                    is_valid = false;
                    $('.password-not-matched-error').show();
                }
            }

            return is_valid;
        },
        validateProfileForm: function() {
            console.log('Method Name: UserObject.validateProfileForm');
            $('.error').hide();
            var is_valid = true;
            var title = $('#UserProfileTitle').val();
            if (title == 'Other') {
                if ($('#UserProfileOtherTitle').val() == '') {
                    is_valid = false;
                    $('.user-title-error').show();
                }
            }

            var first_name = $('#UserProfileFirstName').val();
            if (first_name == '') {
                is_valid = false;
                $('.profile-first-name-error').show();
            }

            var last_name = $('#UserProfileLastName').val();
            if (last_name == '') {
                is_valid = false;
                $('.profile-last-name-error').show();
            }

            var user_name = $('#UserProfileUserName').val();
            if (user_name == '') {
                is_valid = false;
                $('.profile-user-name-error').show();
            }

            var email_id = $('#UserProfileEmailID').val();
            if (email_id == '') {
                is_valid = false;
                $('.profile-email-error').show();
            } else {
                if (!frontendCommonMethods.isValidEmail(email_id)) {
                    is_valid = false;
                    $('.invalid-email-id').show();
                }
            }

            return is_valid;
        },
        showLoginModal: function () {
            console.log('Method Name: UserObject.showLoginModal');
            $('#user_id').val('');
            $('#user_pass').val('');
            $('#userLoginModal').show();
        },
        closeUserLoginModal: function () {
            console.log('Method Name: UserObject.closeUserLoginModal');
            $('#userLoginModal').hide();
        },
        closeSuccessModal: function () {
            $('#successModal').hide();
        },
        forgotPassword: function () {
            console.log('Method Name: UserObject.forgotPassword');
        },
        submitUserLoginForm: function () {
            console.log('Method Name: UserObject.submitUserLoginForm');
            var user_id = $('#user_id').val();
            var user_pass = $('#user_pass').val();
            var formURL = "<?php echo site_url('User/userLogin')?>"+'?UserID='+user_id+'&UserPass='+user_pass;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'userObject.submitLoginForm', function(data) {
                if (data.success) {
                    top.location = '<?php echo site_url();?>';
                }
            });
        },
        submitUserRegistrationForm: function () {
            console.log('Method Name: UserObject.submitUserRegistrationForm');
            var is_valid = UserObject.validateRegistrationForm();
            if (!is_valid) return;
            mimsPopup.showLoaderModal('');
            var formURL = "<?php echo site_url('User/registerUser');?>";
            var postData = $('form#userRegistrationForm').serializeArray();
            mimsServerAPI.postDataToServer(formURL, postData, 'JSONp', 'UserObject.submitUserRegistrationForm', function(data){
                $('#loaderModal').modal('hide');
                if (data) {
                    if (data.result){
                        $('#userRegistrationCompletedModel').modal('show');
                    } else if (data.result){
                        $('#successModal').modal('show');
                    }
                }
            });
        },
        userRegistrationCompleted: function () {
            console.log('Method Name: UserObject.userRegistrationCompleted');
            top.location = '<?php echo site_url()?>';
        },
        changeUserTitle: function (title) {
            console.log('Method Name: UserObject.changeUserTitle Param:  title: '+[title].toString());
            if (title == 'Other') {
                $('.other-title').css('visibility', 'visible');
            } else {
                $('.other-title').css('visibility', 'hidden');
            }
        },
        getUserDetail: function () {
            console.log('Method Name: UserObject.getUserDetail');
            var formURL = "<?php echo site_url('User/getUserDetail')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'userObject.getUserDetail', function(data) {
                if (data) {
                    var user_detail = data;
                    if ($.inArray(user_detail.Title, ['Prof.', 'Dr.', 'Mr.', 'Ms.', 'Mrs.']) == -1) {
                        UserObject.changeUserTitle('Other');
                        $('#UserProfileOtherTitle').val(user_detail.Title);
                    } else {
                        UserObject.changeUserTitle(user_detail.Title);
                        $('#UserProfileTitle').val(user_detail.Title);
                    }

                    $('#UserProfileFirstName').val(user_detail.FirstName);
                    $('#UserProfileLastName').val(user_detail.LastName);
                    $('#UserProfileUserName').val(user_detail.UserName);
                    $('#UserProfileEmailID').val(user_detail.EmailID);
                    $('#UserProfileProfession').val(user_detail.Profession);
                    $('#UserProfileOrganisation').val(user_detail.Organisation);
                    $('#UserProfileCountryID').val(user_detail.CountryID);
                    $('#UserProfileState').val(user_detail.State);
                    $('#UserProfileCity').val(user_detail.City);
                    $('#UserProfileZipCode').val(user_detail.ZipCode);
                    $('#UserProfileAddress').val(user_detail.Address);
                    $('#UserProfileTelephone').val(user_detail.Telephone);
                    $('#UserProfileFax').val(user_detail.Fax);
                }
            });
        },
        submitUserProfileForm: function () {
            console.log('Method Name: UserObject.submitUserProfileForm');
            var is_valid = UserObject.validateProfileForm();
            if (!is_valid) return;
            mimsPopup.showLoaderModal('');
            var formURL = "<?php echo site_url('User/updateProfile');?>";
            var postData = $('form#userProfileForm').serializeArray();
            mimsServerAPI.postDataToServer(formURL, postData, 'JSONp', 'UserObject.submitUserProfileForm', function(data){
                $('#loaderModal').modal('hide');
                if (data.result != 1){
                    mimsPopup.showWarningModal(data.error_msg);
                }
            });
        }
    }
</script>
