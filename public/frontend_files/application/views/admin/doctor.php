<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**

 * Created by PhpStorm.

 * User: Amalesh

 * Date: 8/17/2018

 * Time: 10:01 PM

 */

?>

    <!--main content start-->

    <section id="main-content">

        <section class="wrapper">

            <!-- page start-->

            <div class="row">

                <div class="col-lg-12">

					<section class="panel">

						<header class="panel-heading">

							Doctor List

							<span class="tools pull-right"><a onclick="doctorObject.showDoctorCreateModal()">Add New Doctor</a></span>

						</header>

						<div class="panel-body">

							<div class="adv-table">

								<table  class="display table table-bordered table-striped" id="dynamic-table">

									<thead>

									<tr>

										<th width="25%">Name</th>
                                        <th width="25%">Email ID</th>

										<th width="15%">Specialization</th>
                                        <th width="15%">Experience</th>

										<th width="40%">Profession Degree</th>

										<th width="10%">Gender</th>

										<th width="10%">Action</th>

									</tr>

									</thead>

									<tbody>



									<?php 

									foreach ($AllDoctors AS $doctor) 
                                    {

										$gender = $doctor['Gender'] == 1 ? 'Male' : 'Female';

										echo '<tr class="table-row">

                                    <td><a class="link" onclick="doctorObject.showDoctorEditModal('.$doctor['ID'].')">'.$doctor['Name'].'</a></td>

                                    <td>'.$doctor['email_id'].'</td>
                                    <td>'.$doctor['Specialization'].'</td>
                                    <td>'.$doctor['experiance'].'</td>

                                    <td>'.$doctor['ProfessionDegree'].'</td>

                                    <td>'.$gender.'</td>

                                    <td>

                                        <div class="actions">

                                            <a onclick="doctorObject.showDoctorEditModal('.$doctor['ID'].')"><img src="'.base_url().'application/views/images/svg/edit-regular.svg"></a>

                                            <a onclick="doctorObject.deleteDoctor('.$doctor['ID'].')" class="delete"><img src="'.base_url().'application/views/images/svg/trash-alt-regular.svg"></a>

                                        </div>

                                    </td>

                                </tr>';

									}

									?>

									</tbody>

								</table>

							</div>

						</div>

					</section>

                </div>

            </div>

            <!-- page end-->

        </section>

    </section>

    <!--main content end-->

</section>

<!--common script init for all pages-->

<!-- Add New Doctor Modal Start -->

<div class="modal modal-fix" id="addDoctorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h3 class="modal-title">Add New Doctor</h3>

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>

            <form id="addNewDoctor" class="form-horizontal">

                <div class="modal-body">

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Name </span>

                            <!-- <span class="required-field">*</span> -->

                        </label>

                        <div class="col-md-6">

                            <input id="DoctorName" name="DoctorName">

                            <!-- <span class="doctor-name-require-message error-message error">This field is required.</span> -->

                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Email ID </span>
                            <!-- <span class="required-field">*</span> -->
                        </label>
                        <div class="col-md-6">
                            <input id="email_id" name="email_id" >
                            <!-- <span class="email_id-require-message error-message error">This field is required.</span> -->
                        </div>
                    </div>
                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Phone No (Personal)</span>

                        </label>

                        <div class="col-md-6">

                            <input id="DoctorPhoneNo" name="PhoneNo">

                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">
                            <span>Phone No (Clinic) </span>
                            <!-- <span class="required-field">*</span> -->
                        </label>
                        <div class="col-md-6">
                            <input id="clinic_phone" name="clinic_phone" >
                            <!-- <span class="doctor-name-require-message error-message error">This field is required.</span> -->
                        </div>
                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Specialization </span>

                            <!-- <span class="required-field">*</span> -->

                        </label>

                        <div class="col-md-6">

                            <input id="Specialization" name="Specialization" >

                            <!-- <span class="specialization-require-message error-message error">This field is required.</span> -->

                        </div>

                    </div>
                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Achievement </span>

                            <!-- <span class="required-field">*</span> -->

                        </label>

                        <div class="col-md-6">

                            <input id="achievement" name="achievement" >

                            <!-- <span class="achievement-require-message error-message error">This field is required.</span> -->

                        </div>

                    </div>
                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Experience </span>

                            <!-- <span class="required-field">*</span> -->

                        </label>

                        <div class="col-md-6">

                            <input id="experiance" name="experiance" >

                            <!-- <span class="experiance-require-message error-message error">This field is required.</span> -->

                        </div>

                    </div>

                    <!-- <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Profession Degree </span>

                            <span class="required-field">*</span>

                        </label>

                        <div class="col-md-6">

                            <input id="ProfessionDegree" name="ProfessionDegree" required>

                            <span class="profession-degree-require-message error-message error">This field is required.</span>

                        </div>

                    </div> -->

                     <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Gender </span>

                            <!-- <span class="required-field">*</span> -->

                        </label>

                        <div class="col-md-6">

                            <select id="DoctorGender" name="Gender" >

                                <option value="1">Male</option>

                                <option value="2">Female</option>

                            </select>

                            <!-- <span class="doctor-gender-require-message error-message error">This field is required.</span> -->

                        </div>

                    </div> 

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Certificate  </span>

                        </label>

                        <div class="col-md-6">

                            <input id="certificate" name="certificate" type="file"  />

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Image </span>

                        </label>

                        <div class="col-md-6">

                            <!-- <input id="DoctorImagePath" name="ImagePath" type="file" onchange="doctorObject.setDoctorImagePathThumbnail(this, 'DoctorImagePathThumbnail')" /> -->
                            <input id="DoctorImagePath" name="ImagePath" type="file"  />

                        </div>

                    </div>

                    <!-- <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Image Thumbnail</span>

                        </label>

                        <div class="col-md-6">

                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">

                                <img id="DoctorImagePathThumbnail" src='' alt="Thumbnail"/>

                            </div>

                        </div>

                    </div> -->

                    <!-- <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Home Address </span>

                        </label>

                        <div class="col-md-6">

                            <select id="HomeAddressID" name="HomeAddressID" onclick="doctorObject.changeDoctorHomeAddress(this.value)"></select>

                        </div>

                    </div>

                    <div class="form-group home-existing-address">

                        <label class="control-label col-md-4">

                            <span>Home Address Detail</span>

                        </label>

                        <div class="col-md-6">

                            <textarea id="HomeAddressDetail" rows="6" class="form-control ckeditor-rich-text" type="text" maxlength="500" disabled></textarea>

                        </div>

                    </div> -->

                    <div class="form-group home-new-address">

                        <label class="control-label col-md-4">

                            <span>Country </span>

                            <!-- <span class="required-field">*</span> -->

                        </label>

                        <div class="col-md-6">

                            <select id="clinic_country_id" name="clinic_country_id"></select>

                            <!-- <span class="home-country-require-message error-message error">This field is required.</span> -->

                        </div>

                    </div>

                    <div class="form-group home-new-address">

                        <label class="control-label col-md-4">

                            <span>State </span>

                            <!-- <span class="required-field">*</span> -->

                        </label>

                        <div class="col-md-6">

                            <select id="clinic_state_id" name="clinic_state_id"></select>

                            <!-- <span class="home-state-require-message error-message error">This field is required.</span> -->

                        </div>

                    </div>

                    <div class="form-group home-new-address">

                        <label class="control-label col-md-4">

                            <span>City </span>

                            <!-- <span class="required-field">*</span> -->

                        </label>

                        <div class="col-md-6">

                            <select id="clinic_city_id" name="clinic_city_id"></select>

                            <!-- <span class="home-city-require-message error-message error">This field is required.</span> -->

                        </div>

                    </div>
                    <div class="form-group home-new-address">

                        <label class="control-label col-md-4">

                            <span>Zip Code </span>

                        </label>

                        <div class="col-md-6">

                            <input id="clinic_zipcode" name="clinic_zipcode" type="number" maxlength="17">

                        </div>

                    </div>

                     <div class="form-group home-new-address">

                        <label class="control-label col-md-4">

                            <span>Bio Notes</span>

                            <!-- <span class="required-field">*</span> -->
 
                        </label>

                        <div class="col-md-6"> 
                            <!-- ckeditor-rich-text -->
                            <textarea id="bio_notes" rows="3" class="form-control " maxlength="500" name="bio_notes"></textarea>

                            <!-- <span class="home-address-require-message error-message error">This field is required.</span> -->

                        </div>

                    </div>

                    <div class="form-group home-new-address">

                        <label class="control-label col-md-4">

                            <span>Address</span>

                            <!-- <span class="required-field">*</span> -->
 
                        </label>

                        <div class="col-md-6"> 
                            <!-- ckeditor-rich-text -->
                            <textarea id="clinic_address" rows="3" class="form-control " type="text" maxlength="500" name="clinic_address"></textarea>

                            <!-- <span class="home-address-require-message error-message error">This field is required.</span> -->

                        </div>

                    </div>

                    <!-- <div class="form-group home-new-address">

                        <label class="control-label col-md-4">

                            <span>Longitude </span>

                        </label>

                        <div class="col-md-6">

                            <input id="HomeLongitude" name="HomeLongitude" type="number" maxlength="17">

                        </div>

                    </div>  

                    <div class="form-group home-new-address">

                        <label class="control-label col-md-4">

                            <span>Latitude </span>

                        </label>

                        <div class="col-md-6">

                            <input id="HomeLatitude" name="HomeLatitude" type="number" maxlength="17">

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Chamber Address </span>

                        </label>

                        <div class="col-md-6">

                            <select id="ChamberAddressID" name="ChamberAddressID" onclick="doctorObject.changeDoctorChamberAddress(this.value)"></select>

                        </div>

                    </div>

                    <div class="form-group chamber-existing-address">

                        <label class="control-label col-md-4">

                            <span>Chamber Address Detail</span>

                        </label>

                        <div class="col-md-6">

                            <textarea id="ChamberAddressDetail" rows="6" class="form-control ckeditor-rich-text" type="text" maxlength="500" disabled></textarea>

                        </div>

                    </div> -->

                    <!-- <div class="form-group chamber-new-address">

                        <label class="control-label col-md-4">

                            <span>Country </span>

                            <span class="required-field">*</span>

                        </label>

                        <div class="col-md-6">

                            <select id="ChamberCountryID" name="ChamberCountryID"></select>

                            <span class="chamber-country-require-message error-message error">This field is required.</span>

                        </div>

                    </div>

                    <div class="form-group chamber-new-address">

                        <label class="control-label col-md-4">

                            <span>State </span>

                            <span class="required-field">*</span>

                        </label>

                        <div class="col-md-6">

                            <select id="ChamberStateID" name="ChamberStateID"></select>

                            <span class="chamber-state-require-message error-message error">This field is required.</span>

                        </div>

                    </div>

                    <div class="form-group chamber-new-address">

                        <label class="control-label col-md-4">

                            <span>City </span>

                            <span class="required-field">*</span>

                        </label>

                        <div class="col-md-6">

                            <select id="ChamberCityID" name="ChamberCityID"></select>

                            <span class="chamber-city-require-message error-message error">This field is required.</span>

                        </div>

                    </div>

                    <div class="form-group chamber-new-address">

                        <label class="control-label col-md-4">

                            <span>Address</span>

                            <span class="required-field">*</span>

                        </label>

                        <div class="col-md-6">

                            <textarea id="ChamberAddress" rows="6" class="form-control ckeditor-rich-text" type="text" maxlength="500" name="ChamberAddress"></textarea>

                            <span class="chamber-address-require-message error-message error">This field is required.</span>

                        </div>

                    </div>

                    <div class="form-group chamber-new-address">

                        <label class="control-label col-md-4">

                            <span>Longitude </span>

                        </label>

                        <div class="col-md-6">

                            <input id="ChamberLongitude" name="ChamberLongitude" type="number" maxlength="17">

                        </div>

                    </div>

                    <div class="form-group chamber-new-address">

                        <label class="control-label col-md-4">

                            <span>Latitude </span>

                        </label>

                        <div class="col-md-6">

                            <input id="ChamberLatitude" name="ChamberLatitude" type="number" maxlength="17">

                        </div>

                    </div>

                    

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Mobile No(1) </span>

                        </label>

                        <div class="col-md-6">

                            <input id="DoctorMobileNo1" name="MobileNo1">

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Mobile No(2) </span>

                        </label>

                        <div class="col-md-6">

                            <input id="DoctorMobileNo2" name="MobileNo2">

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Mobile No(3) </span>

                        </label>

                        <div class="col-md-6">

                            <input id="DoctorMobileNo3" name="MobileNo3">

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-md-4">

                            <span>Hotline </span>

                        </label>

                        <div class="col-md-6">

                            <input id="DoctorHotline" name="Hotline">

                        </div>

                    </div>
 -->
                    <!-- <div class="form-group">

                        <label class="control-label col-md-4">Is Active</label>

                        <div class="col-md-6">

                            <div class="radio">

                                <label>

                                    <input checked="checked" type="radio" name="IsActive" id="DoctorIsActiveYes" value="1">Yes</label>

                            </div>

                            <div class="radio">

                                <label>

                                    <input type="radio" name="IsActive" id="DoctorIsActiveNo" value="0">No</label>

                            </div>

                        </div>

                    </div> -->

                </div>

                <div class="modal-footer">

                    <button id="doctor_modal" class="btn btn-info" type="button" onclick="doctorObject.submitDoctorModal()">Create</button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>

    // commonMethods.enableCKEditorByIDs(['HomeAddress', 'ChamberAddress']);
    commonMethods.enableCKEditorByIDs(['clinic_address']);

</script>

<!-- Add New Doctor Modal End -->

<script>

	$('#dynamic-table').dataTable( {

		"aaSorting": [[ 0, "asc" ]]

	} );



	$('div.adv-table div#dynamic-table_wrapper div.row-fluid').css('width', '100%');

	$('#dynamic-table thead tr th').css('font-weight', 'bold');

	$('#dynamic-table thead tr th').css('font-size', '15px');

</script>

