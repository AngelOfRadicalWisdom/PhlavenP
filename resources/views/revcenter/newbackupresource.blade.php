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
    <h1 style="color:black">{{$lesson_name}}<br>New Resource</h1>
    <hr style="width:100%;border-color:#006dcc">
    
    <form action="<?php echo url('/revcenter/resource/savebackupresource')?>" method="post">
    <?php echo csrf_field()?>
    <input type="hidden" name="lesson_name" value="{{$lesson_name}}">
    <br>
    <table style="margin:0 auto;width:70%">
        <tr>
            <td style="color:black"><h2>Resource:</h2></td>
            <td style="color:black"><textarea cols="50" rows="5" name="resource"></textarea>
            </td>
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