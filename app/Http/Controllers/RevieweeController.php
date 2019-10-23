<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use App\Users;
use App\Nodes;
use App\LearningPath;
use App\LearningPathNodes;
use App\LearningPathNodeStatus;
use App\Lessons;
use App\LessonStatus;
use App\QuestionBank;
use App\ResourceBank;
use App\TableOfSpecs;
use App\TableOfSpecsLessons;
use App\UserExams;
use App\UserExamQuestions;
use App\ExamResults;
use App\RevCenter;
use App\UserRevCenter;
use App\UserLearningPath;
use App\ModuleChoices;
use App\LessonModule;
use App\ModuleQuestion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RevieweeController extends Controller
{
    public function goHome(){
        
        $user = $this->getCurrentUser();
        return view('reviewee.home');
    }

    public function takeDiag($learningpath_ID){
        return view('reviewee.takediag')->with('learningpath',$learningpath_ID);
    }

    public function takeMock($learningpath_ID){
        $user = $this->getCurrentUser();
        //getting the rev center of the user logged in
        $learningpath=LearningPath::where('learningpath_ID',$learningpath_ID)->first();
        $revcenter=$learningpath->revcenter_ID;

        //search if an unfinished Exam has already been generated
        $searchExam = UserExams::where('user_ID',$user->user_ID)->where('examtype',"MOCK")->where('status',0)->orderby('datecreated','desc')->first();
        
        //are there no unfinished Exams of the lesson generated?
        if($searchExam==null){

            $TOS = TableOfSpecs::where('revcenter_ID',$revcenter)->where('type',"MOCK")->orderby('datecreated','desc')->first();
            
            
            $TOS_Row = TableOfSpecsLessons::where('tableofspecs_ID',$TOS->tableofspecs_ID)->get();
    
            date_default_timezone_set('Asia/Manila');
    
            $date=date("Y-m-d H:i:s");
            
            $generatedExamID = Uuid::generate()->string;
    
            //Exam Part
            UserExams::create([
                'exam_ID' => $generatedExamID,
                'user_ID' => $user->user_ID,
                'examtype' => "MOCK",
                'score' => 0,
                'status' => 0,
                'datecreated' => $date,
                'tableofspecs_ID'=>$TOS->tableofspecs_ID,
                'token'=>$user->mobile_token
            ]);
    
            $allotedpoints=round(800/count($TOS_Row),2);
    
            foreach($TOS_Row as $row){
                $questions =    $row->questionsnumber;
                $extraquestion = 0;
                $unit = $questions*(0.1);
    
                $dif3 = floor($unit*2);
                $extraquestion = ($unit*2)-$dif3;
                $dif2 = floor($unit*3);
                $extraquestion += ($unit*3)-$dif2;
                $dif1 = floor($unit*5);
                $extraquestion += ($unit*5)-$dif1;
                $dif1 +=$extraquestion;
                $dif1 = round($dif1);
    
                // echo "<br>Diff 1 =".$dif1."<br>";
                // echo "Diff 2 =".$dif2."<br>";
                // echo "Diff 3 =".$dif3."<br><br>";
                
    
                $adjustedscore = $allotedpoints/6;
    
                $score1 = $adjustedscore*1;
                $score2 = $adjustedscore*2;
                $score3 = $adjustedscore*3;
                
                $pointsper1 = round($score1/$dif1,2);
                $pointsper2 = round($score2/$dif2,2);
                $pointsper3 = round($score3/$dif3,2);
    
                // echo "1 =".$pointsper1."<br>";
                // echo "2 =".$pointsper2."<br>";
                // echo "3 =".$pointsper3."<br><br>";
    
                $questionsd1 = QuestionBank::inRandomOrder()->where('lesson_ID',$row->lesson_ID)->where('difficulty',1)->take($dif1)->get();
                foreach($questionsd1 as $examquestion){
                    // echo"question difficulty 1 inserted<br>";
                        UserExamQuestions::create([
                            'exam_ID' => $generatedExamID,
                            'question_ID' => $examquestion->question_ID,
                            'correct' => 0,
                            'score' => $pointsper1
                        ]);
                }
                $questionsd2 = QuestionBank::inRandomOrder()->where('lesson_ID',$row->lesson_ID)->where('difficulty',2)->take($dif2)->get();
                foreach($questionsd2 as $examquestion){
                    // echo"question difficulty 2 inserted<br>";
                        UserExamQuestions::create([
                            'exam_ID' => $generatedExamID,
                            'question_ID' => $examquestion->question_ID,
                            'correct' => 0,
                            'score' => $pointsper2
                        ]);
                }
                $questionsd3 = QuestionBank::inRandomOrder()->where('lesson_ID',$row->lesson_ID)->where('difficulty',3)->take($dif3)->get();
                foreach($questionsd3 as $examquestion){
                    // echo"question difficulty 3 inserted<br>";
                        UserExamQuestions::create([
                            'exam_ID' => $generatedExamID,
                            'question_ID' => $examquestion->question_ID,
                            'correct' => 0,
                            'score' => $pointsper3
                        ]);
                }
    
            }
            $questions = UserExamQuestions::where('exam_ID',$generatedExamID)->inRandomOrder()->get();
            $exam_ID = $generatedExamID;
            $modulechoices = ModuleChoices::inRandomOrder()->get();
            }else{
                
                $questions = UserExamQuestions::where('exam_ID',$searchExam->exam_ID)->inRandomOrder()->get();
                $exam_ID = $searchExam->exam_ID;
                $modulechoices = ModuleChoices::inRandomOrder()->get();
            }
    
            return view('reviewee.mockexam')->with(compact('questions'))
                                                  ->with('exam_ID',$exam_ID)
                                                  ->with(compact('modulechoices'))
                                                  ->with('learningpath',$learningpath_ID);
    }
    public function MobiletakeMock($learningpath_ID){
   //     $user = $this->getCurrentUser();
        //getting the rev center of the user logged in
   //     $learningpath=LearningPath::where('learningpath_ID',$learningpath_ID)->first();
     //   $revcenter=$learningpath->revcenter_ID;
     $user=DB::table('users')->where('username',$request->username)->select('user_ID','users.mobile_token')->first();
         //$userdata[]=(array)$user;
         $learningpath=DB::table('users')
         ->join('userlearningpath','users.mobile_token','=','userlearningpath.token')

         ->select('userlearningpath.learningpath_ID')
         ->where('users.username',$request->username)
         ->first();
        
         $revcenter=DB::table('users')
         ->join('userrevcenter','users.mobile_token','userrevcenter.token')
         ->select('userrevcenter.revcenter_ID')
         ->where('users.username',$request->username)
         ->first();

        //search if an unfinished Exam has already been generated
        $searchExam = UserExams::where('user_ID',$user->user_ID)->where('examtype',"MOCK")->where('status',0)->orderby('datecreated','desc')->select('exam_ID')->first();
        
        //are there no unfinished Exams of the lesson generated?
        if($searchExam==null){

            $TOS = TableOfSpecs::where('revcenter_ID',$revcenter->revcenter_ID)->where('type',"MOCK")->orderby('datecreated','desc')->select('tableofspecs_ID')->first();
            
            
            $TOS_Row = TableOfSpecsLessons::where('tableofspecs_ID',$TOS->tableofspecs_ID)->get();
    
            date_default_timezone_set('Asia/Manila');
    
            $date=date("Y-m-d H:i:s");
            
            $generatedExamID = Uuid::generate()->string;
    
            //Exam Part
            UserExams::create([
                'exam_ID' => $generatedExamID,
                'user_ID' => $user->user_ID,
                'examtype' => "MOCK",
                'score' => 0,
                'status' => 0,
                'datecreated' => $date,
                'tableofspecs_ID'=>$TOS->tableofspecs_ID,
                'token'=>$user->mobile_token
            ]);
    
            $allotedpoints=round(800/count($TOS_Row),2);
    
            foreach($TOS_Row as $row){
                $questions = $row->questionsnumber;
                $extraquestion = 0;
                $unit = $questions*(0.1);
    
                $dif3 = floor($unit*2);
                $extraquestion = ($unit*2)-$dif3;
                $dif2 = floor($unit*3);
                $extraquestion += ($unit*3)-$dif2;
                $dif1 = floor($unit*5);
                $extraquestion += ($unit*5)-$dif1;
                $dif1 +=$extraquestion;
                $dif1 = round($dif1);
    
                // echo "<br>Diff 1 =".$dif1."<br>";
                // echo "Diff 2 =".$dif2."<br>";
                // echo "Diff 3 =".$dif3."<br><br>";
                
    
                $adjustedscore = $allotedpoints/6;
    
                $score1 = $adjustedscore*1;
                $score2 = $adjustedscore*2;
                $score3 = $adjustedscore*3;
                
                // $pointsper1 = round($score1/$dif1,2);
                // $pointsper2 = round($score2/$dif2,2);
                // $pointsper3 = round($score3/$dif3,2);
                            
            $pointsper1 = 0;
            if($dif1 != 0 && $score1!=0) {
                $pointsper1 = round($score1/$dif1,2);
            }
            $pointsper2 = 0;
            
            if($dif2 != 0 && $score2!=0) {
                $pointsper2 = round($score2/$dif2,2);
            }
            $pointsper3 = 0;
            
            if($dif3 != 0 && $score3!= 0) {
                $pointsper3 = round($score3/$dif3,2);
            }
    
                // echo "1 =".$pointsper1."<br>";
                // echo "2 =".$pointsper2."<br>";
                // echo "3 =".$pointsper3."<br><br>";
    
                $questionsd1 = QuestionBank::inRandomOrder()->where('lesson_ID',$row->lesson_ID)->where('difficulty',1)->take($dif1)->get();
                foreach($questionsd1 as $examquestion){
                    // echo"question difficulty 1 inserted<br>";
                        UserExamQuestions::create([
                            'exam_ID' => $generatedExamID,
                            'question_ID' => $examquestion->question_ID,
                            'correct' => 0,
                            'score' => $pointsper1
                        ]);
                }
                $questionsd2 = QuestionBank::inRandomOrder()->where('lesson_ID',$row->lesson_ID)->where('difficulty',2)->take($dif2)->get();
                foreach($questionsd2 as $examquestion){
                    // echo"question difficulty 2 inserted<br>";
                        UserExamQuestions::create([
                            'exam_ID' => $generatedExamID,
                            'question_ID' => $examquestion->question_ID,
                            'correct' => 0,
                            'score' => $pointsper2
                        ]);
                }
                $questionsd3 = QuestionBank::inRandomOrder()->where('lesson_ID',$row->lesson_ID)->where('difficulty',3)->take($dif3)->get();
                foreach($questionsd3 as $examquestion){
                    // echo"question difficulty 3 inserted<br>";
                        UserExamQuestions::create([
                            'exam_ID' => $generatedExamID,
                            'question_ID' => $examquestion->question_ID,
                            'correct' => 0,
                            'score' => $pointsper3
                        ]);
                }
    
            }
            $questions = UserExamQuestions::where('exam_ID',$generatedExamID)->inRandomOrder()->get();
            $exam_ID = $generatedExamID;
            $modulechoices = ModuleChoices::inRandomOrder()->get();
            }else{
                
                $questions = UserExamQuestions::where('exam_ID',$searchExam->exam_ID)->inRandomOrder()->get();
                $exam_ID = $searchExam->exam_ID;
                $modulechoices = ModuleChoices::inRandomOrder()->get();
            }
            $questionResponse=DB::table('userexamquestions')->join('questionbank','userexamquestions.question_ID','=','questionbank.question_ID')
        ->select('questionbank.question_ID','questionbank.question')
        ->where('userexamquestions.exam_ID',$exam_ID)
        ->get();
    
       
    }

    public function startDiag($learningpath_ID){
        $user = $this->getCurrentUser();
        $learningpath=LearningPath::where('learningpath_ID',$learningpath_ID)->first();
        $revcenter=$learningpath->revcenter_ID;
        $searchExam = UserExams::where('user_ID',$user->user_ID)->where('examtype',"DIA")->where('status',0)->orderby('datecreated','desc')->first();
        if($searchExam==null){

            $TOS = TableOfSpecs::where('revcenter_ID',$revcenter)->where('type',"DIA")->orderby('datecreated','desc')->first();
            
            
            $TOS_Row = TableOfSpecsLessons::where('tableofspecs_ID',$TOS->tableofspecs_ID)->get();
    
            date_default_timezone_set('Asia/Manila');
    
            $date=date("Y-m-d H:i:s");
            
            $generatedExamID = Uuid::generate()->string;
    
         //   Exam Part
            UserExams::create([
                'exam_ID' => $generatedExamID,
                'user_ID' => $user->user_ID,
                'examtype' => "DIA",
                'score' => 0,
                'status' => 0,
                'datecreated' => $date,
                'tableofspecs_ID'=>$TOS->tableofspecs_ID,
                'token'=>$user->mobile_token
            ]);
    
            $allotedpoints=round(800/count($TOS_Row),2);
    
            foreach($TOS_Row as $row){ 
                $questions = $row->questionsnumber;
                $extraquestion = 0;
                $unit = $questions*(0.1);
    
                $dif3 = floor($unit*2);
                $extraquestion = ($unit*2)-$dif3;
                $dif2 = floor($unit*3);
                $extraquestion += ($unit*3)-$dif2;
                $dif1 = floor($unit*5);
                $extraquestion += ($unit*5)-$dif1;
                // $dif1 +=$extraquestion;
                // $dif2 +=$extraquestion;
                // $dif3 +=$extraquestion;
                $dif1 = round($dif1);
                $dif2 = round($dif2);
                $dif3 = round($dif3);
    
                // echo "<br>Diff 1 =".$dif1."<br>";
                // echo "Diff 2 =".$dif2."<br>";    
                // echo "Diff 3 =".$dif3."<br><br>";
                
    
                 $adjustedscore = $allotedpoints/6;
    
             $score1 = $adjustedscore*1;
                $score2 = $adjustedscore*2;
                $score3 = $adjustedscore*3;
                
                 $pointsper1 = round($score1/$dif1,2);
                $pointsper2 = round($score2/$dif2,2);
                $pointsper3 = round($score3/$dif3,2);
    
                // echo "1 =".$pointsper1."<br>";
                // echo "2 =".$pointsper2."<br>";
                // echo "3 =".$pointsper3."<br><br>";
    
                $questionsd1 = QuestionBank::inRandomOrder()->where('lesson_ID',$row->lesson_ID)->where('difficulty',1)->take($dif1)->get();
                foreach($questionsd1 as $examquestion){
                    // echo"question difficulty 1 inserted<br>";
                        UserExamQuestions::create([
                            'exam_ID' => $generatedExamID,
                            'question_ID' => $examquestion->question_ID,
                            'correct' => 0,
                            'score' => $pointsper1
                        ]);
                }
                $questionsd2 = QuestionBank::inRandomOrder()->where('lesson_ID',$row->lesson_ID)->where('difficulty',2)->take($dif2)->get();
                foreach($questionsd2 as $examquestion){
                    // echo"question difficulty 2 inserted<br>";
                        UserExamQuestions::create([
                            'exam_ID' => $generatedExamID,
                            'question_ID' => $examquestion->question_ID,
                            'correct' => 0,
                            'score' => $pointsper2
                        ]);
                }
                $questionsd3 = QuestionBank::inRandomOrder()->where('lesson_ID',$row->lesson_ID)->where('difficulty',3)->take($dif3)->get();
                foreach($questionsd3 as $examquestion){
                    // echo"ques tion difficulty 3 inserted<br>";
                        UserExamQuestions::create([
                            'exam_ID' => $generatedExamID,
                            'question_ID' => $examquestion->question_ID,
                            'correct' => 0,
                            'score' => $pointsper3
                        ]);
                }
    
            }
            $questions = UserExamQuestions::where('exam_ID',$generatedExamID)->inRandomOrder()->get();
            $exam_ID = $generatedExamID;
            $modulechoices = ModuleChoices::inRandomOrder()->get();
            }else{
                
                $questions = UserExamQuestions::where('exam_ID',$searchExam->exam_ID)->inRandomOrder()->get();
                $exam_ID = $searchExam->exam_ID;
                $modulechoices = ModuleChoices::inRandomOrder()->get();
            }
    
            return view('reviewee.diagnosticexam')->with(compact('questions'))
                                                  ->with('exam_ID',$exam_ID)
                                                  ->with(compact('modulechoices'))
                                                  ->with('learningpath',$learningpath_ID);
    //        dd($modulechoices);
        
    }   
    public function MobilestartDiag(Request $request){
 
        // $diagnosticexam=DB::table('users') 
        // ->join('userlearningpath','users.mobile_token','=','userlearningpath.token')
        // ->join('learningpath','userlearningpath.learningpath_ID','=','learningpath.learningpath_ID')
        // ->join('lessons','learningpath.revcenter_ID','=','lessons.revcenter_ID')
        // ->join('questionbank','lessons.lesson_ID','=','questionbank.lesson_ID')
        // ->select('questionbank.question')
        // ->where('users.username',$request['username'])
        //   ->get(); 
   
   //       $choices=DB::table('users')
   //     ->join('userlearningpath','users.mobile_token','=','userlearningpath.token')
   //      ->join('learningpath','userlearningpath.learningpath_ID','=','learningpath.learningpath_ID')
   //     ->join('lessons','learningpath.revcenter_ID','=','lessons.revcenter_ID')
   //     ->join('questionbank','lessons.lesson_ID','=','questionbank.lesson_ID')
   //     ->join('modulechoices','questionbank.question_ID','=','modulechoices.modulequestion_ID') 
   //     ->select('questionbank.question','modulechoices.choice')
   //     ->where('users.username',$request['username'])   
   //    ->get();
       //    $response = array(
       //     'question' => $diagnosticexam,
       //     'choices'=>$choices,
   
       // );
   
   
         // return response()->json($diagnosticexam);
         $user=DB::table('users')->where('username',$request->username)->select('user_ID','mobile_token')->first();
        //$userdata[]=(array)$user;
         $learningpath=DB::table('users')
         ->join('userlearningpath','users.mobile_token','=','userlearningpath.token')
         ->select('userlearningpath.learningpath_ID')
         ->where('users.username',$request->username)
         ->first();
        
         $revcenter=DB::table('users')
         ->join('userrevcenter','users.mobile_token','=','userrevcenter.token')
         ->join('revcenter','revcenter.revcenter_ID','=','userrevcenter.revcenter_ID')
         ->select('userrevcenter.revcenter_ID')
         ->where('revcenter.revcenter_name',$request->revcenter)
         ->where('users.username',$request->username)
         ->first();
         
      //search if an unfinished Exam has already been generated
         $searchExam = UserExams::where('user_ID',$user->user_ID)->where('examtype',"DIA")->where('status',0)->orderby('datecreated','desc')->select('exam_ID')->first();

        //are there no unfinished Exams of the lesson generated?
      if($searchExam==null){

         $TOS = TableOfSpecs::where('revcenter_ID',$revcenter->revcenter_ID)->where('type',"DIA")->orderby('datecreated','desc')->select('tableofspecs_ID')->first();
        
        
        $TOS_Row = TableOfSpecsLessons::where('tableofspecs_ID',$TOS->tableofspecs_ID)->get();

         date_default_timezone_set('Asia/Manila');

        $date=date("Y-m-d H:i:s");
        
        $generatedExamID = Uuid::generate()->string;

       //Exam Part
         UserExams::create([
            'exam_ID' => $generatedExamID,
             'user_ID' => $user->user_ID,
             'examtype' => "DIA",
              'score' => 0,
              'status' => 0,
             'datecreated' => $date,
             'tableofspecs_ID'=>$TOS->tableofspecs_ID,
             'token'=>$user->mobile_token
         ]);

        $allotedpoints=round(800/count($TOS_Row),2);

         foreach($TOS_Row as $row){
             $questions = $row->questionsnumber;
             $extraquestion = 0;
             $unit = $questions*(0.1);

             $dif3 = floor($unit*2);
             $extraquestion = ($unit*2)-$dif3;
             $dif2 = floor($unit*3);
             $extraquestion += ($unit*3)-$dif2;
             $dif1 = floor($unit*5);
             $extraquestion += ($unit*5)-$dif1;
             $dif1 +=$extraquestion;
            $dif1 = round($dif1);

            // echo "<br>Diff 1 =".$dif1."<br>";
            // echo "Diff 2 =".$dif2."<br>";
            // echo "Diff 3 =".$dif3."<br><br>";
            

            $adjustedscore = $allotedpoints/6;

            $score1 = $adjustedscore*1;
            $score2 = $adjustedscore*2;
            $score3 = $adjustedscore*3;
            
            $pointsper1 = 0;
            if($dif1 != 0 && $score1!=0) {
                $pointsper1 = round($score1/$dif1,2);
            }
            $pointsper2 = 0;
            
            if($dif2 != 0 && $score2!=0) {
                $pointsper2 = round($score2/$dif2,2);
            }
            $pointsper3 = 0;
            
            if($dif3 != 0 && $score3!= 0) {
                $pointsper3 = round($score3/$dif3,2);
            }
            

            // echo "1 =".$pointsper1."<br>";
            // echo "2 =".$pointsper2."<br>";
            // echo "3 =".$pointsper3."<br><br>";

            $questionsd1 = QuestionBank::inRandomOrder()->where('lesson_ID',$row->lesson_ID)->where('difficulty',1)->take($dif1)->get();
            foreach($questionsd1 as $examquestion){
                // echo"question difficulty 1 inserted<br>";
                    UserExamQuestions::create([
                        'exam_ID' => $generatedExamID,
                        'question_ID' => $examquestion->question_ID,
                        'correct' => 0,
                        'score' => $pointsper1
                    ]);
            }
            $questionsd2 = QuestionBank::inRandomOrder()->where('lesson_ID',$row->lesson_ID)->where('difficulty',2)->take($dif2)->get();
            foreach($questionsd2 as $examquestion){
                // echo"question difficulty 2 inserted<br>";
                    UserExamQuestions::create([
                        'exam_ID' => $generatedExamID,
                        'question_ID' => $examquestion->question_ID,
                        'correct' => 0,
                        'score' => $pointsper2
                    ]);
            }
            $questionsd3 = QuestionBank::inRandomOrder()->where('lesson_ID',$row->lesson_ID)->where('difficulty',3)->take($dif3)->get();
            foreach($questionsd3 as $examquestion){
                // echo"question difficulty 3 inserted<br>";
                    UserExamQuestions::create([
                        'exam_ID' => $generatedExamID,
                        'question_ID' => $examquestion->question_ID,
                        'correct' => 0,
                        'score' => $pointsper3
                    ]);
            }

        }
        $questions = UserExamQuestions::where('exam_ID',$generatedExamID)->inRandomOrder()->get();
        $exam_ID = $generatedExamID;
        $modulechoices = ModuleChoices::inRandomOrder()->get();
        }else{
            
            $questions = UserExamQuestions::where('exam_ID',$searchExam->exam_ID)->inRandomOrder()->get();
            $exam_ID = $searchExam->exam_ID;
            $modulechoices = ModuleChoices::inRandomOrder()->get();
        }  
        $questionResponse=DB::table('userexamquestions')->join('questionbank','userexamquestions.question_ID','=','questionbank.question_ID')
        ->select('questionbank.question_ID','questionbank.question','userexamquestions.exam_ID')
        ->where('userexamquestions.exam_ID',$exam_ID)
        ->get();

//         // return response()->json([ 
//         //    'questions'=>$questions,
//         //    'exam_ID'=>$exam_ID,
//         //    'choices'=>$modulechoices,
//         //    'learningpath'=>$learningpath->learningpath_ID,
//         //     //'TOSROW'=>$TOS_Row
//         // ]);
// return response()->json($questionResponse);
    return response()->json($questionResponse);

   
       }
    

    public function viewLearningPathSelection(){
        $user = $this->getCurrentUser();
        $revcenters = $this->getRevCenters($user->user_ID);
        return view('reviewee.learningpathselection')->with(compact('revcenters'));
    }
    public function MobileviewLearningPathSelection(Request $request){
        $user_ID = DB::table('users')->where('username',$request['username'])->first();
       //$revcenters = $this->getRevCenters($user_ID->user_ID);
      $revcenter=DB::table('userrevcenter')->where('user_ID',$user_ID->user_ID)->select('revcenter_ID')->get();
      foreach($revcenter as $revcenternames){
      $revcentername=DB::table('revcenter')->select('revcenter_name','revcenter_ID')->where('revcenter_ID',$revcenternames->revcenter_ID)->get();
    
       
      }
      $sendRevcentername=$revcentername;
      return response()->json([
        "revcenter_name"=>$sendRevcentername,

      ]);
          
      
             // return response()->json($userrevcenter);
          }

    public function viewLearningPath($revcenter_ID){

        $user = $this->getCurrentUser();
        $learningpath = $this->getLearningPathbyRevCenter_ID($revcenter_ID);

        $searchlearningpath=UserLearningPath::where('user_ID',$user->user_ID)->where('learningpath_ID',$learningpath->learningpath_ID)->first();
        
        //diagnostic enforcer
         if($searchlearningpath->status == 0){
             return redirect(url('/reviewee/'.$learningpath->learningpath_ID.'/takediag'));
         }

        $nodes = $this->getNodebyrevcenter_ID($revcenter_ID);
        $learningpathnodes = $this->getLearningPathNodebyID($learningpath->learningpath_ID);

        return view('reviewee.learningpathvisualization')->with(compact('nodes'))
                                                         ->with(compact('learningpathnodes'))
                                                         ->with('learningpath_ID',$learningpath->learningpath_ID);
    }
    public function MobileViewLearningPath(Request $request){
    $user=DB::table('users')->where('username',$request['username'])->first();
    $learningpath = $this->getLearningPathbyRevCenter_ID($request->revcenter);
    $searchlearningpath=UserLearningPath::where('user_ID',$user->user_ID)->where('learningpath_ID',$learningpath->learningpath_ID)->first();
    if($searchlearningpath->status == 0){
        $message="It Looks like you haven't taken the diagnostic test yet!";
        $status=0;
        return response()->json([
         "message"=>$message,
         "status"=>$status
        ]);
    }

   $nodes = $this->getNodebyrevcenter_ID($request->revcenter);
   $learningpathnodes = $this->getLearningPathNodebyID($learningpath->learningpath_ID);
   $status=1;
   return response()->json([
       "chapter_name"=>$nodes,
       "learningpathnodes"=>$learningpathnodes,
       "learningpath_ID"=>$learningpath->learningpath_ID,
       "status"=>$status
   ]);
    }
    public function startNode($node_ID){
        $user = $this->getCurrentUser();
        $user_ID = $user->user_ID;
        $revcenters = $this->getRevCenters($user->user_ID);

        $searchnode= LearningPathNodes::where('learningpathnode_ID',$node_ID)->first();
        $learningpath_ID = $searchnode->learningpath_ID;
        $chapter_ID= $searchnode->chapter_ID;

        $searchLP = LearningPath::where('learningpath_ID',$learningpath_ID)->first();
        $revcenter_ID = $searchLP->revcenter_ID;

        $prerequisite = LearningPathNodes::where('parent_ID',$node_ID)->get();
        $prerequisitecount= count($prerequisite);

        //does the node have no prerequisite at all?        

        if($prerequisitecount == 0){
            $prerequisitestatus="allowed";
            $nodestatus=LearningPathNodeStatus::where('reviewee_ID',$user_ID)->where('chapter_ID',$chapter_ID)->first();

            $lessons=Lessons::where('chapter_ID',$chapter_ID)->get();
            $lessonstatus=LessonStatus::where('reviewee_ID',$user_ID)->where('learningpath_ID',$learningpath_ID)->get();

            return view("reviewee.startlesson")->with('prerequisitestatus',$prerequisitestatus)
                                               ->with(compact('lessons'))
                                               ->   with(compact('lessonstatus'))
                                               ->with(compact('nodestatus'))
                                               ->with('node_ID',$searchnode->chapters->chapter_name);
        }

        //does the node have a prerequisite?
        else{
            $totalnodes=0;
            $passedcount=0;
            $prerequisitemessage="You cannot proceed, you need to pass the following class/es<br><br><div class='row'>";

            //get all the node's prerequisites

            //check each prerequisites status
            
            foreach($prerequisite as $row){
                $totalnodes++;
                $retrievestatus=LearningPathNodeStatus::where('reviewee_ID',$user_ID)->where('learningpath_ID',$learningpath_ID)->where('chapter_ID',$row->chapter_ID)->first();
                
                    if($retrievestatus->status == 0){
                        $prerequisitemessage .="<div class='button' style='width:300px'><h1><a href='http://localhost:8000/reviewee/learningpath/startnode/".$row->learningpathnode_ID."' class='header-link'>".$retrievestatus->chapters->chapter_name."</a></div>";
                    }
                    else{
                        $passedcount++;
                    }
            }
            
            $prerequisitemessage .= "</div>";

            //did the user pass all prerequisites?
            if($totalnodes == $passedcount){
                
                $prerequisitestatus="allowed";
                $nodestatus=LearningPathNodeStatus::where('reviewee_ID',$user_ID)->where('chapter_ID',$chapter_ID)->first();
                $lessons=Lessons::where('chapter_ID',$chapter_ID)->get();
                $lessonstatus=LessonStatus::where('reviewee_ID',$user_ID)->where('learningpath_ID',$learningpath_ID)->get();
                
                return view("reviewee.startlesson")->with('prerequisitestatus',$prerequisitestatus)
                                                   ->with(compact('lessons'))
                                                   ->with(compact('lessonstatus'))
                                                   ->with(compact('nodestatus'))
                                                   ->with('node_ID',$searchnode->chapters->chapter_name);
            }else{
                $nodestatus=LearningPathNodeStatus::where('reviewee_ID',$user_ID)->where('chapter_ID',$chapter_ID)->first();
                $lessons=Lessons::where('chapter_ID',$chapter_ID)->get();
                $lessonstatus=LessonStatus::where('reviewee_ID',$user_ID)->where('learningpath_ID',$learningpath_ID)->get();

                $prerequisitestatus="notallowed";

                return view("reviewee.startlesson")->with('prerequisitestatus',$prerequisitestatus)
                                                   ->with(compact('lessons'))
                                                   ->with(compact('lessonstatus'))
                                                   ->with(compact('nodestatus'))
                                                   ->with('prerequisitemessage',$prerequisitemessage)
                                                   ->with('node_ID',$searchnode->chapters->chapter_name);
            }

            
            //check if all the prerequisites have been passed

            
            
        }
        

    }
    public function MobilestartNode(Request $request){
        $user_ID = DB::table('users')->select('user_ID')->where('username',$request['username'])->first();
        $revcenters = $this->getRevCenters($user_ID->user_ID);
        $searchnode= DB::table('learningpathnodes')->select('learningpathnode_ID','chapter_ID','learningpath_ID')->where('chapter_ID',$request->chapter_ID)->first();
        $chapterName=DB::table('chapters')->select('chapter_name')->where('chapter_ID',$request->chapter_ID)->first();
        $searchLP = DB::table('learningpath')->where('learningpath_ID',$searchnode->learningpath_ID)->first();
        $revcenter_ID = $searchLP->revcenter_ID;
        $prerequisite = LearningPathNodes::where('parent_ID',$searchnode->learningpath_ID)->get();
        $prerequisitecount= count($prerequisite);
            if($prerequisitecount == 0){
            $prerequisitestatus="allowed";
            $nodestatus=LearningPathNodeStatus::where('reviewee_ID',$user_ID->user_ID)->where('chapter_ID',$searchnode->chapter_ID)->first();
            $lessons=Lessons::where('chapter_ID',$searchnode->chapter_ID)->get();
            $lessonstatus=LessonStatus::where('reviewee_ID',$user_ID->user_ID)->where('learningpath_ID',$searchnode->learningpath_ID)->get();
            return response()->json([
                'prerequisitestatus'=>$prerequisitestatus,
                'lessons'=>$lessons,
                'lessonstatus'=>$lessonstatus,
                'nodestatus'=>$nodestatus,
                'chapter_name'=>$chapterName,

            ]);
            }
            else{
                  //does the node have a prerequisite?
            $totalnodes=0;
            $passedcount=0;
            $prerequisitemessage="You cannot proceed, you need to pass the following class/es";
            foreach($prerequisite as $row){
                $totalnodes++;
                $retrievestatus=LearningPathNodeStatus::where('reviewee_ID',$user_ID->user_ID)->where('learningpath_ID',$searchnode->learningpath_ID)->where('chapter_ID',$row->chapter_ID)->first();
                if($retrievestatus->status == 0){
                    $prerequisiteChapter=DB::table('chapters')->where('chapter_ID',$row->chapter_ID)->get();
                }
                else{
                    $passedcount++;
                }
            }
            if($totalnodes == $passedcount){
                $prerequisitestatus="allowed";
                $nodestatus=LearningPathNodeStatus::where('reviewee_ID',$user_ID->user_ID)->where('chapter_ID',$searchnode->chapter_ID)->first();
                $lessons=Lessons::where('chapter_ID',$searchnode->chapter_ID)->get();
                $lessonstatus=LessonStatus::where('reviewee_ID',$user_ID->user_ID)->where('learningpath_ID',$searchnode->learningpath_ID)->get();
                $chapterName=DB::table('chapters')->select('chapter_name')->where('chapter_ID',$searchnode->chapter_ID)->first();
                return response()->json([
                    'prerequisitestatus'=>$prerequisitestatus,
                    'nodestatus'=>$nodestatus,
                    'lessons'=>$lessons,
                    'lessonstatus'=>$lessonstatus,
                    'chapter_name'=>$chapterName,
                ]);
        }else{
            $nodestatus=LearningPathNodeStatus::where('reviewee_ID',$user_ID->user_ID)->where('chapter_ID',$searchnode->chapter_ID)->first();
            $lessons=Lessons::where('chapter_ID',$searchnode->chapter_ID)->get();
            $lessonstatus=LessonStatus::where('reviewee_ID',$user_ID->user_ID)->where('learningpath_ID',$searchnode->learningpath_ID)->get();

            $prerequisitestatus="notallowed";
            return response()->json([
                'prerequisitestatus'=>$prerequisitestatus,
                'nodestatus'=>$nodestatus,
                'lessons'=>$lessons,
                'lessonstatus'=>$lessonstatus,
                'chapter_name'=>$chapterName,
                'prerequisitemessage'=>$prerequisitemessage,
                'prerequisitechapter'=>$prerequisiteChapter,
            ]);
        }
        // $nodestatus=LearningPathNodeStatus::where('reviewee_ID',$user_ID->user_ID)->where('chapter_ID',$searchnode->chapter_ID)->first();
        // return response()->json($nodestatus);
     
    }
}
    

    public function startLesson($lesson_name){
           //determining which user is currently logged on
        $user_ID = Auth::id();
        //getting the user table where the user id in previous line exists
        $user = Users::where('user_ID',$user_ID)->first();
        //getting the rev center of the user logged in

        $revcenter = $user->revcenter_ID;
        $lessonsearch = Lessons::where('lesson_name',$lesson_name)->where('revcenter_ID',$user->revcenter_ID)->first();
        $lesson_ID = $lessonsearch->lesson_ID;

        //retrieve a random resource from the resource bank
        $resource = ResourceBank::inRandomOrder()->where('lesson_ID',$lesson_ID)->first();

        return view("reviewee.takelesson")
                                          ->with(compact('resource'))
                                          ->with('lesson_ID',$lesson_ID)
                                          ->with('lesson_name',$lesson_name);
    }    
    public function MobilestartLesson(Request $request){
        $user_ID = DB::table('users')->where('username',$request['username'])->first();
        //getting the user table where the user id in previous line exists
        //$user = Users::where('user_ID',$user_ID)->first();
        //getting the rev center of the user logged in

        $revcenter = $user_ID->revcenter_ID;
        $lessonsearch = Lessons::where('lesson_name',$reuqest->lesson_name)->where('revcenter_ID',$user_ID->revcenter_ID)->first();
        $lesson_ID = $lessonsearch->lesson_ID;

        //retrieve a random resource from the resource bank
        $resource = ResourceBank::inRandomOrder()->where('lesson_ID',$lesson_ID)->first();
        return response()->json([
            'resource'=>$resource,
            'lesson_ID'=>$lesson_ID,
            'lesson_name' =>$request->lesson_name,
        ]);
      
 }    

    public function takeExercise($revcenter,$lesson_name){

        $user_ID = Auth::id();
        $user = Users::where('user_ID',$user_ID)->first();

        $lessonused=Lessons::where('lesson_name',$lesson_name)->where('revcenter_ID',$revcenter)->first();
        date_default_timezone_set('Asia/Manila');
        $date=date("Y-m-d H:i:s");

        $searchExam = UserExams::where('user_ID',$user->user_ID)->where('examtype',"VAL")->where('status',0)->orderby('datecreated','desc')->first();

        //are there no unfinished Exams of the lesson generated?
        if($searchExam==null){
        $LessonTOS = null;

        //retrieve the Validatory TOS from the review center
        $TOS = TableOfSpecs::where('revcenter_ID',$revcenter)->where('type',"VAL")->orderby('datecreated','desc')->get();
        foreach ($TOS as $row){
            $searchLessonTOS = TableOfSpecsLessons::where('tableofspecs_ID',$row->tableofspecs_ID)->where('lesson_ID',$lessonused->lesson_ID)->first();
            if($searchLessonTOS != null){
                $LessonTOS = TableOfSpecsLessons::where('lesson_ID',$lessonused->lesson_ID)->where('tableofspecs_ID',$row->tableofspecs_ID)->first();
            }
        }
        $generatedExamID = Uuid::generate()->string;

        //Exam Creation
        UserExams::create([
            'exam_ID' => $generatedExamID,
            'user_ID' => $user->user_ID,
            'examtype' => "VAL",
            'score' => 0,
            'status' => 0,
            'datecreated' => $date,
            'tableofspecs_ID'=>$LessonTOS->tableofspecs_ID
        ]);
        
        $unit = round(($LessonTOS->questionsnumber*0.1),2);
        $extraquestions = 0;

            $dif3 = floor($unit*2);
            $extraquestion = ($unit*2)-$dif3;
            $dif2 = floor($unit*3);
            $extraquestion = ($unit*3)-$dif2;
            $dif1 = floor($unit*5);
            $extraquestion = ($unit*5)-$dif1;
            $dif1 +=$extraquestion;
            $dif1 = round($dif1);

            $adjustedscore = 100/6;

            echo $LessonTOS->questionsnumber;
            $score1 = $adjustedscore*1;
            $score2 = $adjustedscore*2;
            $score3 = $adjustedscore*3;
            
            $pointsper1 = round($score1/$dif1,2);
            $pointsper2 = round($score2/$dif2,2);
            $pointsper3 = round($score3/$dif3,2);
        
        $examquestionseasy = QuestionBank::inRandomOrder()->where('lesson_ID',$lessonused->lesson_ID)->where('difficulty',1)->take($dif1)->get();
        $examquestionsmoderate = QuestionBank::inRandomOrder()->where('lesson_ID',$lessonused->lesson_ID)->where('difficulty',2)->take($dif2)->get();
        $examquestionshard = QuestionBank::inRandomOrder()->where('lesson_ID',$lessonused->lesson_ID)->where('difficulty',3)->take($dif3)->get();

        
        foreach($examquestionseasy as $question){
            UserExamQuestions::create([
                'exam_ID' => $generatedExamID,
                'question_ID' => $question->question_ID,
                'correct' => 0,
                'score' => $pointsper1
            ]);
        }

        foreach($examquestionsmoderate as $question){
            UserExamQuestions::create([
                'exam_ID' => $generatedExamID,
                'question_ID' => $question->question_ID,
                'correct' => 0,
                'score' => $pointsper2
            ]);
        }

        foreach($examquestionshard as $question){
            UserExamQuestions::create([
                'exam_ID' => $generatedExamID,
                'question_ID' => $question->question_ID,
                'correct' => 0,
                'score' => $pointsper3
            ]);
        }
        $modulechoices = ModuleChoices::inRandomOrder()->get();
        $exam_to_use = UserExamQuestions::where('exam_ID',$generatedExamID)->inRandomOrder()->get();
        return view("reviewee.lessonquiz")->with(compact('exam_to_use'))
                                          ->with(compact('modulechoices'))
                                          ->with('lesson_name',$lesson_name)
                                          ->with('lesson_ID',$lessonused->lesson_ID)
                                          ->with('exam_ID',$generatedExamID);
        }else{
        $modulechoices = ModuleChoices::inRandomOrder()->get();
        $exam_to_use = UserExamQuestions::where('exam_ID',$searchExam->exam_ID)->inRandomOrder()->get();
        return view("reviewee.lessonquiz")->with(compact('exam_to_use'))
                                          ->with(compact('modulechoices'))
                                          ->with('lesson_name',$lesson_name)
                                          ->with('lesson_ID',$lessonused->lesson_ID)
                                          ->with('exam_ID',$searchExam->exam_ID);
        }

    }

    public function viewProfile(){
        $user_ID = Auth::id();
        $revcenters = UserRevCenter::where('user_ID',$user_ID)->get();
        $user = Users::where('user_ID',$user_ID)->first();

        $diagnosticExam = UserExams::where('user_ID',$user_ID)->where('examtype',"DIA")->first();
        $lessons = Lessons::orderby('lesson_ID','desc')->get();
        
        //get all exams
        $exams = UserExams::where('user_ID',$user_ID)->orderby('datecreated','desc')->get();
        $examscores = ExamResults::orderby('lesson_ID','desc')->get();

        return view("reviewee.profile")->with(compact('user'))
                                       ->with(compact('lessons'))
                                       ->with(compact('exams'))
                                       ->with(compact('examscores'))
                                       ->with(compact('revcenters'));
    }
    public function MobileviewProfile(Request $request){
        $user = DB::table('users')->where('username',$request['username'])->first();
        $revcenters = UserRevCenter::where('user_ID',$user->user_ID)->get();

        $diagnosticExam = UserExams::where('user_ID',$user->user_ID)->where('examtype',"DIA")->first();
        $lessons = Lessons::orderby('lesson_ID','desc')->get();
        
        //get all exams
        $exams = UserExams::where('user_ID',$user->user_ID)->orderby('datecreated','desc')->get();
        $examscores = ExamResults::orderby('lesson_ID','desc')->get();

        return response()->json([
            "user"=>$user,
            "lessons"=>$lessons,
            "exams"=>$exams,
            "examscores"=>$examscores,
            "revcenters"=>$revcenters,

        ]);
    }


    public function viewBackupResource($lesson_name){
        $user_ID = Auth::id();
        $usedlesson = Lessons::where('lesson_name',$lesson_name)->first();

        $usedresource =ResourceBank::where('lesson_ID',$usedlesson->lesson_ID)->inRandomOrder()->first();
        $lessonmodule =LessonModule::where('lesson_ID',$usedlesson->lesson_ID)->get();
        
        // foreach($resourcelist as $resource){
        //     $search = 0;
        //     foreach($lessonmodule as $row){
        //         if($resource->resource_ID==$row->resource_ID){
        //         $search = 1;
        //         }
        //     }

        //     if($search == 0){
        //         $usedresource = ResourceBank::where('resource_ID',$resource->resource_ID)->first();}
        // }
        return view("reviewee.viewbackupresource")->with('lesson_name',$lesson_name)
                                                ->with(compact('usedresource'));
    }
    public function MobileviewBackupResource(Request $request){
        $user = DB::table('users')->where('username',$request['username'])->first();
        $usedlesson = Lessons::where('lesson_name',$request->lesson_name)->first();

        $usedresource =ResourceBank::where('lesson_ID',$usedlesson->lesson_ID)->inRandomOrder()->first();
        $lessonmodule =LessonModule::where('lesson_ID',$usedlesson->lesson_ID)->get();
        
        // foreach($resourcelist as $resource){
        //     $search = 0;
        //     foreach($lessonmodule as $row){
        //         if($resource->resource_ID==$row->resource_ID){
        //         $search = 1;
        //         }
        //     }

        //     if($search == 0){
        //         $usedresource = ResourceBank::where('resource_ID',$resource->resource_ID)->first();}
        // }
        return response()->json([
        "lessonname"=>$request->lesson_name,
        "usedresource"=>$usedresource,
        ]);

    }

    public function answerValidationExam(Request $request){
        $questioncounter = 0;
        $rightanswercounter = 0;

        UserExams::where('exam_ID',$request->exam_ID)
                     ->update(['status'=>1]);

        foreach($request->entry as $key => $entry){
            
            $examquestion = UserExamQuestions::where('exam_ID',$request->exam_ID)->where('question_ID',$entry["question"])->first();
            $questioncounter += $examquestion->score;
            $question = QuestionBank::where('question_ID',$entry["question"])->first();
            
            if($question->correctanswer == $entry["answer"]){
                $rightanswercounter += $examquestion->score;
                UserExamQuestions::where('exam_ID',$request->exam_ID)
                                 ->where('question_ID',$entry["question"])
                                 ->update(['correct'=>1]);
                
            }

        }
        //did the user get the passing mark?
        $percentage = ($rightanswercounter / $questioncounter)*100;
        if (round($percentage)>60){
            UserExams::where('exam_ID',$request->exam_ID)
                     ->update(['score'=>round($percentage)]);

            //determining which user is currently logged on
            $user_ID = Auth::id();
            //getting the user table where the user id in previous line exists
            $user = Users::where('user_ID',$user_ID)->first();

            LessonStatus::where('lesson_ID',$request->lesson_ID)
                        ->where('reviewee_ID',$user->user_ID)
                        ->update(['status'=>1]);

            $lesson= Lessons::where('lesson_ID',$request->lesson_ID)->first();
            $chapter_ID = $lesson->chapter_ID;
            $lessonsgroup = Lessons::where('chapter_ID',$lesson->chapter_ID)->get();

            $statuscounter=0;
            $passedcounter=0;

            //check if the user has passed all lessons in that chapter
            foreach($lessonsgroup as $lesson){
            $statuscounter++;

            $lessonstatus = LessonStatus::where('lesson_ID',$lesson->lesson_ID)
                                        ->where('reviewee_ID',$user_ID)
                                        ->first();
            if($lessonstatus->status == 1){
                $passedcounter++;
            }
            }
            //did the user pass all lessons in this chapter?
            if($statuscounter == $passedcounter){
                LearningPathNodeStatus::where('reviewee_ID',$user_ID)
                                      ->where('chapter_ID',$chapter_ID)
                                      ->update(['status'=>1,
                                                'progress'=>$passedcounter]);
            }
            $status = "passed";
            $supplementary = null;
        }else{
            $status = "failed";
            $lesson= Lessons::where('lesson_ID',$request->lesson_ID)->first();
            $supplementary = Lessons::where('parent_ID',$request->lesson_ID)->get();
        }
        return view('reviewee.results')->with('status',$status)
                                       ->with('percentage',$percentage)
                                       ->with('lesson_name',$lesson->lesson_name)
                                       ->with(compact('supplementary'));
    }

    public function answerDiagnosticExam(Request $request){
        //determining which user is currently logged on
        $user_ID = Auth::id();
        $examused = UserExams::where('exam_ID',$request->exam_ID)->first();
        
        $learningpath_ID = $request->learningpath_ID;

        UserLearningPath::where('user_ID',$user_ID)
                        ->where('learningpath_ID',$learningpath_ID)
                        ->update(['status'=>1]);
        foreach($request->entry as $key => $entry){
            $maxscore = 0;
            $yourscore = 0;
            $examquestion = UserExamQuestions::where('exam_ID',$request->exam_ID)->where('question_ID',$entry["question"])->first();

            $maxscore += $examquestion->score;

            if($examquestion->questions->correctanswer == $entry["answer"]){
                $yourscore += $examquestion->score;
                UserExamQuestions::where('exam_ID',$request->exam_ID)
                                 ->where('question_ID',$entry["question"])
                                 ->update(['correct'=>1]);
            }
        }
    

        $percentage = round (($yourscore/$maxscore)*100,2);
        

        //retrieving the lessons useed in the exam
        $TOSused = $examused->tableofspecs_ID;
        $lessonsused = TableOfSpecsLessons::where('tableofspecs_ID',$TOSused)->get();

        //retrieve which Questions were used in the exam
        $examquestionsused = UserExamQuestions::where('exam_ID',$request->exam_ID)->get();

        $counter = 0;
        foreach($lessonsused as $lesson){
            $lesson_ID = $lesson->lesson_ID;
            $score = 0;
            $totalscore = 0;

            foreach($examquestionsused as $row){
                //match if the exam question is under the lesson
                if($lesson->lesson_ID == $row->questions->lesson_ID){
                    //check if the answer was correct
                        $totalscore += $row->score;
                    if($row->correct == 1){
                        //add to the status score
                        $score += $row->score;
                    }
                }
            }

            $percentage = round(($score/$totalscore)*100,2);

            ExamResults::create([
                'exam_ID'=>$examused->exam_ID,
                'lesson_ID'=>$lesson->lesson_ID,
                'perfectscore'=>$totalscore,
                'userscore'=>$score,
                'percentage'=>$percentage
            ]);

                //excempt
                if ($percentage >= 90 ){
                    
                    LessonStatus::where('lesson_ID',$lesson_ID)
                                ->where('reviewee_ID',$user_ID)
                                ->update(['status'=>1]);
                
                    $lesson= Lessons::where('lesson_ID',$lesson_ID)->first();
                    $chapter_ID = $lesson->chapter_ID;
                    $lessonsgroup = Lessons::where('chapter_ID',$chapter_ID)->get();

                    $statuscounter=0;
                    $passedcounter=0;
    
                    //check if the user has passed all lessons in that chapter
                    foreach($lessonsgroup as $lesson){
                    $statuscounter++;
                    $lessonstatuscheck = LessonStatus::where('lesson_ID',$lesson->lesson_ID)
                                                ->where('reviewee_ID',$user_ID)
                                                ->first();
                    if($lessonstatuscheck->status == 1){
                    $passedcounter++;
                    }
                    }

                    if($statuscounter == $passedcounter){
                        LearningPathNodeStatus::where('reviewee_ID',$user_ID)
                                              ->where('chapter_ID',$chapter_ID)
                                              ->update(['status'=>1,
                                                        'progress'=>$passedcounter]);
                    }
            }

            }

            Users::where('user_ID',$user_ID)
                     ->update(['diagnostic'=>1]);
  
            UserExams::where('exam_ID',$request->exam_ID)
                     ->where('user_ID',$user_ID)
                     ->where('examtype',"DIA")
                     ->update(['status'=>1]);

        $TOSused = TableOfSpecs::where('tableofspecs_ID',$examused->tableofspecs_ID)->first();
        
        return redirect(url('/diagnosticexam/'.$TOSused->revcenter_ID.'/results'));
    }
    
    public function MobanswerDiagnosticExam(Request $request){
     
    }

    public function answerMockExam(Request $request)     {
        //determining which user is currently logged on
        $user_ID = Auth::id();
        $examused = UserExams::where('exam_ID',$request->exam_ID)->first();
        
        $learningpath_ID = $request->learningpath_ID;

        UserLearningPath::where('user_ID',$user_ID)
                        ->where('learningpath_ID',$learningpath_ID)
                        ->update(['status'=>1]);
        


        foreach($request->entry as $key => $entry){
            $maxscore = 0;
            $yourscore = 0;
            $examquestion = UserExamQuestions::where('exam_ID',$request->exam_ID)->where('question_ID',$entry["question"])->first();

            $maxscore += $examquestion->score;

            if($examquestion->questions->correctanswer == $entry["answer"]){
                $yourscore += $examquestion->score;
                UserExamQuestions::where('exam_ID',$request->exam_ID)
                                 ->where('question_ID',$entry["question"])
                                 ->update(['correct'=>1]);
            }
        }
    

        $percentage = round (($yourscore/$maxscore)*100,2);
        

        //retrieving the lessons useed in the exam
        $TOSused = $examused->tableofspecs_ID;
        $lessonsused = TableOfSpecsLessons::where('tableofspecs_ID',$TOSused)->get();

        //retrieve which Questions were used in the exam
        $examquestionsused = UserExamQuestions::where('exam_ID',$request->exam_ID)->get();

        $counter = 0;
        foreach($lessonsused as $lesson){
            $lesson_ID = $lesson->lesson_ID;
            $score = 0;
            $totalscore = 0;

            foreach($examquestionsused as $row){
                //match if the exam question is under the lesson
                if($lesson->lesson_ID == $row->questions->lesson_ID){
                    //check if the answer was correct
                        $totalscore += $row->score;
                    if($row->correct == 1){
                        //add to the status score
                        $score += $row->score;
                    }
                }
            }

            $percentage = round(($score/$totalscore)*100,2);

            ExamResults::create([
                'exam_ID'=>$examused->exam_ID,
                'lesson_ID'=>$lesson->lesson_ID,
                'perfectscore'=>$totalscore,
                'userscore'=>$score,
                'percentage'=>$percentage
            ]);

            }

            UserExams::where('exam_ID',$request->exam_ID)
                     ->where('user_ID',$user_ID)
                     ->where('examtype',"MOCK")
                     ->update(['status'=>1]);


        return redirect(url('/mockexam/results'));
    }

    public function goDiagnosticResult($revcenter_ID){
        $user_ID = Auth::id();

        $diagnosticExam = UserExams::where('user_ID',$user_ID)->where('examtype',"DIA")->orderby('datecreated','desc')->first();
        $getresults = ExamResults::where('exam_ID',$diagnosticExam->exam_ID)->get();
        
        return view('reviewee.diagresults')->with(compact('getresults'))->with('revcenter_ID',$revcenter_ID);
    }
    public function MobilegoDiagnosticResult(Request $request){
        $user = DB::table('users')->where('username',$request['username'])->first();
        $diagnosticExam = UserExams::where('user_ID',$user->user_ID)->where('examtype',"DIA")->orderby('datecreated','desc')->first();
        $getresults = ExamResults::where('exam_ID',$diagnosticExam->exam_ID)->get();
        return response()->json([
            'diagnosticExam'=>$diagnosticExam,
            'results'=>$getresults

        ]);

    }
    public function goMockResult(){
        $user_ID = Auth::id();

        $mockExam = UserExams::where('user_ID',$user_ID)->where('examtype',"MOCK")->orderby('datecreated','desc')->first();
        $getresults = ExamResults::where('exam_ID',$mockExam->exam_ID)->get();
        
        return view('reviewee.mockresults')->with(compact('getresults'));
    }
    public function MobilegoMockResult(Request $request){
        $user = DB::table('users')->where('username',$request['username'])->first();

        $mockExam = UserExams::where('user_ID',$user->user_ID)->where('examtype',"MOCK")->orderby('datecreated','desc')->first();
        $getresults = ExamResults::where('exam_ID',$mockExam->exam_ID)->get();
        
        return resposnse()->json($getresults);
    }


    public function startMock($learningpath_ID){
        $user=$this->getCurrentUser();
        $learningpath=LearningPath::where('learningpath_ID',$learningpath_ID)->first();
        $prerequisites = LearningPathNodes::where('learningpath_ID',$learningpath_ID)->where('parent_ID',"Mock")->get();
        $perfect=0;
        $passed=0;
        foreach($prerequisites as $prerequisite){
        $perfect++;
        $lessonstatus = LearningPathNodeStatus::where('reviewee_ID',$user->user_ID)->where('chapter_ID',$prerequisite->chapter_ID)->first();
        $passed+=$lessonstatus->status;
        }

        if($passed == $perfect){
            $eligible = "true";
        }else{
            $eligible = "false";
        }

        return view("reviewee.takemock")->with('eligible',$eligible)
                                        ->with('revcenter_ID',$learningpath->revcenter_ID)
                                        ->with('learningpath_ID',$learningpath_ID);
    }
 
    public function startModule($revcenter_ID,$lesson_name,$index){
        $user = $this->getCurrentUser();
        $revcenter = UserRevCenter::where('user_ID',$user->user_ID)->where('revcenter_ID',$revcenter_ID)->first();

        $lesson = Lessons::where('lesson_name',$lesson_name)->where('revcenter_ID',$revcenter->revcenter_ID)->first();

        $lessonmodule = LessonModule::where('lesson_ID',$lesson->lesson_ID)->where('index',$index)->first();
        if($lessonmodule == null){
            return redirect(url("/reviewee/".$revcenter_ID."/".$lesson_name."/promptdrill"));
        }
        if($lessonmodule->resource_ID){
            return view("reviewee.startlessonmodule")->with(compact('lessonmodule'))
                                                     ->with(compact('lesson'))
                                                     ->with('revcenter',$revcenter_ID);
        }else{
            $choices = ModuleChoices::where('modulequestion_ID',$lessonmodule->modulequestions_ID)->inRandomOrder()->get();
            return view("reviewee.startquestionmodule")->with(compact('lessonmodule'))
                                                       ->with(compact('lesson'))
                                                       ->with(compact('choices'))
                                                       ->with('revcenter',$revcenter_ID);
        }
    }

    public function goExercisePrompt($revcenter_ID,$lesson_name){
       return view("reviewee.promptdrill")->with('revcenter_ID',$revcenter_ID)
                                          ->with('lesson_name',$lesson_name);
    }

    public function getResponse(Request $request){
        $nextindex = $request->index;
        $choice=ModuleChoices::where('modulechoice_ID',$request->choice)->first();
        $lesson=$request->lesson;
        $revcenter=$request->revcenter_ID;

        return view("reviewee.displayresponse")->with('response',$choice->response)
                                                ->with('lesson',$lesson)
                                                ->with('index',$nextindex)
                                                ->with('revcenter',$revcenter);
    }

    public function addRevCenter(){
        $user=$this->getCurrentUser();
        $userrevcenters = UserRevCenter::where('user_ID',$user->user_ID)->get();

        $revcenters = RevCenter::get();

        return view ("reviewee.addrevcenter")->with(compact('userrevcenters'))
                                             ->with(compact('revcenters'));
    }
    
    public function MobaddRevCenter(Request $request){
        $user=DB::table('users')->where('username',$request->username)->select('user_ID','users.mobile_token')->first();
        // $revcenters = DB::table('users')->join('userrevcenter','users.mobile_token','=','userrevcenter.token')->where('users.mobile_token',$user->mobile_token)
        // ->whereNotExists(function($query){
        //     $query->select(DB::raw('revcenter_ID'))
        //            ->from('revcenter')
        //           ->whereRaw('revcenter.revcenter_ID!=userrevcenter.revcenter_ID');
        // })->get();
     $revcenters=DB::table('users')->join('userrevcenter','users.mobile_token','=','userrevcenter.token')
     ->join('revcenter','userrevcenter.revcenter_ID','!=','revcenter.revcenter_ID')
     ->where('users.mobile_token',$user->mobile_token)
     ->select('revcenter.revcenter_name','revcenter.revcenter_ID')
     ->get();
        return response()->json($revcenters);
    }
    public function updateRevCenter(Request $request){
        $user=$this->getCurrentUser();
        $user_ID = $user->user_ID;

        foreach($request->revcenter as $row){
            $this->createNewUserRevCenter($user_ID,$row);
            $learningpath=$this->getLearningPathbyrevcenter_ID($row);
            $this->createNewUserLearningPath($user_ID,$learningpath->learningpath_ID,0);

            $nodelist = $this->getLearningPathNodesbyLearningPath_ID($learningpath->learningpath_ID);

            //population of the status tables for both the nodes and the lelssons inside the node
                foreach($nodelist as $node){

                    if($node->chapter_ID != "Mock"){

                    $total=0;

                    //creation of lesson status within each node
                    $lessonlist=$this->getLessonbyChapterIDandrevcenter_ID($node->chapter_ID,$row);
                    foreach($lessonlist as $lesson){

                        $this->createLessonStatus($user_ID,$learningpath->learningpath_ID,$lesson->lesson_ID);

                        $total++;
                    }

                    //creation of learningpath node status

                    $this->createLearningPathNodeStatus($user_ID,$learningpath->learningpath_ID,$node->chapter_ID,$total);
                    }else{
                        $this->createLearningPathNodeStatus($user_ID,$learningpath->learningpath_ID,"Mock",1);
                    }
                } 
            }

            return redirect(url('reviewee/profile'));
    }
    public function MobupdateRevCenter(Request $request){
        $user=DB::table('users')->where('username',$request->username)->select('user_ID','users.mobile_token')->first();

        foreach($request->revcenter as $row){
            $this->createNewUserRevCenter($user_ID,$row);
            $learningpath=$this->getLearningPathbyrevcenter_ID($row);
            $this->createNewUserLearningPath($user_ID,$learningpath->learningpath_ID,0);

            $nodelist = $this->getLearningPathNodesbyLearningPath_ID($learningpath->learningpath_ID);

            //population of the status tables for both the nodes and the lelssons inside the node
                foreach($nodelist as $node){

                    if($node->chapter_ID != "Mock"){

                    $total=0;

                    //creation of lesson status within each node
                    $lessonlist=$this->getLessonbyChapterIDandrevcenter_ID($node->chapter_ID,$row);
                    foreach($lessonlist as $lesson){

                        $this->createLessonStatus($user_ID,$learningpath->learningpath_ID,$lesson->lesson_ID);

                        $total++;
                    }

                    //creation of learningpath node status

                    $this->createLearningPathNodeStatus($user_ID,$learningpath->learningpath_ID,$node->chapter_ID,$total);
                    }else{
                        $this->createLearningPathNodeStatus($user_ID,$learningpath->learningpath_ID,"Mock",1);
                    }
                } 
            }

        }

    //----------------------------REUSABLE FUNCTIONS-----------------------------------

    public function getCurrentUser(){
        //determining which user is currently logged on
        $user_ID = Auth::id();
        //getting the user table where the user id in previous line exists
        $user = Users::where('user_ID',$user_ID)->first();

        return $user;
    }

    public function getLearningPathbyRevCenter_ID($revcenter_ID){
        $learningpath= LearningPath::where('revcenter_ID',$revcenter_ID)->orderby('createdat','desc')->first();

        return $learningpath;
    }

    public function getRevCenters($user_ID){
        $userrevcenter = UserRevCenter::where('user_ID',$user_ID)->get();

        return $userrevcenter;
    }

    public function getNodebyrevcenter_ID($revcenter_ID){
        $nodes=Nodes::where('revcenter_ID',$revcenter_ID)->get();
        return $nodes;
    }

    public function getLearningPathNodebyID($learningpath_ID){
        $learningpathnode = LearningPathNodes::where('learningpath_ID',$learningpath_ID)->get();

        return $learningpathnode;
    }

    public function createLessonStatus($reviewee_ID,$learningpath_ID,$lesson_ID,$rememberToken){
        LessonStatus::create([
            'reviewee_ID' => $reviewee_ID,
            'learningpath_ID' =>$learningpath_ID,
            'lesson_ID' => $lesson_ID,
            'status'=>0,
            'reviewee_token'=>$rememberToken,
        ]);
    }

    public function createLearningPathNodeStatus($user_ID,$learningpath_ID,$chapter_ID,$total,$rememberToken){

        LearningPathNodeStatus::create([
            'learningpathnodestatus_ID' => Uuid::generate()->string,
            'reviewee_ID' => $user_ID,
            'learningpath_ID' => $learningpath_ID,
            'chapter_ID' => $chapter_ID,
            'status' => 0,
            'total'=> $total,
            'progress' => 0,
            'reviewee_token'=>$rememberToken,
            ]);
    }
    public function createNewUserRevCenter($user_ID,$revcenter_ID,$rememberToken){
        UserRevCenter::create([
            'user_ID'=>$user_ID,
            'revcenter_ID'=>$revcenter_ID,
            'token'=>$rememberToken,
        ]);
    }

    public function createNewUserLearningPath($user_ID,$learningpath_ID,$status,$rememberToken){
        UserLearningPath::create([
            'user_ID'=>$user_ID,
            'learningpath_ID'=>$learningpath_ID,
            'status'=>$status,
            'token'=>$rememberToken
        ]);
    }

    public function getLearningPathNodesbyLearningPath_ID($learningpath_ID){

        $nodelist = LearningPathNodes::where('learningpath_ID',$learningpath_ID)->get();
        
        return $nodelist;
    }

    public function getLessonbyChapterIDandrevcenter_ID($chapter_ID,$revcenter_ID){
        $lessonlist = Lessons::where('chapter_ID',$chapter_ID)->where('revcenter_ID',$revcenter_ID)->get();
        return $lessonlist;
    }

    }
    

