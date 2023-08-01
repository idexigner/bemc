<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var scrollObject = {
    	init: function () {
    		$('.error').hide();
		},
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#ScrollerTitle').val() == '') {
                is_valid = false;
                $('.scroller-title-require-message').show();
            }
            if ($('#ScrollerText').html() == '') {
                is_valid = false;
                $('.scroller-text-require-message').show();
            }

            return is_valid;
        },
        submitData: function () {
            var is_valid = scrollObject.validateForm();
            if (!is_valid) return;
            var formURL = "<?php echo site_url('Scroller/update');?>";
            var form = $('form#updateScroller');
            if (window.FormData){
                var postData = new FormData(form[0]);
            } else {
                return false;
            }

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
                    var data = serverResponse.response;
                    if (data) {
                        if (data.result){
							mimsPopup.showGeneralPopup('success', 'Success!!!', 'Scroller Data', 'Data is updated successfully', 'Ok');
                        } else if (data.result){
							mimsPopup.showGeneralPopup('error', 'Error!!!', 'Scroller Data', 'Data is not updated successfully', 'Ok');
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
        }
    }

	scrollObject.init();
</script>

