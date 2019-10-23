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
    <br><br>
    <center>
<div div style=" background-color: white; width: 80%; border-radius: 25px;">
<br>
<!-- <div class="w3-display-middle"> --><center>
<br>
    <h1 class="w3-jumbo w3-animate-top">&nbsp; Diagnostic Exam TOS</h1><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    <hr class="w3-border-grey" style="margin:auto;width:40%">
	

        <form action="<?php echo url('/tosexam/save')?>" method="POST">
		<?php echo csrf_field() ?>
        
        <table style="margin: 0px auto;width:70%;">
                    <input type="hidden" name="type" value="DIA"><br>
            <tr>
                <td style="color:black"><h2>Minutes to Answer:</h2></td>
                <td><input type="text" required name="timer"><br>
            </tr>
            <tr>
                <td colspan="2"><hr></td>
            </tr>
            <tr>
                <td colspan="2"><hr></td>
            </tr>
            <tr>
                <td style="color:black"><h2>Lesson</h2></td>
                <td style="color:black"><h2>Question Count</h2></td>
            </tr>

            <?php $lessonentrycounter=0; ?>

            @foreach($nodelist as $node)
            <tr style="color:black">
                <td colspan="2"> <u><h2>{{$node->chapter_name}}</h2></u></td>
            </tr>
                @foreach($lessonlist as $lesson)
                    @if($node->chapter_ID == $lesson->chapter_ID)
                        <tr>
                            <td style="color:black"><h3>{{$lesson->lesson_name}}</h3></td>
                            <td><input type="hidden"  name="entry[<?php echo $lessonentrycounter?>][lesson]" value="{{$lesson->lesson_ID}}">
                                <input type="text" size="5" required name="entry[<?php echo $lessonentrycounter?>][questioncount]"></td>
                        </tr>
                    <?php $lessonentrycounter++; ?>
                    @endif
                @endforeach
            <tr>
                <td colspan="2"><hr></td>
            </tr>
            @endforeach
            <tr>
            <td colspan="2" style="text-align:center">
             
            <input type="submit" value="Submit" name="submit" class="button">
            <br><br>
            </td>
            </tr>
            </table></div><br><br>
	</div></div>
    </form>
    </body>
</html>