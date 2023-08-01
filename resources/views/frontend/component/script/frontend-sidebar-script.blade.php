<script>

    var sidebar = {

        getSidebar: function(){
            sidebar.getImportantInformation();
            sidebar.getJobCircular();
            sidebar.getSpecialReport();
            sidebar.getNews();
        },
        getImportantInformation: function() {

            $("#sidebar").append(`
                    <div class="row side-bar-important-address-title">
                        <div class="content-section col-12" style="padding: 0; max-height: none;">
                            <div class="section-header own-pad">
                                <span><img src="{{ url('/') }}/images/icons/briefcase.svg" alt="*"></span>Important Information
                            </div>
                            <ul class="address-list sidebar-assress">
                                <li class="address">
                                    <a href="{{ url('/') }}/address/2">24 hours Pharmacy</a>
                                </li>    
                                <li class="address">
                                    <a href="{{ url('/') }}/address/3">Ambulance Service</a>
                                </li>
                                <li class="address">
                                    <a href="{{ url('/') }}/address/4">Blood Bank</a>
                                </li>
                                <li class="address">
                                    <a href="{{ url('/') }}/address/5">Cancer Hospital</a>
                                </li>
                                <li class="address">
                                    <a href="{{ url('/') }}/address/6">Cardiac Hospitals</a>
                                </li>

                                <a href="{{ url('/') }}/address" class="see-more-btn no-outline">See All Adresses</a>
                            </ul>
                        </div>
                    </div>
                `);
        },
        getJobCircular: function() {
            $("#sidebar").append(`
                <div class="row side-bar-job-circular-title">
                    
                    <div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
                        <div class="section-header own-pad" style="margin-bottom: 16px;">
                            <span><img src="{{ url('/') }}/images/icons/briefcase.svg" alt="*"></span>Job Circular
                        </div>
                        <div class="section-tab sidebar-tab">

                            <div class="uk_tabs">
                                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="medical_job_sidebar-tab" data-toggle="tab" href="#medical_job_sidebar" role="tab" aria-controls="medical_job_sidebar" aria-selected="true">medical</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pharma_job_sidebar-tab" data-toggle="tab" href="#pharma_job_sidebar" role="tab" aria-controls="pharma_job_sidebar" aria-selected="false">pharma</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
            
                                    <div class="tab-pane fade show active" id="medical_job_sidebar" role="tabpanel" aria-labelledby="medical_job_sidebar-tab"></div>
                                    <div class="tab-pane fade" id="pharma_job_sidebar" role="tabpanel" aria-labelledby="pharma_job_sidebar-tab"></div>
            
                                    
                                </div>
                            </div>

                         
                          
                        </div>
                    </div>
                </div>
            `);
            sidebar.getMedicalJob();
            sidebar.getPharmaJob();
        },
        getMedicalJob: function() {
            $.ajax({
                url: "{{ route('web_get_home_job')}}",
                type: 'GET',
                dataType: 'json',
                data: {
                    category: 'Medical'
                },
                success: function(response) {
                    console.log("web_get_home_job-> ", response);
                    $('#medical_job_sidebar').html('');
                    $.each(response.data, function(index, job) {

                        $('#medical_job_sidebar').append(`
                            <a href="{{ url('/') }}/job_detail/${job.job_id}">
                                <div class="media-list-left-image">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{ url('/') }}/storage/images/job/${job.job_organization_logo}" class="media-object">
                                        </div>
                                        <div class="media-body">
                                       
                                            <h4 class="media-heading">
                                                ${job.job_title}
                                            </h4>
                                            <p>
                                            ${job.job_organization.substring(0, 20)}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        `);

                    });



                },
                error: function(xhr, status, error) {
                    console.group("Error Block");
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                    console.groupEnd();
                }
            });
        },
        getPharmaJob: function() {
            $.ajax({
                url: "{{ route('web_get_home_job')}}",
                type: 'GET',
                dataType: 'json',
                data: {
                    category: 'Pharma'
                },
                success: function(response) {
                    console.log("web_get_home_job-> ", response);
                    $('#pharma_job_sidebar').html('');
                    $.each(response.data, function(index, job) {

                        $('#pharma_job_sidebar').append(`
                            <a href="{{ url('/') }}/job_detail/${job.job_id}">
                                <div class="media-list-left-image">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="{{ url('/') }}/storage/images/job/${job.job_organization_logo}" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                ${job.job_title}
                                            </h4>
                                            <p>
                                            ${job.job_organization.substring(0, 20)}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        `);

                    });



                },
                error: function(xhr, status, error) {
                    console.group("Error Block");
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                    console.groupEnd();
                }
            });
        },
        getSpecialReport: function() {

            $("#sidebar").append(`
                <div class="row side-bar-special-report-title">
                    <!-- special reports -->
                    <div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
                        <div class="section-header own-pad">
                            <span><img src="{{ url('/') }}/images/icons/briefcase.svg" alt="*"></span>Special Reports
                        </div>
                        <div class="container sidebar-special-reports"></div>
                    </div>
                </div>
            `);
            $.ajax({
                url: "{{ route('web_get_home_special_report')}}",
                type: 'GET',
                dataType: 'json',
                data: {
                    // condition: 'brand_is_new_product',
                    limit: 5
                },
                success: function(response) {
                    console.log("get_home_special_report-> ", response);
                    $('.sidebar-special-reports').html('');
                    $.each(response.data, function(index, specialReport) {
                        special_report_title = specialReport.special_report_title.length > 30 ? specialReport.special_report_title.substr(0, 30) + ' ...' : specialReport.special_report_title;

                        $('.sidebar-special-reports').append(`
                            <div class="row news">
                                <div class="col-3" style="padding: 5px; padding-left: 16px;">
                                    <img class="news-img" style="width: 100%; height: auto; padding: 0;" src="{{ url('/') }}/storage/images/special_report/${specialReport.special_report_image}" alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">
                                </div>
                                <div class="col-9" style="padding-right: 0; padding-left: 7px">
                                    <p class="news-title side-col">
                                        <a href="{{ url('/') }}/special_report_detail/${specialReport.special_report_id}">${special_report_title}...</a>
                                    </p>
                                </div>
                            </div> 
                        `);
                    });

               

                },
                error: function(xhr, status, error) {
                    console.group("Error Block");
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                    console.groupEnd();
                }
            });
        },
        getNews: function() {

            $("#sidebar").append(`
                <div class="row side-bar-news-title">
                    <!-- special reports -->
                    <div class="content-section col-12" style="padding: 0; height: auto; max-height: none;">
                        <div class="section-header own-pad">
                            <span><img src="{{ url('/') }}/images/icons/newspaper.svg" alt="*"></span>Pharma News
                        </div>
                        <div class="container sidebar-news"></div>
                    </div>
                </div>
            `);
            $.ajax({
                url: "{{ route('web_get_home_news')}}",
                type: 'GET',
                dataType: 'json',
                data: {
                    limit: 5
                },
                success: function(response) {
                    console.log("web_get_home_news-> ", response);
                    $('.sidebar-news').html('');
                    $.each(response.data, function(index, news) {
                        news_title = news.news_title.length > 30 ? news.news_title.substr(0, 30) + ' ...' : news.news_title;

                        $('.sidebar-news').append(`
                            <div class="row news">
                                <div class="col-3" style="padding: 5px; padding-left: 16px;">
                                    <img class="news-img" style="width: 100%; height: auto; padding: 0;" src="{{ url('/') }}/storage/images/news/${news.news_image}" alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">
                                </div>
                                <div class="col-9" style="padding-right: 0; padding-left: 7px">
                                    <p class="news-title side-col">
                                        <a href="{{ url('/') }}/news_detail/${news.news_id}">${news_title}...</a>
                                    </p>
                                </div>
                            </div> 
                        `);
                    });

            

                },
                error: function(xhr, status, error) {
                    console.group("Error Block");
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                    console.groupEnd();
                }
            });
        }
    }


</script>