<html>
<head><title>Phlaven</title>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')
<body>  
	@include('includes.revieweeheader')
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
<br>

<center>
<div div style=" background-color: white; width: 80%; border-radius: 25px;">
<!-- <div class="w3-display-middle"> --><center>
<br>
    <h1 class="w3-jumbo w3-animate-top" style="color:black">&nbsp; Results</h1><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    <hr style="width:80%;border-color:#006dcc">
	
	<div class="big-message">
		@if($status == "passed")
            <h1 style="color:black">Congratulations!<br>You have passed the {{$lesson_name}} lesson.</h1>
            <br><br>
            <h3 style="color:black">Your Score:</h3><h3 style="color:lime"><?php echo round($percentage,2)?>%</h3>
        @endif

        @if($status == "failed")
            <h1 style="color:black">Sorry!You didnt pass {{$lesson_name}}'s drill.</h1>
            <br><br>
            <h3 style="color:black">Your Score:</h3><h3 style="color:red"><?php echo round($percentage,2)?>%</h3>
            <br><br>
            <h3 style="color:black">Would you like to view some backup resources prepared?</h3>
            <div class="row">
            <a href="/reviewee/{{$lesson_name}}/backupresources" class="button">Yes</a>
            <a href="/reviewee/learningpath/selection" class="button">No</a>
            </div>
        @endif
	</div>

	<br><br>