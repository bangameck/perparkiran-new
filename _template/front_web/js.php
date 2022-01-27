<!-- JavaScripts
============================================= -->
<script src="<?= base_url(); ?>assets/web/js/jquery.js"></script>
<script src="<?= base_url(); ?>assets/web/js/plugins.min.js"></script>
<!-- Star Rating Plugin -->
<script src="<?= base_url(); ?>assets/web/js/components/star-rating.js"></script>
<script src="<?= base_url(); ?>assets/web/js/components/bs-filestyle.js"></script>
<script src="<?= base_url(); ?>assets/adm/js/sweet-alert/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/adm/js/sweet-alert/app.js"></script>
<!-- Footer Scripts
============================================= -->
<script src="<?= base_url(); ?>assets/web/js/functions.js"></script>
<!-- <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script> -->
<script src="<?= base_url(); ?>assets/adm/js/popover-custom.js"></script>

<!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
<script src="<?= base_url(); ?>assets/web/include/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="<?= base_url(); ?>assets/web/include/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<!-- SLIDER REVOLUTION EXTENSIONS  -->
	<script src="<?= base_url(); ?>assets/web/include/rs-plugin/js/extensions/revolution.extension.actions.min.js"></script>
	<script src="<?= base_url(); ?>assets/web/include/rs-plugin/js/extensions/revolution.extension.carousel.min.js"></script>
	<script src="<?= base_url(); ?>assets/web/include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script src="<?= base_url(); ?>assets/web/include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script src="<?= base_url(); ?>assets/web/include/rs-plugin/js/extensions/revolution.extension.migration.min.js"></script>
	<script src="<?= base_url(); ?>assets/web/include/rs-plugin/js/extensions/revolution.extension.navigation.min.js"></script>
	<script src="<?= base_url(); ?>assets/web/include/rs-plugin/js/extensions/revolution.extension.parallax.min.js"></script>
	<script src="<?= base_url(); ?>assets/web/include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script src="<?= base_url(); ?>assets/web/include/rs-plugin/js/extensions/revolution.extension.video.min.js"></script>
    <script src="<?= base_url(); ?>assets/adm/js/timeline/timeline-v-1/main.js"></script>
    <script src="<?= base_url(); ?>assets/adm/js/jquery-idle/src/jquery.idletimeout.js"></script>
<script src="<?= base_url(); ?>assets/adm/js/jquery-idle/src/jquery.idletimer.js"></script>
	<!-- CKEditor5 -->
<script src="<?= base_url(); ?>vendor/ckeditor5/build/ckeditor.js"></script>
<!-- Bootstrap Data Table Plugin -->
<script src="<?= base_url(); ?>assets/web/js/components/bs-datatable.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('.editor'), {

        toolbar: {
            items: [
                '|',
                'bold',
                'italic',
                'underline',
                'link',
                'fontFamily',
                'fontSize',
                'fontColor',
                'heading',
                'alignment',
                'bulletedList',
                'numberedList',
                '|',
                'outdent',
                'indent',
                '|',
                'specialCharacters',
                'blockQuote',
                'undo',
                'redo'
            ]
        },
        language: 'id',
        licenseKey: '',
    })
    .then(editor => {
        window.editor = editor;
    })
    .catch(error => {
        console.error('Oops, something went wrong!');
        console.error(
            'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
            );
        console.warn('Build id: 4niq24h1ezm1-1jtyozutymab');
        console.error(error);
    });
</script>
<script >
    //IdleTime
$.idleTimeout("#idletimeout", "#idletimeout a", {
    idleAfter: 1200,
    pollingInterval: 2,
    keepAliveURL: "<?= base_url(); ?>",
    serverResponseEquals: "OK",
    onTimeout: function() {
        $(this).slideUp();
        window.location = "<?= base_url(); ?>p/out";
    },
    onIdle: function() {
        $(this).slideDown(); // show the warning bar
    },
    onCountdown: function(counter) {
        $(this).find("span").html(counter); // update the counter
    },
    onResume: function() {
        $(this).slideUp(); // hide the warning bar
    },
});
		$(document).ready(function() {
			$("#input-5").fileinput({showCaption: false});

			$("#input-6").fileinput({
				showUpload: false,
				maxFileCount: 10,
				mainClass: "input-group-lg",
				showCaption: true
			});

			$("#input-8").fileinput({
				mainClass: "input-group-md",
				showUpload: true,
				previewFileType: "image",
				browseClass: "btn btn-success",
				browseLabel: "Pick Image",
				browseIcon: "<i class=\"icon-picture\"></i> ",
				removeClass: "btn btn-danger",
				removeLabel: "Delete",
				removeIcon: "<i class=\"icon-trash\"></i> ",
				uploadClass: "btn btn-info",
				uploadLabel: "Upload",
				uploadIcon: "<i class=\"icon-upload\"></i> "
			});

			$("#input-9").fileinput({
				previewFileType: "text",
				allowedFileExtensions: ["txt", "md", "ini", "text"],
				previewClass: "bg-warning",
				browseClass: "btn btn-primary",
				removeClass: "btn btn-secondary",
				uploadClass: "btn btn-secondary",
			});

			$("#input-10").fileinput({
				showUpload: false,
				layoutTemplates: {
					main1: "{preview}\n" +
					"<div class=\'input-group {class}\'>\n" +
					"       {browse}\n" +
					"       {upload}\n" +
					"       {remove}\n" +
					"   {caption}\n" +
					"</div>"
				}
			});

			$("#input-11").fileinput({
				maxFileCount: 10,
				allowedFileTypes: ["image", "video"]
			});

			$("#input-12").fileinput({
				showPreview: false,
				allowedFileExtensions: ["zip", "rar", "gz", "tgz"],
				elErrorContainer: "#errorBlock"
			});
		});

	</script>
	<!-- ADD-ONS JS FILES -->
	<script>
		var revapi130,
			tpj;
		var $ = jQuery.noConflict();

		(function() {
			if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded",onLoad); else onLoad();

			function onLoad() {
				if (tpj===undefined) { tpj = jQuery; if("off" == "on") tpj.noConflict();}
				if(tpj("#portfolio").revolution == undefined){
					revslider_showDoubleJqueryError("#portfolio");
				}else{
					revapi130 = tpj("#portfolio").show().revolution({
						sliderType:"carousel",
						jsFileLocation:"<?= base_url(); ?>assets/web/include/rs-plugin/js/",
						sliderLayout:"fullwidth",
						dottedOverlay:"none",
						delay:9000,
						navigation: {
							keyboardNavigation:"off",
							keyboard_direction: "horizontal",
							mouseScrollNavigation:"off",
							 mouseScrollReverse:"default",
							onHoverStop:"off",
							arrows: {
								style:"uranus",
								enable:true,
								hide_onmobile:false,
								hide_onleave:false,
								tmp:'',
								left: {
									h_align:"center",
									v_align:"bottom",
									h_offset:-30,
									v_offset:30
								},
								right: {
									h_align:"center",
									v_align:"bottom",
									h_offset:30,
									v_offset:30
								}
							}
						},
						carousel: {
							horizontal_align: "center",
							vertical_align: "center",
							fadeout: "off",
							maxVisibleItems: 5,
							infinity: "on",
							space: 0,
							stretch: "off",
							 showLayersAllTime: "on",
							 easing: "Power3.easeInOut",
							 speed: "800"
						},
						viewPort: {
							enable:true,
							outof:"wait",
							visible_area:"80%",
							presize:false
						},
						responsiveLevels:[1240,1024,778,480],
						visibilityLevels:[1240,1024,778,480],
						gridwidth:[600,600,500,400],
						gridheight:[640,600,500,400],
						lazyType:"none",
						shadow:0,
						spinner:"spinner3",
						stopLoop:"on",
						stopAfterLoops:0,
						stopAtSlide:1,
						shuffle:"off",
						autoHeight:"off",
						disableProgressBar:"on",
						hideThumbsOnMobile:"off",
						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						debugMode:false,
						fallbacks: {
							simplifyAll:"off",
							nextSlideOnWindowFocus:"off",
							disableFocusListener:false,
						}
					});
				} /* END OF revapi call */
			} /* END OF ON LOAD FUNCTION */
		}()); /* END OF WRAPPING FUNCTION */
	</script>

<script>
$("#input-7").rating({
    containerClass: 'is-heart',
    filledStar: '<i class="icon-heart3"></i>',
    emptyStar: '<i class="icon-heart-empty"></i>',
    starCaptions: {
        0: "Not Rated",
        1: "Very Poor",
        2: "Poor",
        3: "Ok",
        4: "Good",
        5: "Very Good"
    },
    starCaptionClasses: {
        0: "text-danger",
        1: "text-danger",
        2: "text-warning",
        3: "text-info",
        4: "text-primary",
        5: "text-success"
    },
});

$("#input-8").rating({
    containerClass: '',
    filledStar: '<i class="icon-flag21"></i>',
    emptyStar: '<i class="icon-flag-alt"></i>',
    starCaptions: {
        0: "Not Rated",
        1: "1 Flags",
        2: "2 Flags",
        3: "3 Flags",
        4: "4 Flags",
        5: "5 Flags"
    },
    starCaptionClasses: {
        0: "text-danger",
        1: "text-danger",
        2: "text-warning",
        3: "text-info",
        4: "text-primary",
        5: "text-success"
    },
});

$("#input-11").rating({
    starCaptions: {
        0: "Not Rated",
        1: "Very Poor",
        2: "Poor",
        3: "Ok",
        4: "Good",
        5: "Very Good"
    },
    starCaptionClasses: {
        0: "text-danger",
        1: "text-danger",
        2: "text-warning",
        3: "text-info",
        4: "text-primary",
        5: "text-success"
    },
});

$("#input-13").on("rating.clear", function(event) {
    $('#rating-notification-message').attr('data-notify-type', 'error').attr('data-notify-msg',
        'Your rating is reset');
    SEMICOLON.widget.notifications({
        el: jQuery('#rating-notification-message')
    });
});
$("#input-13").on("rating.change", function(event, value, caption) {
    $('#rating-notification-message').attr('data-notify-msg', 'You rated: ' + value + ' Stars');
    SEMICOLON.widget.notifications({
        el: jQuery('#rating-notification-message')
    });
});

$("#input-14").on("rating.change", function(event, value, caption) {
    $("#input-14").rating("refresh", {
        disabled: true,
        showClear: false
    });
});
</script>
<script>
$(document).ready(function() {
    $(".preloader").fadeOut('slow');
})
</script>

<script>
// $(document).ready(function(){
//   // Add smooth scrolling to all links
//   $("a").on('click', function(event) {

//     // Make sure this.hash has a value before overriding default behavior
//     if (this.hash !== "") {
//       // Prevent default anchor click behavior
//       event.preventDefault();

//       // Store hash
//       var hash = this.hash;

//       // Using jQuery's animate() method to add smooth page scroll
//       // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
//       $('html, body').animate({
//         scrollTop: $(hash).offset().top
//       }, 800, function(){

//         // Add hash (#) to URL when done scrolling (default click behavior)
//         window.location.hash = hash;
//       });
//     } // End if
//   });
// });

$(document).ready(function() {
			$('#datatable1').dataTable();
			$('#datatable2').dataTable();
		});
</script>
