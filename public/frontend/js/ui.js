$(function() {

	// phone nav buttons (close one when the other one is triggered)
	$('#navbarMenuButton').click(function(){
		$('#navbarSearch').collapse('hide')
	})
	$('#navbarSearchButton').click(function(){
		$('#navbarMenu').collapse('hide')
	})

  // search tabs
	$(".search-tabs li").click(function(e) {
	  e.preventDefault();
	  $(".search-tabs li").removeClass("active");
		$(this).addClass("active");
		
		if($(this).hasClass('brand') || $(this).hasClass('generic') || $(this).hasClass('manufacturer')) {
			$('.alphabets').removeClass('hide')
		} else {
			$('.alphabets').addClass('hide')
		}
	});
	// search radio in nav
	$('input[name="search-category"]').click(function(){
		if($(this).val() === 'brand' || $(this).val() === 'generic' || $(this).val() === 'manufacturer') {
			$('.alphabets').removeClass('remove')
		} else {
			$('.alphabets').addClass('remove')
		}
	})

	// image viewer
	var viewer = ImageViewer();
	$('.gallery-items').click(function () {
		var imgSrc = this.src,
				highResolutionImage = $(this).data('high-res-img');

		viewer.show(imgSrc, highResolutionImage);
	});

	

	// end of ui.js
});
