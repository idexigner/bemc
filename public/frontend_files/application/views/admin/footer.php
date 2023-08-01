<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 8/17/2018
 * Time: 5:00 PM
 */
?>
<script src="<?php echo base_url()?>application/views/js/admin/scripts.js"></script>

<!-- Danger, Warning and Success Modal Start -->
<div class="modal modal-fix" id="generalPopupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="general_popup_title">Modal Title</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form id="addNewInternationalHealth" class="form-horizontal">
                <div class="modal-body">
                    <!-- For Success message we have to use this class - "alert-success" -->
                    <!-- For Warning message we have to use this class - "alert-warning" -->
                    <!-- For Error message we have to use this class - "alert-danger" -->
                    <div class="alert alert-danger" id="general_popup_body" role="alert">
                        <h4 class="alert-heading" id="general_popup_heading">Wait! This is a danger message</h4>
                        <p id="general_popup_body_part1">Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                        <hr>
                        <p class="mb-0" id="general_popup_body_part2">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="general_popup_button_left">Close</button>
                    <button type="button" class="btn btn-danger" id="general_popup_button_right" onclick="mimsPopup.closeGeneralPopup()">Delete</button>
                    <!-- For Success message we have to use this class - "btn-success" -->
                    <!-- For Warning message we have to use this class - "btn-warning" -->
                    <!-- For Error message we have to use this class - "btn-danger" -->
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Danger, Warning and Success Modal End -->
</body>
</html>

