<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
  Route::get('/', 'HomeController@index')->name('home');
  Route::resource('project', 'ProjectController');
  Route::post('project/sitemap/{id}', 'ProjectDetailController@storeSitemap')->name('project.sitemap');
  Route::post('project/analytics/{id}', 'ProjectDetailController@storeAnalytics')->name('project.analytics');
  Route::post('project/console/{id}', 'ProjectDetailController@storeConsole')->name('project.console');
  Route::post('project/search-filter/{id}', 'ProjectDetailController@storeSearchFilter')->name('project.search-filter');
  Route::post('project/csv/{id}', 'ProjectDetailController@storeCsv')->name('project.csv');
  Route::post('project/analtyics-search-filter/{id}', 'ProjectDetailController@storeAnalyticsFilter')->name('project.analtyics-search-filter');
  Route::post('project/best-keywords/{id}', 'ProjectDetailController@storeBestKeyword')->name('project.best-keywords');
  Route::post('project/main-keywords/{id}', 'ProjectDetailController@storeMainKeyword')->name('project.main-keywords');
  Route::get('sample/{type}', 'ProjectController@downloadSample')->name('project.sample');
  // import routes
  Route::get('project/{id}/sitemap', 'ProjectController@sitemap')->name('sitemap');
  Route::get('project/{id}/setup', 'ProjectController@show')->name('setup');
  Route::get('project/{id}/csv', 'ProjectController@csv')->name('csv');
  Route::get('project/{id}/google-analytics', 'ProjectController@googleAnalytics')->name('google-analytics');
  Route::get('project/{id}/analytics-search-filter', 'ProjectController@googleAnalyticsSearch')->name('analytics-search-filter');
  Route::get('project/{id}/google-console', 'ProjectController@googleConsole')->name('google-console');
  Route::get('project/{id}/console-search-filter', 'ProjectController@consoleSearch')->name('console-search-filter');
  Route::get('project/{id}/best-keywords', 'ProjectController@bestKeywords')->name('best-keywords');
  Route::get('project/{id}/main-keywords', 'ProjectController@mainKeywords')->name('main-keywords');
  // users routes
  Route::resource('user', 'UsersController');
});
