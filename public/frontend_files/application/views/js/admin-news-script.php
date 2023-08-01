<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var newsObject = {
        activeNewsID: '',
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#NewsTitle').val() == '') {
                is_valid = false;
                $('.news-title-require-message').show();
            }
            if ($('#NewsDescription').val() == '') {
                is_valid = false;
                $('.news-description-require-message').show();
            }
            if ($('#NewsPublishDate').val() == '') {
                is_valid = false;
                $('.news-publish-date-require-message').show();
            }
            if ($('#NewsUnpublishedDate').val() == '') {
                is_valid = false;
                $('.news-unpublished-date-require-message').show();
            }
            if ($('#NewsImagePath').val() == '') {
                is_valid = false;
                $('.news-image-path-require-message').show();
            }

            return is_valid;
        },
        initNewsPage: function() {
            var today = new Date((new Date()).setHours(0, 0, 0, 0));
            $('.date-field').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                clearBtn: true,
                todayHighlight: true,
                startDate:today
            });
        },
        showNewsCreateModal: function () {
            newsObject.activeNewsID = '';
            $('.error-message').hide();
            $('#news_modal').html('Create');
            $('#NewsTitle').val('');
            $('#NewsDescription').val('');
            $('#NewsImagePathThumbnail').attr('src', '');
            $('#NewsPublishDate').val('');
            $('#NewsUnpublishedDate').val('');
            $("#NewsIsActiveNo").prop("checked", true);
            $('#addNewsModal').modal('show');
        },
        deleteNews: function (newsID) {
            console.log('Method Name: newsObject.deleteNews');
            var formURL = "<?php echo site_url('News/deleteNews');?>?NewsID="+newsID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'newsObject.deleteNews', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete News', success_msg, 'Ok');
                    newsObject.populateNewsList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete News', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitNewsModal: function () {
            var news_description = commonMethods.getRichTextValueByID('NewsDescription');
            $('#NewsDescription').val(news_description);

            var is_valid = newsObject.validateForm();
            if (!is_valid) return;
            $('#addNewsModal').modal('hide');
            var formURL = newsObject.activeNewsID == '' ? "<?php echo site_url('News/addNews');?>" : "<?php echo site_url('News/updateNews');?>?NewsID="+newsObject.activeNewsID;
            var form = $('form#addNewNews');
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
                    var user_event = newsObject.activeNewsID == '' ? 'Add' : 'Update';
                    if (data) {
                        if (data.error_msg != ''){
                            mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' News', data.error_msg, 'Ok');
                        } else if (data.result){
                            var success_msg = 'You have successfully added a news.';
                            mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + ' News', success_msg, 'Ok');
                            newsObject.populateNewsList();
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
        },
        populateNewsList: function() {
            var formURL = "<?php echo site_url('News/getAllNewss')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'newsObject.getNewsList', function(newsData){
                var news_tr_text = '';
                $('tbody.news-list').html('');
                for(var i = 0; i < newsData.length; i++) {
                    news_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="newsObject.showNewsEditModal('+newsData[i].ID+')">'+newsData[i].Title+'</a></td>' +
                        '<td>' + newsData[i].PublishDateTime + '</td>' +
                        '<td>' + newsData[i].UnpublishedDateTime + '</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="newsObject.showNewsEditModal('+newsData[i].ID+')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="newsObject.deleteNews('+newsData[i].ID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.news-list').append(news_tr_text);
                }
            });
        },
        showNewsEditModal: function (newsID) {
            console.log('Method Name: newsObject.showNewsEditModal');
            $('.error-message').hide();
            newsObject.activeNewsID = newsID;
            var formURL = "<?php echo site_url('News/getNewsDetailInformation')?>?NewsID="+newsID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'newsObject.showNewsEditModal', function(newsData){
                $('#NewsTitle').val(newsData.Title);
                commonMethods.setRichTextValueByID('NewsDescription', newsData.Description);
                $('#NewsImagePathThumbnail').attr('src', '<?php echo base_url()?>NewsImages/'+newsData.ImagePath);
                $('#NewsPublishDate').datepicker('setValue', newsData.PublishDateTime);
                $('#NewsUnpublishedDate').datepicker('setValue', newsData.UnpublishedDateTime);
                if (newsData.IsActive) {
                    $("#NewsIsActiveYes").prop("checked", true);
                } else {
                    $("#NewsIsActiveNo").prop("checked", true);
                }
            });
            $('#news_modal').html('Update');
            $('#addNewsModal').modal('show');
        },
        setNewsImagePathThumbnail: function (input, objectID) {
            console.log('newsObject.setNewsImagePathThumbnail' + 'Params: input, objectID' + ' Values: ' + input + ' ' + objectID);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+objectID).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    newsObject.initNewsPage();
</script>
