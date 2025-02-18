<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\Auth\RegisterController;

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

Auth::routes([
    'register' => true,
    'reset' => false,
    'verify' => false
]);

// Logout
Route::get('/cbt-logout', [App\Http\Controllers\LogoutController::class, 'perform'])->name('cbtLogout');

// Checkpoint
Route::get('/checkpoint/{id}', [App\Http\Controllers\JointController::class, 'checker'])->name('checkpoint/id');

// User Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/mycom', [ExamController::class, 'compo'])->name('mycom');
Route::get('user/quiz/{quizId}', [ExamController::class, 'getQuizQuestions'])->middleware('auth');
Route::post('quiz/create', [ExamController::class, 'postQuiz'])->middleware('auth');
Route::get('/result/user/{userId}/quiz/{quizId}', [ExamController::class, 'viewResult'])->middleware('auth');

// Signup Routes
Route::get('/signup', [RegisterController::class, 'showRegistrationForm'])->name('signup.show');
Route::post('/signup', [RegisterController::class, 'register'])->name('signup.store');


// Admin Routes
Route::group(['middleware' => 'isAdmin'], function() {
    Route::get('/', function () {
        return view('admin.index');
    });

    Route::resource('/quiz', QuizController::class);
    Route::resource('/question', QuestionController::class);
    Route::resource('/user', UserController::class);

    Route::get('exam/assign', [ExamController::class, 'create'])->name('user.exam');
    Route::post('exam/assign', [ExamController::class, 'assignExam'])->name('exam.assign');
    Route::get('exam/user', [ExamController::class, 'userExam'])->name('view.exam'); 
    Route::post('cbt/result', [ExamController::class, 'studResult'])->name('display-result');
    Route::post('exam/remove', [ExamController::class, 'removeExam'])->name('exam.remove');

    Route::get('/quiz/{id}/questions', [QuizController::class, 'question'])->name('quiz.question');
    Route::get('exam/displayresult', [ExamController::class, 'result'])->name('displayresult');
    Route::get('result/{userId}/{quizId}', [ExamController::class, 'userQuizresult']);
    Route::post('result', [ExamController::class, 'removeExam'])->name('result');

    Route::post('exam/loadstud', [ExamController::class, 'showStudent'])->name('loadstud');
    Route::post('exam/loadsquizes', [ExamController::class, 'loadQuizes'])->name('loadsquizes');
    Route::post('quiz/loadsubjects', [QuizController::class, 'showSubjects'])->name('loadsubjects');
    Route::post('cbt/loadstudresult', [ExamController::class, 'showResult'])->name('loadstudresult');
    Route::post('exam/loadsquizes2', [ExamController::class, 'loadQuizes2'])->name('loadsquizes2');
    
    Route::get('exam/re-assign', [ExamController::class, 'reAssignForm'])->name('re-assign');
    Route::post('exam/loadstudreasign', [ExamController::class, 'showStudForReassign'])->name('loadstudreasign');
    Route::post('exam/re-assigning', [ExamController::class, 'saveReAssigning'])->name('re-assigning');
    
    Route::post('question/loadquestion', [QuestionController::class, 'showQuestion'])->name('loadquestion');
});
