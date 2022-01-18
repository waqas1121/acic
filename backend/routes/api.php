<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('logisn', 'Api\AdminController@login');
Route::post('logout', 'Api\AdminController@logout');
Route::get('cmspage/{id}','Api\AdminController@cmsPage');


Route::post('login', 'Api\AdminController@loginwild');
Route::post('profile', 'Api\AdminController@viewprofile');
Route::post('viewpkg', 'Api\AdminController@viewpkg');





Route::get('all-events', 'Api\AdminController@allEvents');
Route::get('upcoming-events', 'Api\AdminController@upcomingEvents');
Route::get('previous-events', 'Api\AdminController@previousEvents');
/*Route::get('edit-event', 'Api\AdminController@editEvent');
Route::post('update-event', 'Api\AdminController@updateEvent');*/
Route::get('all-categories', 'Api\AdminController@allCategories');
Route::get('all-posts', 'Api\AdminController@allPosts');
Route::get('latest-news', 'Api\AdminController@latestNews');
Route::get('all-board-members', 'Api\AdminController@allBoardMembers');
Route::get('all-obituaries', 'Api\AdminController@allObituaries');
Route::get('all-prayers', 'Api\AdminController@allPrayers');
Route::get('settings', 'Api\AdminController@settings');
Route::get('current-record', 'Api\AdminController@searchRecordByCurrentDate');
Route::get('prayer-time', 'Api\AdminController@prayerTime');
Route::get('privacy-policy', 'Api\AdminController@privacyPolicy');
Route::get('prayer-home', 'Api\AdminController@prayerHome');
Route::get('monthly-timing', 'Api\AdminController@homeDay');
Route::get('live-stream', 'Api\AdminController@livestream');
Route::get('detail/{slug}','Api\AdminController@detail');
Route::post('contact','Api\AdminController@contactform');
Route::get('data', 'Api\AdminController@data');





Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
