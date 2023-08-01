<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var categoryWiseAdvertisementObject = {
        activeAdvertisementID: '',
        activeCategoryID: '',
        allExistingPosition: [],
        populateAdvertisementList: function(categoryID) {
            console.log('Method Name: categoryWiseAdvertisementObject.loadAdvertisementList');
            categoryWiseAdvertisementObject.activeCategoryID = categoryID;
            $('#AdvertisementListCategoryID').val(categoryID);
            $('.advertisement-list').html('');
            if (categoryID == '') return false;
            var formURL = "<?php echo site_url('CategoryWiseAdvertisement/getAllAdvertisementForAdmin?CategoryID=')?>"+categoryID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'categoryWiseAdvertisementObject.loadAdvertisementList', function(advertisementData){
                $('.advertisement-list').html('');
                var advertisement_info = [];
                if (advertisementData) {
                    for (var advertisement_no = 0; advertisement_no < advertisementData.length; advertisement_no++) {
                        advertisement_info = advertisementData[advertisement_no];
                        $('.advertisement-list').append('<tr class="table-row">' +
                            '<td>' +
                            '<a class="link" onclick="categoryWiseAdvertisementObject.showAdvertisementEditModal('+advertisement_info.ID+','+advertisement_info.AdvertisementID+')">'+advertisement_info.CategoryValue+'</a>' +
                            '</td>' +
                            '<td>'+advertisement_info.Organization+'</td>' +
                            '<td>'+advertisement_info.Title+'</td>' +
                            '<td>'+advertisement_info.PublishDate+'</td>' +
                            '<td>'+advertisement_info.UnpublishedDate+'</td>' +
                            '<td>'+advertisement_info.PositionName+'</td><td>' +
                            '<div class="actions">' +
                            '<a onclick="categoryWiseAdvertisementObject.showAdvertisementEditModal('+advertisement_info.ID+','+advertisement_info.AdvertisementID+')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                            '<a onclick="categoryWiseAdvertisementObject.deleteAdvertisement('+advertisement_info.ID+','+advertisement_info.AdvertisementID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                            '</div>' +
                            '</td>' +
                            '</tr>');
                    }
                }
            });
        },
        loadCategoryValues: function(categoryID, selectedID) {
            console.log('Method Name: categoryWiseAdvertisementObject.loadCategoryValues');
            categoryWiseAdvertisementObject.activeCategoryID = categoryID;
            $('#AdvertisementCategoryID').val(categoryID);
            if (categoryID == '') {
                $('.advertisement-category-value').hide();
                $('.advertisement-position-value').hide();
                $('#AdvertisementCategoryValue').empty();
                $('#AdvertisementPositionID').empty()
            } else {
                $('.advertisement-category-value').show();
                $('.advertisement-position-value').show();
                switch (categoryWiseAdvertisementObject.activeCategoryID) {
                    case '1':       // 1 = Generic
                        $('#advertisement-category-value-label').html('Generic');
                        $('#AdvertisementCategoryValue')
                            .empty()
                            .append('<option value="">Select Generic</option>');
                        break;
                    case '2':       // 2 = Brand
                        $('#advertisement-category-value-label').html('Brand');
                        $('#AdvertisementCategoryValue')
                            .empty()
                            .append('<option value="">Select Brand</option>');
                        break;
                    case '3':       // 3 = Indication
                        $('#advertisement-category-value-label').html('Indication');
                        $('#AdvertisementCategoryValue')
                            .empty()
                            .append('<option value="">Select Indication</option>');
                        break;
                    default:
                        break;
                }

                var formURL = "<?php echo site_url('CategoryWiseAdvertisement/getCategoryValues?CategoryID=')?>"+categoryID;
                mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'categoryWiseAdvertisementObject.loadCategoryValues', function(categoryValues){
                    $.each(categoryValues, function (i, item) {
                        $('#AdvertisementCategoryValue').append($('<option>', {
                            value: item.ID,
                            text : categoryID == '2' ? item.Name + ' ' + item.DosageForm + ' ' + item.StrengthName : item.Name
                        }));
                    });
                    console.log('selectedID: '+selectedID);
                    $('#AdvertisementCategoryValue').val(selectedID);
                });
                categoryWiseAdvertisementObject.getAllAdvertisementPosition(categoryID);
            }
        },
        validateForm: function() {
            $('.error-message').hide();
            var is_valid = true;
            if ($('#AdvertisementOrganization').val() == '') {
                // console.log('Error: AdvertisementOrganization');
                is_valid = false;
                $('.advertisement-organization-require-message').show();
            }
            if ($('#AdvertisementCategoryID').val() == '') {
                // console.log('Error: AdvertisementCategoryID');
                is_valid = false;
                $('.advertisement-category-id-require-message').show();
            }
            if ($('#AdvertisementCategoryValue').val() == '') {
                // console.log('Error: AdvertisementCategoryValue');
                is_valid = false;
                $('.advertisement-category-value-require-message').show();
            }
            if ($('#AdvertisementPositionID').val() == '') {
                // console.log('Error: AdvertisementPositionID');
                is_valid = false;
                $('.advertisement-position-require-message').show();
            }
            if ($('#AdvertisementImagePath').val() == '') {
                // console.log('Error: AdvertisementImagePath');
                is_valid = false;
                $('.advertisement-image-path-require-message').show();
            }
            if ($('#AdvertisementTitle').val() == '') {
                // console.log('Error: AdvertisementTitle');
                is_valid = false;
                $('.advertisement-title-require-message').show();
            }
            if ($('#AdvertisementPublishDate').val() == '') {
                // console.log('Error: AdvertisementPublishDate');
                is_valid = false;
                $('.advertisement-publish-date-require-message').show();
            }
            if ($('#AdvertisementUnpublishedDate').val() == '') {
                // console.log('Error: AdvertisementUnpublishedDate');
                is_valid = false;
                $('.advertisement-unpublished-date-require-message').show();
            }

            return is_valid;
        },
        initAdvertisementPage: function() {
            var today = new Date((new Date()).setHours(0, 0, 0, 0));
            $('.date-field').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                clearBtn: true,
                todayHighlight: true,
                startDate:today
            });
        },
        getAllAdvertisementPosition: function(categoryID, selectedID) {
            console.log('Method Name: categoryWiseAdvertisementObject.getAllAdvertisementPosition');
            var formURL = "<?php echo site_url('CategoryWiseAdvertisement/getAllAdvertisementPosition?CategoryID=')?>"+categoryID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'categoryWiseAdvertisementObject.getAllAdvertisementPosition', function(advertisementPositions){
                categoryWiseAdvertisementObject.allExistingPosition = [];
                for (var i = 0; i < advertisementPositions.length; i++) {
                    advertisementPositions[i].PositionDetail = 'Name: ' + advertisementPositions[i].Name + ', Image Size: ' + advertisementPositions[i].ImageWidth + ' * '+advertisementPositions[i].ImageHeight+', Number of Advertisement: ' + advertisementPositions[i].NumberOfAdvertisement + ', Interval: ' + advertisementPositions[i].Interval + ', Price In BDT: ' + advertisementPositions[i].PriceInBDT;
                    categoryWiseAdvertisementObject.allExistingPosition[i] = advertisementPositions[i];
                }

                $('#AdvertisementPositionID')
                    .empty()
                    .append('<option value="">Select Advertisement Position</option>');
                $.each(categoryWiseAdvertisementObject.allExistingPosition, function (i, item) {
                    $('#AdvertisementPositionID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });

                if (selectedID != undefined) {
                    $('#AdvertisementPositionID').val(selectedID);
                } else {
                    $('#AdvertisementPositionID').val('');
                }
            });
        },
        getAdvertisementPositionDetail: function(positionID) {
            var position_detail = '';
            for(var i = 0; i < categoryWiseAdvertisementObject.allExistingPosition.length; i++) {
                if (positionID == categoryWiseAdvertisementObject.allExistingPosition[i].ID) {
                    position_detail = categoryWiseAdvertisementObject.allExistingPosition[i].PositionDetail;
                    break;
                }
            }

            return position_detail;
        },
        changeAdvertisementPosition: function(positionID) {
            if (positionID) {
                var position_detail = categoryWiseAdvertisementObject.getAdvertisementPositionDetail(positionID);
                if (position_detail != '') {
                    $('#AdvertisementPositionDetail').val(position_detail);
                    $('.advertisement-position-detail').show();
                    $('#AdvertisementPositionID').val(positionID);
                } else {
                    $('#AdvertisementPositionDetail').val('');
                    $('.advertisement-position-detail').hide();
                    $('#AdvertisementPositionID').val('');
                }
            } else {
                $('#AdvertisementPositionDetail').val('');
                $('.advertisement-position-detail').hide();
                $('#AdvertisementPositionID').val('');
            }
        },
        showAdvertisementCreateModal: function () {
            categoryWiseAdvertisementObject.activeAdvertisementID = '';
            $('.error-message').hide();
            $('#advertisement_modal').html('Create');
            $('#AdvertisementOrganization').val('');
            $('#AdvertisementPositionID').val('');
            $('#AdvertisementPositionDetail').val('');
            $('#AdvertisementImagePath').val('');
            $('#AdvertisementImagePathThumbnail').attr('src', '');
            $('#AdvertisementTitle').val('');
            $('#AdvertisementBodyText').val('');
            $('#AdvertisementLinkURL').val('');
            $('#AdvertisementPublishDate').val('');
            $('#AdvertisementUnpublishedDate').val('');
            $('#AdvertisementContactPerson').val('');
            $('#AdvertisementEmailID').val('');
            $('#AdvertisementMobileNo').val('');
            $("#AdvertisementIsActiveNo").prop("checked", true);
            $("#AdvertisementCategoryID").val('');
            $("#AdvertisementCategoryValue").val('');
            $('#addAdvertisementModal').modal('show');
            categoryWiseAdvertisementObject.loadCategoryValues(categoryWiseAdvertisementObject.activeCategoryID, '');
        },
        deleteAdvertisement: function (categoryID, advertisementID) {
            console.log('Method Name: categoryWiseAdvertisementObject.deleteAdvertisement');
            var formURL = "<?php echo site_url('CategoryWiseAdvertisement/deleteAdvertisement');?>?CategoryID="+categoryID+"&AdvertisementID="+advertisementID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'categoryWiseAdvertisementObject.deleteAdvertisement', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Category Wise Advertisement', success_msg, 'Ok');
                    categoryWiseAdvertisementObject.populateAdvertisementList(categoryWiseAdvertisementObject.activeCategoryID);
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Category Wise Advertisement', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitAdvertisementModal: function () {
            console.log('Method Name: categoryWiseAdvertisementObject.submitAdvertisementModal');
            var advertisement_body_text = commonMethods.getRichTextValueByID('AdvertisementBodyText');
            $('#AdvertisementBodyText').val(advertisement_body_text);

            var is_valid = categoryWiseAdvertisementObject.validateForm();
            if (!is_valid) return;
            $('#addAdvertisementModal').modal('hide');
            var formURL = categoryWiseAdvertisementObject.activeAdvertisementID == '' ? "<?php echo site_url('CategoryWiseAdvertisement/addAdvertisement');?>?CategoryID="+categoryWiseAdvertisementObject.activeCategoryID : "<?php echo site_url('CategoryWiseAdvertisement/updateAdvertisement');?>?CategoryID="+categoryWiseAdvertisementObject.activeCategoryID+"&AdvertisementID="+categoryWiseAdvertisementObject.activeAdvertisementID;
            console.log('Form URL: '+formURL);
            var form = $('form#addNewAdvertisement');
            if (window.FormData){
                var postData = new FormData(form[0]);
                // console.dir(postData);
            } else {
                return false;
            }
alert(formURL);
return false;
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
                    var user_event = categoryWiseAdvertisementObject.activeAdvertisementID == '' ? 'Add' : 'Update';
                    if (data) {
                        if (data.error_msg != ''){
                            mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Category Wise Advertisement', 'Data is not deleted successfully!', 'Ok');
                        } else if (data.result){
                            var success_msg = 'You have successfully added a advertisement.';
                            mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + ' Category Wise Advertisement', success_msg, 'Ok');
                            categoryWiseAdvertisementObject.populateAdvertisementList(categoryWiseAdvertisementObject.activeCategoryID);
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
        showAdvertisementEditModal: function (categoryID, advertisementID) {
            categoryWiseAdvertisementObject.activeCategoryID = categoryID;
            categoryWiseAdvertisementObject.activeAdvertisementID = advertisementID;
            $('.error-message').hide();
            $('#advertisement_modal').html('Update');
            var formURL = "<?php echo site_url('CategoryWiseAdvertisement/getAdvertisementDetailInformation')?>?CategoryID="+categoryID+"&AdvertisementID="+advertisementID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'categoryWiseAdvertisementObject.showAdvertisementEditModal', function(advertisementData){
                $('#AdvertisementOrganization').val(advertisementData.Organization);
                $('#AdvertisementImagePath').val('');
                $('#AdvertisementImagePathThumbnail').attr('src', '<?php echo base_url()?>AdvertisementImages/'+advertisementData.ImagePath);
                $('#AdvertisementTitle').val(advertisementData.Title);
                commonMethods.setRichTextValueByID('AdvertisementBodyText', advertisementData.BodyText);
                $('#AdvertisementLinkURL').val(advertisementData.LinkURL);
                $('#AdvertisementPublishDate').datepicker('setValue', advertisementData.PublishDate);
                $('#AdvertisementUnpublishedDate').datepicker('setValue', advertisementData.UnpublishedDate);
                $('#AdvertisementContactPerson').val(advertisementData.ContactPerson);
                $('#AdvertisementEmailID').val(advertisementData.EmailID);
                $('#AdvertisementMobileNo').val(advertisementData.MobileNo);
                categoryWiseAdvertisementObject.getAllAdvertisementPosition(categoryWiseAdvertisementObject.activeCategoryID, advertisementData.AdvertisementPositionID);
                categoryWiseAdvertisementObject.loadCategoryValues(categoryWiseAdvertisementObject.activeCategoryID, advertisementData.CategoryValue);
                $('#AdvertisementCategoryValue').val(advertisementData.CategoryValue);
                categoryWiseAdvertisementObject.changeAdvertisementPosition(advertisementData.AdvertisementPositionID);
                if (advertisementData.IsActive) {
                    $("#AdvertisementIsActiveYes").prop("checked", true);
                } else {
                    $("#AdvertisementIsActiveNo").prop("checked", true);
                }
            });
            $('#advertisement_modal').html('Update');
            $('#addAdvertisementModal').modal('show');
        },
        setAdvertisementImagePathThumbnail: function (input, objectID) {
            console.log('categoryWiseAdvertisementObject.setAdvertisementImagePathThumbnail' + 'Params: input, objectID' + ' Values: ' + input + ' ' + objectID);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#AdvertisementImagePathThumbnail').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    categoryWiseAdvertisementObject.initAdvertisementPage();
</script>
