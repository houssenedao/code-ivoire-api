<?php

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
