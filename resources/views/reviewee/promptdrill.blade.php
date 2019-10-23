<html>

<head><title>Phlaven</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')

<body>
@include('includes.revieweeheader')
<center>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
    <div class="w3-display-middle">
        <div div style=" background-color: white; width: 100%; border-radius: 25px;"><br>
        <h1 class="w3-jumbo w3-animate-top" style="text-align:center">&nbsp; {{$lesson_name}} completed</h1><br>

        <hr style="width:80%;border-color:#006dcc">
        <h3 style="text-align:center">Are you ready to take the {{$lesson_name}} Drill?<br><br>
        <a href="/reviewee/{{$revcenter_ID}}/{{$lesson_name}}/startdrill" class="button">Yes</a>
        <a href="/reviewee/learningpath/selection" class="button">Go Back</a></h3><br><br>
        <br>
	
	<br><br>
    </div>