<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
  Route::get('/', 'HomeController@index')->name('home');
  Route::resource('project', 'ProjectController');
  // import routes
  Route::post('project/sitemap/{id}', 'ProjectDetailController@storeSitemap')->name('project.sitemap');
  Route::post('project/console/{id}', 'ProjectDetailController@storeConsole')->name('project.console');
  Route::post('project/ahrefs/{id}', 'ProjectDetailController@storeAhrefs')->name('project.Ahrefs');
  Route::post('project/screaming_frogs/{id}', 'ProjectDetailController@storeScreamingFrogs')->name('project.screaming_frogs');
  Route::post('project/sem_rush/{id}', 'ProjectDetailController@storeSemrush')->name('project.sem_rush');

  Route::get('sample/{type}', 'ProjectController@downloadSample')->name('project.sample');

  Route::get('project/{id}/sitemap', 'ProjectController@sitemap')->name('sitemap');
  Route::get('project/{id}/setup', 'ProjectController@show')->name('setup');
  Route::get('project/{id}/google-search-console', 'ProjectController@googleConsole')->name('google-search-console');
  Route::get('project/{id}/ahrefs', 'ProjectController@aHrefs')->name('ahrefs');
  Route::get('project/{id}/aggregation', 'ProjectController@aggregation')->name('aggregation');
  Route::get('project/{id}/screaming-frogs', 'ProjectController@screamingFrogs')->name('screaming_frogs');
  // users routes
  Route::resource('user', 'UsersController');
});
