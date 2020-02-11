<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
  Route::get('/', 'HomeController@index')->name('home');
  Route::resource('project', 'ProjectController');
  Route::post('project/sitemap/{id}', 'ProjectDetailController@storeSitemap')->name('project.sitemap');
  Route::post('project/analytics/{id}', 'ProjectDetailController@storeAnalytics')->name('project.analytics');
  Route::post('project/console/{id}', 'ProjectDetailController@storeConsole')->name('project.console');
  Route::post('project/search-filter/{id}', 'ProjectDetailController@storeSearchFilter')->name('project.search-filter');
  Route::get('sample/{type}', 'ProjectController@downloadSample')->name('project.sample');
});
