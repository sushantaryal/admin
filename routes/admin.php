<?php

Route::get('/', function() {
    return redirect('admin/login');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => 'auth'], function() {

    Route::get('dashboard', function() {
        return view('admin.pages.dashboard');
    })->name('admin.dashboard');

    Route::group(['prefix' => 'profile'], function() {
        Route::get('/', 'ProfileController@profile')->name('admin.profile');
        Route::post('/', 'ProfileController@updateProfile')->name('admin.profile.update');
        Route::post('changepassword', 'ProfileController@changePassword')->name('admin.profile.changepassword');
        Route::post('avatar', 'ProfileController@updateAvatar')->name('admin.profile.avatar');
        Route::get('avatar/remove', 'ProfileController@removeAvatar')->name('admin.profile.removeavatar');
    });
    
});