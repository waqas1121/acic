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


//Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');
Route::get('/', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

Route::get('login', 'Auth\LoginController@login');
Route::get('register', 'Auth\RegisterController@reg');
Route::get('import-prayers', 'Admin\AdminController@importPrayer');
Route::get('privacy-policy', 'HomeController@privacyPolicy');


Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
});
Route::group([
    'middleware' => ['auth'],
    'prefix' => 'user',
    'namespace' => 'User'
], function () {
    Route::get('/dashboard', 'UserController@index')->name('user.dashboard');
    Route::get('/profile-setting', 'UserController@profileSetting')->name('user.profile');
    Route::post('/profile-setting', 'UserController@updateProfile')->name('user.profile');
    Route::get('/cache-clear', 'UserController@configCache')->name('user.cache_clear');

    Route::get('/notifications', 'UserController@notifications')->name('user.notifications');

});

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    // Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');


});
Route::group([
    'middleware' => ['auth:admin'],
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/profile', 'AdminController@edit')->name('admin-profile');
    Route::post('/admin-update', 'AdminController@update')->name('admin-update');
    Route::get('/privacy-policy', 'AdminController@privacyPolicy')->name('privacy_policy.edit');
    Route::post('/privacy-update/{id}', 'AdminController@privacyPolicyUpdate')->name('privacy_policy.update');



    //Setting Routes
    Route::resource('setting', 'SettingController');
    Route::resource('sections', 'SectionController');
    Route::get('/cache-clear', 'AdminController@configCache')->name('admin.cache_clear');

    //User Routes
    Route::resource('users', 'UsersController');
    Route::get('users/edit/{id}', 'UsersController@edit')->name('admin-edit');
    Route::post('get-users', 'UsersController@getUsers')->name('admin.getUsers');
    Route::post('get-user', 'UsersController@userDetail')->name('admin.getUser');
    Route::get('users/delete/{id}', 'UsersController@destroy')->name('user-delete');
    Route::post('delete-selected-users', 'UsersController@DeleteSelectedUsers')->name('delete-selected-users');
    Route::get('edit-profile/{id}', 'UsersController@show')->name('edit-profile');

    //User Routes
    Route::resource('messages', 'MessageController');
    Route::get('messages/edit/{id}', 'MessageController@edit')->name('admin.edit_message');
    Route::post('get-messages', 'MessageController@getMessages')->name('admin.getMessages');
    Route::post('get-message', 'MessageController@messageDetail')->name('admin.getMessage');
    Route::get('messages/delete/{id}', 'MessageController@destroy')->name('admin.deleteMessage');
    Route::post('delete-selected-messages', 'MessageController@deleteSelectedMessages')->name('admin.deleteSelectedMessages');

    //Categories Routes
    Route::resource('categories', 'CategoriesController');
    Route::post('get-categories', 'CategoriesController@getCategories')->name('admin.getCategories');
    Route::post('get-category', 'CategoriesController@categoryDetail')->name('admin.getCategory');
    Route::get('categories/delete/{id}', 'CategoriesController@destroy');
    Route::post('delete-selected-categories', 'CategoriesController@deleteSelectedCategories')->name('admin.deleteSelectedCategories');

    //Posts Routes
    Route::resource('posts', 'PostsController');
    Route::post('get-posts', 'PostsController@getPosts')->name('admin.getPosts');
    Route::post('get-post', 'PostsController@postDetail')->name('admin.getPost');
    Route::get('posts/delete/{id}', 'PostsController@destroy')->name('post-delete');
    Route::post('delete-selected-posts', 'PostsController@deleteSelectedRows')->name('delete-selected-posts');

    //Boards Routes
    Route::resource('boards', 'BoardsController');
    Route::post('get-boards', 'BoardsController@getBoards')->name('admin.getBoards');
    Route::post('get-board', 'BoardsController@boardDetail')->name('admin.getBoard');
    Route::get('boards/delete/{id}', 'BoardsController@destroy')->name('board-delete');
    Route::post('delete-selected-boards', 'BoardsController@deleteSelectedRows')->name('delete-selected-boards');

    //Events Routes
    Route::resource('events', 'EventsController');
    Route::post('get-events', 'EventsController@getEvents')->name('admin.getEvents');
    Route::post('get-event', 'EventsController@eventDetail')->name('admin.getEvent');
    Route::get('events/delete/{id}', 'EventsController@destroy')->name('event-delete');
    Route::post('delete-selected-events', 'EventsController@deleteSelectedRows')->name('delete-selected-events');
    Route::get('show-events', 'EventsController@showEvents')->name('show-events');

    //Obituary Routes
    Route::resource('obituaries', 'ObituaryController');
    Route::post('get-obituaries', 'ObituaryController@getObituaries')->name('admin.getObituaries');
    Route::post('get-obituary', 'ObituaryController@obituaryDetail')->name('admin.getObituary');
    Route::get('obituaries/delete/{id}', 'ObituaryController@destroy')->name('obituaries-delete');
    Route::post('delete-selected-obituaries', 'ObituaryController@deleteSelectedRows')->name('delete-selected-obituaries');
    Route::get('show-obituaries', 'ObituaryController@showObituaries')->name('show-obituaries');

    //Prayers Routes
    Route::resource('prayers', 'PrayerController');
    Route::post('get-prayers', 'PrayerController@getPrayers')->name('admin.getPrayers');
    Route::post('get-prayer', 'PrayerController@prayerDetail')->name('admin.prayerDetail');
    Route::get('prayers/delete/{id}', 'PrayerController@destroy')->name('prayers-delete');
    Route::post('delete-selected-prayers', 'PrayerController@deleteSelectedRows')->name('delete-selected-prayers');
    Route::get('get-date', 'PrayerController@getDate')->name('admin.get-date');
    Route::post('edit-prayer', 'PrayerController@searchRecordByDate')->name('admin.search_record');
    
    
    //Pages Routes
    
    Route::resource('pages', 'PagesController');
    Route::get('pagess/newpage', 'PagesController@newpage');
    Route::post('pagess/store','PagesController@store');
    
    
    Route::get('pages/edit/{id}', 'PagesController@edit');
    Route::post('pages/update/{id}', 'PagesController@update');
    Route::get('pages/destroy/{id}', 'PagesController@destroy');
    


    
    
});
