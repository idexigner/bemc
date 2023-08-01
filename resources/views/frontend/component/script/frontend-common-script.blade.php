<script>
    var youTubeVideos = [];

    var frontCommonMethods = {
        youtubeVideoIndex: '',
        youtubeFullScreen: function(videoLink) {
            console.log(videoLink);
            var videoLink = videoLink.replace(/^.*((v\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/, '$5');

            frontCommonMethods.youtubeVideoIndex = videoLink;
            $('#youtube-fullScreen').html('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/' + videoLink + '?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=1" frameborder="0" allowfullscreen></iframe>');
            $('#youtube-fullScreen').show();
            $('#youtubeFullScreenModal').show();
        },
        closeYoutubeScreen: function() {
            frontCommonMethods.youtubeVideoIndex = '';
            $('#youtube-fullScreen').html('');
            $('#youtube-fullScreen').hide();
            $('#youtubeFullScreenModal').hide();
        },
    }

    function setEqualHeight(className) {
    
        var $elements = $(className + " .single-person");
        var maxHeight = 0;
        

        // Get the maximum height among the elements
        $elements.each(function () {
            var height = $(this).outerHeight();

            if (height > maxHeight) {
                maxHeight = height;
            }
        });

        // Set the maximum height for all the elements
        $elements.outerHeight(maxHeight);
    }
    
    // var frontenndCommonMethods2 = {

    //     getAdvertisement: function(classNames, slidesToShow) {
    //         console.log('Method Name: frontendCommonMethods.getAdvertisement Param: classNames Value: ' + [classNames].toString());
    //         for (var class_no = 0; class_no < classNames.length; class_no++) {
    //             var class_name = classNames[class_no];
    //             $('#' + class_name).hide();
    //             var formURL = "#" + class_name;
    //             mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.getAdvertisement', function(advertisementData) {
    //                 console.log("advertisementData==>", advertisementData);
    //                 if (advertisementData.length) {
    //                     var image_class = '';
    //                     var position_class_name = advertisementData[0].ClassName;
    //                     var interval = advertisementData[0].Interval;
    //                     switch (position_class_name) {
    //                         case 'home-product-slider':
    //                             image_class = 'home-product-slide';
    //                             break;
    //                         case 'ebook-top-slider':
    //                             image_class = 'ebook-top-slide';
    //                             break;
    //                         case 'ebook-bottom-slider':
    //                             image_class = 'ebook-bottom-slide';
    //                             break;
    //                         case 'mims-learning-top-slider':
    //                             image_class = 'mims-learning-top-slide';
    //                             break;
    //                         case 'mims-learning-bottom-slider':
    //                             image_class = 'mims-learning-bottom-slide';
    //                             break;
    //                         default:
    //                             break;
    //                     }
    //                     $('#' + position_class_name).html('');
    //                     for (var advertisement_no = 0; advertisement_no < advertisementData.length; advertisement_no++) {
    //                         $('#' + position_class_name).append('<div class="' + image_class + '">' +
    //                             '<img src="#' + advertisementData[advertisement_no].ImagePath + '" alt="">' +
    //                             '</div>');
    //                     }
    //                     $('#' + class_name).show();
    //                     switch (position_class_name) {
    //                         case 'home-product-slider':
    //                         case 'ebook-top-slider':
    //                         case 'ebook-bottom-slider':
    //                         case 'mims-learning-top-slider':
    //                         case 'mims-learning-bottom-slider':
    //                             $('#' + class_name).slick({
    //                                 slidesToScroll: 1,
    //                                 slidesToShow: slidesToShow,
    //                                 autoplay: true,
    //                                 autoplaySpeed: 3000,
    //                                 infinite: true,
    //                                 arrows: false,
    //                                 responsive: [{
    //                                     breakpoint: 480,
    //                                     settings: {
    //                                         slidesToShow: 2,
    //                                     }
    //                                 }]
    //                             });
    //                             break;
    //                         default:
    //                             break;
    //                     }
    //                 }
    //             });
    //         }
    //     },
    // }


    var frontendCommonMethods = {
        totalDrug: 0,
        activeBrandAlphabet: '',
        activeGenericAlphabet: '',
        youtubeVideoIndex: '',
        youtubeFullScreen: function(videoIndex) {
            frontendCommonMethods.youtubeVideoIndex = videoIndex;
            $('#youtube-fullScreen').html('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/' + youTubeVideos[videoIndex].ID + '?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=1" frameborder="0" allowfullscreen></iframe>');
            $('#youtube-fullScreen').show();
            $('#youtubeFullScreenModal').show();
        },
        closeYoutubeScreen: function() {
            frontendCommonMethods.youtubeVideoIndex = '';
            $('#youtube-fullScreen').html('');
            $('#youtube-fullScreen').hide();
            $('#youtubeFullScreenModal').hide();
        },
        facebookShare: function() {
            if (frontendCommonMethods.youtubeVideoIndex != '') {
                var videoID = youTubeVideos[frontendCommonMethods.youtubeVideoIndex].ID;
                var videoTitle = youTubeVideos[frontendCommonMethods.youtubeVideoIndex].Title;
                var videoThumbnail = youTubeVideos[frontendCommonMethods.youtubeVideoIndex].thumbnail;
                var videoDescription = youTubeVideos[frontendCommonMethods.youtubeVideoIndex].Description;
                FB.ui({
                    method: 'feed',
                    name: videoTitle,
                    link: 'https://www.rxmimsbd.com/Video/getAllVideo?id=' + videoID,
                    picture: videoThumbnail,
                    caption: videoTitle,
                    description: videoDescription,
                    message: ""
                });
            }
        },
        changeForMobileUI: function() {
            $('.main-menu-top-bar').css('height', '');
        },
        changeForDesktopUI: function() {
            $('.main-menu-top-bar').css('height', '47px');
        },
        viewImage: function(img) {
            var viewer = ImageViewer();
            viewer.show(img);
        },
        mainMenuActivation: function(item) {
            $('ul.main-menu li a').removeClass('active');
            switch (item) {
                case 'home':
                    $('li#mainMenuHome a').addClass('active');
                    break;
                case 'doctor':
                    $('li#mainMenuDoctor a').addClass('active');
                    break;
                case 'herbal':
                    $('li#mainMenuHerbal a').addClass('active');
                    break;
                case 'resource':
                    $('li#mainMenuResource a').addClass('active');
                    break;
                case 'about':
                    $('li#mainMenuAbout a').addClass('active');
                    break;
                case 'ebook':
                    $('li#mainMenuEbook a').addClass('active');
                    break;
                default:
                    $('li#mainMenuHome a').addClass('active');
                    break;
            }
        },
        numberWithCommas: function(number) {
            var parts = number.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        },
        incrementVisitorCount: function() {
            console.log('Method Name: frontendCommonMethods.getSideBarData Param:  Value: ' + [].toString());
            var formURL = "#";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.incrementVisitorCount', function(data) {});
        },
        getNumberOfVisitor: function() {
            console.log('Method Name: frontendCommonMethods.getNumberOfVisitor Param:  Value: ' + [].toString());
            var formURL = "#";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.getNumberOfVisitor', function(totalVisitor) {
                $('.visitor-count').html(frontendCommonMethods.numberWithCommas(totalVisitor));
            });
        },
        getSideBarData: function(sideBarDataCategory) {
            console.log('Method Name: frontendCommonMethods.getSideBarData Param:  Value: ' + [].toString());
            $('div.sidebar-jobs').html('');
            $('div.sidebar-news').html('');
            $('div.sidebar-address').html('');
            $('div.sidebar-special-reports').html('');
            $('div.sidebar-mims-study').html('');

            $('div.side-bar-job-circular-title').hide();
            $('div.side-bar-news-title').hide();
            $('div.side-bar-special-report-title').hide();
            $('div.side-bar-mims-study-title').hide();
            $('div.side-bar-important-address-title').hide();
            var formURL = "#";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.getSideBarData', function(sideBarData) {
                if (sideBarData) {
                    var all_jobs1 = sideBarData.AllJobs[0];
                    var all_jobs2 = sideBarData.AllJobs[1];
                    var all_address = sideBarData.AllAddress;
                    var all_news = sideBarData.AllNews;
                    var all_special_reports = sideBarData.AllSpecialReports;
                    var all_mims_study = sideBarData.AllMiMSLearning;

                    if ($.inArray('job', sideBarDataCategory) > -1) {
                        $('.side-bar-job-circular-title').show();
                        var new_tag_html = '';
                        var all_jobs = all_jobs1;
                        for (var i = 0; i < all_jobs.length; i++) {
                            new_tag_html = all_jobs[i].NumberOfDatePublished < 4 ? '<img src="#" style="max-width: 25px" alt="">' : '';
                            var organization_logo = all_jobs[i].OrganizationLogo;
                            organization_logo = organization_logo != null && organization_logo.length > 0 ? '#' + 'job/' + organization_logo : '';
                            var job_title = all_jobs[i].Title;
                            job_title = job_title.length > 30 ? job_title.substr(0, 27) + '...' : job_title;
                            $('div#pharmaTab div.sidebar-jobs').append('<div class="row job side-col">' +
                                '                                <div class="col-3 pr-0" style="padding: 7px">' +
                                '                                    <img class="job-img side-col" src="' + organization_logo + '" alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">' +
                                '                                </div>' +
                                '                                <div class="col-9" style="padding-right: 0; padding-left: 10px">' +
                                '                                    <p class="job-title side-col"><a href="#' + all_jobs[i].ID + '">' + job_title + new_tag_html + '</a></p>' +
                                '                                    <p class="job-company side-col">' + all_jobs[i].Organization + '</p>' +
                                '                                </div>' +
                                '                            </div>');
                        }

                        $('div#pharmaTab div.sidebar-jobs').append('<a href="#" class="side-col-see-more-btn no-outline">See All Jobs</a>');

                        var all_jobs = all_jobs2;
                        for (var i = 0; i < all_jobs.length; i++) {
                            new_tag_html = all_jobs[i].NumberOfDatePublished < 4 ? '<img src="#" style="max-width: 25px" alt="">' : '';
                            var organization_logo = all_jobs[i].OrganizationLogo;
                            organization_logo = organization_logo != null && organization_logo.length > 0 ? '#' + 'job/' + organization_logo : '';
                            var job_title = all_jobs[i].Title;
                            job_title = job_title.length > 30 ? job_title.substr(0, 27) + '...' : job_title;
                            $('div#medicalTab div.sidebar-jobs').append('<div class="row job side-col">' +
                                '                                <div class="col-3 pr-0" style="padding: 7px">' +
                                '                                    <img class="job-img side-col" src="' + organization_logo + '" alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">' +
                                '                                </div>' +
                                '                                <div class="col-9" style="padding-right: 0; padding-left: 10px">' +
                                '                                    <p class="job-title side-col"><a href="#' + all_jobs[i].ID + '">' + job_title + new_tag_html + '</a></p>' +
                                '                                    <p class="job-company side-col">' + all_jobs[i].Organization + '</p>' +
                                '                                </div>' +
                                '                            </div>');
                        }

                        $('div#medicalTab div.sidebar-jobs').append('<a href="#" class="side-col-see-more-btn no-outline">See All Jobs</a>');
                    }

                    if ($.inArray('address', sideBarDataCategory) > -1) {
                        $('.side-bar-important-address-title').show();
                        for (var i = 0; i < all_address.length; i++) {
                            $('ul.sidebar-assress').append('<li class="address"><a href="#' + all_address[i].ID + '">' + all_address[i].Name + '</a></li>');
                        }

                        $('ul.sidebar-assress').append('<a href="#" class="see-more-btn no-outline">See All Adresses</a>');
                    }

                    if ($.inArray('news', sideBarDataCategory) > -1) {
                        $('.side-bar-news-title').show();
                        for (var i = 0; i < all_news.length; i++) {
                            var news_image_path = all_news[i].ImagePath;
                            news_image_path = news_image_path != null && news_image_path.length > 0 ? '#' + 'news/' + news_image_path : '';
                            var news_title = all_news[i].Title;
                            news_title = news_title.length > 30 ? news_title.substr(0, 27) + '...' : news_title;
                            $('div.sidebar-news').append('<div class="row news">' +
                                '                                <div class="col-3" style="padding: 5px; padding-left: 16px;">' +
                                '                                    <img class="news-img" style="width: 100%; height: auto; padding: 0;" src="' + news_image_path + '" alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">' +
                                '                                </div>' +
                                '                                <div class="col-9" style="padding-right: 0; padding-left: 7px">' +
                                '                                    <p class="news-title side-col"><a href="#' + all_news[i].ID + '">' + news_title + '</a></p>' +
                                '                                </div>' +
                                '                            </div>');
                        }

                        $('div.sidebar-news').append('<a href="#" class="side-col-see-more-btn no-outline">See All News</a>');
                    }

                    if ($.inArray('report', sideBarDataCategory) > -1) {
                        $('.side-bar-special-report-title').show();
                        for (var i = 0; i < all_special_reports.length; i++) {
                            var report_image = all_special_reports[i].ImagePath;
                            report_image = report_image.length > 0 ? '#' + 'special_report/' + report_image : '';
                            var report_title = all_special_reports[i].Title;
                            report_title = report_title.length > 30 ? report_title.substr(0, 27) + '...' : report_title;
                            $('div.sidebar-special-reports').append('<div class="row news">' +
                                '                                <div class="col-3" style="padding: 5px; padding-left: 16px;">' +
                                '                                    <img class="news-img" style="width: 100%; height: auto; padding: 0;" src="' + report_image + '" alt="">' +
                                '                                </div>' +
                                '                                <div class="col-9" style="padding-right: 0; padding-left: 7px">' +
                                '                                    <p class="news-title side-col"><a href="#' + all_special_reports[i].ID + '">' + report_title + '</a></p>' +
                                '                                </div>' +
                                '                            </div>');
                        }

                        $('div.sidebar-special-reports').append('<a href="#" class="side-col-see-more-btn no-outline">See All Reports</a>');
                    }

                    if ($.inArray('study', sideBarDataCategory) > -1) {
                        $('.side-bar-mimslearning-title').show();
                        for (var i = 0; i < all_mims_study.length; i++) {
                            report_image = 'application/views/images/icons/mims-learning.png';
                            var report_title = all_mims_study[i].Title;
                            report_title = report_title.length > 30 ? report_title.substr(0, 27) + '...' : report_title;
                            $('div.sidebar-mimslearning').append('<div class="row news">' +
                                '                                <div class="col-3" style="padding: 5px; padding-left: 16px;">' +
                                '                                    <img class="news-img" style="width: 32px; height: auto; padding: 0;" src="' + report_image + '" alt="">' +
                                '                                </div>' +
                                '                                <div class="col-9" style="padding-right: 0; padding-left: 7px">' +
                                '                                    <p class="news-title side-col" style="margin:5px 0px 0px 0px;"><a href="#' + all_mims_study[i].ID + '">' + report_title + '</a></p>' +
                                '                                </div>' +
                                '                            </div>');
                        }

                        $('div.sidebar-mimslearning').append('<a href="#" class="side-col-see-more-btn no-outline">See All Reports</a>');
                    }
                }
            });
        },
        searchBrandAlphabetically: function(alphabet, pageNo) {
            console.log('Method Name: frontendCommonMethods.searchBrandAlphabetically Param: allProduct Value: ' + [alphabet, pageNo].toString());
            frontendCommonMethods.activeBrandAlphabet = alphabet;
            var formURL = "#" + '?Alphabet=' + alphabet + '&PageNo=' + pageNo;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.searchBrandAlphabetically', function(brandData) {
                if (brandData) {
                    var drug_td_text = '';
                    for (var i = 0; i < brandData.length; i++) {
                        drug_td_text = '<tr>' +
                            '<td><a href="#' + '?DrugID=' + brandData[i].DrugID + '">' + brandData[i].BrandName + '</a></td>' +
                            '<td><a href="#' + '?ManufacturerID=' + brandData[i].ManufacturerID + '">' + brandData[i].ManufacturerName + '</a></td>' +
                            '</tr>';
                        $('tbody.drug-list').append(drug_td_text);
                    }
                }
            });
            frontendCommonMethods.populatePagination('brand', pageNo);
        },
        searchGenericAlphabetically: function(alphabet, pageNo) {
            console.log('Method Name: frontendCommonMethods.searchGenericAlphabetically Param: allProduct Value: ' + [alphabet, pageNo].toString());
            frontendCommonMethods.activeGenericAlphabet = alphabet;
            var formURL = "#" + '?Alphabet=' + alphabet + '&PageNo=' + pageNo;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.searchGenericAlphabetically', function(brandData) {
                if (brandData) {
                    var drug_td_text = '';
                    for (var i = 0; i < brandData.length; i++) {
                        drug_td_text = '<tr>' +
                            '<td><a href="#' + '?DrugID=' + brandData[i].DrugID + '">' + brandData[i].BrandName + '</a></td>' +
                            '<td><a href="#' + '?ManufacturerID=' + brandData[i].ManufacturerID + '">' + brandData[i].ManufacturerName + '</a></td>' +
                            '</tr>';
                        $('tbody.drug-list').append(drug_td_text);
                    }
                }
            });
            frontendCommonMethods.populatePagination('generic', pageNo);
        },
        setAdvertisementInterval: function(className) {
            $('div.' + className + ' > div:first')
                .fadeOut(1000)
                .next()
                .fadeIn(1000)
                .end()
                .appendTo('#slideshow');
        },
        getCommonAdvertisement: function(classNames) {
            console.log('Method Name: frontendCommonMethods.getCommonAdvertisement Param: classNames Value: ' + [classNames].toString());
            for (var class_no = 0; class_no < classNames.length; class_no++) {
                var class_name = classNames[class_no];
                $('.' + class_name).html('');
                var formURL = "#" + class_name;
                mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.getAdvertisement', function(advertisementData) {
                    if (advertisementData.length) {
                        var position_class_name = advertisementData[0].ClassName;
                        var img_style = '';
                        var link_url = advertisementData[0].LinkURL == '' ? '#' : advertisementData[0].LinkURL;

                        if (advertisementData.length) {
                            if (position_class_name.indexOf('advert-container-top')) {
                                img_style = 'style="max-width: 1110px;max-height: 140px;"';
                            } else if (position_class_name.indexOf('advert-container-mid')) {
                                img_style = 'style="max-width: 1110px;max-height: 140px;"';
                            } else if (position_class_name.indexOf('advert-bottom')) {
                                img_style = 'style="max-width: 1110px;max-height: 140px;"';
                            } else if (position_class_name.indexOf('advert-top-left')) {
                                img_style = 'style="max-width: 540px;max-height: 130px;"';
                            } else if (position_class_name.indexOf('advert-top-right')) {
                                img_style = 'style="max-width: 540px;max-height: 130px;"';
                            } else if (position_class_name.indexOf('sidebar-advert')) {
                                img_style = 'style="max-width: 350px;max-height: 350px;"';
                            }
                            $('.' + advertisementData[0].ClassName).append('<a href="' + link_url + '" class="advert no-outline"><img src="#' + advertisementData[0].ImagePath + '" alt="" ' + img_style + '></a>');
                        }
                    }
                });
            }
        },
        showFullScreenAdvertisement: function(position) {
            console.log('Method Name: frontendCommonMethods.showFullScreenAdvertisement Param: positionID Value: ' + [position].toString());
            var formURL = "#" + position;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.showFullScreenAdvertisement', function(advertisementData) {

            });
        },
        getCategoryWiseAdvertisement: function(categoryID, categoryValue, classNames) {
            
            console.log('Method Name: frontendCommonMethods.getCategoryWiseAdvertisement Param: classNames Value: ' + [classNames].toString());
            for (var class_no = 0; class_no < classNames.length; class_no++) {
                var class_name = classNames[class_no];
                $('.' + class_name).html('');
                var formURL = "#" + class_name + '&CategoryID=' + categoryID + '&CategoryValue=' + categoryValue;
                mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.getAdvertisement', function(advertisementData) {
                    
                    if (advertisementData[0].ImagePath == undefined) {
                       // alert('ravi 1');
                        frontendCommonMethods.getCommonAdvertisement([advertisementData[0].ClassName]);
                    } else {
                        alert(advertisementData);
                        $('.' + advertisementData[0].ClassName).append('<img src="#' + advertisementData[0].ImagePath + '" alt="">');
                    }
                });
            }
        },
        getCategoryWiseAdvertisementForSlider: function(categoryID, categoryValue, classNames) {
            console.log('Method Name: frontendCommonMethods.getCategoryWiseAdvertisement Param: classNames Value: ' + [classNames].toString());
            for (var class_no = 0; class_no < classNames.length; class_no++) {
                var class_name = classNames[class_no];
                $('.' + class_name).html('');
                var formURL = "#" + class_name + '&CategoryID=' + categoryID + '&CategoryValue=' + categoryValue;
                mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.getAdvertisementForSlider', function(advertisementData) {
                    if (typeof advertisementData[0].ImagePath !== 'undefined') {
                        for (var ads_index = 0; ads_index < advertisementData.length; ads_index++) {
                            $('.' + class_name).append('<img src="#' + advertisementData[ads_index].ImagePath + '" alt="">');
                        }

                        $('.' + class_name).slick({
                            slidesToScroll: 1,
                            slidesToShow: 1,
                            autoplay: true,
                            autoplaySpeed: 3000,
                            infinite: true,
                            arrows: false,
                            responsive: [{
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                }
                            }]
                        });
                    }
                });
            }
        },
        getAdvertisement: function(classNames, slidesToShow) {
            console.log('Method Name: frontendCommonMethods.getAdvertisement Param: classNames Value: ' + [classNames].toString());
            for (var class_no = 0; class_no < classNames.length; class_no++) {
                var class_name = classNames[class_no];
                $('#' + class_name).hide();
                var formURL = "#" + class_name;
                mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'frontendCommonMethods.getAdvertisement', function(advertisementData) {
                    if (advertisementData.length) {
                        var image_class = '';
                        var position_class_name = advertisementData[0].ClassName;
                        var interval = advertisementData[0].Interval;
                        switch (position_class_name) {
                            case 'home-product-slider':
                                image_class = 'home-product-slide';
                                break;
                            case 'ebook-top-slider':
                                image_class = 'ebook-top-slide';
                                break;
                            case 'ebook-bottom-slider':
                                image_class = 'ebook-bottom-slide';
                                break;
                            case 'mims-learning-top-slider':
                                image_class = 'mims-learning-top-slide';
                                break;
                            case 'mims-learning-bottom-slider':
                                image_class = 'mims-learning-bottom-slide';
                                break;
                            default:
                                break;
                        }
                        $('#' + position_class_name).html('');
                        for (var advertisement_no = 0; advertisement_no < advertisementData.length; advertisement_no++) {
                            $('#' + position_class_name).append('<div class="' + image_class + '">' +
                                '<img src="#' + advertisementData[advertisement_no].ImagePath + '" alt="">' +
                                '</div>');
                        }
                        $('#' + class_name).show();
                        switch (position_class_name) {
                            case 'home-product-slider':
                            case 'ebook-top-slider':
                            case 'ebook-bottom-slider':
                            case 'mims-learning-top-slider':
                            case 'mims-learning-bottom-slider':
                                $('#' + class_name).slick({
                                    slidesToScroll: 1,
                                    slidesToShow: slidesToShow,
                                    autoplay: true,
                                    autoplaySpeed: 3000,
                                    infinite: true,
                                    arrows: false,
                                    responsive: [{
                                        breakpoint: 480,
                                        settings: {
                                            slidesToShow: 2,
                                        }
                                    }]
                                });
                                break;
                            default:
                                break;
                        }
                    }
                });
            }
        },
        inArrayCaseInsensitive: function(value, dataArray) {
            var index = -1;
            value = value.toLowerCase();
            for (var i = 0; i < dataArray.length; i++) {
                if (value == $.trim(dataArray[i].toLowerCase())) {
                    index = i;
                    break;
                }
            }

            return index;
        },
        autocomplete: function(inp, arr) {
            /*the autocomplete function takes two arguments,
	  the text field element and an array of possible autocompleted values:*/
            var currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value;
                /*close any already open lists of autocompleted values*/
                closeAllLists();
                if (!val) {
                    return false;
                }
                currentFocus = -1;
                /*create a DIV element that will contain the items (values):*/
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                /*append the DIV element as a child of the autocomplete container:*/
                this.parentNode.appendChild(a);
                /*for each item in the array...*/
                var search_count = 0;
                for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        /*create a DIV element for each matching element:*/
                        b = document.createElement("DIV");
                        /*make the matching letters bold:*/
                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].substr(val.length);
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener("click", function(e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                        if (search_count == 10) break;
                        search_count++;
                    }
                }
            });
            /*execute a function presses a key on the keyboard:*/
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                    }
                }
            });

            function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
            }

            function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }
            }

            function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener("click", function(e) {
                closeAllLists(e.target);
                // console.log('Value: '+$('#searchDrugOption').val());
                // alert($('#searchDrugOption').val());
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    drugObject.searchBrandInformation($('#searchOptionInMobile').val());
                } else {
                    drugObject.searchBrandInformation($('#searchDrugOption').val());
                }
            });
        },
        isValidEmail: function(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
    }

    frontendCommonMethods.totalDrug = 0;
</script>   