<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

</head>
@include('styles.style')
@include('styles.jquery')
<body>
	@include('includes.revcenterheader')
    <?php   if($new_status == '1'){
                echo "<script type='text/javascript'>alert('Question Finalized!')</script>";
            }else if ($new_status == '2'){
                echo "<script type='text/javascript'>alert('Question Deleted!')</script>";
            }
    ?><center>
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
    
    <br>
    
    <div div style=" background-color: white; width: 900px; border-radius: 25px;">
    <br>
<!-- <div class="w3-display-middle">-->
    <table style="margin:0 auto;width:80%;height:5%">
        <tr>
            <td style="text-align:left"><a href="<?php echo url('/revcenter/settings/lesson/'.$lesson_ID.'/viewquestions')?>">BACK</a></td>
            <td style="text-align:right"><a href="<?php echo url('/revcenter/previewquestions/'.$lesson_ID.'/0') ?>">AM</a> || PM</td>
        </tr>
    </table>
    
    
    <h2 class="w3-jumbo w3-animate-top" style="color:black">&nbsp;Pending {{$lesson_name}} PM Questions</h2><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
    <div style="width:30%">
    </div>
        <hr style="width:80%;border-color:#006dcc">
        <!-- for questions within the lesson-->
        <table style="margin: 0px auto;width:80%;color:black">
            <tr>
                <td width="10%"></td>
                <td width="70%"></td>
                <td width="10%"></td>
                <td width="10%"></td>
            </tr>
            <tr>
                <td colspan = '3'><h3>Question</h3></td>
                <td colspan = '1'><h3></h3></td>
                <td><h3>Actions</h3></td>
            </tr>
            
            <?php $questioncounter = 0; ?>
            @foreach($questionspm as $question)
                <?php $questioncounter++; ?>
                <tr>
                <td colspan = '2'><h3>Q{{$questioncounter}}.</h3><?php echo $question->question;?>...</td>
                <td></td>
                <td style="text-align:center"></td>
                <td style="text-align:right"><a href="<?php echo url('/revcenter/editquestionPM/'.$question->tempquestion_ID)?>" class="body-link" style="color:black">Edit</a>||<a href="<?php echo url('/revcenter/deletequestionPM/'.$question->tempquestion_ID)?>" class="body-link" style="color:black">Delete</a></td>	
                </tr>

                <tr>
                <td colspan="4">&nbsp;</td>
                </tr>

                <?php $subquestioncounter = 1; ?>
                
                @foreach($question->questionsubquestions as $subquestion)
                <tr>
                <td colspan = '2'><h3>Subquestion {{$subquestioncounter}} </h3><?php echo substr($subquestion->question,0,500);?>...</td>
                <td></td>
                <td style="text-align:center"></td>
                <td style="text-align:right"></td>	
                </tr>

                <tr>
                <td colspan="4">&nbsp;</td>
                </tr>
                <?php $subquestioncounter++;?>
                
                @endforeach

                <?php $counter = 0; ?>
                    @foreach($question->questionchoices as $choice)
                        
                        <tr>
                        <td></td>
                        <?php switch($choice->choiceorder){ 
                            case 001 :
                            echo" <td><b>A.) </b>".$choice->choice."</td> ";
                            break; 
                            
                            case 002 :
                            echo" <td><b>B.) </b>".$choice->choice."</td> ";
                            break;
                            
                            case 003 :
                            echo" <td><b>C.) </b>".$choice->choice."</td> ";
                            break;
                            
                            case 004 :
                            echo" <td><b>D.) </b>".$choice->choice."</td> ";
                            break;?>
                        <?php } ?>
                        <td></td>
                        <td></td>
                        </tr>
                    @endforeach()
                <tr>
                <td colspan="5">&nbsp;</td>
                </tr>
                <tr>
                <td colspan="5"><hr></td>
                </tr>
                <tr>
                <td colspan="5">&nbsp;</td>
                </tr>
		    @endforeach
            </table>
            <br><br>
	</div></div>