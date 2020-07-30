<?php

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
//Route::get('/', 'HomeController@welcome');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/registration', 'MeetingController@register');
Route::get('/users', 'UsersController@UsersIndex')->name('users');

Route::get('/addmeeting', 'MeetingController@index');
Route::post('/save-meeting', 'MeetingController@AddNewMeeting')->name('saveMeeting');

Route::get('/meetinghistory', 'MeetingController@Meetings');
Route::get('/newmeeting', 'MeetingController@NewMeetings');

Route::get('/eventcalender', 'MeetingController@EventCalender');

Route::get('/view_meeting/{id}', 'MeetingController@ViewMeeting');

Route::get('/delete_meeting/{id}', 'MeetingController@DeleteMeeting');
Route::delete('/delete_meeting/{id}', 'MeetingController@DeleteMeeting')->name('deleteMeeting');

Route::get('/edit_meeting/{id}', 'MeetingController@EditMeeting');
Route::put('/update-meeting/{id}', 'MeetingController@UpdateMeeting')->name('updateMeeting');

Route::get('/add_report/{id}', 'MeetingController@AddMeetingReport');
Route::post('/add-report/{id}', 'MeetingController@UploadMeetingReport')->name('addReport');

Route::get('/individual', 'MeetingController@IndividualMeetings');
Route::get('/individualMeetings/{id}', 'MeetingController@IndividualMeetingsData')->name('individualMeetings');

Route::get('/editProfile/{id}', 'MeetingController@EditProfile');
Route::put('/update-user-profile/{id}', 'MeetingController@UpdateUserprofile')->name('updateUserProfile');

Route::get('/eventcalender', 'MeetingController@EventCalender');
