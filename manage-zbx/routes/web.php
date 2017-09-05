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

# Default
Route::get('/welcome', function () {
    return view('welcome');
});

# Status Hosts
Route::get('/', 'ZBXController@ZBXHostStatus');
Route::get('/hoststatus', 'ZBXController@ZBXHostStatus');


Route::get('/host', 'ZBXController@ZBXHost');
Route::get('/listhostp', 'ZBXController@ZBXFindPercent');
Route::get('/listhostv', 'ZBXController@ZBXFindValue');
Route::get('/listhostmemory', 'ZBXController@ZBXFindValueMemory');
Route::get('/hoststatus', 'ZBXController@ZBXHostStatus');

# Test
Route::get('/test', 'TestController@Test');
Route::get('/testevw', function (){
            return view('zbx.status');
});

# Json
Route::get('/hostjson', 'ZBXController@ZBXHostsJson');