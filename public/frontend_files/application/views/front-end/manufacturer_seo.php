<?php

?>
<div id="url_button">
	<input type="button" value="1" onclick="openManufacturerData(1)">
</div>
<script>
	var total_Manufacturer = <?php echo count($Manufacturers);?>;
	var Manufacturers = <?php echo json_encode($Manufacturers);?>;
	var current_index = 0;

	function openManufacturerData(index) {
		for (var i = index * 100; i < (index+1) * 100; i++) {
			// console.log(Manufacturers[i].ID);
			window.open('https://www.rxmimsbd.com/Brand/searchBrandInformationForSEO?Type=manufacturer&ProductType=1&Value='+Manufacturers[i].Name);
			// $(this).attr('https://www.rxmimsbd.com/Manufacturer/showManufacturerDetail?ManufacturerID='+Manufacturers[i].ID, '_blank');
		}
	}

	function populateButtons(total_Manufacturer) {
		$('#url_button').html('');
		var total_button = Math.ceil(total_Manufacturer / 100);
		for (var i = 0; i < total_button; i++) {
			$('#url_button').append('<input type="button" value="'+i+'" onclick="openManufacturerData('+i+')">');
		}
	}

	function loadBandDetail() {
		for (var i = 0; i < total_Manufacturer; i++) {
			window.setTimeout(loadWindow, (i) * 120000);
		}
	}

	function loadWindow() {
		window.open('https://www.rxmimsbd.com/Brand/searchBrandInformationForSEO?Type=manufacturer&ProductType=1&Value='+Manufacturers[current_index].Name);
		console.log('Current Index: '+current_index);
		current_index++;
	}

	loadBandDetail();
	// populateButtons(total_Manufacturer);
</script>
