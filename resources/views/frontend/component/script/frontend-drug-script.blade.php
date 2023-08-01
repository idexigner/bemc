<script>
    var drugObject = {
    	searchObjectID: '',
        searchOptionType: 'brand',
        searchOptionTypeForNewInformation: '',
        searchOptionValue: '',
        perPageInformationNumber: '',
        searchOptionForBrand: [],
        searchOptionForGeneric: [],
        searchOptionForIndication: [],
        searchOptionForManufacturer: [],
        searchManufacturerBrandOption: '',
        totalDrug: 0,
		productType: '',
        getJobCirculars: function() {
            console.log('Method Name: drugObject.getJobCirculars Param:  Value: '+[].toString());
            var formURL = "#";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getJobCirculars', function(jobData) {
                if (jobData) {
                    var jobData1 = jobData[0];
                    var jobData2 = jobData[1];
                    var new_tag_html = '';
                    var individual_job = '';
                    for (var job_no = 0; job_no < jobData1.length; job_no++) {
                        new_tag_html = jobData1[job_no].NumberOfDatePublished < 4 ? '<img src="#" style="max-width: 37px" alt="">' : '';
                        var logo_path = jobData1[job_no].OrganizationLogo == '' || jobData1[job_no].OrganizationLogo == null ? '' : '#'+'job/'+jobData1[job_no].OrganizationLogo;
                        individual_job = '<div class="row job">' +
                            '<div class="col-2">' +
                            '<img class="job-img" src="'+logo_path+'" alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">'+
                            '</div>'+
                            '<div class="col-10">'+
                            '<p class="job-title"><a href="#'+jobData1[job_no].ID+'">'+jobData1[job_no].Title+new_tag_html+'</a></p>'+
                            '<p class="job-company">'+jobData1[job_no].Organization+'</p>'+
                            '</div>'+
                            '<img class="right-arrow" src="images/icons/right-arrow.svg" alt=">">'+
                            '</div>';

                        $('div#pharmaTab div.home-job-circular-list').append(individual_job);
                    }

                    var new_tag_html = '';
                    var individual_job = '';
                    for (var job_no = 0; job_no < jobData2.length; job_no++) {
                        new_tag_html = jobData2[job_no].NumberOfDatePublished < 4 ? '<img src="#" style="max-width: 37px" alt="">' : '';
                        var logo_path = jobData2[job_no].OrganizationLogo == '' || jobData2[job_no].OrganizationLogo == null ? '' : '#'+'job/'+jobData2[job_no].OrganizationLogo;
                        individual_job = '<div class="row job">' +
                            '<div class="col-2">' +
                            '<img class="job-img" src="'+logo_path+'" alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">'+
                            '</div>'+
                            '<div class="col-10">'+
                            '<p class="job-title"><a href="#'+jobData2[job_no].ID+'">'+jobData2[job_no].Title+new_tag_html+'</a></p>'+
                            '<p class="job-company">'+jobData2[job_no].Organization+'</p>'+
                            '</div>'+
                            '<img class="right-arrow" src="images/icons/right-arrow.svg" alt=">">'+
                            '</div>';

                        $('div#medicalTab div.home-job-circular-list').append(individual_job);
                    }
                }
            });
        },
        getLocalNews: function() {
            console.log('Method Name: drugObject.getLocalNews Param:  Value: '+[].toString());
            var formURL = "#";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getLocalNews', function(newsData) {
                if (newsData) {
                    var individual_news = '';
                    for (var news_no = 0; news_no < newsData.length; news_no++) {
                        var news_description = newsData[news_no].Description;
                        news_description = news_description.length > 65 ? news_description.substr(0, 60) + '...' : news_description;
                        individual_news = '<div class="row news home-news">' +
                            '<div class="col-4 pr-0">' +
                            '<img class="news-img" src="news/'+newsData[news_no].ImagePath+'" alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">'+
                            '</div>'+
                            '<div class="col-8">'+
                            '<p class="news-title"><a href="'+newsData[news_no].ID+'">'+newsData[news_no].Title+'</a></p>'+
                            '<p class="news-description d-md-block d-none">'+news_description+'</p>'+
                            '</div>'+
                            '</div>';

                        $('.home-local-news-list').append(individual_news);
                    }
                }
            });
        },
        getSpecialReports: function() {
            console.log('Method Name: drugObject.getSpecialReports Param:  Value: '+[].toString());
            var formURL = "";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getSpecialReports', function(specialReportData) {
                if (specialReportData) {
                    var individual_special_report = '';
                    var special_report_title = '';
                    for (var special_report_no = 0; special_report_no < specialReportData.length; special_report_no++) {
                        special_report_title = specialReportData[special_report_no].Title;
                        special_report_title = special_report_title.length > 65 ? special_report_title.substr(0, 60) + ' ...' : special_report_title;
                        individual_special_report = '<div class="home-special-report-slide">' +
                            '<img src="special_report/'+specialReportData[special_report_no].ImagePath+'"  alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">'+
                            '<p class="home-special-report-slide-title"><a href="'+specialReportData[special_report_no].ID+'">'+special_report_title+'</p>'+
                            '</div>';

                        $('.home-special-report-list').append(individual_special_report);
                    }

                    $('#home-special-report-slider').slick({
                        slidesToScroll: 1,
                        slidesToShow: 4,
                        autoplay: true,
                        autoplaySpeed: 1000,
                        infinite: false,
                        arrows: true,
                        responsive: [
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 2,
                                    arrows: false,
                                }
                            }
                        ]
                    });
                }
            });
        },
        getMimsStudy: function() {
            console.log('Method Name: drugObject.getMimsStudy Param:  Value: '+[].toString());
            var formURL = "";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getMimsStudy', function(specialReportData) {
                if (specialReportData) {
                    var individual_special_report = '';
                    var mims_study_title = '';
                    for (var mims_study_no = 0; mims_study_no < specialReportData.length; mims_study_no++) {
                        mims_study_title = specialReportData[mims_study_no].Title;
                        mims_study_title = mims_study_title.length > 65 ? mims_study_title.substr(0, 60) + ' ...' : mims_study_title;
                        individual_special_report = '<div class="home-mims-study-slide">' +
                            '<img src="MimsStudyImages/'+specialReportData[mims_study_no].ImagePath+'"  alt="" onerror="this.src=\'https://image.ibb.co/cBMMNq/default-placeholder.png\'">'+
                            '<p class="home-mims-study-slide-title"><a href="#'+specialReportData[mims_study_no].ID+'">'+mims_study_title+'</p>'+
                            '</div>';

                        $('.home-mims-study-list').append(individual_special_report);
                    }

                    $('#home-mims-study-slider').slick({
                        slidesToScroll: 1,
                        slidesToShow: 4,
                        autoplay: true,
                        autoplaySpeed: 1000,
                        infinite: false,
                        arrows: true,
                        responsive: [
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 2,
                                    arrows: false,
                                }
                            }
                        ]
                    });
                }
            });
        },
        getMimsLearning: function() {
            console.log('Method Name: drugObject.getMimsLearning Param:');
            var formURL = "#";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getMimsLearning', function(learningData) {
                if (learningData) {
                    var individual_learning = '';
                    var mimslearning_title = '';
                    for (var mimslearning_no = 0; mimslearning_no < learningData.length; mimslearning_no++) {
                        mimslearning_title = learningData[mimslearning_no].Title;
                        mimslearning_title = mimslearning_title.length > 125 ? mimslearning_title.substr(0, 120) + ' ...' : mimslearning_title;
                        if (learningData[mimslearning_no].MiMSLearningType == 'pdf') {
							individual_learning = '<a class="mimslearning row d-flex align-items-center" target="_blank" href="#?MiMSLearningID='+learningData[mimslearning_no].ID+'" style="padding: 0px 0px 0px 20px;"> ' +
								'<div class="mimslearning-icon d-md-flex d-none" style="margin: 10px 0px;"><span><img src="application/views/images/icons/mims-learning.png" style="width: 32px; height: 32px;"></span></div>' +
								'<div class="mimslearning-info">' +
								'<p class="mimslearning-name">'+mimslearning_title+'</p>' +
								'</div>' +
								'</a>';
						} else if (learningData[mimslearning_no].MiMSLearningType == 'link') {
							individual_learning = '<a class="mimslearning row d-flex align-items-center" target="_blank" href="'+learningData[mimslearning_no].MiMSLearningPath+'">' +
								'<div class="mimslearning-icon d-md-flex d-none"><span><img src="application/views/images/icons/mims-learning.png" style="width: 32px; height: 32px;"></span></div>' +
								'<div class="mimslearning-info">' +
								'<p class="mimslearning-name">'+mimslearning_title+'</p>' +
								'</div>' +
								'</a>';
                        }

                        $('.home-mimslearning-list').append(individual_learning);
                    }
                }
            });
        },
        getInternationalHealth: function() {
            console.log('Method Name: drugObject.getInternationalHealth Param:  Value: '+[].toString());
            $('#internationalHealthList').html('');
            var formURL = "#";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getInternationalHealth', function(internationalHealthData) {
                if (internationalHealthData) {
                    var individual_international_health = '';
                    var news_description = '';
                    for (var international_health_no = 0; international_health_no < internationalHealthData.length; international_health_no++) {
                        news_description = internationalHealthData[international_health_no].Description;
                        news_description = news_description.length > 500 ? news_description.substr(0, 500) + '...' : news_description;
                        individual_international_health = '<div class="row job">' +
                            '                        <div class="col-12">' +
                            '                            <p class="job-title">'+internationalHealthData[international_health_no].Title+'</p>' +
                            '                            <p class="job-company">'+news_description+'</p>' +
                            '                        </div>' +
                            '                        <a href="'+internationalHealthData[international_health_no].ID+'"><img class="right-arrow" src="/views/images/icons/right-arrow.svg" alt=">"></a>' +
                            '                    </div>';
                        $('#internationalHealthList').append(individual_international_health);
                    }
                }
            });
        },
        getImportantAddress: function() {
            console.log('Method Name: drugObject.getImportantAddress Param:  Value: '+[].toString());
            var formURL = ">";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getImportantAddress', function(addressData) {
                if (addressData) {
                    var individual_address = '';
                    for (var address_no = 0; address_no < addressData.length; address_no++) {
                        individual_address = '<li class="address"><a href="'+addressData[address_no].ID+'">'+addressData[address_no].Name+'</a></li>';
                        $('ul.home-address-list').append(individual_address);
                    }

                    if (addressData.length) {
                        $('ul.home-address-list').append('<a href="" class="see-more-btn no-outline">See All Addresses</a>');
                    }
                }
            });
        },
        getResources: function() {
            console.log('Method Name: drugObject.getResources Param:  Value: '+[].toString());
            var formURL = "";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getResources', function(resourceData) {
                if (resourceData) {
                    var individual_resource = '';
                    for (var resource_no = 0; resource_no < resourceData.length; resource_no++) {
                        individual_resource = '<li class="resource-item"><a target="_blank" href="'+resourceData[resource_no].ID+'">'+resourceData[resource_no].Title+'</a></li>';
                        $('ul.resource-item-list').append(individual_resource);
                    }

                    if (resourceData.length) {
                        $('ul.resource-item-list').append('<a href="" class="see-more-btn no-outline">See All Resources</a>');
                    }
                }
            });
        },
        getManufacturerBrand: function(objectID, searchOption){
            $('li.search-manufacturer-option').removeClass('active');
            $('li.search-manufacturer-option-'+searchOption).addClass('active');
            drugObject.searchManufacturerBrandOption = searchOption;
            drugObject.searchOptionType = 'manufacturer';
            var formURL = ""+drugObject.searchOptionValue+'&ManufacturerBrandOption='+drugObject.searchManufacturerBrandOption+'&ProductType='+drugObject.productType;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getFeatureProducts', function(drugData){
                drugObject.totalDrug = drugData;
                drugObject.getSearchResult(1);
                drugObject.populatePagination(objectID, 1);
            });
        },
        getSearchResult: function(pageNo, objectID, optionType, optionValue) {
			drugObject.searchObjectID = objectID === undefined ? drugObject.searchObjectID : objectID;
			drugObject.searchOptionType = optionType === undefined ? drugObject.searchOptionType : optionType;
			drugObject.searchOptionValue = optionValue === undefined ? drugObject.searchOptionValue : optionValue;
			var formURL = ""+drugObject.searchOptionType+'&Value='+encodeURIComponent(drugObject.searchOptionValue)+'&PageNo='+pageNo+'&ManufacturerBrandOption='+drugObject.searchManufacturerBrandOption+'&ProductType='+drugObject.productType;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getFeatureProducts', function(drugData){
                if (drugData) {
                    switch (drugObject.searchOptionType) {
                        case 'brand':
                        case 'brand_by_alphabetically':
                            $('tbody.drug-list').html('');
                            for(var i = 0; i < drugData.length; i++) {
                                $('tbody.drug-list').append('<tr>');
                                $('tbody.drug-list').append('<td><a href="'+drugData[i].ID+'">'+drugData[i].Name+'</a></td>');
                                $('tbody.drug-list').append('<td>'+drugData[i].DosageForm+'</td>');
                                $('tbody.drug-list').append('<td>'+drugData[i].StrengthName+'</td>');
                                $('tbody.drug-list').append('<td>'+drugData[i].PackSize+'</td>');
                                $('tbody.drug-list').append('<td>'+drugData[i].PriceInBDT+' Tk</td>');
                                $('tbody.drug-list').append('</tr>');
                            }
                            break;
                        case 'generic':
                            $('tbody.generic-list').html('');
                            for(var i = 0; i < drugData.length; i++) {
                                $('tbody.generic-list').append('<tr>');
                                $('tbody.generic-list').append('<td><a href="'+encodeURIComponent(drugData[i].Name)+'&ProductType='+drugObject.productType+'">'+drugData[i].Name+'</a></td>');
                                $('tbody.generic-list').append('<td>'+drugData[i].ManufacturerName+'</td>');
                                $('tbody.generic-list').append('</tr>');
                            }
                            break;
                        case 'generic_by_alphabetically':
                            $('tbody.generic-alphabetically-list').html('');
                            for(var i = 0; i < drugData.length; i++) {
                                $('tbody.generic-alphabetically-list').append('<tr>');
                                $('tbody.generic-alphabetically-list').append('<td><a href="#'+encodeURIComponent(drugData[i].Name)+'&ProductType='+drugObject.productType+'">'+drugData[i].Name+'</a></td>');
                                $('tbody.generic-alphabetically-list').append('<td><a href="#'+encodeURIComponent(drugData[i].GenericName)+'&ProductType='+drugObject.productType+'">'+drugData[i].GenericName+'</a></td>');
                                $('tbody.generic-alphabetically-list').append('<td><a href="#'+encodeURIComponent(drugData[i].ManufacturerName)+'&ProductType='+drugObject.productType+'">'+drugData[i].ManufacturerName+'</a></td>');
                                $('tbody.generic-alphabetically-list').append('</tr>');
                            }
                            break;
                        case 'indication':
                            $('tbody.indication-list').html('');
                            for(var i = 0; i < drugData.length; i++) {
                                $('tbody.indication-list').append('<tr>');
                                $('tbody.indication-list').append('<td><a href="'+encodeURIComponent(drugData[i].Name)+'&ProductType='+drugObject.productType+'">'+drugData[i].Name+'</a></td>');
                                $('tbody.indication-list').append('<td><a href="'+encodeURIComponent(drugData[i].GenericName)+'&ProductType='+drugObject.productType+'">'+drugData[i].GenericName+'</a></td>');
                                $('tbody.indication-list').append('<td><a href="'+encodeURIComponent(drugData[i].ManufacturerName)+'&ProductType='+drugObject.productType+'">'+drugData[i].ManufacturerName+'</a></td>');
                                $('tbody.indication-list').append('</tr>');
                            }
                            break;
                        case 'manufacturer':
                            $('tbody.manufacturer-list').html('');
                            for(var i = 0; i < drugData.length; i++) {
                                $('tbody.manufacturer-list').append('<tr>');
                                $('tbody.manufacturer-list').append('<td><a href="'+encodeURIComponent(drugData[i].Name)+'&ProductType='+drugObject.productType+'">'+drugData[i].Name+'</a></td>');
                                $('tbody.manufacturer-list').append('<td><a href="'+encodeURIComponent(drugData[i].GenericName)+'&ProductType='+drugObject.productType+'">'+drugData[i].GenericName+'</a></td>');
                                $('tbody.manufacturer-list').append('</tr>');
                            }
                            break;
                        default:
                            break;
                    }
                } else {
                    switch (drugObject.searchOptionType) {
                        case 'brand':
                        case 'brand_by_alphabetically':
                            $('tbody.drug-list').html('');
                            break;
                        case 'generic':
                            $('tbody.generic-list').html('');
                            break;
                        case 'generic_by_alphabetically':
                            $('tbody.generic-alphabetically-list').html('');
                            break;
                        case 'indication':
                            $('tbody.indication-list').html('');
                            break;
                        case 'manufacturer':
                            $('tbody.manufacturer-list').html('');
                            break;
                        default:
                            break;
                    }
                }
            });
        },
        getNewInformation: function(pageNo) {
            
            var formURL = ""+drugObject.searchOptionTypeForNewInformation+'&PageNo='+pageNo;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getNewInformation', function(data){
                if (data) {
                    drugData = data.AllBrands;
                    $('tbody.drug-list').html('');
                    for(var i = 0; i < drugData.length; i++) {
                        $('tbody.drug-list').append('<tr>');
                        $('tbody.drug-list').append('<td><a href="'+drugData[i].ID+'">'+drugData[i].Name+'</a></td>');
                        $('tbody.drug-list').append('<td>'+drugData[i].DosageForm+'</td>');
                        $('tbody.drug-list').append('<td>'+drugData[i].StrengthName+'</td>');
                        $('tbody.drug-list').append('<td>'+drugData[i].PackSize+'</td>');
                        $('tbody.drug-list').append('<td>'+drugData[i].PriceInBDT+' Tk</td>');
                        $('tbody.drug-list').append('</tr>');
                    }
                } else {
                    $('tbody.drug-list').html('');
                }
            });
        },
        searchBrandInformation: function(Option) {
            console.log('Method Name: drugObject.searchBrandInformation Param:  Value: '+Option);
            var search_option = Option == undefined ? $('#searchDrugOption').val() : Option;
            drugObject.searchOptionValue = encodeURIComponent(search_option);
            if (search_option == '') return false;
            search_option = $.trim(search_option);
            var formURL = ""+drugObject.searchOptionType+'&Value='+drugObject.searchOptionValue+'&ProductType='+drugObject.productType;
            switch (drugObject.searchOptionType) {
                case 'brand':
                    if (frontendCommonMethods.inArrayCaseInsensitive(search_option, drugObject.searchOptionForBrand) == -1) {
                        $('.invalid-search-option-error').show();
                        return false;
                    }
                    break;
                case 'generic':
                    if (frontendCommonMethods.inArrayCaseInsensitive(search_option, drugObject.searchOptionForGeneric) == -1) {
                        $('.invalid-search-option-error').show();
                        return false;
                    }
                    break;
                case 'indication':
                    if (frontendCommonMethods.inArrayCaseInsensitive(search_option, drugObject.searchOptionForIndication) == -1) {
                        $('.invalid-search-option-error').show();
                        return false;
                    }
                    break;
                case 'manufacturer':
                    if (frontendCommonMethods.inArrayCaseInsensitive(search_option, drugObject.searchOptionForManufacturer) == -1) {
                        $('.invalid-search-option-error').show();
                        return false;
                    }
                    break;
                default:
                    break;
            }

            $('.invalid-search-option-error').hide();
            window.location.replace(formURL);
        },
        getNewProducts: function(allProduct) {
            console.log('Method Name: drugObject.getNewProducts Param: allProduct Value: '+[allProduct].toString());
            var formURL = ""+allProduct;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getFeatureProducts', function(drugData){
                $('div.new-products-ul ul').html('');
                if(drugData) {
                    var home_page_new_item_limit = 0;
                    for (var i = 0; i < home_page_new_item_limit; i++) {
                        if (i == drugData.length) break;
                        if (i == 0) $('div.new-product-information').html('<h4>New Products</h4>');
                        $('div.new-product-information').append('<a href="'+encodeURIComponent(drugData[i].Name)+'&ProductType='+drugObject.productType+'">'+drugData[i].Name+'</a>');
                    }

                    if (i > 0) {
                        $('div.new-product-information').append('<a href="#">See More</a>');
                    }
                }
            });
        },
        getNewPresentations: function(allPresentation) {
            console.log('Method Name: drugObject.getNewPresentations Param: allPresentation Value: '+[allPresentation].toString());
            var formURL = ""+allPresentation;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getNewPresentations', function(drugData){
                // console.dir(drugData);
                $('div.new-presentation-ul ul').html('');
                if(drugData) {
                    var home_page_new_item_limit = 0;
                    for (var i = 0; i < home_page_new_item_limit; i++) {
                        if (i == drugData.length) break;
                        if (i == 0) $('div.new-presentation-information').html('<h4>New Presentations</h4>');
                        $('div.new-presentation-information').append('<a href="'+encodeURIComponent(drugData[i].Name)+'&ProductType='+drugObject.productType+'">'+drugData[i].Name+'</a>');
                    }

                    if (i > 0) {
                        $('div.new-presentation-information').append('<a href="">See More</a>');
                    }
                }
            });
        },
        getNewBrands: function(allBrand) {
            console.log('Method Name: drugObject.getNewBrands Param: allBrand Value: '+[allBrand].toString());
            var formURL = ""+allBrand;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getNewBrands', function(drugData){
                $('div.new-brand-ul ul').html('');
                if(drugData) {
                    var home_page_new_item_limit =0;
                    for (var i = 0; i < home_page_new_item_limit; i++) {
                        if (i == drugData.length) break;
                        if (i == 0) $('div.new-brand-information').html('<h4>New Brands</h4>');
                        $('div.new-brand-information').append('<a href="'+encodeURIComponent(drugData[i].Name)+'&ProductType='+drugObject.productType+'">'+drugData[i].Name+'</a>');
                    }

                    if (i > 0) {
                        $('div.new-brand-information').append('<a href="">See More</a>');
                    }
                }
            });
        },
        getHighlightedBrands: function() {
            console.log('Method Name: drugObject.getHighlightedBrands Param:  Value: '+[].toString());
            var formURL = "";
            $('#highlighted-product').html('');
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getFeatureProducts', function(highlightedDrugData){
                if (highlightedDrugData.length > 0) {
                    var indication = '';
                    for (var drug_index = 0; drug_index < highlightedDrugData.length; drug_index++) {
                        var drugData = highlightedDrugData[drug_index];

                        indication = drugData.Indication;
                        indication = indication.length > 70 ? indication.substr(0, 67) + '...' : indication;
                        $('#highlighted-product').append('<div><div class="star-product-img">' +
                            '<img src="brand/' + drugData.ImagePath + '" alt="">' +
                            '</div>' +
                            '<div class="star-product-info">' +
                            '<div class="star"><i class="fas fa-star"></i></div>' +
                            '<a href="' + drugData.ID + '" class="star-product-name">' + drugData.Name + '</a>' +
                            '<p class="star-product-attributes">(' + drugData.StrengthName + ')</p>' +
                            '<p class="star-product-description">' + indication + '</p>' +
                            '</div></div>');
                    }

                    $('#highlighted-product').slick({
                        slidesToScroll: 1,
                        slidesToShow: 1,
                        autoplay: true,
                        autoplaySpeed: 3000,
                        infinite: true,
                        arrows: false,
                        responsive: [
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                }
                            }
                        ]
                    });
                }
            });
        },
        changeSearchOption: function(searchOption) {
            console.log('Method Name: drugObject.changeSearchOption Param: searchOption  Value: '+[searchOption].toString());
            $('ul.search-tabs li').removeClass('active');
            drugObject.searchOptionType = searchOption;
            var search_options = [];
            switch (searchOption) {
                case 'brand':
                case 'brand_by_alphabetically':
                    search_options = drugObject.searchOptionForBrand;
                    $('ul.search-tabs li.brand').addClass('active');
                    break;
                case 'generic':
                case 'generic_by_alphabetically':
                    search_options = drugObject.searchOptionForGeneric;
                    $('ul.search-tabs li.generic').addClass('active');
                    break;
                case 'indication':
                    search_options = drugObject.searchOptionForIndication;
                    $('ul.search-tabs li.indication').addClass('active');
                    break;
                case 'manufacturer':
                    search_options = drugObject.searchOptionForManufacturer;
                    $('ul.search-tabs li.manufacture').addClass('active');
                    break;
                default:
                    break;
            }

			frontendCommonMethods.autocomplete(document.getElementById("searchDrugOption"), search_options);
			frontendCommonMethods.autocomplete(document.getElementById("searchOptionInMobile"), search_options);
        },
        searchAlphabetically: function(value) {
            if(drugObject.searchOptionType == 'manufacturer') {
                drugObject.getManufacturerBrand('manufacturer', value);
            } else {
                var type = 'brand_by_alphabetically';
                switch (drugObject.searchOptionType) {
                    case 'brand':
                        type = 'brand_by_alphabetically';
                        break;
                    case 'generic':
                        type = 'generic_by_alphabetically';
                        break;
                    default:
                        break;
                }

                window.location.replace(''+type+'&Value='+encodeURIComponent(value)+'&ProductType='+drugObject.productType);
            }
        },
        getDrugList: function(getDrugList) {
            
            console.log('Method Name: drugObject.getDrugList Param: getDrugList Value: '+[getDrugList].toString());
            var formURL = ""+'?PageNo='+pageNo+'&ProductType='+drugObject.productType;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getDrugList', function(drugData){
                var drug_td_text = '';
                for(var i = 0; i < drugData.length; i++) {
                    drug_td_text = '<tr>' +
                        '<td><a href="'+'?BrandID='+drugData[i].ID+'">'+drugData[i].Name+'</a></td>' +
                        '<td>'+drugData[i].DosageForm+'</td>' +
                        '<td>'+drugData[i].StrengthName+'</td>' +
                        '<td>'+drugData[i].PackSize+'</td>' +
                        '<td>'+drugData[i].PriceInBDT+' Tk</td>' +
                        '</tr>';
                    $('tbody.drug-list').append(drug_td_text);
                }
            });
            drugObject.populatePagination(pageNo);
        },
        getAllDrugInfoForAutoComplete: function(searchOption) {
            console.log('Method Name: drugObject.getAllDrugInfoForAutoComplete Param: option Value: ');
			var formURL = ""+'?ProductType='+drugObject.productType;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.getAllDrugInfoForAutoComplete', function(drugData){
                drugObject.searchOptionForBrand = drugData.Brand;
                drugObject.searchOptionForGeneric = drugData.Generic;
                drugObject.searchOptionForIndication = drugData.Indication;
                drugObject.searchOptionForManufacturer = drugData.Manufacturer;

                drugObject.changeSearchOption(searchOption);
            });
        },
        populatePagination: function (objectID, pageNo, populateList, optionType, optionValue) {
            console.log('Method Name: drugObject.populatePagination Param: objectID, pageNo, populateList, optionType, optionValue Value: '+[objectID, pageNo, populateList, optionType, optionValue].toString());
			drugObject.searchObjectID = objectID === undefined ? drugObject.searchObjectID : objectID;
			drugObject.searchOptionType = optionType === undefined ? drugObject.searchOptionType : optionType;
			drugObject.searchOptionValue = optionValue === undefined ? drugObject.searchOptionValue : optionValue;
            var per_page_information_number = drugObject.perPageInformationNumber;
            var total_page = Math.ceil(drugObject.totalDrug / per_page_information_number);

            if (populateList === true) drugObject.getSearchResult(pageNo, objectID, optionType, optionValue);
            if (total_page > 1) {
                $('ul#'+objectID).show();
            } else {
                $('ul#'+objectID).hide();
            }

            var total_pagination =0;
            var start_page_no = pageNo - Math.floor(9 / 2) < 1 ? 1 : pageNo - Math.floor(9 / 2);
            var page_counter = 0;
            var pagination_li_text;
            // console.log('per_page_information_number: '+per_page_information_number+' total_page: '+total_page+' total_pagination: '+total_pagination+' start_page_no: '+start_page_no);
            $('ul#'+objectID).html('');
            if (pageNo > 1) {
                var previous_page_no = pageNo - 1;
                $('ul#'+objectID).html('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Previous" onclick="drugObject.populatePagination(\''+drugObject.searchObjectID+'\','+ previous_page_no+', true, \''+drugObject.searchOptionType+'\',\''+drugObject.searchOptionValue+'\')">' +
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
                    pagination_li_text = '<li class="page-item"><a class="page-link" onclick="drugObject.populatePagination(\''+drugObject.searchObjectID+'\','+ i+', true, \''+drugObject.searchOptionType+'\',\''+drugObject.searchOptionValue+'\')">'+i+'</a></li>';
                }
                $('ul#'+objectID).append(pagination_li_text);
                page_counter++;
                console.log('page_counter: '+page_counter+' total_pagination: '+total_pagination+' total_page: '+total_page);
            }

            if (total_page > pageNo) {
                var next_page_no = pageNo + 1;
                $('ul#'+objectID).append('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Next" onclick="drugObject.populatePagination(\''+drugObject.searchObjectID+'\','+ next_page_no+', true, \''+drugObject.searchOptionType+'\',\''+drugObject.searchOptionValue+'\')">' +
                    '                                        <span>&raquo;</span>' +
                    '                                        <span class="sr-only">Next</span>' +
                    '                                    </a>' +
                    '                                </li>');
            }
        },
        populatePaginationForNewInformation: function (pageNo, populateList) {
            console.log('Method Name: drugObject.populatePaginationForNewInformation Param: pageNo, populateList Value: '+[pageNo, populateList].toString());
            var per_page_information_number = drugObject.perPageInformationNumber;
            var total_page = Math.ceil(drugObject.totalDrug / per_page_information_number);

            if (populateList === true) drugObject.getNewInformation(pageNo);
            if (total_page > 1) {
                $('ul#search-brand-pagination').show();
            } else {
                $('ul#search-brand-pagination').hide();
            }

            var total_pagination = 0;
            var start_page_no = pageNo - Math.floor(9 / 2) < 1 ? 1 : pageNo - Math.floor(9 / 2);
            var page_counter = 0;
            var pagination_li_text;
            // console.log('per_page_information_number: '+per_page_information_number+' total_page: '+total_page+' total_pagination: '+total_pagination+' start_page_no: '+start_page_no);
            $('ul#search-brand-pagination').html('');
            if (pageNo > 1) {
                var previous_page_no = pageNo - 1;
                $('ul#search-brand-pagination').html('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Previous" onclick="drugObject.populatePaginationForNewInformation('+previous_page_no+', true)">' +
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
                    pagination_li_text = '<li class="page-item"><a class="page-link" onclick="drugObject.populatePaginationForNewInformation('+i+', true)">'+i+'</a></li>';
                }
                $('ul#search-brand-pagination').append(pagination_li_text);
                page_counter++;
                console.log('page_counter: '+page_counter+' total_pagination: '+total_pagination+' total_page: '+total_page);
            }

            if (total_page > pageNo) {
                var next_page_no = pageNo + 1;
                $('ul#search-brand-pagination').append('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Next" onclick="drugObject.populatePaginationForNewInformation('+next_page_no+', true)">' +
                    '                                        <span>&raquo;</span>' +
                    '                                        <span class="sr-only">Next</span>' +
                    '                                    </a>' +
                    '                                </li>');
            }
        }
    }

    $(document).bind('keydown', function(e){
        if (e.which == 13){
            $('#searchInformation').trigger('click');
        }
    });
</script>