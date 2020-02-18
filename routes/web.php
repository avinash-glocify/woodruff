<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
  Route::get('/', 'HomeController@index')->name('home');
  Route::resource('project', 'ProjectController');

  Route::group(['prefix' => 'project'], function() {
    // import routes
    Route::post('sitemap/{id}', 'ProjectDetailController@storeSitemap')->name('project.sitemap');
    Route::post('console/{id}', 'ProjectDetailController@storeConsole')->name('project.console');
    Route::post('ahrefs/{id}', 'ProjectDetailController@storeAhrefs')->name('project.Ahrefs');
    Route::post('screaming_frogs/{id}', 'ProjectDetailController@storeScreamingFrogs')->name('project.screaming_frogs');
    Route::post('sem_rush/{id}', 'ProjectDetailController@storeSemRush')->name('project.sem_rush');

    Route::get('{id}/sitemap', 'ProjectController@sitemap')->name('sitemap');
    Route::get('{id}/setup', 'ProjectController@show')->name('setup');
    Route::get('{id}/google-search-console', 'ProjectController@googleConsole')->name('google-search-console');
    Route::get('{id}/ahrefs', 'ProjectController@aHrefs')->name('ahrefs');
    Route::get('{id}/aggregation', 'ProjectController@aggregation')->name('aggregation');
    Route::get('{id}/screaming-frogs', 'ProjectController@screamingFrogs')->name('screaming-frogs');
    Route::get('{id}/sem-rush', 'ProjectController@semRush')->name('sem-rush');

    //data table routes
    Route::get('{id}/aggregation/data', 'ProjectController@aggregationData')->name('aggregationData');
    Route::get('{id}/sitemap/data', 'ProjectController@sitemapData')->name('sitemapData');
    Route::get('{id}/google-search-console/data', 'ProjectController@searchConsoleData')->name('searchConsoleData');
    Route::get('{id}/ahrefs/data', 'ProjectController@ahrefsData')->name('ahrefsData');
    Route::get('{id}/screaming-frogs/data', 'ProjectController@screamingFrogData')->name('screamingFrogData');
    Route::get('{id}/sem-rush/data', 'ProjectController@semRushData')->name('semRushData');
  });

  Route::get('sample/{type}', 'ProjectController@downloadSample')->name('project.sample');

  // users routes
  Route::resource('user', 'UsersController');
});
