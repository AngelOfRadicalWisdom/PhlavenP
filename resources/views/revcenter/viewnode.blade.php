<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')
<body>
	@include('includes.revcenterheader')
        <div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
    <br>
    <!-- <div class="w3-display-middle"> --><center>
        <!-- <h1 class="w3-jumbo w3-animate-top">&nbsp; Exam Type</h1><br>

         <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
        <!-- <hr class="w3-border-grey" style="margin:auto;width:40%">  -->
        <div div style="background-color: white; width: 90%; border-radius: 25px;">
        <br><br>      
    <table style="margin:0 auto;width:80%;height:5%">
        <tr>
            <td style="text-align:left"><a href="/revcenter/settings/learningpath">BACK</a></td>
        </tr>
    </table>
		<h1><?php echo $node->chapter_name;?>
		</h1>
        <h5><?php echo $node->description;?></h5><br>
        <hr style="width:80%;border-color:#006dcc">
        <h1 >Lessons</h1><br>
        <table style="margin: 0px auto;width:80%">

        @foreach($lessonlist as $lesson)
            <tr>
            <?php $foundstatus=0; ?>
			<div class='button'><h3><a href="http://localhost:8000/revcenter/settings/node/viewlesson/{{$lesson->lesson_ID}}" class="body-link" style="color:white">{{$lesson->lesson_name}}</a>
    
            <?php $foundstatus = 1;?>
                @foreach($toslessonlist as $row)
                        @if($row->lesson_ID == $lesson->lesson_ID)
                        <?php $foundstatus = 0;?>
                        @endif()
                @endforeach()

                        @if($foundstatus == 1)
                            <text class='badge'>!</text>
                        @endif()
                        
            </h3></div>
            </tr>
            
		@endforeach

        </table>
        <br><br><br>
        <hr style="width:80%;border-color:#006dcc">
        <table style="margin: 0px auto;width:30%;text-align:center">
        <tr>
            <div class='button' style="background-color:#5cb85c"><h3><a href="http://localhost:8000/revcenter/settings/<?php echo $node->chapter_name?>/newlesson" class='header-link' style="color:white"><img src="\sourceimages\pencil.png"> New Lesson</a></h3></div>
            
        </tr>
        </table>
        <br><br>
	</div>