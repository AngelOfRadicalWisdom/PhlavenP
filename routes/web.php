<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });
//for routes before the login
Route::get('/','PreLoginController@goLanding');
Route::get('/register','PreLoginController@goRegistration');
Route::post('newuser/register','PreLoginController@saveNewUser');
Route::get('/login','PreLoginController@goLogin')->name('login');
Route::post('/login/confirm','PreLoginController@confirmLogin');
Route::get('/adminregister','PreLoginController@goAdminRegistration');
Route::post('newadmin/register','PreLoginController@saveNewAdmin');
Route::post('/m/newuser/register','Mob_LoginController@saveNewUser');
Route::post('/m/login/mobileconfirm','Mob_LoginController@confirmLogin');
Route::get('/revcenters','Mob_LoginController@revcenters');
Route::get('/logout','LoginController@logout')->name('logout');
Route::middleware(['auth'])->group(function(){
        //for Review Centers
        Route::get('/revcenter/home','RevCenterController@goHome');
                Route::get('/revcenter/settings','RevCenterController@goSettings');
                //parse
                Route::get('/revcenter/parse','ParserController@parseFile');
                //Dealing with Questions
                Route::get('/revcenter/previewquestions/{lesson_ID}/{new_status}','revcenterController@goPreviewQuestion');
                Route::get('/revcenter/previewquestionsPM/{lesson_ID}/{new_status}','revcenterController@goPreviewPMQuestion');
                Route::get('/revcenter/editquestion/{question_ID}','revcenterController@goEditQuestion');
                Route::get('/revcenter/editquestionPM/{question_ID}','revcenterController@goEditQuestionPM');
                Route::get('/revcenter/editsavedquestion/{question_ID}','revcenterController@goEditSavedQuestion');
                Route::get('/revcenter/deletequestion/{question_ID}','revcenterController@deleteQuestion');
                Route::get('/revcenter/deletequestionPM/{question_ID}','revcenterController@deleteQuestionPM');
                Route::get('/revcenter/deletesavedquestion/{question_ID}','revcenterController@deleteSavedQuestion');
                Route::post('/question/confirm','revcenterController@confirmQuestion');
                Route::post('/questionpm/confirm','revcenterController@confirmQuestionPM');
                //learningpathsettings
                Route::get('/revcenter/settings/learningpathsettings','revcenterController@goLearningPathSettings');
                        Route::get('/revcenter/settings/newlearningpath','revcenterController@NewLearningPath');
                        Route::post('/learningpath/new','revcenterController@saveLearningPath');
                        Route::get('/learningpath/success','revcenterController@LearningPathNewSuccess');
                        Route::get('/revcenter/settings/learningpath','revcenterController@goCurrentLearningPath');
                        Route::get('/revcenter/settings/learningpath/edit','revcenterController@editLearningPath');
                        Route::get('/revcenter/delete/chapter/{chapter_name}','revcenterController@deleteChapter');
                //nodesettings
                Route::get('/revcenter/settings/nodes','revcenterController@goNodeList');
                Route::get('/revcenter/settings/node/newnode','revcenterController@goNewNode');
                Route::get('/revcenter/settings/node/newsubnode/{node}','revcenterController@goNewSubnode');
                Route::post('/revcenter/settings/node/savenode','revcenterController@saveNode');
                Route::post('/revcenter/settings/subnode/savenode','revcenterController@saveSubNode');
                //TOSsettings
                Route::get('/revcenter/settings/examssettings','revcenterController@ViewExamTypes');
                        Route::get('/TOS/selectpreset','revcenterController@ViewTOSPreset');
                                Route::get('/TOS/newvalidatory/{lesson_name}','revcenterController@NewValidatoryTOS');
                                        Route::post('/tosvalidatory/save','revcenterController@SaveValidatoryTOS');
                                Route::get('/TOS/newdiagnostic','revcenterController@NewDiagnosticTOS');
                                        Route::post('/tosexam/save','revcenterController@SaveExamTOS');
                                Route::get('/TOS/newmock','revcenterController@NewMockTOS');    
                                        Route::get('/tos/success','revcenterController@TOSSuccess');
                //Resourcesettings
                Route::get('/revcenter/settings/resourcesettings','RevCenterController@goNodeList');
                        Route::get('/revcenter/settings/node/viewnode/{node_ID}','RevCenterController@goNodeDetails');
                                Route::get('/revcenter/settings/{node_ID}/newlesson','RevCenterController@goNewLesson');
                                Route::post('/revcenter/settings/savelesson','RevCenterController@SaveLesson');
                                        Route::get('/revcenter/settings/node/viewlesson/{lesson_ID}','RevCenterController@goLessonDetails');
                                        Route::get('/revcenter/addresource/{lesson_name}','RevCenterController@goNewResource');
                                        Route::post('/revcenter/resource/saveresource','RevCenterController@uploadResource');
                                        Route::get('/revcenter/settings/lesson/{lesson_ID}/scanpdf','RevCenterController@goScanPDF');
                                        Route::post('/revcenter/resource/selectpdf','ParserController@uploadPDF');
                                        Route::get('/revcenter/settings/lesson/{lesson_ID}/viewquestions','RevCenterController@goViewQuestions');
                                        Route::get('/revcenter/settings/lesson/{lesson_ID}/viewquestionsPM','RevCenterController@goViewQuestionsPM');
                                        Route::get('/revcenter/settings/lesson/{lesson_ID}/newquestion','RevCenterController@goNewQuestion');
                                        Route::post('/revcenter/resource/savequestion','RevCenterController@saveQuestion');
                                        Route::post('/revcenter/resource/savequestionfinal','RevCenterController@uploadQuestionFinal');
                                        Route::get('/viewresource/{resource}','RevCenterController@viewResource');
                                        Route::get('/viewquestion/{question}','RevCenterController@viewQuestion');
                Route::get('/revcenter/settings/lesson/{lesson_name}/module','RevCenterController@goLessonModuleSettings');
                Route::get('/revcenter/addquestion/{lesson_name}','RevCenterController@goConfirmQuestionCount');
                Route::get('/revcenter/settings/newquestion/{lesson_name}','RevCenterController@goNewModuleQuestion');
                Route::post('/revcenter/settings/savequestion/{lesson_name}','RevCenterController@saveModuleQuestion');
                Route::get('/revcenter/testmodule/{lesson_name}/{index}','RevCenterController@testModule');
                Route::post('/modulequestion/getresponse','RevCenterController@getResponse');
                Route::get('/revcenter/settings/lesson/{lesson_name}/newresource','RevCenterController@goNewBackupResource');
                Route::post('/revcenter/resource/savebackupresource','RevCenterController@saveBackupResource');
        
        //for Reviewees
        Route::get('/reviewee/home','RevieweeController@goHome');
                Route::get('/reviewee/{learningpath_ID}/takediag','RevieweeController@takeDiag');
                        Route::get('/reviewee/{learningpath_ID}/diagnosticexam','RevieweeController@startDiag');
                                Route::post('diagnosticexam/answer','RevieweeController@answerDiagnosticExam');
                                        Route::get('/diagnosticexam/{revcenter_ID}/results','RevieweeController@goDiagnosticResult');
                                        Route::post('/diagnosticexam/{revcenter_ID}/results','RevieweeController@goDiagnosticResult');
                
                Route::get('/reviewee/home','RevieweeController@goHome');
                Route::get('/reviewee/learningpath/selection','RevieweeController@viewLearningPathSelection');
                Route::get('/reviewee/learningpath/{revcenter_ID}','RevieweeController@viewLearningPath');
                        Route::get('/reviewee/learningpath/startnode/{node_ID}','RevieweeController@startNode');
                                Route::get('/lesson/{lesson_ID}','RevieweeController@startLesson');
                                        Route::post('lesson/answer','RevieweeController@answerValidationExam');
                                        Route::get('/reviewee/{revcenter_ID}/{lesson_name}/promptdrill','RevieweeController@goExercisePrompt');
                                        Route::get('/reviewee/{revcenter_ID}/{lesson_name}/startdrill','RevieweeController@takeExercise');
                        Route::get('/reviewee/{learningpath_ID}/startmock','RevieweeController@startMock');
                        Route::get('/reviewee/{learningpath_ID}/mockexam','RevieweeController@takeMock');
                        Route::post('mockexam/answer','RevieweeController@answerMockExam');
                        Route::get('/mockexam/results','RevieweeController@goMockResult');
                        
                Route::get('/reviewee/startmodule/{revcenter_ID}/{lesson_name}/{index}','RevieweeController@startModule');
                Route::get('/reviewee/profile','RevieweeController@viewProfile');
                Route::post('/startmodule/response','RevieweeController@getResponse');
                Route::get('/reviewee/addRevCenter','RevieweeController@addRevCenter');
                Route::post('/m/reviewee/addRevCenter','RevieweeController@MobaddRevCenter');
                Route::post('reviewee/updatereviewcenters','RevieweeController@updateRevCenter');
                Route::get('/reviewee/{lesson_name}/backupresources','RevieweeController@viewBackupResource');
                Route::post('/m/reviewee/backupresources','RevieweeController@MobileviewBackupResource');
                Route::post('/m/reviewee/diagnosticexam','RevieweeController@startDiag');
                Route::post('/m/reviewee/learningpath/selection','RevieweeController@MobileviewLearningPathSelection');
                Route::post('/m/reviewee/ViewLearningPath','RevieweeController@MobileViewLearningPath');
                Route::post('/m/reviewee/choices','RevieweeController@getChoices');
                Route::post('/m/reviewee/viewProfile','RevieweeController@MobileViewProfile');
               Route::post('/m/reviewee/getRevCenterPerUser','RevieweeController@MobileRevCenterPerUser');
               Route::post('/m/reviewee/getExamAndResultsPerUser','RevieweeController@MobileExamAndResultsPerUser');
               Route::post('/m/reviewee/getLessonsPerUser','RevieweeController@MobileLessonsPerUser');
               Route::post('/m/reviewee/StartNode','RevieweeController@MobilestartNode');
               Route::post('/m/reviewee/StartDiag','RevieweeController@MobilestartDiag');
               Route::post('/m/diagnosticexam/answer','RevieweeController@MobanswerDiagnosticExam');
});