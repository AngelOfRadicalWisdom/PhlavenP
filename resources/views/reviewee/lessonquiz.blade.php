<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
@include('styles.jquery')
<body>
	@include('includes.revieweeheader')
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
<center>
<br>
    <div div style=" background-color: white; width: 80%; border-radius: 25px;">
<br>
        <h1 class="w3-jumbo w3-animate-top">&nbsp;{{$lesson_name}}</h1><br>
        <h1 style="color:black">Validation Exercise</h1>
        <hr style="width:80%;border-color:#006dcc"><br>
        <?php $counter=1 ?>

        <form action="<?php echo url('/lesson/answer')?>" method="POST">
		<?php echo csrf_field() ?>
        <input type="hidden" name="lesson_ID" value="{{$lesson_ID}}"> 
        <input type="hidden" name="exam_ID" value="{{$exam_ID}}"> 
        <table style="margin: 0px auto;width:50%">
        @foreach($exam_to_use as $question)
            <tr style="color:black"><td colspan='4'><br><br><?php echo $counter ?>.)<h3>{{$question->questions->question}}</h3><br> 
            <input type="hidden" name='entry[<?php echo $counter; ?>][question]' value='<?php echo $question->questions->question_ID ?>'></td></tr>
            
            @foreach($modulechoices as $choice)
                @if($choice->modulequestion_ID == $question->question_ID)
                <td style="color:black"><input type="radio" required name='entry[<?php echo $counter; ?>][answer]' value='<?php echo $choice->modulechoice_ID?>'>{{$choice->choice}}</td>
                @endif()
            @endforeach()
            <?php $counter++; ?>
            
        @endforeach
        </table>
        <br><br>
        <button type="submit" class="button">SUBMIT</button>
        <br><br>
        </div>
        <br>