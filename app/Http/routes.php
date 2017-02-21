<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'homepage',
    'uses' => \App\Http\Controllers\IndexController::class . '@index'
]);

// Login route
Route::group(['prefix' => 'login', 'middleware' => ['guest']], function () {
    Route::get('/', [
        'as' => 'login',
        'uses' => \App\Http\Controllers\LoginController::class . '@index'
    ]);

    Route::post('post', [
        'as' => 'login.post',
        'uses' => \App\Http\Controllers\LoginController::class . '@postLogin'
    ]);
});

// Logout route
Route::get('logout', [
    'as' => 'logout',
    'uses' => \App\Http\Controllers\LoginController::class . '@logout'
]);

// Register route
Route::group(['prefix' => 'register', 'middleware' => ['guest']], function () {
    Route::get('/', [
        'as' => 'register',
        'uses' => \App\Http\Controllers\RegisterController::class . '@index'
    ]);

    Route::post('post', [
        'as' => 'register.post',
        'uses' => \App\Http\Controllers\RegisterController::class . '@postRegister'
    ]);
});

Route::get('contact-us', [
    'as' => 'contact-us',
    'uses' => \App\Http\Controllers\IndexController::class . '@showContactUsForm'
]);
Route::post('contact-us', [
    'as' => 'contact-us.post',
    'uses' => \App\Http\Controllers\IndexController::class . '@submitContactForm'
]);

// User profile routes
Route::group(['prefix' => 'profile', 'middleware' => ['auth', 'student']], function () {
    Route::get('edit', [
        'as' => 'user.profile.edit',
        'uses' => \App\Http\Controllers\User\ProfileController::class . '@showEditForm'
    ]);

    Route::post('save', [
        'as' => 'user.profile.save',
        'uses' => \App\Http\Controllers\User\ProfileController::class . '@saveProfile'
    ]);
});
/*
 * job-advert
 */
Route::group(['prefix' => 'job-advert'], function () {

    Route::group(['prefix' => 'apply'], function () {
        Route::get('/{id}', [
            'as' => 'user.job-ad.apply',
            'middleware' => ['auth', 'student'],
            'uses' => \App\Http\Controllers\User\UserJobAdvertController::class . '@apply'
        ]);

        Route::post('post', [
            'as' => 'user.job-ad.apply.post',
            'middleware' => ['auth', 'student'],
            'uses' => \App\Http\Controllers\User\UserJobAdvertController::class . '@postApply'
        ]);
    });
});

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    /*
     * prefix : job-advert
     */
    Route::group(['prefix' => 'job-advert'], function () {
        Route::get('/', [
            'as' => 'admin.job-ad.index',
            'uses' => \App\Http\Controllers\Admin\JobAdvertController::class . '@index'
        ]);

        Route::get('ajaxData', [
            'as' => 'admin.job-ad.ajaxData',
            'uses' => \App\Http\Controllers\Admin\JobAdvertController::class . '@getAjaxData'
        ]);

        Route::get('new', [
            'as' => 'admin.job-ad.new',
            'uses' => \App\Http\Controllers\Admin\JobAdvertController::class . '@newJobAdvert'
        ]);

        Route::post('new/store', [
            'as' => 'admin.job-ad.new.create',
            'uses' => \App\Http\Controllers\Admin\JobAdvertController::class . '@create'
        ]);

        Route::post('edit/save', [
            'as' => 'admin.job-ad.edit.save',
            'uses' => \App\Http\Controllers\Admin\JobAdvertController::class . '@save'
        ]);

        Route::get('edit/{id}', [
            'as' => 'admin.job-ad.edit',
            'uses' => \App\Http\Controllers\Admin\JobAdvertController::class . '@edit'
        ]);

        Route::get('delete/{id}', [
            'as' => 'admin.job-ad.delete',
            'uses' => \App\Http\Controllers\Admin\JobAdvertController::class . '@delete'
        ]);
    });
});
