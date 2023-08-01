<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var resourceObject = {
        currPage: 1, //Pages are 1-based not 0-based
        numPages: 0,
        thePDF: null,
        loadPDFFile: function (filePath, inMobile) {
            console.log('Method Name: resourceObject.loadPDFFile Param:  filePath, inMobile: '+[filePath, inMobile].toString());
            $('#pdf-resource').html('<iframe id="resource-pdf" src="https://docs.google.com/gview?url='+filePath+'&embedded=true" type="application/pdf" width="100%" height="100%" frameborder="0" allowfullscreen="allowfullscreen"></iframe>');
            // $("#resource-pdf").contents().find(".ndfHFb-c4YZDc-Wrql6b").remove();
        },
        handlePages: function (page) {
            console.log('Method Name: resourceObject.handlePages Param: page: '+[page].toString());
            //This gives us the page's dimensions at full scale
            var viewport = page.getViewport( 1 );

            //We'll create a canvas for each page to draw it on
            var canvas = document.createElement( "canvas" );
            canvas.style.display = "block";
            var context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            //Draw it on the canvas
            page.render({canvasContext: context, viewport: viewport});

            //Add it to the web page
            document.body.appendChild( canvas );

            //Move to next page
            resourceObject.currPage++;
            if ( resourceObject.thePDF !== null && resourceObject.currPage <= resourceObject.numPages ) {
                resourceObject.thePDF.getPage( resourceObject.currPage ).then( resourceObject.handlePages );
            }
        }
    }
</script>