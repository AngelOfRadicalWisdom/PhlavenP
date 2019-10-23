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
    @if($eligible == "true")
    <div class="w3-display-middle">
        <div div style=" background-color: white; width: 100%; border-radius: 25px;"><br>
        <h1 class="w3-jumbo w3-animate-top" style="text-align:center">&nbsp; Mock Exam</h1><br>

        <hr style="width:80%;border-color:#006dcc">
        <h3 style="text-align:center">Are you ready to take the Mock Exam?<br>You can reattempt as much as you wish.<br><br>
        <a href="/reviewee/{{$learningpath_ID}}/mockexam" class="button">Take Mock</a>
        <a href="/reviewee/learningpath/{{$revcenter_ID}}" class="button">Go Back</a></h3><br><br>
        <br>
	
	<br><br>
    </div>
    @elseif($eligible == "false")
    <div class="w3-display-middle"><br>
        <div div style=" background-color: white; width: 700px; border-radius: 25px;"><br>
        <h1 class="w3-jumbo w3-animate-top" style="text-align:center;color:black">&nbsp; Mock Exam</h1><br>

        <hr class="w3-border-grey" style="margin:auto;width:40%">
        <br>
        <h3 style="text-align:center">You are not eligible for the mock exam<br>You must first complete the learning path assigned for you.<br><br>
        <a href="/reviewee/learningpath/{{$revcenter_ID}}" class="button">Go Back</a></h3><br><br>
        <br>
    </div>
    @endif()
    <!-- <h1>Welcome New User!</h1><br> -->
    