<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var productObject = {
        activeProductID: '',
        allGenericInfo: [],
        allBrandInfo: [],
        allManufacturerInfo: [],
        allDosageFormInfo: [],
        allStrengthInfo: [],
        allPackSizeInfo: [],
        initProductPage: function() {
            productObject.activeProductID = '';
            var formURL = "<?php echo site_url('Product/getAllGeneralInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'productObject.initProductPage', function(generalData){
                // console.dir(generalData);
                productObject.allGenericInfo = generalData.GenericInfo;
                productObject.allBrandInfo = generalData.BrandInfo;
                productObject.allManufacturerInfo = generalData.ManufacturerInfo;
                productObject.allDosageFormInfo = generalData.DosageFormInfo;
                productObject.allStrengthInfo = generalData.StrengthInfo;
                productObject.allPackSizeInfo = generalData.PackSizeInfo;

                $('#GenericID')
                    .empty()
                    .append('<option selected="selected" value="">Select Item</option>');
                $.each(productObject.allGenericInfo, function (i, item) {
                    $('#GenericID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });

                $('#BrandID')
                    .empty()
                    .append('<option selected="selected" value="">Select Item</option>');
                $.each(productObject.allBrandInfo, function (i, item) {
                    $('#BrandID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });

                $('#ManufacturerID')
                    .empty()
                    .append('<option selected="selected" value="">Select Item</option>');
                $.each(productObject.allManufacturerInfo, function (i, item) {
                    $('#ManufacturerID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });

                $('#DosageFormID')
                    .empty()
                    .append('<option selected="selected" value="">Select Item</option>');
                $.each(productObject.allDosageFormInfo, function (i, item) {
                    $('#DosageFormID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });

                $('#StrengthID')
                    .empty()
                    .append('<option selected="selected" value="">Select Item</option>');
                $.each(productObject.allStrengthInfo, function (i, item) {
                    $('#StrengthID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });

                $('#PackSizeID')
                    .empty()
                    .append('<option selected="selected" value="">Select Item</option>');
                $.each(productObject.allPackSizeInfo, function (i, item) {
                    $('#PackSizeID').append($('<option>', {
                        value: item.ID,
                        text : item.Name
                    }));
                });
            });
        },
        showProductCreateModal: function () {
            productObject.activeProductID = '';
            $('#product_modal').html('Create');
            $('#GenericID').val('');
            $('#BrandID').val('');
            $('#ManufacturerID').val('');
            $('#DosageFormID').val('');
            $('#StrengthID').val('');
            $('#PackSizeID').val('');
            $('#PriceInBDT').val('');
            $("#IsHighlightedNo").prop("checked", true);
            $("#IsNewProductNo").prop("checked", true);
            $("#IsNewBrandNo").prop("checked", true);
            $("#IsNewPresentationNo").prop("checked", true);
            $("#DrugIsActiveNo").prop("checked", true);
            $('#addProductModal').modal('show');
        },
        showProductEditModal: function (productID) {
            console.log('Method Name: productObject.showProductEditModal');
            productObject.activeProductID = productID;
            var formURL = "<?php echo site_url('Product/getDrugDetail')?>?DrugID="+productID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'productObject.showProductEditModal', function(drugData){
                $('#GenericID').val(drugData.GenericID);
                $('#BrandID').val(drugData.BrandID);
                $('#ManufacturerID').val(drugData.ManufacturerID);
                $('#DosageFormID').val(drugData.DosageFormID);
                $('#StrengthID').val(drugData.StrengthID);
                $('#PackSizeID').val(drugData.PackSizeID);
                $('#PriceInBDT').val(drugData.PriceInBDT);
                if (drugData.IsHighlighted) {
                    $("#IsHighlightedYes").prop("checked", true);
                } else {
                    $("#IsHighlightedNo").prop("checked", true);
                }

                if (drugData.IsNewProduct) {
                    $("#IsNewProductYes").prop("checked", true);
                } else {
                    $("#IsNewProductNo").prop("checked", true);
                }

                if (drugData.IsNewBrand) {
                    $("#IsNewBrandYes").prop("checked", true);
                } else {
                    $("#IsNewBrandNo").prop("checked", true);
                }

                if (drugData.IsNewPresentation) {
                    $("#IsNewPresentationYes").prop("checked", true);
                } else {
                    $("#IsNewPresentationNo").prop("checked", true);
                }

                if (drugData.IsActive) {
                    $("#DrugIsActiveYes").prop("checked", true);
                } else {
                    $("#DrugIsActiveNo").prop("checked", true);
                }
            });
            $('#product_modal').html('Update');
            $('#addProductModal').modal('show');
        },
        deleteProduct: function (drugID) {
            console.log('Method Name: productObject.deleteDrug');
            var formURL = "<?php echo site_url('Product/deleteDrug');?>?DrugID="+drugID;
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'productObject.deleteDrug', function(response){
                if (response) {
                    var success_msg = 'You have successfully deleted data!';
                    mimsPopup.showGeneralPopup('success', 'Success!!!', 'Delete Product', success_msg, 'Ok');
                    productObject.populateDrugList();
                } else {
                    mimsPopup.showGeneralPopup('error', 'Error!!!', 'Delete Product', 'Data is not deleted successfully!', 'Ok');
                }
            });
        },
        submitProductModal: function () {
            $('#addProductModal').modal('hide');
            var formURL = productObject.activeProductID == '' ? "<?php echo site_url('Product/addDrug');?>" : "<?php echo site_url('Product/updateDrug');?>?DrugID="+productObject.activeProductID;
            var postData = $('form#addNewDrug').serializeArray();
            mimsServerAPI.postDataToServer(formURL, postData, 'JSONp', 'productObject.submitProductModal', function(data){
                var user_event = productObject.activeProductID == '' ? 'Add' : 'Update';
                if (data) {
                    if (data.error_msg != ''){
                        mimsPopup.showGeneralPopup('error', 'Error!!!', user_event + ' Product', data.error_msg, 'Ok');
                    } else if (data.result){
                        var success_msg = 'You have successfully added a drug.';
                        mimsPopup.showGeneralPopup('success', 'Success!!!', user_event + ' Product', success_msg, 'Ok');
                        productObject.populateDrugList();
                    }
                }
            });
        },
        populateDrugList: function() {
            var formURL = "<?php echo site_url('Product/getAllDrugInformation')?>";
            mimsServerAPI.getServerData('GET', formURL, 'jsonp', 'drugObject.populateDrugList', function(drugData){
                var drug_tr_text = '';
                $('tbody.product-list').html('');
                for(var i = 0; i < drugData.length; i++) {
                    drug_tr_text = '<tr class="table-row">' +
                        '<td><a class="link" onclick="productObject.showProductEditModal('+drugData[i].DrugID+')">'+drugData[i].GenericName+'</a></td>' +
                        '<td>'+drugData[i].BrandName+'</td>' +
                        '<td>'+drugData[i].PriceInBDT+' Tk</td>' +
                        '<td>'+drugData[i].ManufacturerName+'</td>' +
                        '<td>' +
                        '<div class="actions">' +
                        '<a onclick="productObject.showProductEditModal('+drugData[i].DrugID+')"><img src="<?php echo base_url();?>application/views/images/svg/edit-regular.svg"></a>' +
                        '<a onclick="productObject.deleteProduct('+drugData[i].DrugID+')" class="delete"><img src="<?php echo base_url();?>application/views/images/svg/trash-alt-regular.svg"></a>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('tbody.product-list').append(drug_tr_text);
                }
            });
        }
    }

    productObject.initProductPage();
</script>
