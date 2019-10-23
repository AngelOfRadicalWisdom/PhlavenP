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
<br><br>
        <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
        <hr class="w3-border-grey" style="margin:auto;width:40%">
        <br>
	</center>
	<br>
	<div class="big-message">
        <br><br><br>
        <embed src="/questions/{{$question}}" width="600" height="500" alt="pdf" />
        
        <br><br>
            <a href="/revcenter/settings/node/viewlesson/{{$lessonused->lesson_name}}" class="button">Back</a>
        </form>
	</div>

	<br><br>


	<br><br>