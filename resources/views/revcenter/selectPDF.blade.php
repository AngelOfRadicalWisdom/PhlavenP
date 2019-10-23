<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')
<body>
	@include('includes.revcenterheader')
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
<br>
<!-- <div class="w3-display-middle"> --><center>
	
<div div style=" background-color: white; width: 900px; border-radius: 25px;">
<br>
	<div class="big-message">
    <table style="margin:0 auto;width:100%;height:5%">
        <tr>
            <td style="text-align:left"><a href="<?php echo url('/revcenter/settings/lesson/'.$lesson_ID."/newquestion");?>">BACK</a></td>
        </tr>
    </table>
    <h1 style="color:black">Select a PDF file for {{$lesson_name}}</h1>
    <hr style="width:100%;border-color:#006dcc">
    
    <form action="<?php echo url('/revcenter/resource/selectpdf')?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field()?>
    <input type="hidden" name="lesson_name" value="{{$lesson_name}}">
    <input type="hidden" name="lesson_ID" value="{{$lesson_ID}}">
    <br>
    <table style="margin:0 auto;width:100%">
        <tr>
            <td style="color:black;text-align:left;width:10%"><h4>QUESTION PDF:</h4></td>
            <td style="color:black"><input type="file" name="scanpdf" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center">
            </td>
        </tr>
        <tr>
            <td style="color:black;text-align:left"><h4>ANSWER KEY PDF:</h4></td>
            <td style="color:black"><input type="file" name="scankey"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center">
            <br>
            <input type="submit" value="Submit" name="submit" class="button">
            </td>
        </tr>
    </table>

    <br>
    </form>

    </div>
    </center>
	</div>