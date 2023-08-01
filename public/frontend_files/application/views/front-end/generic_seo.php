<?php

?>
<div id="url_button">
	<input type="button" value="1" onclick="openGenericData(1)">
</div>
<script>
	var total_Generic = <?php echo count($Generics);?>;
	var Generics = <?php echo json_encode($Generics);?>;
	var current_index = 0;

	function openGenericData(index) {
		for (var i = index * 100; i < (index+1) * 100; i++) {
			// console.log(Generics[i].ID);
			window.open('https://www.rxmimsbd.com/Brand/searchBrandInformationForSEO?Type=generic&ProductType=1&Value='+Generics[i].Name);
			// $(this).attr('https://www.rxmimsbd.com/Generic/showGenericDetail?GenericID='+Generics[i].ID, '_blank');
		}
	}

	function populateButtons(total_Generic) {
		$('#url_button').html('');
		var total_button = Math.ceil(total_Generic / 100);
		for (var i = 0; i < total_button; i++) {
			$('#url_button').append('<input type="button" value="'+i+'" onclick="openGenericData('+i+')">');
		}
	}

	function loadBandDetail() {
		for (var i = 0; i < total_Generic; i++) {
			window.setTimeout(loadWindow, (i) * 60000);
		}
	}

	function loadWindow() {
		window.open('https://www.rxmimsbd.com/Brand/searchBrandInformationForSEO?Type=generic&ProductType=1&Value='+Generics[current_index].Name);
		console.log('Current Index: '+current_index);
		current_index++;
	}

	loadBandDetail();
	// populateButtons(total_Generic);
</script>
