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
                <div class="col-sm-12">
                    <section class="panel">
						<header class="panel-heading">
							Scroller Information
						</header>
						<form id="updateScroller" class="form-horizontal">
							<div class="modal-body">
								<div class="form-group">
									<label class="control-label col-md-4"><span>Title </span><span class="required-field">*</span></label>
									<div class="col-md-6">
										<input id="ScrollerTitle" name="ScrollerTitle" value="<?php echo $scroll_title;?>" maxlength="15">
										<span class="scroller-title-require-message error-message error">This field is required.</span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4"><span>Text </span><span class="required-field">*</span></label>
									<div class="col-md-6">
										<textarea id="ScrollerText" name="ScrollerText" cols="100" rows="20" maxlength="2000"><?php echo $scroller_text;?></textarea>
										<span class="scroller-text-require-message error-message error">This field is required.</span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4"></label>
									<div class="col-md-6">
									<button id="update-scroller" class="btn btn-info" type="button" onclick="scrollObject.submitData()">Update</button>
									</div>
								</div>
							</div>
						</form>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
</section>
