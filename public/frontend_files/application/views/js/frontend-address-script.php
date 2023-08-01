<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var addressObject = {
        totalAddress: 0,
        selectedCategoryID: '',
        selectedCity: '',
        selectedArea: '',
        viewAdditionalFilterOption: true,
        toggleFilterOption: function() {
            addressObject.viewAdditionalFilterOption = addressObject.viewAdditionalFilterOption ? false : true;
            if(addressObject.viewAdditionalFilterOption) {
                $('#address-filter-text').html('Hide Extra');
                $('.address-additional-filter').show();
            } else {
                $('#address-filter-text').html('View All');
                $('.address-additional-filter').hide();
            }
        },
        perPageInformationNumber: <?php echo config_item('per_page_address_information_number');?>,
        getLocationWiseAddresses: function() {
            addressObject.selectedCity = $('#addressCity').val();
            addressObject.selectedCategoryID = $('#addressCategory').val();
            addressObject.getSearchResult(1);
        },
        getSearchResult: function(pageNo) {
            var formURL = "<?php echo site_url('Address/getAddressForFrontend?PageNo=')?>"+pageNo+'&AddressCategoryID='+addressObject.selectedCategoryID+'&AddressCity='+addressObject.selectedCity;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'addressObject.getFeatureProducts', function(response){
				document.title = response.title;
				$('meta[name=keywords]').attr('content', response.keywords);
				var addressData = response.AllAddress;
                addressObject.totalAddress = response.TotalAddress;
                if($.isNumeric(pageNo)) {
                    addressObject.populatePagination(pageNo);
                } else {
                    addressObject.populatePagination(1);
                }
                if (addressData) {
                    $('table#address-list-table tbody').html('');
                    for (var i = 0; i < addressData.length; i++) {
                        $('table#address-list-table tbody').append('<tr>' +
                            '<td>'+addressData[i].Name+'</td>' +
                            '<td>'+addressData[i].Address+'</td>' +
                            '<td>'+addressData[i].ContactNumber+'</td>' +
                            '</tr>');
                    }
                }
            });
        },
        populatePagination: function (pageNo, populateList) {
            console.log('Method Name: addressObject.populatePagination Param: pageNo Value: '+[pageNo].toString());
            var per_page_information_number = addressObject.perPageInformationNumber;
            var total_page = Math.ceil(addressObject.totalAddress / per_page_information_number);

            if (populateList === true) addressObject.getSearchResult(pageNo);
            if (total_page > 1) {
                $('ul#address-pagination').show();
            } else {
                $('ul#address-pagination').hide();
            }
            // console.log('addressObject.totalAddress: '+addressObject.totalAddress+' per_page_information_number: '+per_page_information_number);
            var total_pagination = <?php echo config_item('total_page');?>;
            var start_page_no = pageNo - Math.floor(per_page_information_number / 2) < 1 ? 1 : pageNo - Math.floor(per_page_information_number / 2);
            var page_counter = 0;
            var pagination_li_text;
            // console.log('per_page_information_number: '+per_page_information_number+' total_page: '+total_page+' total_pagination: '+total_pagination+' start_page_no: '+start_page_no);
            $('ul#address-pagination').html('');
            if (pageNo > 1) {
                var previous_page_no = pageNo - 1;
                $('ul#address-pagination').html('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Previous" onclick="addressObject.populatePagination('+previous_page_no+', true)">' +
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
                    pagination_li_text = '<li class="page-item"><a class="page-link" onclick="addressObject.populatePagination('+i+', true)">'+i+'</a></li>';
                }
                $('ul#address-pagination').append(pagination_li_text);
                page_counter++;
                // console.log('page_counter: '+page_counter+' total_pagination: '+total_pagination+' total_page: '+total_page);
            }

            if (total_page > pageNo) {
                var next_page_no = pageNo + 1;
                $('ul#address-pagination').append('<li class="page-item">' +
                    '                                    <a class="page-link" aria-label="Next" onclick="addressObject.populatePagination('+next_page_no+', true)">' +
                    '                                        <span>&raquo;</span>' +
                    '                                        <span class="sr-only">Next</span>' +
                    '                                    </a>' +
                    '                                </li>');
            }
        }
    }
</script>
