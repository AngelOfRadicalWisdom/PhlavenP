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
    <table style="margin:0 auto;width:80%;height:5%">
        <tr>
            <td style="text-align:left"><a href="<?php echo url('/revcenter/previewquestions/'.$lesson_ID.'/0')?>">BACK</a></td>
        </tr>
    </table>
<!-- <div class="w3-display-middle">-->
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
                <input type="hidden" name="question_ID" value="{{$question->tempquestion_ID}}">	
                <input type="hidden" name='type' value='{{$question->type}}'>
                </tr>

                <tr>
                <td colspan="4">&nbsp;</td>
                </tr>

                <?php $counter = 0; ?>
                    @foreach($choices as $choice)
                        <?php $counter++; ?>
                        
                        <tr>
                        <td colspan='2'>
                        <input type='hidden' name='choice[{{$counter}}][choice_ID]' value='{{$choice->tempchoice_ID}}'>
                        <?php switch($counter){ 
                            case 1 :
                            echo" <b>A.)</b> <textarea cols='50' required rows='5' name='choice[".$counter."][choice]'>".$choice->choice."</textarea>";
                            break; 
                            
                            case 2 :
                            echo" <b>B.) </b> <textarea cols='50' required rows='5' name='choice[".$counter."][choice]'>".$choice->choice."</textarea>";
                            break;
                            
                            case 3 :
                            echo" <b>C.) </b> <textarea cols='50' required rows='5' name='choice[".$counter."][choice]'>".$choice->choice."</textarea>";
                            break;
                            
                            case 4 :
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
                                        <option value="1">Easy</option>
                                        <option value="2">Moderate</option>
                                        <option value="3">Advanced</option>
                                     </Select>
                    </td>
                    <td> Correct Answer: <Select name="correct">
                            {{$choicecounter=0}}

                                <?php   $sel1 = "";
                                        $sel2 = ""; 
                                        $sel3 = "";
                                        $sel4 = "";
                                        
                                        switch ($question->correctanswer){
                                            case 1: $sel1 = " selected ";
                                            break;
                                            case 2: $sel2 = " selected ";
                                            break;
                                            case 3: $sel3 = " selected ";
                                            break;
                                            case 4: $sel4 = " selected ";
                                            break;
                                        };
                                ?>
                                @foreach($choices as $choice)          
                                <?php $choicecounter++;  ?>      

                                        <?php switch ($choicecounter){
                                            case 1: echo "<option value=".$choice->tempchoice_ID." ".$sel1.">A</option>";
                                            break;
                                            case 2: echo "<option value=".$choice->tempchoice_ID." ".$sel2.">B</option>";
                                            break;
                                            case 3: echo "<option value=".$choice->tempchoice_ID." ".$sel3.">C</option>";
                                            break;
                                            case 4: echo "<option value=".$choice->tempchoice_ID." ".$sel4.">D</option>";
                                            break;
                                        } ?>
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