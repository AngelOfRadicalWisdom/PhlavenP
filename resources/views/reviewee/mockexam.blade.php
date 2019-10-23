<html>

<head><title>Phlaven</title>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>
@include('styles.style')
<body>

	@include('includes.revieweeheader')
    <center>
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-white" style="color:white">

    <!-- <div class="w3-display-middle"> -->
    <br>
    <div div style=" background-color: white; width: 80%; border-radius: 25px;">
    <br>
        <h1 class="w3-jumbo w3-animate-top" style="color:black">Mock Exam</h1><br>

        <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
        <hr style="width:80%;border-color:#006dcc">
        <br>
	
	<br>
    <h1></h1>
    <div style="color:white">
	<form action="<?php echo url('mockexam/answer')?>" method="post">
	<?php echo csrf_field()?>
    <!-- <input type="text" name="nodename" placeholder="New Node Name"><br><br> -->
    <!---->

            <?php $counter=1;?>
			<input type="hidden" name="exam_ID" value="{{$exam_ID}}">
            <input type="hidden" name="learningpath_ID" value="{{$learningpath}}">
            @foreach($questions as $question)
            <table>
                    <input type="hidden" name='entry[<?php echo $counter; ?>][question]' value='<?php echo $question->questions->question_ID ?>'>
            <tr>
                <td colspan="4" style="color:black"><?php echo $counter;?>.)<br><br>{{$question->questions->question}}</td>
            </tr>
            <tr>
                @foreach($modulechoices as $choice)
                @if($choice->modulequestion_ID == $question->question_ID)
                <td style="color:black"><input type="radio" required name='entry[<?php echo $counter; ?>][answer]' value='<?php echo $choice->modulechoice_ID?>'>{{$choice->choice}}</td>
                @endif()
                @endforeach()
            </tr>
                <?php echo "<br><br>"; $counter++;?>
			@endforeach
            </table>
            <br>
            
            
            <input type="submit" class="button" value="Submit" name="submit"> </center>
            </form>
    