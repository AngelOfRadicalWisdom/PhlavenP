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

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    
	
</center>
	<div class="big-message">
    <hr class="w3-border-grey" style="margin:auto;width:40%"><br><br>
    <form action="<?php echo url('/revcenter/resource/savequestionfinal')?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field()?>

    <table style="margin:0 auto">
        <tr style="color:white">
        <td><Resource:></Resource:></td>
        <td>
        <embed src="/questions/{{$filename}}" width="600" height="300" alt="pdf" />
        <input type="hidden" name="filename" value="{{$filename}}">
        <input type="hidden" name="lesson_ID" value="{{$lesson_ID}}">
        <input type="hidden" name="lesson_name" value="{{$lesson_name}}">
        </td>
        </tr>
        <tr>
            <td style="color:white"><h2>Correct Answer:</h2></td>
            <td><input type="text" name="correctanswer"></td>
        </tr>
        <tr>
            <td style="color:white"><h2>Difficulty:</h2></td>
            <td><Select name="difficulty">
                    <option value="1">Easy</option>
                    <option value="2">Moderate</option>
                    <option value="3">Hard</option>
                </Select></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center">
            <input type="submit" value="Submit" name="submit" class="button">
            </td>
        </tr>
    </table>
    <br><br>

    </form>

	</div>