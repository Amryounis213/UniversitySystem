<?php

use Illuminate\Support\Facades\Route;
use App\Registeration;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/','AdminDashboard@index')->name('dashboard')->middleware('auth:admin');
Route::view('/lecturerdash','Lecturer.LecturerDashboard')->name('LecturerDashboard');
Route::resource('roles', 'RoleController');


Route::prefix('Admin')->name('Admin.')->group(function(){

Route::view('/charts','Admin.charts')->name('charts');
Route::view('/docs','Admin.docs')->name('docs');
Route::view('/components','Admin.form-components')->name('components');
Route::view('/custom','Admin.form-custom')->name('custom');
Route::view('/noty','Admin.form-notifications')->name('noty');
Route::view('/samples','Admin.form-samples')->name('samples');
Route::view('/calendar','Admin.page-calendar')->name('calendar');
Route::view('/error','Admin.page-error')->name('error');
Route::view('/invoice','Admin.page-invoice')->name('invoice');
Route::view('/lookscreen','Admin.page-lookscreen')->name('lookscreen');
Route::view('/login','Admin.page-login')->name('login');
Route::view('/mailbox','Admin.page-mailbox')->name('mailbox');
Route::view('/page-user','Admin.page-user')->name('user');
Route::view('/table-basic.','Admin.table-basic')->name('table1');
Route::view('/table-data','Admin.table-data-table')->name('table2');
Route::view('/cards','Admin.ui-cards')->name('cards');
Route::view('/widgets','Admin.widgets')->name('widgets');

//Functions --
Route::get('college/{id}/sections','CollegeController@ViewSections')->name('ViewSections');
Route::get('college/{id}/students','CollegeController@ViewStudents')->name('ViewStudents');
Route::get('college/{id}/courses','CollegeController@ViewCourses')->name('ViewCourses');


Route::get('users/{id}/section', 'UserController@showStudent')->name('sectionShow');

//Control Panel Routing 


    Route::resource('users', 'UserController');
    Route::resource('admins', 'AdminController');
    Route::resource('lecturers', 'LecturerController');
    Route::resource('colleges', 'CollegeController');
    Route::resource('courses', 'CourseController');
    Route::resource('reborts', 'RebortController');
    Route::resource('sections', 'SectionController');
    Route::resource('roles', 'RoleController');
    Route::resource('offeredCourse', 'offeredCourseController');
    Route::resource('operation','RegisterationController');
    Route::get('viewcourses/{id}','RegisterationController@showCourses')->name('showallcourse');




});

//---------------------- Lecturer Route ----------------------------------
Route::prefix('Lecturer')->namespace('Lecturer')->name('Lecturer.')->group(function(){
    Route::get('mycourses', 'MyCourseController@index')->name('myCourses');
    Route::get('mystudent/{id}', 'MyCourseController@showstudent')->name('mystudent');
    Route::get('printStudent/{id}', 'MyCourseController@PrintStudent')->name('StudentsPDF');
    Route::resource('homeworks', 'HomeworkController');
    Route::resource('quiz', 'QuizController');
    Route::get('quiz/{id}/quastions', 'QuastionController@create')->name('AddQuastions');
    Route::post('quiz/{id}/quastions', 'QuastionController@AddQuastions')->name('PostQuastions');
    Route::get('quiz/{id}/quastions/{quastion}', 'QuastionController@edit')->name('ShowQuastions');
    Route::get('quastions/{id}', 'QuizController@ShowQuastionBelongsToQuiz')->name('ShowQuastionBelongsToQuiz');
    Route::post('quiz/{id}/quastions/{quastion}', 'QuastionController@UpdateQuastions')->name('UpdateQuastions');
    Route::get('quastions', 'QuastionController@index')->name('Quastions');
    Route::get('quastions/create', 'QuastionController@create');
    Route::get('test', 'MyCourseController@tester');
   // Route::get('printstudent','Lec');
});

Route::prefix('Student')->name('Student.')->group(function(){
    Route::view('/index','User.UserDashboard')->name('UserDashboard');
    Route::get('offeredcourse','User\RegisterationController@index')->name('UserOffered');
    Route::get('takecourse/{id}','User\RegisterationController@takeCourse')->name('register');
    Route::get('homeworks/{id}','User\RegisterationController@reg_view');
    Route::get('registeration','User\RegisterationController@ViewMyCourses')->name('myCourses');
    Route::delete('registeration/{id}', 'RegisterationController@revokeCourse')->name('revoke');
    Route::get('homeworks', 'User\RegisterationController@FullCourses')->name('full');
    Route::get('course/{course}/lectuer/{lecturer}','User\RegisterationController@viewHomework')->name('userhomeworks');
    Route::view('/test','User.test');
    Route::get('{course}/quizzes/{lecturer}','User\RegisterationController@viewQuizzes')->name('Q');   
    Route::get('quizzes{id}','User\RegisterationController@quiz')->name('OpenQuiz');//->middleware('CheckAttemptQuiz' ,['id'=>$id]);
    Route::get('quizzes','User\RegisterationController@FullCourses2')->name('viewQuizzes');
    Route::post('submitanswer','User\RegisterationController@Submitanswer')->name('submitAnswer');
    Route::get('confirm/{id}','User\RegisterationController@ConfirmAttempt')->name('ConfirmAttempt');
    Route::get('taker/{id}','User\RegisterationController@StoreTaker')->name('StoreTaker');
});
    
Route::namespace('Auth')->group(function(){
    //Admin Login Route
    Route::post('login','AdminLoginController@Adminlogin')->name('AdminLogin');
    Route::get('login','AdminLoginController@showAdminLoginPage' )->name('ShowAdminLogin')->middleware('checkAuth');
    Route::get('logout','AdminLoginController@Adminlogout' )->name('Adminlogout');

   // Lecturer Login 
    Route::post('lecturer-login','LecturerLoginController@LecturerLogin')->name('LecturerLogin');
    Route::get('lecturer-login','LecturerLoginController@ShowLecturerLoginPage' )->name('ShowLecturerLogin')->middleware('checkAuth');
    Route::get('lecturer-logout','LecturerLoginController@Lecturerlogout' )->name('lecturerlogout');
   // 
   // //User Login 
    Route::post('user-login','UserLoginController@UserLogin')->name('UserLogin');
    Route::get('user-login','UserLoginController@ShowUserLoginPage' )->name('ShowUserLogin');//->middleware('checkAuth');
   Route::get('user-logout','UserLoginController@Userlogout' )->name('Userlogout');
});




//Route::get('make-pdf','User\RegisterationController@MakePDF');
//Route::get('invoice','User\RegisterationController@MakePDF')->name('PDF');