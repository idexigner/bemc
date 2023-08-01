<?php

?>
<div id="url_button">
	<input type="button" value="1" onclick="openBrandData(1)">
</div>
<script>
	var total_brand = <?php echo count($BrandIDs);?>;
	var brand_ids = <?php echo json_encode($BrandIDs);?>;
	var current_index = 0;

	function openBrandData(index) {
		for (var i = index * 100; i < (index+1) * 100; i++) {
			// console.log(brand_ids[i].ID);
			window.open('https://www.rxmimsbd.com/Brand/showBrandDetail?BrandID='+brand_ids[i].ID);
			// $(this).attr('https://www.rxmimsbd.com/Brand/showBrandDetail?BrandID='+brand_ids[i].ID, '_blank');
		}
	}

	function populateButtons(total_brand) {
		$('#url_button').html('');
		var total_button = Math.ceil(total_brand / 100);
		for (var i = 0; i < total_button; i++) {
			$('#url_button').append('<input type="button" value="'+i+'" onclick="openBrandData('+i+')">');
		}
	}

	function loadBandDetail() {
		for (var i = 0; i < total_brand; i++) {
			window.setTimeout(loadWindow, (i) * 20000);
		}
	}

	function loadWindow() {
		window.open('https://www.rxmimsbd.com/Brand/showBrandDetail?BrandID='+brand_ids[current_index].ID);
		console.log('Current Index: '+current_index);
		current_index++;
	}

	loadBandDetail();
	// populateButtons(total_brand);
</script>
