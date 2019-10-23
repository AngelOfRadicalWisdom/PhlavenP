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
    <center>
    <div div style=" background-color: white; width: 80%; border-radius: 25px;">
<br>
<!-- <div class="w3-display-middle"> -->

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    
	<div class="big-message">
    <table style="margin:0 auto;width:100%;height:5%">
        <tr>
            <td style="text-align:left"><a href="/revcenter/settings/lesson/{{$lesson_ID}}/viewquestions">BACK</a></td>
            <td style="text-align:right"><a href="/revcenter/settings/lesson/{{$lesson_ID}}/scanpdf">SCAN</a></td>
        </tr>
    </table>
    <h1 style="color:black">{{$lesson_name}}<br>New Question</h1>
    <hr style="width:100%;border-color:#006dcc"><br>
    
    <table style="margin:0 auto;width:100%;height:5%">
        <tr>
            <td style="text-align:center">AM || <a href="#">PM</a></td>
        </tr>
    </table>

    <form action="<?php echo url('/revcenter/resource/savequestion')?>" method="post">
    <?php echo csrf_field()?>

    <input type="hidden" name="lesson_ID" value="{{$lesson_ID}}">
    <input type="hidden" name="lesson_name" value="{{$lesson_name}}">
    
    <br><br>
    <table style="margin:0 auto;width:100%">
    <input type="hidden" name="type" value="AM">
        
        <tr>
            <td style="color:black"><h2>Question:</h2></td>
            <td><textarea cols="50" rows="5" name="question"></textarea></td>
        </tr>
        <tr>
            <td style="color:black"><h2>Difficulty:</h2></td>
            <td><Select name="difficulty">
                    <option value="1">Easy</option>
                    <option value="2">Average</option>
                    <option value="3">Hard</option>
                </Select></td>
        </tr>
        <tr>
            <td style="color:black"><h2>Choices:</h2></td>
            <td><input type="text" name="rAnswer" placeholder="Right Answer" required ></td>
        </tr>
        <tr>
            <td style="color:black"><h2></h2></td>
            <td><input type="text" name="choice[]" required></td>
        </tr>
        <tr>
            <td style="color:black"></td>
            <td><input type="text" name="choice[]" required></td>
        </tr>
        <tr>
            <td style="color:black"></td>
            <td><input type="text" name="choice[]" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center">
            <button type="submit" name="submit" class="button"> Submit </button>
            </td>
        </tr>
        
    </table>
    <br><br>
    </form>
	</div>
    <br>
    </div>
    <br>