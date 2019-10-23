<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

</head>
@include('styles.style')
@include('styles.jquery')
<body>
	@include('includes.revcenterheader')
    <center>
    
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
    <br><br>
    <div div style="background-color: white; width: 90%; border-radius: 25px;">
    <br>
    <table style="margin:0 auto;width:80%;height:5%">
        <tr>
            <td style="text-align:left"><a href="<?php echo url('/revcenter/settings/node/viewlesson/'.$lesson->lesson_name)?>">BACK</a></td>
        </tr>
    </table>
<!-- <div class="w3-display-middle">-->
    <h1 class="w3-jumbo w3-animate-top" style="color:black">&nbsp; {{$lesson->lesson_name}}</h1><br><h5>The lesson flow dictates what the reviewee will be seeing upon taking the lesson</h5>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    <hr style="margin:auto;width:80%;border-color:#006dcc">
        <br>
        <!-- for resources within the lesson-->
        <table style="margin: 0px auto;width:50%;color:black">

            <tr>
                    <td width="5%"></td>
                    <td width="23.75%"></td>
					<td width="23.75%"></td>
					<td width="23.75%"></td>
					<td width="23.75%"></td>
            </tr>

            <tr style="background-color:black;color:white;">
					<td style="width:20%" colspan="5" style="text-align:center"><b style="text-align:center"><a href="#" style="color:white"><h4>Lesson Flow</h4></a></td>
            </tr>
            @foreach($resourcelist as $resource)
                @if($resource->resource_ID)
                <tr>
                    <td>{{$resource->index}}.R </td>
                    <td colspan="4">{{$resource->resource->resource}}</td>
                </tr>
                @elseif($resource->modulequestions_ID)
                <tr>
                    <td>{{$resource->index}}.Q</td>
                    <td colspan="4">{{$resource->question->question}}</td>
                </tr>
                @endif()
            @endforeach()
        </table>
        <br>
    <hr style="margin:auto;width:80%;border-color:#006dcc">
    <br><br>
        <div class="row">
                <div class='button' style="background-color:#5cb85c"><h3><a href="http://localhost:8000/revcenter/addresource/{{$lesson->lesson_name}}" class='header-link'>Add Resource</a></h3></div></td>
                <div class='button' style="background-color:#5cb85c"><h3><a href="http://localhost:8000/revcenter/settings/newquestion/{{$lesson->lesson_name}}" class='header-link'>Add Question</a></h3></div></td>
        </div>
        <div class="row">
                <div class='button' style="background-color:#5cb85c"><h3><a href="http://localhost:8000/revcenter/testmodule/{{$lesson->lesson_name}}/1" class='header-link'>Test Module</a></h3></div></td>
        </div>
    <br><br>

	</div></div>