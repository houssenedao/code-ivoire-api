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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate')->name('activate');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('categories', 'CategoryController');
Route::apiResource('events', 'EventController');
Route::apiResource('reviews', 'ReviewController');
Route::apiResource('tags', 'TagController');
=======
/**
 * Users API Routes
 */
Route::apiResource('users', 'API\UserController');
/**
 * Categories API Routes
 */
Route::apiResource('categories', 'API\Category\CategoryController');
Route::apiResource('categories.events', 'API\Category\CategoryEventController');
/**
 * Events API Routes
 */
Route::apiResource('events', 'API\Event\EventController');
Route::apiResource('events.reviews', 'API\Event\EventReviewController');
Route::apiResource('events.tags', 'API\Event\EventTagController');
/**
 * Reviews API Routes
 */
Route::apiResource('reviews', 'API\ReviewController');
/**
 * Medias API Routes
 */
Route::apiResource('medias', 'API\MediaController');
/**
 * Tags API Routes
 */
Route::apiResource('tags', 'API\TagController');
/**
 * LogIn user API Routes
 */
Route::apiResource('me', 'API\Me\MeController');
Route::apiResource('me.reviews', 'API\Me\MeReviewController');
Route::apiResource('me.events', 'API\Me\MeEventController');
/**
 * Roles API Routes
 */
Route::apiResource('roles', 'API\RoleController');
/**
 * TPermissions API Routes
 */
Route::apiResource('permissions', 'API\PermissionController');
