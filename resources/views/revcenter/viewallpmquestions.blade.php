<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

</head>
@include('styles.style')
@include('styles.jquery')
<body>
	@include('includes.revcenterheader')<center>
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
    
    <br>
    
    <div div style=" background-color: white; width: 900px; border-radius: 25px;">
    <br>
    <table style="margin:0 auto;width:80%;height:5%">
        <tr>
            <td style="text-align:left"><a href="<?php echo url('/revcenter/settings/node/viewlesson/'.$lesson->lesson_name);?>">BACK</a></td>
            <td style="text-align:right"><a href="<?php echo url('/revcenter/settings/lesson/'.$lesson->lesson_name.'/viewquestions');?>">AM</a> || PM || <a href="<?php echo url('/revcenter/settings/lesson/'.$lesson->lesson_name.'/newquestion');?>">ADD QUESTION</a></td>
        </tr>
    </table>
<!-- <div class="w3-display-middle">-->
    <h6><a href="/revcenter/previewquestions/{{$lesson->lesson_ID}}/0" style="text-decoration:none;color:red"><?php echo $message?></a></h6>
    <h1 class="w3-jumbo w3-animate-top" style="color:black">&nbsp; {{$lesson->lesson_name}} Question Bank</h1><br><h5>The questions inserted in the question bank will be used for examinations involving the lesson</h5>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->

        <hr style="width:80%;border-color:#006dcc">
            
        <!-- for questions within the lesson-->
        <table style="margin: 0px auto;width:80%;color:black">
            <tr>
                <td><h3>Question</h3></td>
                <td><h3>Difficulty</h3></td>
                <td><h3>Answer</h3></td>
                <td style="text-align:right"><h3>Manage</h3></td>
            </tr>
            @foreach($questionlist as $question)
                <tr>
                <td><a href="/viewquestion/{{$question->question}}" class="body-link" style="color:black">{{substr($question->question,0,30)}}...</a></td>
                <td><?php
                    switch($question->difficulty){
                        case '1': echo "EASY";
                        break;
                        case '2': echo "MODERATE";  
                        break;
                        case '3': echo "HARD";
                        break;
                    }?></td>
                    <td></td>    
                <td style="text-align:right"><a href="<?php echo url('/revcenter/editsavedquestion/'.$question->question_ID)?>" class="body-link" style="color:black">Edit</a>||<a href="<?php echo url('/revcenter/deletesavedquestion/'.$question->question_ID)?>" class="body-link" style="color:black">Delete</a></td>	
                </tr>
                <tr>
                <td colspan="4">&nbsp;</td>
                </tr>
		    @endforeach
            </table>
            <br><br>
            <br>
            <hr style="width:80%;border-color:#006dcc">
            <br>

	</div></div>