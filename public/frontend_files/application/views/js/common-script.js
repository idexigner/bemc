var SERVER_ENVIRONMENT = 'dev';
var mimsGlobals = {
    loggingEnable: SERVER_ENVIRONMENT == 'dev' ? true : false,
    methodCanRun: true,
    showCallingMethod: SERVER_ENVIRONMENT == 'prod' ? 0 : 1,
    addressInfo: [],
    countryInfo: [],
    stateInfo: [],
    cityInfo: []
}

var mimsErrorMessages = {
    general_error_msg: 'Unknown error happened.',
    internet_connection_error_msg: 'Please check your internet connectivity. No internet connectivity available now.'
}

var serverCallsInfo = [];
serverCallsInfo[0] = [];        // store url
serverCallsInfo[1] = [];        // store status

var updateServerCallStatus = {
    getServerCallStatus: function (serverUrl) {
        var alreadyHave = $.inArray(serverUrl, serverCallsInfo[0]);
        if (alreadyHave > -1){
            return serverCallsInfo[1][alreadyHave];
        } else {
            return false;
        }
    },
    setServerCallStatus: function (serverUrl, status) {
//            console.dir(serverCallsInfo);
        var callStatus = this.getServerCallStatus(serverUrl);
        if (callStatus === false) {
            serverCallsInfo[0][serverCallsInfo[0].length] = serverUrl;
            serverCallsInfo[1][serverCallsInfo[1].length] = status;
        } else {
            serverCallsInfo[1][$.inArray(serverUrl, serverCallsInfo[0])] = status;
        }
//            console.dir(serverCallsInfo);
    }
}

var mimsTextMethods = {
    initCKEditor: function (objectID, readOnly) {
        CKEDITOR.replace( objectID, {readOnly: readOnly} );
    },
    destroyCKEditor: function (objectID, readOnly, initiateAgain) {
        if (CKEDITOR.instances[objectID]) {
            CKEDITOR.instances[objectID].destroy();
        }
        if (initiateAgain) setTimeout(mimsTextMethods.initCKEditor,1000, objectID, readOnly);
    },
    enableRichTextEditorByClass: function (className) {
        var default_class_name = 'ckeditor-rich-text';
        className = className ? className : default_class_name;
        $('.'+className).each(function() {
            setTimeout(mimsTextMethods.destroyCKEditor,1000, this.id, false, true);
        });
    },
    enableRichTextEditorByID: function (objectID, readOnly) {
        if (mimsGlobals.loggingEnable) mimsLog.logMethod('enableRichTextEditorByID: ', ['objectID', 'readOnly'], [objectID, readOnly]);
        if (!objectID) return false;

        if (CKEDITOR.instances[objectID]) {
            setTimeout(mimsTextMethods.destroyCKEditor,1000, objectID, readOnly, true);
        } else {
            mimsTextMethods.initCKEditor(objectID, readOnly);
        }
    },
    setRichTextValueByClass: function (className, objectValue) {
//        var default_class_name = 'ckeditor-rich-text';
//        className = className ? className : default_class_name;
        $('.'+className).each(function() {
            if (this.id && CKEDITOR.instances[this.id] != undefined) CKEDITOR.instances[this.id].setData(objectValue);
        });
    },
    setRichTextValueByID: function (objectID, objectValue) {
        // if (mimsGlobals.loggingEnable) mimsLog.logMethod('enableRichTextEditorByID: ', ['objectID', 'objectValue'], [objectID, objectValue]);
        CKEDITOR.instances[objectID].setData(objectValue);
    },
    getRichTextValueByID: function (objectID) {
        return CKEDITOR.instances[objectID].getData();
    },
    getRichTextValueWithoutHTMLByID: function (objectID) {
        var html = CKEDITOR.instances[objectID].getSnapshot();
        var dom = document.createElement("DIV");
        dom.innerHTML = html;
        var plain_text = (dom.textContent || dom.innerText);
//        console.log('Inner Text: '+plain_text);
        return plain_text;
    }
}

var mimsCommonMethods = {
    getQueryStringParams: function () {
        var queryString = [];
        var hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');
            queryString[hash[0]] = hash[1];
        }

        return queryString;
    },
    urlStatusResult: {
        CouldNotLoadUrl:1,
        UrlLoadedButContentCannotBeAccessed:2,
        UrlLoadedContentCanBeAccessed:3
    },
    checkWebURLAvailability: function (webURL, callback) {
        var timeout=15000;
        var timer=setTimeout(function() {
            ifr.remove();
            //console.log('return from 138');
            callback(mimsCommonMethods.urlStatusResult.CouldNotLoadUrl,webURL);
        },timeout);
        var ifr=$('<iframe id="test-iframe"></iframe>')
            .hide()
            .appendTo('body');
        ifr.on('load',function() {
            if (timer) clearTimeout(timer);
            var result;
            try {
                var iframe=ifr[0];
                var doc=(iframe.contentWindow||iframe.contentDocument).location.href;
                //console.log('return from 150');
                result=mimsCommonMethods.urlStatusResult.UrlLoadedContentCanBeAccessed;
            } catch(ex) {
                //console.log('return from 153');
                result=mimsCommonMethods.urlStatusResult.UrlLoadedButContentCannotBeAccessed;
            }
            ifr.remove();
            callback(result,webURL);
        });
        ifr.attr('src',webURL);
    },
    loadJS: function (filePath) {
        $.getScript(filePath, function( data, textStatus, jqxhr ) {});
    },
    loadCSSintoHead: function (href) {
        var cssLink = $("<link>");
        $("head").append(cssLink); //IE hack: append before setting href

        cssLink.attr({
            rel:  "stylesheet",
            type: "text/css",
            href: href
        });
    },
    loadCSSintoBody: function (href) {
        var cssLink = $("<link>");
        $("body").append(cssLink); //IE hack: append before setting href

        cssLink.attr({
            rel:  "stylesheet",
            type: "text/css",
            href: href
        });
    },
    isValidEmailAddress: function (email_id) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email_id);
    },
    sortByArrayIndexName: function (arrayInfo, indexName) {
        var temp1, temp2;
        for (var j = 0; j < arrayInfo.length - 1; j++) {
            for (var i = j + 1; i < arrayInfo.length; i++) {
                temp1 = arrayInfo[j];
                temp2 = arrayInfo[i];
                if (temp1[indexName] > temp2[indexName]) {
                    arrayInfo[j] = temp2;
                    arrayInfo[i] = temp1;
                }
            }
        }

        return arrayInfo;
    },
    convertMinuteToHourMinute: function (value) {
        var minute = value % 60;
        var hour = (value - minute) / 60;

        minute = minute < 10 ? '0' + minute : minute;
        hour = hour < 10 ? '0' + hour : hour;

        return hour + ':' + minute;
    },
    convertSecondToHourMinuteSecond: function (value) {
        var second = value % 60;
        var minute = parseInt((value - second) / 60) % 60;
        var hour = parseInt((value - minute * 60 - second) / 3600);

        return [hour, minute, second];
    },
    convertSecondToDayHourMinute: function (value) {
        var dd = parseInt(value / 86400);
        value = value % 86400;
        var hh = parseInt(value / 3600);
        value = value % 3600;
        var mm = parseInt(value / 60);

        return [dd, hh, mm];
    },
    decodeEntities: function (encodedString) {
        var textArea = document.createElement('textarea');
        textArea.innerHTML = encodedString;
        return textArea.value;
    },
    sortByArrayIndex: function (array, key) {
        function SortByName(a, b){
            var aName = a.key.toLowerCase();
            var bName = b.key.toLowerCase();
            return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
        }

        return array.sort(SortByName);
    },
    htmlEncode: function (value) {
        return $('<div/>').text(value).html();
    },
    htmlDecode: function (value) {
        return $('<div/>').html(value).text();
    },
    disableOtherMethods: function (callFrom){
        if (mimsGlobals.showCallingMethod) {
            //if (mimsGlobals.loggingEnable) console.log(callFrom);
        }

//            $('p').off('click');
//            $('div').off('click');
//            $('a').off('click');

        mimsGlobals.methodCanRun = false;
    },

    disableAllFieldofModal: function (modalID) {
        $("#"+modalID+" :input").attr("disabled", true);
        $("#"+modalID+" :button.close").attr("disabled", false);
    },
    enableOtherMethods: function (callFrom){
        if (mimsGlobals.showCallingMethod) {
            //if (mimsGlobals.loggingEnable) console.log(callFrom);
        }

//            $('p').on('click');
//            $('div').on('click');
//            $('a').on('click');

        mimsGlobals.methodCanRun = true;
    },
    placeDatePicker: function(objectID) {
        $( document ).on(
            'DOMMouseScroll mousewheel scroll',
            '#'+objectID,
            function(){
                window.clearTimeout( mimsGlobals.placeDatePickerMethodObject );
                mimsGlobals.placeDatePickerMethodObject = window.setTimeout( function(){
                    $("#"+objectID).datepicker('place');
                    //if (mimsGlobals.loggingEnable) console.log(objectID);
                }, 100 );
            }
        );
    },
    checkForSession: function () {
//        if (mimsGlobals.loggingEnable) console.log("footer");
        var str="chksession=true";
        jQuery.ajax({
            type: "POST",
            url: SITE_URL + 'APIUser/checkSession',
            cache: false,
            success: function(res){
                if(res == "1") {
                    top.location = SITE_URL + 'APIUser/logout';
                }
            }
        });
    },
    getRandomString: function (length) {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for (var i = 0; i < length; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    }
}

var mimsValidateForm = {
    zipCodeRegularExp: {
        algeria: '^([1-9][0-9][0-9][0-9][0-9])$',
        argentina: '^([1-9][0-9][0-9][0-9])$',
        australia: '^([1-9][0-9][0-9][0-9][0-9][0-9][0-9])$',
        austria: '^([1-9][0-9][0-9][0-9])$',
        belgium: '^([1-9][0-9][0-9][0-9])$',
        brazil: '^([1-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9])$',
        canada: '^([a-zA-Z][0-9][a-zA-Z][ ][0-9][a-zA-Z][0-9])$',
        chile: '^[a-z0-9]{1,7}$',
        china: '^([1-9][0-9][0-9][0-9][0-9][0-9])$',
        croatia: '^([1-9][0-9][0-9][0-9][0-9])$',
        cyprus: '^([1-9][0-9][0-9][0-9])$',
        czech: '^([1-9][0-9][0-9][0-9][ ][0-9][0-9])$',
        denmark: '^([1-9][0-9][0-9][0-9])$',
        faroe_islands: '^([1-9][0-9][0-9])$',
        finland: '^([1-9][0-9][0-9][0-9][0-9])$',
        france: '^([1-9][0-9][0-9][0-9][0-9])$',
        germany: '^([1-9][0-9][0-9][0-9][0-9])$',
        greece: '^([1-9][0-9][0-9][0-9][0-9])$',
        hungary: '^([1-9][0-9][0-9][0-9][0-9][0-9][0-9])$',
        iceland: '^([1-9][0-9][0-9][0-9][0-9][0-9])$',
        india: '^([1-9][0-9][0-9][0-9][0-9][0-9])$',
        indonesia: '^([1-9][0-9][0-9][0-9][0-9])$',
        iran: '^([1-9][0-9][0-9][0-9][0-9])$',
        israel: '^([1-9][0-9][0-9][0-9][0-9])$',
        italy: '^([1-9][0-9][0-9][0-9][0-9])$',
        japan: '^([1-9][0-9][0-9][0-9][0-9][0-9][0-9])$',
        kazakhstan: '^([1-9][0-9][0-9][0-9][0-9][0-9])$',
        kuwait: '^([1-9][0-9][0-9][0-9][0-9])$',
        lesotho: '^([1-9][0-9][0-9])$',
        liechtenstein: '^([1-9][0-9][0-9][0-9])$',
        luxembourg: '^([1-9][0-9][0-9][0-9])$',
        malaysia: '^([1-9][0-9][0-9][0-9][0-9])$',
        mexico: '^([1-9][0-9][0-9][0-9][0-9])$',
        monaco: '^([1-9][0-9][0-9][0-9][0-9])$',
        nepal: '^([1-9][0-9][0-9][0-9][0-9][0-9])$',
        netherlands: '^([0-9][0-9][0-9][ ][a-zA-Z][a-zA-Z])$',
        new_zealand: '^([1-9][0-9][0-9][0-9])$',
        north_korea: '^[a-z0-9_-]{1,7}$',
        norway: '^([1-9][0-9][0-9][0-9])$',
        philippines: '^([1-9][0-9][0-9][0-9])$',
        poland: '^([1-9][0-9][-][0-9][0-9][0-9])$',
        portugal: '^([1-9][0-9][0-9][0-9][-][0-9][0-9][0-9]|[1-9][0-9][0-9][0-9])$',
        romania: '^([1-9][0-9][0-9][0-9][0-9][0-9][0-9])$',
        russian_federation: '^([1-9][0-9][0-9][0-9][0-9][0-9])$',
        saudi_arabia: '^([1-9][0-9][0-9][0-9][0-9])$',
        singapore: '^([1-9][0-9][0-9][0-9][0-9][0-9])$',
        slovakia: '^([1-9][0-9][0-9][0-9][ ][0-9][0-9])$',
        slovenia: '^([1-9][0-9][0-9][0-9])$',
        south_africa: '^([1-9][0-9][0-9][0-9])$',
        south_korea: '^([1-9][0-9][0-9][-][0-9][0-9][0-9])$',
        spain: '^([1-9][0-9][0-9][0-9][0-9])$',
        sweden: '^([1-9][0-9][0-9][0-9][ ][0-9][0-9])$',
        switzerland: '^([1-9][0-9][0-9][0-9])$',
        taiwan: '^([1-9][0-9][0-9])$',
        thailand: '^([1-9][0-9][0-9][0-9][0-9])$',
        tunisia: '^([1-9][0-9][0-9][0-9])$',
        turkey: '^([1-9][0-9][0-9][0-9][0-9])$',
        ukraine: '^([1-9][0-9][0-9][0-9][0-9])$',
        united_kingdom: '^[a-z0-9_-]{1,9}$',
        united_states:'^([0-9][0-9][0-9][0-9][0-9]|[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9])$',
        venezuela: '^([1-9][0-9][0-9][0-9])$',
        vietnam: '^([1-9][0-9][0-9][0-9][0-9])$',
        yugoslavia: '^([1-9][0-9][0-9][0-9][0-9])$'
    },
    isValidZipcode: function (country, zipcode) {
        return true;
        //if (mimsGlobals.loggingEnable) console.log(country+" "+zipcode);
        country = country.replace(" ", "_");
        //if (mimsGlobals.loggingEnable) console.log(country);
        country = country.toLowerCase();
        var regExp = this.zipCodeRegularExp[country];

        if (regExp == undefined) {
            //if (mimsGlobals.loggingEnable) console.log("Zipcode exp is undefined for "+country);
        }
        var patt = new RegExp(regExp);
        return patt.test(zipcode);
    }
}

var updateAddressInformation = {
    updateAutoCompletionValues: function () {
//            if ($( "#countryName").length > 0) {
//                $( "#countryName" ).keyup(function() {
//                    var country_name = $("#countryName").val();
//                    country_name = $.trim(country_name);
//                    updateAddressInformation.updateCity(country_name);
//                    updateAddressInformation.updateState(country_name);
//                    if (mimsGlobals.loggingEnable) console.log(country_name);
//                });
//            } else if ($( "#pcountryName").length > 0) {
//                $( "#pcountryName" ).keyup(function() {
//                    var country_name = $("#pcountryName").val();
//                    if (mimsGlobals.loggingEnable) console.log(country_name);
//                    country_name = $.trim(country_name);
//                    if (mimsGlobals.loggingEnable) console.log(country_name);
//                    updateAddressInformation.updateCity(country_name);
//                    updateAddressInformation.updateState(country_name);
//                });
//            }
    },
    updateCountry: function(){
        if (mimsGlobals.addressInfo.length == 0){
            var serverURL = SITE_URL + 'APIAddress/getAddressInformation';
            $.ajax({
                cache: true,
                type: "GET",
                url: serverURL,
                dataType: "JSONp",
                success: function(addressData, textStatus, jqXHR) {
                    mimsGlobals.addressInfo = addressData;
                    if (mimsGlobals.addressInfo) {
                        for (var i = 0; i < mimsGlobals.addressInfo.length; i++){
                            if (mimsGlobals.addressInfo[i].name == null || mimsGlobals.addressInfo[i].name == undefined || mimsGlobals.addressInfo[i].name == '') continue;
                            mimsGlobals.countryInfo[i] = mimsGlobals.addressInfo[i].name;
                        }

                        if ($( "#countryName").length > 0) {
                            $( "#countryName" ).autocomplete({
                                source: mimsGlobals.countryInfo,
                                select: function( event, ui ) {
                                    var country_name = $("#countryName").val();
                                    country_name = $.trim(country_name);
                                    updateAddressInformation.updateCity(country_name);
                                    updateAddressInformation.updateState(country_name);
                                }
                            });
                        }

                        if ($( "#pcountryName").length > 0) {
                            $( "#pcountryName" ).autocomplete({
                                source: mimsGlobals.countryInfo,
                                select: function( event, ui ) {
                                    var country_name = $("#pcountryName").val();
                                    country_name = $.trim(country_name);
                                    updateAddressInformation.updateCity(country_name);
                                    updateAddressInformation.updateState(country_name);
                                }
                            });
                        }
                    }
                }
            });
        } else {
            if ($( "#countryName").length > 0) {
                $( "#countryName" ).autocomplete({
                    source: mimsGlobals.countryInfo,
                    select: function( event, ui ) {
                        var country_name = $("#countryName").val();
                        country_name = $.trim(country_name);
                        updateAddressInformation.updateCity(country_name);
                        updateAddressInformation.updateState(country_name);
                    }
                });
            }

            if ($( "#pcountryName").length > 0) {
                $( "#pcountryName" ).autocomplete({
                    source: mimsGlobals.countryInfo,
                    select: function( event, ui ) {
                        var country_name = $("#pcountryName").val();
                        country_name = $.trim(country_name);
                        updateAddressInformation.updateCity(country_name);
                        updateAddressInformation.updateState(country_name);
                    }
                });
            }
        }
    },
    updateState: function (country) {
        //if (mimsGlobals.loggingEnable) console.log(country);
        mimsGlobals.stateInfo = [];
        for (var i = 0; i < mimsGlobals.addressInfo.length; i++){
            if (mimsGlobals.addressInfo[i].name == country){
                mimsGlobals.stateInfo = mimsGlobals.addressInfo[i].states;
                break;
            }
        }

        if ($( "#StateName" ).length > 0) {
            $( "#StateName" ).autocomplete({
                source: mimsGlobals.stateInfo
            });
        }

        if ($( "#pstateName" ).length > 0) {
            $( "#pstateName" ).autocomplete({
                source: mimsGlobals.stateInfo
            });
        }
    },
    updateCity: function (country) {
        mimsGlobals.cityInfo = [];
        for (var i = 0; i < mimsGlobals.addressInfo.length; i++){
            if (mimsGlobals.addressInfo[i].name == country){
                mimsGlobals.cityInfo = mimsGlobals.addressInfo[i].cities;
                break;
            }
        }

        if ($( "#CityName").length > 0) {
            $( "#CityName" ).autocomplete({
                source: mimsGlobals.cityInfo
            });
        }

        if ($( "#pcityName").length > 0) {
            $( "#pcityName" ).autocomplete({
                source: mimsGlobals.cityInfo
            });
        }
    }
}

function removeTooltip(obj){
    $(obj).tooltip('hide');
}
