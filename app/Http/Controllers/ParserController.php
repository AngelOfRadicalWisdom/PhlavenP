<?php

namespace App\Http\Controllers;
//namespace AppBundle\Controllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Smalot\PdfParser\Parser;
use Webpatser\Uuid\Uuid;
use App\QuestionBank;
use App\ChoiceBank;
use App\TempQuestionBank;
use App\TempSubquestionBank;
use App\TempAnswergroupBank;
use App\TempChoiceBank;

/** the PDF Parser class*/



class ParserController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function parseFile($filepath)
    {
        $pdfFilePath = "../public".$filepath;

        $PDFParser = new Parser();

        $pdf = $PDFParser->parseFile($pdfFilePath);

        $text = $pdf->getText();

        return $text;
    }

    public function uploadPDF(Request $request){

        $file = $request->file('scanpdf');
        $new_name = rand().'.'.$file->getClientOriginalExtension(); 
        $file->move(public_path("resources"),$new_name);
        $lesson_name = $request->lesson_name;
        $lesson_ID = $request->lesson_ID;

        $filepath="/resources/".$new_name;
        
        //QUESTIONS SECTION HERE
        
        
        $parsedtext= $this->parseFile($filepath);
        $typecheck = "/( ?Morning ?)/";
        $typecheck= preg_split($typecheck,$parsedtext);

        if(count($typecheck) > 1){
            //AM QUESTION
            $companynamespattern = "/symbols are not used within./";

            $textsplit= preg_split($companynamespattern,$parsedtext);

            
            $questionpattern = "/Q ?[0-9] ?[0-9]?\./";
            $questionsplit = preg_split($questionpattern,$textsplit[1]);

            
            $questioncounter=0;
            foreach($questionsplit as $question){
                    //it skips the first question as it is empty
                if ($questioncounter!=0){
                    
                    //echo "<b>Q".$questioncounter.".</b><br>";

                    //here the question will be split from the question

                    $choicesplit= preg_split("/(a ?\)|b ?\)|c ?\)|d ?\))/",$question);
                
                //this counter helps discern which elements are which
                $choicecounter=0;
                
                $question_ID = Uuid::generate()->string;
                foreach($choicesplit as $choice){
                    //the first entry of the choice contains the question itself
                    
                    switch ($choicecounter){
                        case"0":
                            //this is the question
                            $this->createNewTempQuestion($question_ID,$questioncounter,$lesson_ID,$choice,"AM");
                            break;
                        case "1":
                            //echo "<br>a) ".$choice;
                            $this->createNewTempChoice($question_ID,$choicecounter,$choice);
                            break;
                        case "2":
                            //echo "<br>b) ".$choice;
                            $this->createNewTempChoice($question_ID,$choicecounter,$choice);
                            break;
                        case "3":
                            //echo "<br>c) ".$choice;
                            $this->createNewTempChoice($question_ID,$choicecounter,$choice);
                            break;
                        case "4":
                            //echo "<br>d) ".$choice;
                            $this->createNewTempChoice($question_ID,$choicecounter,$choice);
                            break;
                    }
                    $choicecounter++;
                }
                }
                
                $questioncounter++;
                
            }

            // ANSWER KEY SECTION HERE

            if($request->file('scankey'))
            {

                $keyfile = $request->file('scankey');
                $new_keyname = rand().'.'.$file->getClientOriginalExtension(); 
                $keyfile->move(public_path("resources"),$new_keyname);
                $filepath="/resources/".$new_keyname;
                $parsedkey= $this->parseFile($filepath);
                $headerpattern = "/Answer/";

                $keysplit= preg_split($headerpattern,$parsedkey);

                $letterpattern = "//";
                $finalkeysplit = preg_split($letterpattern,$keysplit[2]);

                $size = sizeof($finalkeysplit);
                $keyarray = array();

                    //preprocessing

                    for($i = 0 ; $i < $size; $i++){
                        
                            $check= $finalkeysplit[$i];
                            
                            //seek out the first number
                            if(preg_match('/[0-9]+/',$check)){
                                array_push($keyarray,$check);
                            }else if(preg_match("/[a-z]/",$check)){
                                array_push($keyarray,$check);
                            }

                    }

                    //actual processing
                    $keysize = sizeof($keyarray);
                    $finalarray = array();
                    $letterfound = false;
                    //dd($keysize);
                    $j = 0;

                    do{
                        $number = $keyarray[$j];

                            if(preg_match('/[0-9]+/',$number)){
                                $j++;

                                if(preg_match('/[0-9]/',$keyarray[$j])){
                                    $number = ($number*10)+$keyarray[$j];
                                        $j++;
                                        if(preg_match('/[0-9]/',$keyarray[$j])){
                                            $number = ($number*10)+$keyarray[$j];
                                        }else{
                                            $letter = $keyarray[$j];
                                        }
                                }else{
                                    $letter = $keyarray[$j];
                                }

                                $finalarray[] = array(
                                    'number' => $number,
                                    'letter' => $letter
                                );
                            }else{
                                echo "error encountered, not a number!!!";
                            }
                        
                        $j++;

                    }while($j < $keysize--);
                        //applying the answer key
                        
                        
                        //dd($finalarray);
                        foreach($finalarray as $row){
                            $questionused = TempQuestionBank::where('lesson_ID',$lesson_ID)->where('order',(int)$row['number'])->first();

                            if($questionused){

                                switch ($row['letter']){
                                    case "a" : $choiceorder = 1;
                                    break;
                                    case "b" : $choiceorder = 2;
                                    break;
                                    case "c" : $choiceorder = 3;
                                    break;
                                    case "d" : $choiceorder = 4;
                                    break;
                                    default: "Error";
                                }

                                TempQuestionBank::where('tempquestion_ID',$questionused->tempquestion_ID)
                                                ->update([
                                                    'correctanswer' => $choiceorder
                                                ]);
                            }
                        }
            }

        return redirect(url('/revcenter/previewquestions/'.$lesson_ID.'/0'));
        }else{
            //PM QUESTION
            $typecheck = "/( ?Afternoon ?)/";
            $typecheck= preg_split($typecheck,$parsedtext);

            // if(count($typecheck) > 1){

            // }

            $companynamespattern = "/symbols are not used within./";

            $textsplit= preg_split($companynamespattern,$parsedtext);

            $questionpattern = "/Q ?[0-9] ?[0-9]?\./";
            $questionsplit = preg_split($questionpattern,$textsplit[1]);

            $questioncounter=0;
            foreach($questionsplit as $question){
                    //it skips the first question as it is empty
                    $question_ID = Uuid::generate()->string;

                if ($questioncounter!=0){

                    $subquestionpattern = "/Subquestion /";
                    $subquestionsplit = preg_split($subquestionpattern,$questionsplit[$questioncounter]);

                    // echo count($subquestionsplit);
                    $subquestioncounter = 0;
                        
                        foreach($subquestionsplit as $question){
                            
                            if($subquestioncounter == 0){
                                // echo "<b>Q".$questioncounter.".</b><br>";
                                //echo "QUESTION: ".$subquestionsplit[0]."<br>";
                                
                                //saving questions
                                
                                $this->createNewTempQuestion($question_ID,$questioncounter,$lesson_ID,$subquestionsplit[0],"PM");
                                
                            }else{
                                
                                // echo "<br>SUBQUESTION: ".$subquestionsplit[$subquestioncounter]."<br>";

                                $answergrppattern = "/Answer group for/";
                                $answergrpsplit = preg_split($answergrppattern,$subquestionsplit[$subquestioncounter]);
                                $answergrpcounter = 0;

                                $subquestion_ID = Uuid::generate()->string;
                                $subquestion = $answergrpsplit[0];
                                
                                $subquestiontest = 0;

                                    foreach($answergrpsplit as $answergroup){
                                        $choicesplit= preg_split("/[a-z] ?\)/",$answergroup);

                                            $choicecounter = 0;
                                            $answergrp_ID = Uuid::generate()->string;
                                            foreach($choicesplit as $choice){
                                                //dd($choicecounter);
                                                if($subquestiontest == 0 && $choicecounter == 0){
                                                    $this->createNewTempSubQuestion($subquestion_ID, $subquestion,$question_ID);
                                                }elseif($subquestiontest != 0 && $choicecounter == 0){
                                                    $this->createNewTempAnswergroup($answergrp_ID,$choice,$subquestion_ID);
                                                    $answergrpcounter++;
                                                }else{
                                                    
                                                    switch($choicecounter){
                                                        case '1': $letter = "A";
                                                        break;

                                                        case '2': $letter = "B";
                                                        break;

                                                        case '3': $letter = "C";
                                                        break;

                                                        case '4': $letter = "D";
                                                        break;

                                                        case '5': $letter = "E";
                                                        break;

                                                        case '6': $letter = "F";
                                                        break;

                                                        case '7': $letter = "G";
                                                        break;

                                                        case '8': $letter = "H";
                                                        break;

                                                        case '9': $letter = "I";
                                                        break;

                                                        case '10': $letter = "J";
                                                        break;

                                                        case '11': $letter = "K";
                                                        break;

                                                        case '12': $letter = "L";
                                                        break;

                                                        case '13': $letter = "M";
                                                        break;

                                                        case '14': $letter = "N";
                                                        break;

                                                        case '15': $letter = "O";
                                                        break;

                                                        case '16': $letter = "P";
                                                        break;

                                                        case '17': $letter = "Q";
                                                        break;

                                                        case '18': $letter = "R";
                                                        break;

                                                        case '19': $letter = "S";
                                                        break;

                                                        case '20': $letter = "T";
                                                        break;
                                                    }

                                                    //echo $letter.") ".$choice."<br>";
                                                    $this->createNewTempChoice($answergrp_ID,$choicecounter,(string)$choice);
                                                }
                                                $choicecounter++;
                                                $subquestiontest++;
                                            }
                                        
                                    }


                                    //if the subquestion has no answer groups, create a dummy container instead
                                    if($answergrpcounter == 0){

                                        $answergrppattern = "/Answer group/";
                                        $answergrpsplit = preg_split($answergrppattern,$subquestionsplit[$subquestioncounter]);
                                        
                                        $answergrp_ID = Uuid::generate()->string;
                                        $this->createNewTempAnswergroup($answergrp_ID,"",$subquestion_ID);
                                        
                                        
                                        $choicesplit= preg_split("/[^[a-z][a-z] ?\)/",$subquestionsplit[$subquestioncounter]);
                                        //dd($choicesplit);

                                        $choicecounter = 0;

                                        foreach($choicesplit as $choice){
                                            //dd($choicecounter);

                                                $this->createNewTempChoice($answergrp_ID,$choicecounter,(string)$choice);

                                            $choicecounter++;
                                            $subquestiontest++;
                                        }
                                    }
                            } 

                            $subquestioncounter++;
                        }
                        echo"<br>----------------------------------------------------------------------<br>";
                    // echo $subquestioncounter."<br><br>";
                    //return redirect(url('/revcenter/previewquestionsPM/'.$lesson_ID.'/0'));
                }
            $questioncounter++;
            }
        }
        //echo "SUCCESSSSSSS";
        return redirect(url('/revcenter/previewquestionsPM/'.$lesson_ID.'/0'));
        }

        //recursive functions

        public function createNewTempQuestion($question_ID,$order,$lesson_ID,$question,$type){
            $order = str_pad($order, 3, '0', STR_PAD_LEFT);
            $question = substr($question, 0, 1000);
            TempQuestionBank::create([
                'tempquestion_ID'=>$question_ID,
                'order'=>$order,
                'type'=>$type,
                'parent_question_ID'=>null,
                'lesson_ID'=>$lesson_ID,
                'question'=>$question,
                'correctanswer'=>null,
                'difficulty'=>0
            ]);

        }

        public function createNewTempSubQuestion($question_ID,$question,$parent_ID){
            TempSubquestionBank::create([
                'tempsubquestion_ID'=>$question_ID,
                'tempquestion_ID'=>$parent_ID,
                'question'=>$question,
                'correctanswer'=>null,
                'difficulty'=>0
            ]);
        }

        public function createNewTempAnswergroup($question_ID,$question,$parent_ID){
            TempAnswergroupBank::create([
                'tempanswergroup_ID'=>$question_ID,
                'tempsubquestion_ID'=>$parent_ID,
                'question'=>$question,
                'correctanswer'=>null,
                'difficulty'=>0
            ]);
        }

        public function createNewTempChoice($question_ID,$order,$choice){
            $order = str_pad($order, 3, '0', STR_PAD_LEFT);
            TempChoiceBank::create([
                'tempchoice_ID'=>Uuid::generate()->string,
                'choiceorder'=>$order,
                'tempquestion_ID'=>$question_ID,
                'choice'=>$choice
            ]);

        }

        public function createNewQuestion($question_ID,$lesson_ID,$question,$type){

            QuestionBank::create([
                'question_ID'=>$question_ID,
                'type' => $type,
                'parent_question_ID'=>"",
                'lesson_ID'=>$lesson_ID,
                'question'=>$question,
                'correctanswer'=>"",
                'difficulty'=>0
            ]);

        }

        public function createNewChoice($question_ID,$choice){

            ChoiceBank::create([
                'choice_ID'=>Uuid::generate()->string,
                'question_ID'=>$question_ID,
                'choice'=>$choice
            ]);

        }
}
