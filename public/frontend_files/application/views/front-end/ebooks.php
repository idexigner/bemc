<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 6:56 PM
 */
?>
<script src="<?php echo base_url().'application/views/plugins/turnjs4/js/modernizr.2.5.3.min.js';?>"></script>
<!-- ebook top slider start -->
<div class="<?php echo $source;?>-top-slider-container container" style="top: 20px">
	<div class="<?php echo $source;?>-top-slider-wrapper">
		<div id="<?php echo $source;?>-top-slider"></div>
	</div>
</div>
<!-- ebook top slider end -->
<div style="padding-top: 20px">
	<!-- content -->
	<div class="go_to_page">
		<div class="input-group">
			<input type="number" maxlength="3" id="ebookPageNo" class="form-control" placeholder="Page number">
			<div class="input-group-append">
				<button class="btn btn-success" type="button" value="Go" onclick="ebook.goToPage()">Go</button>
			</div>
		</div>
		<div class="zoom-icon zoom-icon-in"></div>
	</div>
	<div class="flipbook-viewport">
		<div class="container">
			<div class="flipbook"></div>
		</div>
	</div>
</div>

<!-- ebook bottom slider start -->
<div class="<?php echo $source;?>-bottom-slider-container container">
	<div class="<?php echo $source;?>-bottom-slider-wrapper">
		<div id="<?php echo $source;?>-bottom-slider"></div>
	</div>
</div>
<!-- ebook bottom slider end -->
<script type="text/javascript">
    ebook.title = '<?php echo $ebook_info['Title']?>';
    ebook.folderName = '<?php echo $ebook_info['FolderName']?>';
    ebook.fileNamePrefix = '<?php echo $ebook_info['FileNamePrefix']?>';
    ebook.fileExtension = '<?php echo $ebook_info['FileExtension']?>';
    ebook.numberOfPage = '<?php echo $ebook_info['NumberOfPage']?>';

	function ebookZoomIn () {
		var size = $(".flipbook").turn("size");
		$(".flipbook").turn("size", size.width * 0.9, size.height * 0.9);
	}

	function ebookZoomOut () {
		var size = $(".flipbook").turn("size");
		$(".flipbook").turn("size", size.width * 1.09, size.height * 1.09);
	}

	ebook.populateEBookPages();
    function loadApp() {
    	$('.flipbook').turn({
            // Width

            width:430,

            // Height

            height:610,

            // Elevation

            elevation: 50,

            // Hardware acceleration

            acceleration: !isChrome(),

            // Enable gradients

            gradients: true,

            // Auto center this flipbook

            autoCenter: true,
            display: "single",

            // Events
            when: {
                turned: function(event, page, view) {
					if (page==1) {
                        $(this).turn('peel', 'br');
                    }
                },
                swipeLeft: function() {
					$(this).zoom('flipbook').turn('next');
                },
                swipeRight: function() {
					$(this).zoom('flipbook').turn('previous');
                },
                zoomIn: function () {
					$('.flipbook').removeClass('animated').addClass('zoom-in');
                    $('.zoom-icon').removeClass('zoom-icon-in').addClass('zoom-icon-out');
                },
                zoomOut: function () {
					$('.zoom-icon').removeClass('zoom-icon-out').addClass('zoom-icon-in');
                    setTimeout(function(){
						$('.flipbook').addClass('animated').removeClass('zoom-in');
                        resizeViewport();
                    }, 0);
                }
            }
        });

        //Initialize the zoom viewport
        $('.flipbook-viewport').zoom({
            flipbook: $('.flipbook')
        });

        //Binds the single tap event to the zoom function
        // $('.flipbook-viewport').bind('zoom.tap', zoomTo);

        //Optional, calls the resize function when the window changes, useful when viewing on tablet or mobile phones
        $(window).resize(function() {
            resizeViewport();
        }).bind('orientationchange', function() {
            resizeViewport();
        });

        //Must be called initially to setup the size
        resizeViewport();

        function zoomTo(event) {
			setTimeout(function() {
				if ($('.flipbook-viewport').data().regionClicked) {
                    $('.flipbook-viewport').data().regionClicked = false;
                } else {
                    if ($('.flipbook-viewport').zoom('value')==1) {
                        $('.flipbook-viewport').zoom('zoomIn', event);
                    } else {
                        $('.flipbook-viewport').zoom('zoomOut');
                    }
                }
            }, 1);
        }

        function resizeViewport() {
			var width = $(window).width(),
                height = $(window).height(),
                options = $('.flipbook').turn('options');

            $('.flipbook-viewport').css({
                width: width,
                height: height
            }).zoom('resize');
        }

        document.addEventListener("contextmenu", function(e){
			e.preventDefault();
        }, false);
        document.addEventListener("keydown", function(e) {
			if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                disabledEvent(e);
            }
            // "J" key
            if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                disabledEvent(e);
            }
            // "S" key + macOS
            if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                disabledEvent(e);
            }
            // "U" key
            if (e.ctrlKey && e.keyCode == 85) {
                disabledEvent(e);
            }
            // "F12" key
            if (e.keyCode == 123) {
                disabledEvent(e);
            }
        }, false);

        function disabledEvent(e){
			if (e.stopPropagation){
                e.stopPropagation();
            } else if (window.event){
                window.event.cancelBubble = true;
            }
            e.preventDefault();
            return false;
        }
    }

    // Zoom icon
    $('.zoom-icon').bind('mouseover', function() {
		if ($(this).hasClass('zoom-icon-in'))
            $(this).addClass('zoom-icon-in-hover');

        if ($(this).hasClass('zoom-icon-out'))
            $(this).addClass('zoom-icon-out-hover');

    }).bind('mouseout', function() {
		if ($(this).hasClass('zoom-icon-in'))
            $(this).removeClass('zoom-icon-in-hover');

        if ($(this).hasClass('zoom-icon-out'))
            $(this).removeClass('zoom-icon-out-hover');

    }).bind('click', function() {
    	
        if ($(this).hasClass('zoom-icon-in')){
            $('.flipbook-viewport').zoom('zoomIn');
        }
        else if ($(this).hasClass('zoom-icon-out')) {
            $('.flipbook-viewport').zoom('zoomOut');
        }

    });

    // Load the HTML4 version if there's not CSS transform

    yepnope({
        test : Modernizr.csstransforms,
        yep: ['<?php echo base_url().'application/views/plugins/turnjs4/js';?>/turn.min.js'],
        nope: ['<?php echo base_url().'application/views/plugins/turnjs4/js';?>/turn.html4.min.js'],
        both: ['<?php echo base_url().'application/views/plugins/turnjs4/js';?>/basic.js','<?php echo base_url().'application/views/plugins/turnjs4/js';?>/zoom.min.js','<?php echo base_url().'application/views/plugins/turnjs4/js';?>/basic.css'],
        complete: loadApp
    });

    $(".flipbook-viewport").bind("zoom.resize", function(event, newZoom, page, pageElement) {
        if (newZoom == 2){
            $('.flipbook').addClass('mobile-zoom');
            $('.zoom-icon').removeClass('zoom-icon-in').addClass('zoom-icon-out');
        }
        else if (newZoom == 1) {
            $('.flipbook').removeClass('mobile-zoom');
            $('.zoom-icon').removeClass('zoom-icon-out').addClass('zoom-icon-in');
        }
    });

	<?php
	if (isset($source)) {
		echo "frontendCommonMethods.mainMenuActivation('".$source."');";
	} else {
		echo "frontendCommonMethods.mainMenuActivation('ebook');";
	}
	?>

	var is_mobile = false;
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		var is_mobile = true;
		$('.<?php echo $source;?>-bottom-slider-container').remove();
	}
	if (is_mobile == false) {
		frontendCommonMethods.getAdvertisement(['<?php echo $source;?>-top-slider'], 1);
		//frontendCommonMethods.getAdvertisement(['<?php //echo $source;?>//-bottom-slider'], 1);
	}
</script>
