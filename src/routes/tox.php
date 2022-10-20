<?php

Route::get('packages', 'PackageController@getPackages');

Route::post('payment', 'PackageController@makePayment');
Route::get('payment', 'PackageController@paymentForm');
Route::get('dashboard', 'DashboardController@getSummary');
Route::get('transactions', 'DashboardController@getTransactions');

Route::group(['prefix' => 'admin'], function () {
    Route::get('tiers/create', 'AdminController@createTiers');
    Route::get('payments', 'AdminController@getPayments');
});
