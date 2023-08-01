<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var mimsStudyObject = {
        totalMimsStudy: 0,
        perPageInformationNumber: '',
        getSearchResult: function(pageNo) {
            var formURL = "<?php echo site_url('MimsStudy/getMimsStudyForFrontend?PageNo=')?>"+pageNo;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'mimsStudyObject.getSearchResult', function(mimsStudyData){
                if (mimsStudyData) {
                    $('div.mims-study').html('');
                    for (var i = 0; i < newsData.length; i++) {
                        $('div.mims-study').append('<div class="media">' +
                            '<img class="mr-3" src="<?php echo base_url('MimsStudyImages/');?>'+mimsStudyData[i].ImagePath+'" alt="image">' +
                            '<div class="media-body">' +
                            '<h5 class="mt-0"><a href="'+mimsStudyData[i].LinkAddress+'" target="_blank">'+mimsStudyData[i].Title+'</a></h5>' +
                            '</div>' +
                            '</div>');
                    }
                }
            });
        },
        populatePagination: function (pageNo, populateList) {
            console.log('Method Name: mimsStudyObject.populatePagination Param: pageNo Value: '+[pageNo].toString());
            var per_page_information_number = mimsStudyObject.perPageInformationNumber;
            var total_page = Math.ceil(mimsStudyObject.totalMimsStudy / per_page_information_number);

            if (populateList === true) mimsStudyObject.getSearchResult(pageNo);
            if (total_page > 1) {
                $('ul#mims-study-pagination').show();
            } else {
                $('ul#mims-study-pagination').hide();
            }

            var total_pagination = <?php echo config_item('total_page');?>;
            var start_page_no = pageNo - Math.floor(per_page_information_number / 2) < 1 ? 1 : pageNo - Math.floor(per_page_information_number / 2);
            var page_counter = 0;
            var pagination_li_text;
            console.log('per_page_information_number: '+per_page_information_number+' total_page: '+total_page+' total_pagination: '+total_pagination+' start_page_no: '+start_page_no);
            $('ul#mims-study-pagination').html('');
            if (pageNo > 1) {
                var previous_page_no = pageNo - 1;
                $('ul#mims-study-pagination').html('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Previous" onclick="mimsStudyObject.populatePagination('+previous_page_no+', true)">' +
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
                    pagination_li_text = '<li class="page-item"><a class="page-link" onclick="mimsStudyObject.populatePagination('+i+', true)">'+i+'</a></li>';
                }
                $('ul#mims-study-pagination').append(pagination_li_text);
                page_counter++;
                console.log('page_counter: '+page_counter+' total_pagination: '+total_pagination+' total_page: '+total_page);
            }

            if (total_page > pageNo) {
                var next_page_no = pageNo + 1;
                $('ul#mims-study-pagination').append('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Next" onclick="mimsStudyObject.populatePagination('+next_page_no+', true)">' +
                    '                                        <span>&raquo;</span>' +
                    '                                        <span class="sr-only">Next</span>' +
                    '                                    </a>' +
                    '                                </li>');
            }
        }
    }
</script>
