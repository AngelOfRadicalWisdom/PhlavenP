<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')
<body>
	@include('includes.revieweeheader')
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
<center>
<br>
        <h1 class="w3-jumbo w3-animate-top">&nbsp;{{$lesson_name}}</h1><br>

        <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
        <hr class="w3-border-grey" style="margin:auto;width:40%">
        <br>
	</center>
	<br>
	<div class="big-message">
        <!-- <h1>{{$lesson_ID}}</h1> -->
        <br><br><br>
        <embed src="/resources/{{$resource->resource}}" width="600" height="500" alt="pdf" />
        
        <br><br>
            <a href="/lesson/{{$lesson_name}}/take-exercise" class="button">Take Exercise</a>
        </form>
	</div>

	<br><br>


	<br><br>