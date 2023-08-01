<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var ebook = {
        title: '',
        folderName: '',
        fileNamePrefix: '',
        fileExtension: '',
        numberOfPage: '',
        populateEBookPages: function() {
            var number_of_page = parseInt(ebook.numberOfPage);
            var file_name_postfix_length = ebook.numberOfPage.length;
            $('.flipbook').html('');
            for (var i = 1; i <= number_of_page; i++) {
                var ebook_page = '<div><img src="<?php echo base_url();?>EBooks/'+ebook.folderName+'/'+ebook.fileNamePrefix+i+'.'+ebook.fileExtension+'" width="100%" height="100%"> </div>';
                console.log(ebook_page);
                $('.flipbook').append(ebook_page);
            }
        },
        goToPage: function () {
            var page_no = $('#ebookPageNo').val();
            if (page_no) {
                $(".flipbook").turn("page", page_no);
            }
        }
    }
</script>