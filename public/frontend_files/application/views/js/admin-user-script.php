<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var userObject = {
        submitLoginForm: function () {
            var user_id = $('#user_id').val();
            var user_pass = $('#user_pass').val();
            var formURL = "<?php echo site_url('User/userLogin')?>"+'?UserID='+user_id+'&UserPass='+user_pass;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'userObject.submitLoginForm', function(data) {
                if (data.success) {
                    top.location = '<?php echo site_url('Brand/getBrandListForAdmin');?>';
                }
            });
        }
    }
</script>
