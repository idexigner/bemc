<?php
/**
 * Created By: Amalesh Debnath
 * Date: 7/12/14
 * Time: 2:19 PM
 */
?>
<!-- User Login Modal Start -->
<div class="modal" id="userLoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="display: block;background-color: gray;opacity: 0.8; width: 100%;height: 100%;"></div>
    <div class="row" style="position: absolute; width: 100%; top: 100px;">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="modal-dialog" tabindex="9999">
                <div class="modal-content">
                    <div class="modal-header">
                        <span>Login</span>
                        <button type="button" class="close" aria-hidden="true" onclick="UserObject.closeUserLoginModal()">&times;</button>
                    </div>
                    <form class="form-signin" style="padding: 30px;">
                        <div class="login-wrap">
                            <div class="user-login-info" style="padding-bottom: 20px;">
                                <input id="user_id" type="text" class="form-control" placeholder="user name/email id" autofocus>
                            </div>
                            <div class="user-login-info" style="padding-bottom: 20px;">
                                <input id="user_pass" type="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="row" style="padding-bottom: 20px;">
                            <div class="col-md-6"><input type="checkbox" value="remember-me"> Remember me</div>
<!--                            <div class="col-md-6"><span class="pull-right"><a onclick="UserObject.forgotPassword()"> Forgot Password?</a></span></div>-->
                        </div>
                        <button class="btn btn-lg btn-login btn-block theme-btn" type="button" onclick="UserObject.submitUserLoginForm()">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<!-- User Login Modal End -->
<!-- Loader Modal With Text Start -->
<div class="modal" id="loaderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="loaderBox">
                    <div class="three-quarters">
                        Loading...
                    </div>
                    <span class="loder_text">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Loader Modal With Text End -->
<!-- Warning Message Start -->
<div id="warningMessageModal" class="warning_message light modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header error">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="mimsPopup.closeWarningModal()">&times;</button>
                <h4 class="modal-title">Warning!</h4>
            </div>
            <div class="modal-body">
                <div class="content">
                    <i class="fa fa-warning"></i>
                    <p>
                        <label>Oh snap! You got an error!</label>
                        <span id="warning-message"></span>
                    </p>
                </div>
            </div>
            <button class="btn btn-lg btn-login btn-block" type="button" onclick="mimsPopup.closeWarningModal()">Close</button>
        </div>
    </div>
</div>
<!-- Warning Message End -->
<!-- Registration confirmation Modal Start -->
<div class="modal" id="userRegistrationCompletedModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div style="display: block;background-color: gray;opacity: 0.8; width: 100%;height: 100%;"></div>
    <div class="row" style="position: absolute; width: 100%; top: 100px;">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="modal-dialog" tabindex="9999">
                <div class="modal-content">
                    <div class="modal-header">
                        <span>Registration Completed!!!</span>
                        <button type="button" class="close" aria-hidden="true" onclick="UserObject.userRegistrationCompleted()">&times;</button>
                    </div>
                    <form class="form-signin" style="padding: 30px;">
                        <div class="login-wrap" style="padding: 40px 0px 50px 0px; text-align: center; font-size: 20px;">
                            You have successfully register with our system.
                        </div>
                        <div class="form-group" style="margin: 0px 150px;">
                            <button class="btn btn-lg btn-login btn-block theme-btn" type="button" onclick="UserObject.userRegistrationCompleted()" style="padding: 0px 0px;">Ok</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<!-- Registration confirmation Modal End -->
