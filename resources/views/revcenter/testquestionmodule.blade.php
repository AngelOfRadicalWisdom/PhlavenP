<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')
<body>
<center>
	@include('includes.revcenterheader')
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
<br>
<!-- <div class="w3-display-middle"> --><center>
    <div div style=" background-color: white; width: 900px; border-radius: 25px;margin:0 auto">
    <br>
    <h1 class="w3-jumbo w3-animate-top">&nbsp; {{$lesson->lesson_name}}</h1><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    <hr style="width:80%;border-color:#006dcc">
	<form action="<?php echo url('/modulequestion/getresponse')?>" method="post">
    <?php echo csrf_field()?>
            <input type="hidden" name="index" value="{{$lessonmodule->index}}">
            <input type="hidden" name="lesson" value="{{$lesson->lesson_name}}">
            <h3>{{$lessonmodule->question->question}}</h3>
            <br>
            @foreach ($choices as $choice)
            <h4><input type="radio" name="choice" value="{{$choice->modulechoice_ID}}"> {{$choice->choice}}</h4><br>
            @endforeach()
    <br><br>   
    <?php $nextindex = $lessonmodule->index + 1; ?>
    <hr style="width:80%;border-color:#006dcc">
    <br>
    <button type="submit" class="button" value="Submit">Submit</button>
	</form>
	<br><br>
    
    
</center>