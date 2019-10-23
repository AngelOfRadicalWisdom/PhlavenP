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
<br>
<!-- <div class="w3-display-middle"> --><center>

    <div div style=" background-color: white; width: 80%; border-radius: 25px;margin:0 auto">
    <br>
    <h1 class="w3-jumbo w3-animate-top" style="color:black">&nbsp; Results</h1><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
			<hr style="width:80%;border-color:#006dcc">
	<br>
	<div class="big-message">
    <table class="aligned-to-center"  style="color:black;width:80%" id="customers">
        <tr style="color:black">
            <td>Lesson</td>
            <td>Score</td>
            <td style="text-align:right">Percentage</td>
        </tr>

        @foreach($getresults as $result)
            <tr style="color:black">
            <td>{{$result->lesson->lesson_name}}</td>
            <td>{{$result->userscore}}/{{$result->perfectscore}}</td>

            @if($result->percentage >= 90)
            <td style="color:lime;text-align:right">{{$result->percentage}}%</td>
            @elseif($result->percentage >=60)
            <td style="color:orange;text-align:right">{{$result->percentage}}%</td>
            @else($result->percentage <60)
            <td style="color:red;text-align:right">{{$result->percentage}}%</td>
            @endif
            </tr>
        @endforeach()
        <tr>
            <td colspan="3"><a href="#" class="button">Proceed</a></td>
        </tr>
    </table>
    
    <br><br>
    </div>
    
			<hr style="width:80%;border-color:#006dcc">
    <br><br>
	
    </div>

	<br><br>