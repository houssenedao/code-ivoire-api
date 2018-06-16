<?php
/**
 * API Auth
 */
Route::group(['prefix' => 'auth'], function () {
    /**
     * Login
     */
    Route::post('login', 'API\AuthController@login');
    /**
     * Register
     */
    Route::post('register', 'API\AuthController@signup');
    /**
     * Activate account
     */
    Route::get('activate/{token}', 'API\AuthController@signupActivate')->name('activate');
});
/**
 * Protected route
 */
Route::middleware('auth:api', function () {
    /**
     * User logout
     */
    Route::get('logout', 'API\AuthController@logout');
    /**
     * Categories API Routes
     */
    Route::apiResource('categories', 'API\Category\CategoryController');

    Route::apiResource('categories.events', 'API\Category\CategoryEventController')->only(
        ['index', 'store']);
    /**
     * Events API Routes
     */
    Route::apiResource('events', 'API\Event\EventController');

    Route::apiResource('events.reviews', 'API\Event\EventReviewController')->only(
        ['index', 'store', 'destroy']);

    Route::apiResource('events.tags', 'API\Event\EventTagController')->only(
        ['index', 'store', 'destroy']);
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
    Route::apiResource('me', 'API\Me\MeController')->except(
        ['show', 'store']);

    Route::get('me/opinions', 'API\Me\MeController@opinion');

    Route::apiResource('me.reviews', 'API\Me\MeReviewController')->only(
        ['index']);

    Route::apiResource('me.events', 'API\Me\MeEventController');
    Route::post('me/events/{event}/subscribe', 'API\Me\MeEventController@subscribe');
    Route::post('me/events/{event}/unsubscribe', 'API\Me\MeEventController@unsubscribe');
    Route::get('me/events/entry', 'API\Me\MeEventController@entry');
    Route::get('me/events/speaker', 'API\Me\MeEventController@speaker');

    Route::apiResource('me.roles', 'API\Me\MeRoleController')->only(
        ['index']);

    Route::get('me/notifications', 'API\Me\MeNotificationController@index');
    Route::post('me/notifications/{notification}/read', 'API\Me\MeNotificationController@read');
    Route::post('me/notifications/{notification}/unread', 'API\Me\MeNotificationController@unread');
    Route::post('me/notifications/all-read', 'API\Me\MeNotificationController@markAllRead');

    /**
     * Roles API Routes
     */
    Route::apiResource('roles', 'API\Role\RoleController');
    Route::apiResource('roles.permissions', 'API\Role\RolePermissionController');

    /**
     * TPermissions API Routes
     */
    Route::apiResource('permissions', 'API\PermissionController');
});
