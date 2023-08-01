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
    <h2>Profile</h2>
</div>

<!-- content -->
<div class="container">
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="content-section main">
                <form class="brand-details" id="userProfileForm">
                    <div class="container" style="padding-bottom: 20px">
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Title</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <div class="theme-select">
                                    <select id="UserProfileTitle" name="Title" class="form-control" onchange="UserObject.changeUserTitle(this.value)" required="required">
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
                                <input class="form-control theme-input" type="text" size="50" name="OtherTitle" id="UserProfileOtherTitle" maxlength="20">
                                <span class="error user-title-error" style="display: none">Please add title.</span>
                            </div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">First Name<span class="required-field">*</span></label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="FirstName" id="UserProfileFirstName" placeholder="First Name" required="required">
                                <span class="error profile-first-name-error" style="display: none">Please enter your first name.</span>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Last Name<span class="required-field">*</span></label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="LastName" id="UserProfileLastName" placeholder="Last Name" required="required">
                                <span class="error profile-last-name-error" style="display: none">Please enter your last name.</span>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">User Name<span class="required-field">*</span></label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="UserName" id="UserProfileUserName" placeholder="User Name" required="required">
                                <span class="error profile-user-name-error" style="display: none">Please enter your user name.</span>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Email ID<span class="required-field">*</span></label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="EmailID" id="UserProfileEmailID" placeholder="Email ID" required="required">
                                <span class="error invalid-email-id" style="display: none">Please enter a valid email address.</span>
                                <span class="error profile-email-error" style="display: none">Please enter your email address.</span>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Profession</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="Profession" id="UserProfileProfession" placeholder="Profession">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Organisation</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="Organisation" id="UserProfileOrganisation" placeholder="Organisation">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Country</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <div class="theme-select">
                                    <select id="UserProfileCountryID" name="CountryID" class="form-control">
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
                                <input class="form-control theme-input" name="State" id="UserProfileState" placeholder="State">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">City</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="City" id="UserProfileCity" placeholder="City">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Zip Code</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="ZipCode" id="UserProfileZipCode" placeholder="ZipCode">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Address</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <textarea class="form-control theme-input" name="Address" id="UserProfileAddress" placeholder="Address" rows="5"></textarea>
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Telephone/Mobile</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="Telephone" id="UserProfileTelephone" placeholder="Telephone">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-4 col-12 address-search-col">
                                <label class="input-title">Fax</label>
                            </div>
                            <div class="col-md-6 col-12 address-search-col">
                                <input class="form-control theme-input" name="Fax" id="UserProfileFax" placeholder="Fax">
                            </div>
                            <div class="col-md-2 col-12 address-search-col"></div>
                        </div>
                        <div class="address-search row">
                            <div class="col-md-5 col-12 address-search-col"></div>
                            <div class="col-md-2 col-12 address-search-col">
                                <button type="button" class="btn theme-btn" style="width: 100%;" onclick="UserObject.submitUserProfileForm()">Update</button>
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
    UserObject.getUserDetail();
</script>