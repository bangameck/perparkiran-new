<!-- JavaScripts
============================================= -->
<script src="<?= base_url(); ?>assets/web/js/jquery.js"></script>
<script src="<?= base_url(); ?>assets/web/js/plugins.min.js"></script>
<!-- Star Rating Plugin -->
<script src="<?= base_url(); ?>assets/web/js/components/star-rating.js"></script>
<script src="<?= base_url(); ?>assets/adm/js/sweet-alert/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/adm/js/sweet-alert/app.js"></script>
<!-- Footer Scripts
============================================= -->
<script src="<?= base_url(); ?>assets/web/js/functions.js"></script>
<script>

	$("#input-7").rating({
		containerClass: 'is-heart',
		filledStar: '<i class="icon-heart3"></i>',
		emptyStar: '<i class="icon-heart-empty"></i>',
		starCaptions: {0: "Not Rated",1: "Very Poor", 2: "Poor", 3: "Ok", 4: "Good", 5: "Very Good"},
		starCaptionClasses: {0: "text-danger", 1: "text-danger", 2: "text-warning", 3: "text-info", 4: "text-primary", 5: "text-success"},
	});

	$("#input-8").rating({
		containerClass: '',
		filledStar: '<i class="icon-flag21"></i>',
		emptyStar: '<i class="icon-flag-alt"></i>',
		starCaptions: {0: "Not Rated",1: "1 Flags", 2: "2 Flags", 3: "3 Flags", 4: "4 Flags", 5: "5 Flags"},
		starCaptionClasses: {0: "text-danger", 1: "text-danger", 2: "text-warning", 3: "text-info", 4: "text-primary", 5: "text-success"},
	});

	$("#input-11").rating({
		starCaptions: {0: "Not Rated",1: "Very Poor", 2: "Poor", 3: "Ok", 4: "Good", 5: "Very Good"},
		starCaptionClasses: {0: "text-danger", 1: "text-danger", 2: "text-warning", 3: "text-info", 4: "text-primary", 5: "text-success"},
	});

	$("#input-13").on("rating.clear", function(event) {
		$('#rating-notification-message').attr('data-notify-type','error').attr('data-notify-msg', 'Your rating is reset');
		SEMICOLON.widget.notifications({ el: jQuery('#rating-notification-message') });
	});
	$("#input-13").on("rating.change", function(event, value, caption) {
		$('#rating-notification-message').attr('data-notify-msg', 'You rated: ' + value + ' Stars');
		SEMICOLON.widget.notifications({ el: jQuery('#rating-notification-message') });
	});

	$("#input-14").on("rating.change", function(event, value, caption) {
		$("#input-14").rating("refresh", {disabled: true, showClear: false});
	});

</script>