<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\RevCenter;
use App\UsersToken;
use App\LearningPath;
use App\LearningPathNodes;
use App\LearningPathNodeStatus;
use App\LessonStatus;
use App\Lessons;
use App\UserRevCenter;
use App\UserLearningPath;
use Webpatser\Uuid\Uuid;
use App\Token;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Mob_LoginController extends Controller
{
    public function goRegistration(){
        $revcenters = RevCenter::get();

        return response()->json([
            'revcenters' => $revcenters
        ]);
    }
//     public function saveNewUser(Request $request){
//        //dd( $request->username);
//         $revcenter_ID= new UserRevCenter;
//         $user = new Users;
//         $token = new UsersToken;
//         $learningpath = new LearningPath;
//         $learningpathnodestatus = new LearningPathNodeStatus;
//         if($request->password == $request->confpassword){
            
//         $user->user_ID = Uuid::generate()->string;
//         $user->username = $request->username;
//         $user->password = bcrypt($request->password);
//         $user->firstname = $request->fname;
//         $user->lastname = $request->lname;
//         $user->email = $request->email;
//         $user->$revcenter_ID = $request->revcenter_ID;
        
//         //extracting the learningpath
//         $learningpath = LearningPath::where('revcenter_ID',$user->revcenter_ID)->orderby('createdat','desc')->first();
//         if($learningpath!=NULL){
//         $user->learningpath_ID = $learningpath->learningpath_ID->json();
//         }
//         else{
//            $user->learningpath_ID="NULL";
//         }
//         var_dump($user->learningpath_ID);
//         $user->gender = $request->gender;
//         $user->isadmin = 0;
//         $user->diagnostic = 0;
//         $user->save();

//         $token->user_ID = $user->user_ID;
//         $token->token = Uuid::generate()->string;
//         $token->save();

//         $nodelist = LearningPathNodes::where('learningpath_ID',$user->learningpath_ID)->get();
        
//         //population of the status tables for both the nodes and the lelssons inside the node
//         foreach($nodelist as $node){

//             if($node->node_ID != "Mock"){

//             $total=0;
//             //creation of lesson status within each node
//             $lessonlist = Lessons::where('node_ID',$node->node_ID)->where('revcenter_ID',$user->revcenter_ID)->get();
//             foreach($lessonlist as $lesson){
//                 LessonStatus::create([
//                     'reviewee_ID' => $user->user_ID,
//                     'learningpath_ID' =>$user->learningpath_ID,
//                     'lesson_ID' => $lesson->lesson_ID,
//                     'status'=>0,
//                 ]);

//                 $total++;
//             }

//             //creation of learningpath node status
        
//             LearningPathNodeStatus::create([
//                 'learningpathnodestatus_ID' => Uuid::generate()->string,
//                 'reviewee_ID' => $user->user_ID,
//                 'learningpath_ID' => $user->learningpath_ID,
//                 'node_ID' => $node->node_ID,
//                 'status' => 0,
//                 'total'=> $total,
//                 'progress' => 0
//                 ]);

//             }else{
//                 LearningPathNodeStatus::create([
//                     'learningpathnodestatus_ID' => Uuid::generate()->string,
//                     'reviewee_ID' => $user->user_ID,
//                     'learningpath_ID' => $user->learningpath_ID,
//                     'node_ID' => "Mock",
//                     'status' => 0,
//                     'total'=> 1,
//                     'progress' => 0
//                     ]);
//             }

//             $try=Users::where('user_ID',$user->user_ID);

//             if($try){
//                 return response()->json([
//                     'message' => 'Registration Successful!'
//                 ]);
//             }else{
//                 return response()->json([
//                     'message' => 'Registration Failed'
//                 ]);
//             }
//         }
//     }
    
// }
        // } 

        // return redirect (url('/'));
        // }else{
        // return redirect (url('/register'));
        // }


    public function saveNewUser(Request $request){
         //dd( $request->username);
         $revcenter= new UserRevCenter;
        $user = new Users;
        $token = new UsersToken;
        $userLearningpath= new UserLearningPath;
        $learningpath = new LearningPath;
        $learningpathnodestatus = new LearningPathNodeStatus;
        
        if($request->password == $request->cpass){
            
        $user->user_ID = Uuid::generate()->string;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->firstname = $request->fname;
        $user->lastname = $request->lname;
        $user->email = $request->email;
        $user->gender=$request->gender;
        $user->isadmin = 0;
        $user->diagnostic = 0;
        $user->mobile_token=Uuid::generate()->string;
        $user->remember_token=Uuid::generate()->string;
         $user->save();
         $revcenter->user_ID=$user->user_ID;
         $revcenter->revcenter_ID=$request->revcenter;
         $revcenter->token=$user->mobile_token;
         $revcenter->save();
         $learningpath = LearningPath::where('revcenter_ID',$revcenter->revcenter_ID)->orderby('createdat','desc')->first();
           if($learningpath!=NULL){
            $userLearningpath->user_ID=$user->user_ID;
            $userLearningpath->learningpath_ID = $learningpath->learningpath_ID;
            $userLearningpath->token=$user->mobile_token;
            $userLearningpath->status=0;
            $userLearningpath->save();
                }
            //   else{
            //     return response()->json(['message'=> 'Learning Path Null or there is an error']);
            //      }
        $token->user_ID = $user->user_ID;
        $token->token = $user->mobile_token;
        $token->save();
        $nodelist = LearningPathNodes::where('learningpath_ID',$userLearningpath->learningpath_ID)->get();
        foreach($nodelist as $node){
         if($node->node_ID != "Mock"){
            $total=0;
         //creation of lesson status within each node
          $lessonlist = Lessons::where('chapter_ID',$node->chapter_ID)->where('revcenter_ID',$revcenter->revcenter_ID)->get();
                foreach($lessonlist as $lesson){
                             LessonStatus::create([
                                 'reviewee_ID' => $user->user_ID,
                                 'learningpath_ID' =>$userLearningpath->learningpath_ID,
                                 'lesson_ID' => $lesson->lesson_ID,
                                 'status'=>0,
                                 'reviewee_token'=>$user->mobile_token,
                             ]);
            
                            $total++;
       }
  //creation of learningpath node status
        
             LearningPathNodeStatus::create([
                 'learningpathnodestatus_ID' => Uuid::generate()->string,
                 'reviewee_ID' => $user->user_ID,
                 'learningpath_ID' => $userLearningpath->learningpath_ID,
                 'chapter_ID' => $node->chapter_ID,
                 'status' => 0,
                 'total'=> $total,
                 'progress' => 0,
                 'reviewee_token'=>$user->mobile_token,
                 ]);
             }else{
                 LearningPathNodeStatus::create([
                  'learningpathnodestatus_ID' => Uuid::generate()->string,
              'reviewee_ID' => $user->user_ID,
               'learningpath_ID' => $userLearningpath->learningpath_ID,
               'chapter_ID' => "Mock",
                'status' => 0,
                 'total'=> 1,               
                  'progress' => 0,
                  'reviewee_token'=>$user->mobile_token,
                  ]);
          }
        }
          $try=Users::where('user_ID',$user->user_ID);
         

            if($try){
                return response()->json(200);
              }else{
                  return response()->json(500);
              }
          }
        }
     
// public function saveNewUser(Request $request){
//     $user=Users::create($request->all());
//     return response()->json($user,201);
// }
    public function confirmLogin(Request $request){
       if (Auth::attempt([ 
           'username'=>$request->username,
           'password'=>$request->password
           ])){
            return response()->json(200);

        }else{
            return response()->json(500);
        }
    }

    public function logout(){
        Auth::logout();
       return redirect(url('/'));
    }

    public function revcenters(){
        
        $revcenter=RevCenter::get();
        return response()->json($revcenter);
    }
    public function viewLearningPathSelection(){
        $user = $this->getCurrentUser();
        $revcenters = $this->getRevCenters($user->user_ID);
        return response()->json($revcenters);
    }

}
