<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')
<body>
	@include('includes.revieweeheader')
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-white" style="color:white">
	<br>
	<h2 id="app_status" style="text-align:center"></h2>
	<br>
	<center>
	
    <div div style=" background-color: white; width: 80%; border-radius: 25px;">
    <br><br>
		<h1 style="color:black">Select Your Learning Path Provider</h1>
        <br>
        <hr style="width:80%;margin:0px auto">
        <br>
		
		@foreach($revcenters as $revcenter){
            <div class='button'><h3><a href="http://localhost:8000/reviewee/learningpath/{{$revcenter->revcenter_ID}}" class="body-link" style="color:white">{{$revcenter->revcenter->revcenter_name}}</a></h3></div>
        @endforeach()
        <br><br>
	</div>

	<br><br>


	<br><br>