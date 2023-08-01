<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 6:56 PM
 */
?>
<!-- banner -->
<div class="banner title-banner d-md-flex d-none">
    <h2>User Registration</h2>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="content-section main">
                <form class="brand-details" id="userRegistrationForm">
                    <div class="container" style="padding-bottom: 20px">
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Title</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <div class="theme-select">
                                    <select id="UserRegistrationTitle" name="Title" class="form-control" onchange="UserObject.changeUserTitle(this.value)" required="required">
                                        <option value="Prof.">Prof.</option>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Ms.">Ms.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <div class="theme-down-arrow">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-12 address-search-col other-title" style="visibility: hidden">
                                <input class="form-control theme-input" type="text" size="50" name="OtherTitle" id="UserRegistrationOtherTitle" maxlength="20">
                                <span class="error user-title-error" style="display: none">Please add title.</span>
                            </div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">First Name<span class="required-field">*</span></label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="FirstName" id="UserRegistrationFirstName" placeholder="First Name" required="required">
                                <span class="error registration-first-name-error" style="display: none">Please enter your first name.</span>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Last Name<span class="required-field">*</span></label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="LastName" id="UserRegistrationLastName" placeholder="Last Name" required="required">
                                <span class="error registration-last-name-error" style="display: none">Please enter your last name.</span>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">User Name<span class="required-field">*</span></label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="UserName" id="UserRegistrationUserName" placeholder="User Name" required="required">
                                <span class="error registration-user-name-error" style="display: none">Please enter your user name.</span>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Email ID<span class="required-field">*</span></label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="EmailID" id="UserRegistrationEmailID" placeholder="Email ID" required="required">
                                <span class="error invalid-email-id" style="display: none">Please enter a valid email address.</span>
                                <span class="error registration-email-error" style="display: none">Please enter your email address.</span>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Password<span class="required-field">*</span></label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" type="password" name="UserPass" id="UserRegistrationUserPass" placeholder="Password" required="required">
                                <span class="error registration-password-error" style="display: none">Please enter your password.</span>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Confirm Password<span class="required-field">*</span></label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" type="password" id="UserRegistrationConfirmPass" placeholder="Confirm Password" required="required">
                                <span class="error password-not-matched-error" style="display: none">Password was not matched. Please try again.</span>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Profession</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="Profession" id="UserRegistrationProfession" placeholder="Profession">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Organisation</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="Organisation" id="UserRegistrationOrganisation" placeholder="Organisation">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Country</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <div class="theme-select">
                                    <select name="CountryID" class="form-control" id="userCountryID">
                                        <?php
                                        foreach ($Countries AS $country) {
                                            echo '<option value="'.$country['ID'].'">'.$country['Name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                    <div class="theme-down-arrow">
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">State</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="State" id="UserRegistrationState" placeholder="State">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">City</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="City" id="UserRegistrationCity" placeholder="City">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Zip Code</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="ZipCode" id="UserRegistrationZipCode" placeholder="ZipCode">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Address</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <textarea class="form-control theme-input" name="Address" id="UserRegistrationAddress" placeholder="Address" rows="5"></textarea>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Telephone/Mobile</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="Telephone" id="UserRegistrationTelephone" placeholder="Telephone">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Fax</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="Fax" id="UserRegistrationFax" placeholder="Fax">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-5 col-12 address-search-col"></div>
                            <div class="col-md-2 col-12 address-search-col">
                                <button type="button" class="btn theme-btn" style="width: 100%;" onclick="UserObject.submitUserRegistrationForm()">Sign Up</button>
                            </div>
                            <div class="col-md-5 col-12 address-search-col"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
    $('#userCountryID').val(1);
</script>