<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var internationalHealthObject = {
        totalNews: 0,
        perPageInformationNumber: '',
        getSearchResult: function(pageNo) {
            var formURL = "<?php echo site_url('InternationalHealth/getInternationalHealthForFrontend?PageNo=')?>"+pageNo;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'internationalHealthObject.getFeatureProducts', function(internationalHealthData){
                if (internationalHealthData) {
                    $('div.international-health-list').html('');
                    var international_health_description = '';
                    for (var i = 0; i < internationalHealthData.length; i++) {
                        international_health_description = internationalHealthData[i].Description;
                        international_health_description = international_health_description.length > 120 ? international_health_description.substr(0, 116) + ' ...' : international_health_description;
                        $('div.international-health-list').append('<div class="international-health-item row">' +
                            '                  <div class="international-health-thumb col-3">' +
                            '                    <img src="<?php echo base_url('NewsImages/');?>'+internationalHealthData[i].ImagePath+'" alt="">' +
                            '                  </div>' +
                            '                  <div class="international-health-info col-9">' +
                            '                    <a class="international-health-title" href="<?php echo site_url('InternationalHealth/showIndividualInternationalHealthDetail?InternationalHealthID=')?>'+internationalHealthData[i].ID+'">'+internationalHealthData[i].Title+'</a>' +
                            '                    <p class="international-health-summary">'+international_health_description+'</p>' +
                            '                    <a href="<?php echo site_url('InternationalHealth/showIndividualInternationalHealthDetail?InternationalHealthID=')?>'+internationalHealthData[i].ID+'" class="read-more">Read More</a>' +
                            '                  </div>' +
                            '                </div>');
                    }
                }
            });
        },
        populatePagination: function (pageNo, populateList) {
            console.log('Method Name: internationalHealthObject.populatePagination Param: pageNo Value: '+[pageNo].toString());
            var per_page_information_number = internationalHealthObject.perPageInformationNumber;
            var total_page = Math.ceil(internationalHealthObject.totalNews / per_page_information_number);

            if (populateList === true) internationalHealthObject.getSearchResult(pageNo);
            if (total_page > 1) {
                $('ul#international-health-pagination').show();
            } else {
                $('ul#international-health-pagination').hide();
            }

            var total_pagination = <?php echo config_item('total_page');?>;
            var start_page_no = pageNo - Math.floor(per_page_information_number / 2) < 1 ? 1 : pageNo - Math.floor(per_page_information_number / 2);
            var page_counter = 0;
            var pagination_li_text;
            console.log('per_page_information_number: '+per_page_information_number+' total_page: '+total_page+' total_pagination: '+total_pagination+' start_page_no: '+start_page_no);
            $('ul#international-health-pagination').html('');
            if (pageNo > 1) {
                var previous_page_no = pageNo - 1;
                $('ul#international-health-pagination').html('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Previous" onclick="internationalHealthObject.populatePagination('+previous_page_no+', true)">' +
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
                    pagination_li_text = '<li class="page-item"><a class="page-link" onclick="internationalHealthObject.populatePagination('+i+', true)">'+i+'</a></li>';
                }
                $('ul#international-health-pagination').append(pagination_li_text);
                page_counter++;
                console.log('page_counter: '+page_counter+' total_pagination: '+total_pagination+' total_page: '+total_page);
            }

            if (total_page > pageNo) {
                var next_page_no = pageNo + 1;
                $('ul#international-health-pagination').append('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Next" onclick="internationalHealthObject.populatePagination('+next_page_no+', true)">' +
                    '                                        <span>&raquo;</span>' +
                    '                                        <span class="sr-only">Next</span>' +
                    '                                    </a>' +
                    '                                </li>');
            }
        }
    }
</script>