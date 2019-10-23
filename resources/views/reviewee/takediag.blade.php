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
<br><br>

<center>

<br>
    <div class="w3-display-middle" style="width:100%">
    <div div style=" background-color: white; width: 80%; border-radius: 25px;margin:0 auto">
    <br>
        <h1 class="w3-jumbo w3-animate-top">&nbsp; Welcome!</h1><br>

        <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
        <hr class="w3-border-grey" style="margin:auto;width:40%">
        <h3> &nbsp; &nbsp; &nbsp; &nbsp; Before you take this learning path, you are required to take a diagnostic exam</h3><br><br>
        <br>
        <a href="http://localhost:8000/reviewee/{{$learningpath}}/diagnosticexam" class='button'>Continue</a>
	<br>
	
    <!-- <h1>Welcome New User!</h1><br> -->
    <br>
	</div>
</div>
</div>