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
<div div style=" background-color: white; width: 80%; border-radius: 25px;">
<br>
	<table style="margin:0 auto;width:70%;height:5%">
        <tr>
            <td style="text-align:left"><a href="/revcenter/settings/node/viewlesson/{{$lesson->lesson_name}}">BACK</a></td>
        </tr>
    </table>
    <h1 class="w3-jumbo w3-animate-top">&nbsp; Follow-Up Questions</h1><br>
	<h5>Follow up questions are served after the lesson module is finished.<br>Determines if the reviewee is allowed to proceed</h5>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    <hr class="w3-border-grey" style="margin:auto;width:40%">

<form action="<?php echo url('/tosvalidatory/save')?>" method="POST">
<?php echo csrf_field() ?>

		<table style="margin: 0px auto;width:70%">
					<input type="hidden" name="type" value="VAL"><br><br>
				<td style="color:black"><h3>Lesson:</h3></td>
				<td style="color:black"><h3>{{$lesson->lesson_name}} <input type="hidden" name="lesson" value="{{$lesson->lesson_ID}}"></h3></td>
			</tr>
			<tr>
				<td style="color:black"><h3>Number of Questions:</h3></td>
				<td><input type="text" name="questioncount"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Submit" name="submit" class="button"></td>
			</tr>
			</table>
			<br><br>
		
		</form>
		</h1>
	</div>
	</div>
    </body>
</html>