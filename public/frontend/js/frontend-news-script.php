<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var newsObject = {
        totalNews: 0,
        perPageInformationNumber: '',
        getSearchResult: function(pageNo) {
            var formURL = "<?php echo site_url('News/getNewsInformationForFrontend?PageNo=')?>"+pageNo;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'newsObject.getFeatureProducts', function(newsData){
                if (newsData) {
                    $('div.news-list').html('');
                    var news_description = '';
                    for (var i = 0; i < newsData.length; i++) {
                        news_description = newsData[i].Description;
                        news_description = news_description.length > 120 ? news_description.substr(0, 116) + ' ...' : news_description;

                        $('div.news-list').append('<div class="news-item row">' +
                            '                  <div class="news-thumb col-3">' +
                            '                    <img src="<?php echo base_url('NewsImages/');?>'+newsData[i].ImagePath+'" alt="">' +
                            '                  </div>' +
                            '                  <div class="news-info col-9">' +
                            '                    <a class="news-title" href="<?php echo site_url('News/showIndividualNewsDetail?NewsID=')?>'+newsData[i].ID+'">'+newsData[i].Title+'</a>' +
                            '                    <p class="news-summary">'+news_description+'</p>' +
                            '                    <a href="<?php echo site_url('News/showIndividualNewsDetail?NewsID=')?>'+newsData[i].ID+'" class="read-more">Read More</a>' +
                            '                  </div>' +
                            '                </div>');
                    }
                }
            });
        },
        populatePagination: function (pageNo, populateList) {
            console.log('Method Name: newsObject.populatePagination Param: pageNo Value: '+[pageNo].toString());
            var per_page_information_number = newsObject.perPageInformationNumber;
            var total_page = Math.ceil(newsObject.totalNews / per_page_information_number);

            if (populateList === true) newsObject.getSearchResult(pageNo);
            if (total_page > 1) {
                $('ul#news-pagination').show();
            } else {
                $('ul#news-pagination').hide();
            }

            var total_pagination = <?php echo config_item('total_page');?>;
            var start_page_no = pageNo - Math.floor(per_page_information_number / 2) < 1 ? 1 : pageNo - Math.floor(per_page_information_number / 2);
            var page_counter = 0;
            var pagination_li_text;
            console.log('per_page_information_number: '+per_page_information_number+' total_page: '+total_page+' total_pagination: '+total_pagination+' start_page_no: '+start_page_no);
            $('ul#news-pagination').html('');
            if (pageNo > 1) {
                var previous_page_no = pageNo - 1;
                $('ul#news-pagination').html('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Previous" onclick="newsObject.populatePagination('+previous_page_no+', true)">' +
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
                    pagination_li_text = '<li class="page-item"><a class="page-link" onclick="newsObject.populatePagination('+i+', true)">'+i+'</a></li>';
                }
                $('ul#news-pagination').append(pagination_li_text);
                page_counter++;
                console.log('page_counter: '+page_counter+' total_pagination: '+total_pagination+' total_page: '+total_page);
            }

            if (total_page > pageNo) {
                var next_page_no = pageNo + 1;
                $('ul#news-pagination').append('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Next" onclick="newsObject.populatePagination('+next_page_no+', true)">' +
                    '                                        <span>&raquo;</span>' +
                    '                                        <span class="sr-only">Next</span>' +
                    '                                    </a>' +
                    '                                </li>');
            }
        }
    }
</script>