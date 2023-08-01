<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
    var commonMethods = {
        enableCKEditorByID: function (objectID) {
            CKEDITOR.replace( objectID, {
                readOnly: false,
                allowedContent: true,
                forcePasteAsPlainText : true,
                fontSize_defaultLabel: '14'
            } );
        },
        enableCKEditorByIDs: function (objectIDs) {
            for (var i = 0; i < objectIDs.length; i++) {
                commonMethods.enableCKEditorByID(objectIDs[i]);
            }
        },
        getRichTextValueByID: function (objectID) {
            return CKEDITOR.instances[objectID].getData();
        },
        setRichTextValueByID: function (objectID, objectValue) {
            CKEDITOR.instances[objectID].setData(objectValue);
        }
    }
</script>
