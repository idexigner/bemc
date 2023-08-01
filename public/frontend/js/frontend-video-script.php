<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var videoObject = {
        totalVideo: 0,
        perPageInformationNumber: '',
        getSearchResult: function(pageNo) {
			console.log('Method Name: videoObject.getSearchResult Param: pageNo Value: '+[pageNo].toString());
            var formURL = "<?php echo site_url('Video/getVideoInformationForFrontend?PageNo=')?>"+pageNo;
			$('div.video-list').html('');
			mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'videoObject.getSearchResult', function(videoData){
                if (videoData) {
					youTubeVideos = videoData;
                    for (var i = 0; i < videoData.length; i++) {
                        $('div.video-list').append('<div class="col-md-6">' +
								'<div class="youtube-video">' +
								'<img width="100%" height="150" src="'+videoData[i].thumbnail+'"></img></div>' +
								'</div>' +
								'<div class="col-md-6">' +
								'<p style="font-weight: bold;">'+videoData[i].Title+'</p>' +
								'<p style="text-align: center"><a onclick="frontendCommonMethods.youtubeFullScreen('+i+')"><img style="width: 90px;" src="<?php echo base_url()?>application/views/images/icons/youtube_play_button.png"></a></p>' +
								'</div>');
                    }
                }
            });
        },
        populatePagination: function (pageNo, populateList) {
            // console.log('Method Name: videoObject.populatePagination Param: pageNo Value: '+[pageNo].toString());
            var per_page_information_number = videoObject.perPageInformationNumber;
            var total_page = Math.ceil(videoObject.totalVideo / per_page_information_number);

            if (populateList === true) videoObject.getSearchResult(pageNo);
            if (total_page > 1) {
                $('ul#video-pagination').show();
            } else {
                $('ul#video-pagination').hide();
            }

            var total_pagination = <?php echo config_item('total_page');?>;
            var start_page_no = pageNo - Math.floor(per_page_information_number / 2) < 1 ? 1 : pageNo - Math.floor(per_page_information_number / 2);
            var page_counter = 0;
            var pagination_li_text;
            console.log('per_page_information_number: '+per_page_information_number+' total_page: '+total_page+' total_pagination: '+total_pagination+' start_page_no: '+start_page_no);
            $('ul#video-pagination').html('');
            if (pageNo > 1) {
                var previous_page_no = pageNo - 1;
                $('ul#video-pagination').html('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Previous" onclick="videoObject.populatePagination('+previous_page_no+', true)">' +
                    '                                        <span>&laquo;</span>' +
                    '                                        <span class="sr-only">Previous</span>' +
                    '                                    </a>' +
                    '                                </li>' +
                    '                                ');
            }

            for(var i = start_page_no; ; i++) {
                if (page_counter == total_pagination - 1 || page_counter == total_page) {
                    break;
                }
                pagination_li_text = '';
                if (i == pageNo) {
                    pagination_li_text = '<li class="page-item active"><a class="page-link" href="#">'+i+'</a></li>';
                } else {
                    pagination_li_text = '<li class="page-item"><a class="page-link" onclick="videoObject.populatePagination('+i+', true)">'+i+'</a></li>';
                }
                $('ul#video-pagination').append(pagination_li_text);
                page_counter++;
                console.log('page_counter: '+page_counter+' total_pagination: '+total_pagination+' total_page: '+total_page);
            }

            if (total_page > pageNo) {
                var next_page_no = pageNo + 1;
                $('ul#video-pagination').append('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Next" onclick="videoObject.populatePagination('+next_page_no+', true)">' +
                    '                                        <span>&raquo;</span>' +
                    '                                        <span class="sr-only">Next</span>' +
                    '                                    </a>' +
                    '                                </li>');
            }
        }
    }
</script>
