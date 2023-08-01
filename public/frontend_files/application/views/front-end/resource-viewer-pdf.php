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
<div id="pdf-resource"></div>
<script type="application/javascript">
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        resourceObject.loadPDFFile('<?php echo base_url().'ResourceFiles/'.$resource[0]['ResourcePath']?>', true);
    } else {
        resourceObject.loadPDFFile('<?php echo base_url().'ResourceFiles/'.$resource[0]['ResourcePath']?>', false);
    }
</script>
<style>
    canvas {
        width: 100%;
    }
</style>