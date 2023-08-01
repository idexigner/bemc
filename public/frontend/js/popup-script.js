var mimsPopup = {
    showErrorPopup: true,
    showSidePopUp: function (title, text, success) {
        var icon_image = success ? 'icon_success.png' : 'icon_error.png';
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: title,
            // (string | mandatory) the text inside the notification
            text: text,
            // (string | optional) the image to display on the left
            image: '../../application/views/img/'+icon_image,
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: '5000',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });
    },
    showModalView: function (modalID, title, bodyText, hide_btn_1, hide_btn_2){
        $('#loaderModal').modal('hide');
        $('#loaderModalWithText').modal('hide');
        if (hide_btn_1 === true) {
            $("#"+modalID+" button.btn1").hide();
        } else {
            $("#"+modalID+" button.btn1").show();
        }

        if (hide_btn_2 === true) {
            $("#"+modalID+" button.btn2").hide();
        } else {
            $("#"+modalID+" button.btn2").show();
        }

        if (title != undefined && title != '') $('#'+modalID+" h4.modal-title").html(title);
        if (bodyText != undefined && bodyText != '') $('#'+modalID+" div.error_msg").html(bodyText);
        $('#' + modalID).modal({
            keyboard: false,
            backdrop: 'static',
            show: true
        });
    },
    showLoaderModal: function(loader_text) {
        if (loader_text == undefined || loader_text == '') {
            $("#loaderModal span.loder_text").html('Loading...');
        } else {
            $("#loaderModal span.loder_text").html(loader_text);
        }

        $('#loaderModal').modal({
            keyboard: false,
            backdrop: 'static',
            show: true
        });
    },
    showWarningModal: function(warningMessage) {
        if (warningMessage != undefined && warningMessage != '') {
            $("span#warning-message").html(warningMessage);
        }

        $('#warningMessageModal').modal({
            keyboard: false,
            backdrop: 'static',
            show: true
        });
    },
    showGeneralPopup: function (type, title, heading, bodyPart2, rightButtonText, bodyPart1, leftButtonText) {
        console.log('Method Name: mimsPopup.showGeneralPopup Param: type, title, heading, bodyPart2, rightButtonText, bodyPart1, leftButtonText '+ [type, title, heading, bodyPart2, rightButtonText, bodyPart1, leftButtonText].toString());
        if (type == undefined || title == undefined || heading == undefined || bodyPart2 == undefined || rightButtonText == undefined) {
            return false;
        }

        $('#general_popup_body').removeClass('alert-success');
        $('#general_popup_body').removeClass('alert-warning');
        $('#general_popup_body').removeClass('alert-danger');
        $('#general_popup_title').html(title);
        $('#general_popup_heading').html(heading);
        $('#general_popup_body_part2').html(bodyPart2);
        $('#general_popup_button_right').html(rightButtonText);
        $('#general_popup_body_part1').html('');
        $('#general_popup_button_right').removeClass('btn-success');
        $('#general_popup_button_right').removeClass('btn-warning');
        $('#general_popup_button_right').removeClass('btn-danger');

        if (bodyPart1 == undefined || bodyPart1 == '') {
            $('#general_popup_body_part1').hide();
        } else {
            $('#general_popup_body_part1').html(bodyPart2);
            $('#general_popup_body_part1').show();
        }

        if (leftButtonText == undefined || leftButtonText == '') {
            $('#general_popup_button_left').hide();
        } else {
            $('#general_popup_button_left').html(leftButtonText);
            $('#general_popup_button_left').show();
        }

        switch (type) {
            case 'success':
                $('#general_popup_body').addClass('alert-success');
                $('#general_popup_button_right').addClass('btn-success');
                break;
            case 'warning':
                $('#general_popup_body').addClass('alert-warning');
                $('#general_popup_button_right').addClass('btn-warning');
                break;
            case 'error':
                $('#general_popup_body').addClass('alert-danger');
                $('#general_popup_button_right').addClass('btn-danger');
                break;
            default:
                break;
        }

        $('#generalPopupModal').modal('show');
    },
    closeGeneralPopup: function() {
        $('#generalPopupModal').modal('hide');
    },
    closeWarningModal: function () {
        $('#warningMessageModal').modal('hide');
    }
}