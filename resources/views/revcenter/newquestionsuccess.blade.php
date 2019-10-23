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

    
    <hr class="w3-border-grey" style="margin:auto;width:40%">
	
</center>
	<div class="big-message">
    <h1 style="color:white">Question Upload was a success!</h1><br><br>
        <embed src="/questions/{{$filename}}" width="600" height="300" alt="pdf" />
    <br><br>
    <h1 style="color:white">Would you like to add more Questions?</h1>

    <table style="margin: 0px auto;width:40%">
        <tr>
            <td colspan="2" style="text-align:center"><div class='button' style="background-color:#5cb85c"><h3><a href="http://localhost:8000/revcenter/settings/lesson/{{$lesson_name}}/newquestion" class='header-link'>Yes</a></h3></div>
            <div class='button' style="background-color:#fd7e14"><h3><a href="http://localhost:8000/revcenter/settings/node/viewlesson/{{$lesson_name}}" class='header-link'>No</a></h3></div></td>
        </tr>
    </table>
        
	</div>