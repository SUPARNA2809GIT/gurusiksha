<!DOCTYPE html>
<html>
<head>
	<title>Autocomplete multiselect jquery Example</title>
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style_custom.css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/autocomplete.multiselect.js"></script>
</head>
<body>

<div class="main-div">
	<h2>Autocomplete multiselect jquery Example</h2>
	<input id="myAutocompleteMultiple" type="text" />
</div>

<script type="text/javascript">
	$(function(){
		var availableTags = [
		    "Laravel",
		    "Bootstrap",
		    "Server",
		    "JavaScript",
		    "JQuery",
		    "Perl",
		    "PHP",
		    "Python",
		    "Ruby",
		    "API",
		    "Scheme"
		];

		$('#myAutocompleteMultiple').autocomplete({
			source: availableTags,
			multiselect: true
		});
	});
</script>
</body>
</html>