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
    <h1 class="w3-jumbo w3-animate-top">&nbsp; {{$lesson_name}}</h1><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    <hr style="width:80%;border-color:#006dcc">
	
    
            <p><h4>{{ $usedresource->resource }}</h4></p>
    <br><br>   
    <hr style="width:80%;border-color:#006dcc"><br>
    <a href="http://localhost:8000/reviewee/{{$lesson_name}}/backupresources" class="button">Refresh Resource</a>
	
	<br><br>
    
</center>