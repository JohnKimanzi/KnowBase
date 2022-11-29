<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// use App\Exports\NewExport;
use App\Exports\AssessmentAttemptsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('create-user', [App\Http\Controllers\UserController::class, 'create'])->name('create-user');
Route::post('create-user', [App\Http\Controllers\UserController::class, 'store'])->name('create-user');

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('quizzes', ['middleware'=>'auth', App\Http\Controllers\QuizController::class]);
Route::resource('quizzes', App\Http\Controllers\QuizController::class)->middleware('auth');
Route::resource('study_materials', App\Http\Controllers\StudyMaterialController::class)->middleware('auth');
Route::resource('achievements', App\Http\Controllers\AchievementController::class)->middleware('auth');
Route::resource('favourites', App\Http\Controllers\FavouriteController::class)->middleware('auth');
Route::resource('courses', App\Http\Controllers\CourseController::class)->middleware('auth');
Route::resource('candidates', App\Http\Controllers\CandidateController::class)->middleware('auth');
// Route::resource('quiz_attempts', App\Http\Controllers\AssessmentAttemptController::class)->middleware('auth');
Route::resource('certificates', App\Http\Controllers\GeneratedCertificateController::class)->middleware('auth');
// Route::resource('policies', App\Http\Controllers\PolicyController::class)->middleware('auth');
// Route::resource('attempts', App\Http\Controllers\AssessmentAttemptController::class)->middleware('auth');

Route::resource('assessments', App\Http\Controllers\AssessmentAttemptController::class)->except(['create']);
Route::get('assessments_export', [App\Http\Controllers\AssessmentAttemptController::class, "export"])->name('assessments_export');
Route::get('assessment/{course_id}', [App\Http\Controllers\AssessmentAttemptController::class, 'create'])->name('startassessment');
Route::get('testreport/{id}', [App\Http\Controllers\AssessmentAttemptController::class, 'test_report'])->name('testRes');

Route::resource('tokens', App\Http\Controllers\CourseTokenController::class)->middleware('auth');
// Route::post('tokens', App\Http\Controllers\CourseTokenController::class)->middleware('auth');
Route::POST('validateToken', [App\Http\Controllers\CourseTokenController::class, 'validateToken'])->middleware('auth')->name('validateToken');

Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');
Route::get('profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');

Route::resource('lessons', App\Http\Controllers\LessonController::class)->middleware('auth');
Route::get('courseLessons/{course_id}', [App\Http\Controllers\LessonController::class, 'courseLessons'])->middleware('auth')->name('courseLessons');
Route::get('startLesson/{lesson}', [App\Http\Controllers\LessonController::class, 'start'])->middleware('auth')->name('startLesson');


// Route::get('test', function(){
//     return view('exports.users',['users'=>App\Models\User::all()]);
// });

// Route::get('makeAttempt', [App\Http\Controllers\AssessmentAttemptController::class, "makeAttempt"])->middleware('auth')->name('makeAttempt');


// Route::get('create-user', [App\Http\Controllers\UserController::class, 'create'])->name('create-user');

