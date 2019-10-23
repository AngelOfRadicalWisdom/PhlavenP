<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')
<body>
	@include('includes.revcenterheader')
	
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
<br>
<!-- <div class="w3-display-middle"> --><center>
    <h1 class="w3-jumbo w3-animate-top">&nbsp; Settings</h1><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    <hr class="w3-border-grey" style="margin:auto;width:40%">
	
</center>

	<br><br>	<br><br>	<br><br>
	
	<div class="row">
		<div class="button">
			<h1><a href="http://localhost:8000/revcenter/settings/examssettings" class="header-link" style="color:white">Exams</a></h1>
		</div>
		<div class="button">
			<h1><a href="http://localhost:8000/revcenter/settings/resourcesettings" class="header-link" style="color:white">Resources</a></h1>	
		</div>
	</div>
	<br><br>