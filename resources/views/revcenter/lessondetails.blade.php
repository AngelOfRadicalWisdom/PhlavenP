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
    
    <br>
    
    <div div style=" background-color: white; width: 900px; border-radius: 25px;">
    <br>
    <table style="margin:0 auto;width:80%;height:5%">
        <tr>
            <td style="text-align:left"><a href="<?php echo url('/revcenter/settings/node/viewnode/'.$chapter);?>">BACK</a></td>
        </tr>
    </table>
<!-- <div class="w3-display-middle">-->
    <h6><a href="/revcenter/previewquestions/{{$lesson->lesson_ID}}/0" style="text-decoration:none;color:red"><?php echo$message?></a></h6>
    <h1 class="w3-jumbo w3-animate-top" style="color:black">&nbsp; {{$lesson->lesson_name}}</h1><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    
        <h5 style="text-align:center;color:black"><?php echo $lesson->lessondesc;?></h5><br>
        <hr style="width:80%;border-color:#006dcc">
        <!-- for resources within the lesson-->
        <table style="margin: 0px auto;width:80%;color:black">
            <tr>
                <td colspan="2">
                <br><br>
                <div class="row">
                    <div class='button' style="background-color:#5cb85c"><h3><a href="http://localhost:8000/revcenter/settings/lesson/{{$lesson->lesson_ID}}/module" class='header-link'>Lesson Flow</a></h3></div>
                    <div class='button' style="background-color:#5cb85c"><h3><a href="http://localhost:8000/revcenter/settings/lesson/{{$lesson->lesson_ID}}/viewquestions" class='header-link'>Questions</a></h3></div>
                </div>
                <div class="row">               
                    <div class='button' style="background-color:#5cb85c"><h3><a href="http://localhost:8000/revcenter/settings/lesson/{{$lesson->lesson_ID}}/newresource" class='header-link'>Resources</a></h3></div>
                    <div class='button' style="background-color:#5cb85c"><h3><a href="http://localhost:8000/TOS/newvalidatory/{{$lesson->lesson_ID}}" class='header-link'>Follow Up <?php echo $Followup_notif?></a></h3></div>
                </div>
                </td>
            </tr>
            </table>
            
            <br><br>
            
            
            
            
            <hr style="width:80%;border-color:#006dcc">
            <br>

	</div></div>