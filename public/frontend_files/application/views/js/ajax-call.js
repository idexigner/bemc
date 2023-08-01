var mimsServerAPI = {
    showErrorPopup: true,
   // timeOutInterval: 12000,
   // timeOutInterval: 1200000,
     timeOutInterval: 0,
    clearConsole: function() {
        // if(window.console ) {
        //     console.clear();
        // }
    },
    getServerData: function (actionType, serverURL, dataType, methodName, callback) {
        
        console.log('Ajax URL: '+serverURL);
        var ajaxTime= new Date().getTime();
        var returnValue = false;
        $.ajax({
            cache: false,
            type: actionType,
            url: serverURL,
            dataType: dataType === '' ? 'text' : dataType,
            success: function(data, textStatus, jqXHR) {
                returnValue = data.response;
                mimsServerAPI.clearConsole();
            },
            error: function(jqXHR, textStatus, errorThrown){
                //mimsPopup.showGeneralPopup('error', 'Error!!!', 'Server Error!!!', mimsErrorMessages.general_error_msg, 'Ok');
                mimsServerAPI.clearConsole();
            },
            complete: function(jqXHR, textStatus){
                $("#loaderModal").modal('hide');
                
                if (textStatus == 'timeout') {
                    var errorMsg = navigator.onLine ? mimsErrorMessages.general_error_msg : mimsErrorMessages.internet_connection_error_msg;
                    //mimsPopup.showGeneralPopup('error', 'Error!!!', 'Server Error!!!', errorMsg, 'Ok');
                }
                mimsServerAPI.clearConsole();
            },
            timeout: this.timeOutInterval
        }).done(function(){
            mimsServerAPI.showErrorPopup = true;
            mimsServerAPI.clearConsole();
            callback(returnValue);
        });
    },
    postDataToServer: function (serverURL, postData, dataType, methodName, callback){
        if (mimsGlobals.loggingEnable) console.log(serverURL);
        var ajaxTime = new Date().getTime();
        var returnValue = false;
        $.ajax({
            cache: false,
            type: 'POST',
            url: serverURL,
            data : postData,
            dataType: dataType === '' ? 'text' : dataType,
            beforeSend: function(){

            },
            complete: function(jqXHR, textStatus){
                if ($("#loaderModal").css("display") == "block") $("#loaderModal").modal('hide');
                if (textStatus == 'timeout') {
                    var errorMsg = navigator.onLine ? mimsErrorMessages.general_error_msg : mimsErrorMessages.internet_connection_error_msg;
                    //mimsPopup.showGeneralPopup('error', 'Error!!!', 'Server Error!!!', errorMsg, 'Ok');
                }

                mimsServerAPI.clearConsole();
            },
            success: function(data, textStatus, jqXHR) {
                returnValue = data.response;
                mimsServerAPI.clearConsole();
            },
            error: function(jqXHR, textStatus, errorThrown){
                //mimsPopup.showGeneralPopup('error', 'Error!!!', 'Server Error!!!', mimsErrorMessages.general_error_msg, 'Ok');
                mimsServerAPI.clearConsole();
            },
            timeout: this.timeOutInterval
        }).done(function(){
            var totalTime = new Date().getTime() - ajaxTime;
            if (mimsGlobals.loggingEnable) console.log("Server Response Time: " + parseInt(totalTime / 1000) + " seconds");
            mimsServerAPI.showErrorPopup = true;
            mimsServerAPI.clearConsole();
            callback(returnValue);
        });
    },
    getServerReportData: function (actionType, serverURL, dataType, methodName, callback) {
        if (mimsGlobals.loggingEnable) console.log(serverURL);
        var ajaxTime= new Date().getTime();
        var returnValue = false;
        $.ajax({
            cache: false,
            type: actionType,
            url: serverURL,
            dataType: dataType === '' ? 'text' : dataType,
            success: function(data, textStatus, jqXHR) {
                returnValue = data.response;
                mimsServerAPI.clearConsole();
            },
            error: function(jqXHR, textStatus, errorThrown){
                //mimsPopup.showGeneralPopup('error', 'Error!!!', 'Server Error!!!', mimsErrorMessages.general_error_msg, 'Ok');
                mimsServerAPI.clearConsole();
            },
            complete: function(jqXHR, textStatus){
                if (textStatus == 'timeout') {
                    var errorMsg = navigator.onLine ? mimsErrorMessages.general_error_msg : mimsErrorMessages.internet_connection_error_msg;
                    //mimsPopup.showGeneralPopup('error', 'Error!!!', 'Server Error!!!', errorMsg, 'Ok');
                } else if (textStatus == 'abort') {
                    if (this.showErrorPopup) {
                        //mimsPopup.showGeneralPopup('error', 'Error!!!', 'Server Error!!!', mimsErrorMessages.general_error_msg, 'Ok');
                    }
                }
                mimsServerAPI.clearConsole();
            },
            timeout: this.timeOutInterval
        }).done(function(){
            var totalTime = new Date().getTime()-ajaxTime;
            if (mimsGlobals.loggingEnable) console.log("Server Response Time: " + parseInt(totalTime / 1000) + " seconds");
            this.showErrorPopup = true;
            mimsServerAPI.clearConsole();
            callback(returnValue);
        });
    }
}
