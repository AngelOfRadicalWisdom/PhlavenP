<html>
<head><title>Phlaven</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

</head>
@include('styles.style')
@include('styles.jquery')
<body>
	@include('includes.revcenterheader')
	<center>
	<div class="bgimg w3-display-container w3-animate-opacity w3-text-black">
    
    <br>
    
    <div div style=" background-color: white; width: 900px; border-radius: 25px;">
    <br>
    <table style="margin:0 auto;width:80%;height:5%">
        <tr>
            <td style="text-align:left"><a href="<?php echo url('/revcenter/previewquestionsPM/'.$lesson_ID.'/0')?>">BACK</a></td>
        </tr>
    </table>
<!-- <div class="w3-display-middle">-->
    <h1 class="w3-jumbo w3-animate-top" style="color:black">&nbsp;Question</h1><br>

    <!-- <h5 class="w3-jumbo w3-animate-top">All new users are required to take a diagnostic exam</h5> -->
        <hr style="width:80%;border-color:#006dcc">
            
        <!-- for questions within the lesson-->
        <form action="<?php echo url('/questionpm/confirm')?>" method="POST">
        <?php echo csrf_field() ?>
        <table style="margin: 0px auto;width:50%;color:black">
                <tr>
                    <td width="25%"></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                    <td width="25%"></td>
                </tr>
                <tr>
                    <td colspan = '4'><h3>Question </h3></td>
                </tr>
            
                <tr>
                <td colspan = '4'>
                <input type="hidden" name='lesson_ID' value='{{$question->lesson_ID}}'>
                <textarea name="q[0][0][question]" cols="50" rows="10">{{$question->question}}</textarea></td>
                <td></td>
                <input type="hidden" name="q[0][0][question_ID]" value="{{$question->tempquestion_ID}}">	
                </tr>

                <tr>
                <td colspan="4">&nbsp;</td>
                </tr>

                <?php $subquestioncounter = 0; ?>

                <tr>
                <td colspan="4">&nbsp;</td>
                </tr>

                @foreach($question->questionsubquestions as $subquestion)
                <?php $subquestioncounter++; ?>
                <tr>
                <td colspan = '4'><h3>Subquestion {{$subquestioncounter}}</h3></td>
                </tr>

                <tr>
                <td colspan = '4'>
                <textarea name="q[{{$subquestioncounter}}][0][question]" cols="50" rows="10">{{$subquestion->question}}</textarea></td>
                <td></td>
                <input type="hidden" name="q[{{$subquestioncounter}}][0][question_ID]" value="{{$subquestion->tempsubquestion_ID}}">	
                </tr>

                <tr>
                    <td>&nbsp;</td>
                </tr>

                    <?php $answergrpcounter = 0; ?>
                    
                    @foreach($subquestion->subquestionanswergroup as $answergrp)
                    <?php $answergrpcounter++; ?>
                    <tr>
                    <td colspan = '4'><h3>Answer Group {{$answergrp->question}}</h3></td>
                    </tr>

                    <tr>
                    <input type="hidden" name="q[{{$subquestioncounter}}][{{$answergrpcounter}}][question]" value="{{$answergrp->question}}">	
                    <input type="hidden" name="q[{{$subquestioncounter}}][{{$answergrpcounter}}][question_ID]" value="{{$answergrp->tempanswergroup_ID}}">	

                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                            <?php $choicecounter = 0;?>
                            @foreach($answergrp->questionchoices as $choice)
                            <?php $choicecounter++; ?>
                            <tr>
                            <td colspan = '4'>
                            <input type="text" name="q[{{$subquestioncounter}}][{{$answergrpcounter}}][choice][{{$choicecounter}}]" value="{{$choice->choice}}">
                            <input type="hidden" name="q[{{$subquestioncounter}}][{{$answergrpcounter}}][choice_ID][{{$choicecounter}}]" value="{{$choice->tempchoice_ID}}">
                            </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                            </tr>

                            @endforeach

                            <tr>
                            <td colspan="2"> Difficulty: <Select name="q[{{$subquestioncounter}}][{{$answergrpcounter}}][difficulty]">
                                             <option value="1">Easy</option>
                                             <option value="2">Moderate</option>
                                             <option value="3">Advanced</option>
                                             </Select>
                            </td>
                            <td colspan="2"> Correct Answer: 
                                            <Select name="q[{{$subquestioncounter}}][{{$answergrpcounter}}][correct]">
                                                @foreach($answergrp->questionchoices as $choice)
                                                    <option value="{{$choice->tempchoice_ID}}">{{$choice->choice}}</option>
                                                @endforeach
                                            </Select>
                                        </td>
                                        </tr>

                        @endforeach

                        <tr>
                        <td colspan="4">&nbsp;</td>
                        </tr>

                @endforeach
                
                <tr>
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