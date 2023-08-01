<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var jobObject = {
        totalJob: 0,
        perPageInformationNumber: '',
        activeJobCategory: 1,
        changeJobCategoryCircularPage: function(jobCategory) {
            console.log('Method Name: jobObject.changeJobCategoryCircularPage Param: jobCategory Value: '+[jobCategory].toString());
            jobObject.activeJobCategory = jobCategory;
            $('div#job-circular-category-tab div.tab-pane').removeClass('show');
            $('div#job-circular-category-tab div.tab-pane').removeClass('active');
            $('ul.job-category-ul li a').removeClass('active');
            $('ul.job-category-ul li a').removeClass('show');
            switch (jobCategory) {
                case 1:
                    $('ul.job-category-ul li.pharma-li a').addClass('active');
                    $('ul.job-category-ul li.pharma-li a').removeClass('show');
                    $('div#job-circular-category-tab div#pharmaTab').removeClass('show');
                    $('div#job-circular-category-tab div#pharmaTab').removeClass('active');
                    if ( $('ul#job-circular-pagination-pharma li').length > 1 ) {
                        $('#job-circular-pagination-pharma').show();
                    } else {
                        $('#job-circular-pagination-pharma').hide();
                    }
                    $('#job-circular-pagination-medical').hide();
                    $('div#job-circular-category-tab div#medicalTab').addClass('tab-pane');
                    $('div#job-circular-category-tab div#medicalTab').addClass('fade');
                    $('div#job-circular-category-tab div#pharmaTab').removeClass('tab-pane');
                    $('div#job-circular-category-tab div#pharmaTab').removeClass('fade');
                    break;
                case 2:
                    $('ul.job-category-ul li.medical-li a').addClass('active');
                    $('ul.job-category-ul li.medical-li a').removeClass('show');
                    $('div#job-circular-category-tab div#medicalTab').removeClass('show');
                    $('div#job-circular-category-tab div#medicalTab').removeClass('active');
                    $('#job-circular-pagination-pharma').hide();
                    if ( $('ul#job-circular-pagination-medical li').length > 1 ) {
                        $('#job-circular-pagination-medical').show();
                    } else {
                        $('#job-circular-pagination-medical').hide();
                    }

                    $('div#job-circular-category-tab div#pharmaTab').addClass('tab-pane');
                    $('div#job-circular-category-tab div#pharmaTab').addClass('fade');
                    $('div#job-circular-category-tab div#medicalTab').removeClass('tab-pane');
                    $('div#job-circular-category-tab div#medicalTab').removeClass('fade');
                    break;
                default:
                    break;
            }
        },
        getSearchResult: function(pageNo) {
            console.log('Method Name: jobObject.getSearchResult Param: pageNo Value: '+[pageNo].toString());
            var formURL = "<?php echo site_url('Job/getJobInformationForFrontend?PageNo=')?>"+pageNo+'&JobCategory='+jobObject.activeJobCategory;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'jobObject.getFeatureProducts', function(jobData){
                if (jobData) {
                    if (jobObject.activeJobCategory == 1) {
                        $('div#pharmaTab div.job-list').html('');
                    } else if (jobObject.activeJobCategory == 2) {
                        $('div#medicalTab div.job-list').html('');
                    }

                    for (var i = 0; i < jobData.length; i++) {
                        var organization_logo = jobData[i].OrganizationLogo;
                        organization_logo = organization_logo == '' || organization_logo == null ? '' : '<?php echo base_url();?>JobImages/'+organization_logo;
                        if (jobObject.activeJobCategory == 1) {
                            $('div#pharmaTab div.job-list').append('<div class="row job">' +
                                '                <div class="col-md-9 col-10">' +
                                '<a href="<?php echo site_url('Job/showJobDetail?JobID=');?>'+jobData[i].ID+'"><h3 class="job-title">' +
                                jobData[i].Title +
                                '                    </h3></a>' +
                                '                    <p class="job-post-date">Posted on <span>'+jobData[i].PublishDate+'</span></p>' +
                                '                    <p class="job-info-summary">' +
                                jobData[i].Description +
                                '                    </p>' +
                                '                    <a class="job-detail-btn no-outline" href="<?php echo site_url('Job/showJobDetail?JobID=');?>'+jobData[i].ID+'">View Job Detail</a>' +
                                '                </div>' +
                                '                <div class="col-md-3 col-2 p-0">' +
                                '                  <img class="job-img" src="'+organization_logo+'" alt="">' +
                                '                </div>' +
                                '              </div>');
                        } else if (jobObject.activeJobCategory == 2) {
                            $('div#medicalTab div.job-list').append('<div class="row job">' +
                                '                <div class="col-md-9 col-10">' +
                                '<a href="<?php echo site_url('Job/showJobDetail?JobID=');?>'+jobData[i].ID+'"><h3 class="job-title">' +
                                jobData[i].Title +
                                '                    </h3></a>' +
                                '                    <p class="job-post-date">Posted on <span>'+jobData[i].PublishDate+'</span></p>' +
                                '                    <p class="job-info-summary">' +
                                jobData[i].Description +
                                '                    </p>' +
                                '                    <a class="job-detail-btn no-outline" href="<?php echo site_url('Job/showJobDetail?JobID=');?>'+jobData[i].ID+'">View Job Detail</a>' +
                                '                </div>' +
                                '                <div class="col-md-3 col-2 p-0">' +
                                '                  <img class="job-img" src="'+organization_logo+'" alt="">' +
                                '                </div>' +
                                '              </div>');
                        }
                    }
                }
            });
        },
        populatePagination: function (pageNo, populateList) {
            console.log('Method Name: jobObject.populatePagination Param: pageNo Value: '+[pageNo].toString());
            var per_page_information_number = jobObject.perPageInformationNumber;
            if (populateList === true) jobObject.getSearchResult(pageNo);
            var post_fix = '';
            if (jobObject.activeJobCategory == 1) {
                var total_page = Math.ceil(jobObject.totalJob1 / per_page_information_number);
                post_fix = '-pharma';
            } else if (jobObject.activeJobCategory == 2) {
                var total_page = Math.ceil(jobObject.totalJob2 / per_page_information_number);
                post_fix = '-medical';
            }

            if (total_page > 1) {
                $('ul#job-circular-pagination'+post_fix).show();
            } else {
                $('ul#job-circular-pagination'+post_fix).hide();
            }

            var total_pagination = <?php echo config_item('total_page');?>;
            var start_page_no = pageNo - Math.floor(per_page_information_number / 2) < 1 ? 1 : pageNo - Math.floor(per_page_information_number / 2);
            var page_counter = 0;
            var pagination_li_text;
            console.log('per_page_information_number: '+per_page_information_number+' total_page: '+total_page+' total_pagination: '+total_pagination+' start_page_no: '+start_page_no);
            $('ul#job-circular-pagination'+post_fix).html('');
            if (pageNo > 1) {
                var previous_page_no = pageNo - 1;
                $('ul#job-circular-pagination'+post_fix).html('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Previous" onclick="jobObject.populatePagination('+previous_page_no+', true)">' +
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
                    pagination_li_text = '<li class="page-item"><a class="page-link" onclick="jobObject.populatePagination('+i+', true)">'+i+'</a></li>';
                }
                $('ul#job-circular-pagination'+post_fix).append(pagination_li_text);
                page_counter++;
                console.log('page_counter: '+page_counter+' total_pagination: '+total_pagination+' total_page: '+total_page);
            }

            if (total_page > pageNo) {
                var next_page_no = pageNo + 1;
                $('ul#job-circular-pagination'+post_fix).append('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Next" onclick="jobObject.populatePagination('+next_page_no+', true)">' +
                    '                                        <span>&raquo;</span>' +
                    '                                        <span class="sr-only">Next</span>' +
                    '                                    </a>' +
                    '                                </li>');
            }
        }
    }
</script>