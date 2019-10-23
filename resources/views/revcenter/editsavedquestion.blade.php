<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

</head>
@include('styles.style')
@include('styles.jquery')
<body>
	@include('includes.revcenterheader')<center>
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
    
    <br>
    
    <div div style=" background-color: white; width: 900px; border-radius: 25px;">
    <br>
<!-- <div class="w3-display-middle">-->
    <a href="<?php echo url('/revcenter/settings/lesson/'.$lesson->lesson_ID.'/viewquestions')?>">BACK</a>
    <h1 class="w3-jumbo w3-animate-top" style="color:black">&nbsp;Question</h1><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
        <hr style="width:80%;border-color:#006dcc">
            
        <!-- for questions within the lesson-->
        <form action="<?php echo url('/question/confirm')?>" method="POST">
        <?php echo csrf_field() ?>
        <table style="margin: 0px auto;width:50%;color:black">
            <tr>
                <td width="25%"></td>
                <td width="25%"></td>
                <td width="25%"></td>
                <td width="25%"></td>
            </tr>
            <tr>
                <td colspan = '4'><h3>Question</h3></td>
            </tr>
            
                <tr>
                <td colspan = '4'><textarea name="question" cols="50" rows="10">{{$question->question}}</textarea></td>
                <td></td>
                <input type="hidden" name="question_ID" value="{{$question->question_ID}}">	
                </tr>

                <tr>
                <td colspan="4">&nbsp;</td>
                </tr>

                <?php $counter = 0; ?>
                    @foreach($choices as $choice)
                        <?php $counter++; ?>
                        
                        <tr>
                        <td colspan='2'>
                        <input type='hidden' name='choice[{{$counter}}][choice_ID]' value='{{$choice->choice_ID}}'>
                        <?php $CA ="";
                            switch($counter){ 
                            case 1 :
                            if($question->correct_answer == $choice->choice_ID){
                                $CA = "A";
                            }
                            echo" <b>A.)</b> <textarea cols='50' required rows='5' name='choice[".$counter."][choice]'>".$choice->choice."</textarea>";
                            break; 
                            
                            case 2 :
                            if($question->correct_answer == $choice->choice_ID){
                                $CA = "B";
                            }
                            echo" <b>B.) </b> <textarea cols='50' required rows='5' name='choice[".$counter."][choice]'>".$choice->choice."</textarea>";
                            break;
                            
                            case 3 :
                            if($question->correct_answer == $choice->choice_ID){
                                $CA = "C";
                            }
                            echo" <b>C.) </b> <textarea cols='50' required rows='5' name='choice[".$counter."][choice]'>".$choice->choice."</textarea>";
                            break;
                            
                            case 4 :
                            if($question->correct_answer == $choice->choice_ID){
                                $CA = "D";
                            }
                            echo" <b>D.) </b> <textarea cols='50' required rows='5' name='choice[".$counter."][choice]'>".$choice->choice."</textarea>";
                            break;?>
                            </td>
                        <?php } ?>
                        </tr>
                        <tr>
                        <td colspan="5">&nbsp;</td>
                        </tr>
                    @endforeach()
                            
                <tr>
                    <td> Difficulty: <Select name="difficulty">
                                        <option value="1" <?php if ($question->difficulty == 1){ echo "selected"; }?> >Easy</option>
                                        <option value="2" <?php if ($question->difficulty == 2){ echo "selected"; }?>>Moderate</option>
                                        <option value="3" <?php if ($question->difficulty == 3){ echo "selected"; }?>>Advanced</option>
                                     </Select>
                    </td>
                    <td> Correct Answer: <Select name="correct">
                            {{$choicecounter=0}}
                            
                                @foreach($choices as $choice)          
                                <?php $choicecounter++;  ?>    
                                        <?php switch ($choicecounter){  
                                            
                                            case 1: echo "<option value=".$choice->choice_ID;
                                                    if ($choice->choice_ID == $question->correctanswer){ echo " selected";
                                                    }
                                                    echo ">A";
                                            break;
                                            case 2: echo "<option value=".$choice->choice_ID;
                                                    if ($choice->choice_ID == $question->correctanswer){ echo " selected";
                                                    }
                                                    echo ">B";
                                            break;
                                            case 3: echo "<option value=".$choice->choice_ID;
                                                    if ($choice->choice_ID == $question->correctanswer){ echo " selected";
                                                    }
                                                    echo ">C";
                                            break;
                                            case 4: echo "<option value=".$choice->choice_ID;
                                                    if ($choice->choice_ID == $question->correctanswer){ echo " selected";
                                                    }
                                                    echo ">D";
                                            break;
                                        } ?>
                                        </option>
                                @endforeach()
                                     </Select>
                    </td>
                </tr>
                <tr>
                
                </tr>
                <td colspan="5">&nbsp;</td>
                </tr>
                <tr>
                <td colspan="5"><hr></td>
                </tr>
                <tr>
                <td colspan="5">&nbsp;</td>
                </tr>
                <tr>
                <td colspan="5"><input type="submit" value="SAVE"><input type="submit" value="DELETE"></td>
                </tr>
            </table>
            </form>
            <br><br>
	</div></div>