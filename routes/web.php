<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
  Route::get('/', 'HomeController@index')->name('home');
  Route::resource('project', 'ProjectController');
  Route::post('project/sitemap/{id}', 'ProjectDetailController@storeSitemap')->name('project.sitemap');
  Route::post('project/analytics/{id}', 'ProjectDetailController@storeAnalytics')->name('project.analytics');
  Route::post('project/console/{id}', 'ProjectDetailController@storeConsole')->name('project.console');
  Route::post('project/ahrefs/{id}', 'ProjectDetailController@storeAhrefs')->name('project.Ahrefs');
  Route::get('sample/{type}', 'ProjectController@downloadSample')->name('project.sample');
  // import routes
  Route::get('project/{id}/sitemap', 'ProjectController@sitemap')->name('sitemap');
  Route::get('project/{id}/setup', 'ProjectController@show')->name('setup');
  Route::get('project/{id}/google-search-console', 'ProjectController@googleConsole')->name('google-search-console');
  Route::get('project/{id}/ahrefs', 'ProjectController@aHrefs')->name('ahrefs');
  // users routes
  Route::resource('user', 'UsersController');
});
