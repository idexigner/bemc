<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 9/11/2018
 * Time: 11:14 PM
 */
?>
<script src="<?php echo base_url().'application/views/';?>js/jquery-3.3.1.min.js"></script>
<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
<div id="pdf-journal"></div>
<script type="application/javascript">
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        journalObject.loadPDFFile('<?php echo base_url().'JournalFiles/'.$journal[0]['JournalPath']?>', true);
    } else {
        journalObject.loadPDFFile('<?php echo base_url().'JournalFiles/'.$journal[0]['JournalPath']?>', false);
    }
</script>
<style>
    canvas {
        width: 100%;
    }
</style>
