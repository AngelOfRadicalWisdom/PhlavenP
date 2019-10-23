<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')
<body>
<center>
	@include('includes.revieweeheader')
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
<br>
<!-- <div class="w3-display-middle"> --><center>
    <div div style=" background-color: white; width: 80%; border-radius: 25px;margin:0 auto">
    <br>
    <h1 class="w3-jumbo w3-animate-top">&nbsp; {{$lesson}}</h1><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    <hr style="width:80%;border-color:#006dcc">
            <h3>{{$response}}</h3>

    <br><br>  
    <hr style="width:80%;border-color:#006dcc">
    <br>
    <?php $nextindex = $index + 1; ?>
    <a href="http://localhost:8000/reviewee/startmodule/{{$revcenter}}/{{$lesson}}/{{$nextindex}}" class="button">Next</a>
	<br><br>
    
</center>