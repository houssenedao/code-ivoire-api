<?php
/**
 * Manage Routes
 */
Route::domain('manage.'. config('app.url'))->name('manage.')->namespace('Manage')->group(function() {
    /**
     * Dashboard route */
    Route::get('/', function () {
        return 'manage';
    })->name('dashboard');
});
/**
 * Core namespace routes
 */
Route::namespace('Core')->group(function() {
    /**
     * Auth Route
     */
    Auth::routes();
    /**
     * Documentation Routes
     */
    Route::prefix('docs')->name('doc.')->group(function() {

        Route::get('/', function () {
            return 'doc';
        })->name('home');

    });
    /**
     * Simple Routes
     */
    Route::name('core.')->group(function () {
        /*
        *  Landing page */
        Route::view('/', 'core.landing')->name('landing');
        /*
         * Join slack */
        Route::view('/join-slack', 'core.slack')->name('view-slack');
    });
});
