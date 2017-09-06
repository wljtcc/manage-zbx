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
Route::get('/', 'ZBX\ZBXController@ZBXHostStatus');
Route::get('/hoststatus', 'ZBX\ZBXController@ZBXHostStatus');


Route::get('/host', 'ZBX\ZBXController@ZBXHost');
Route::get('/listhostp', 'ZBX\ZBXController@ZBXFindPercent');
Route::get('/listhostv', 'ZBX\ZBXController@ZBXFindValue');
Route::get('/listhostmemory', 'ZBX\ZBXController@ZBXFindValueMemory');
Route::get('/hoststatus', 'ZBX\ZBXController@ZBXHostStatus');

# Test
Route::get('/test', 'TestController@Test');
Route::get('/testevw', function (){
            return view('zbx.status');
});
Route::get('/count', 'ZBX\ZBXController@ZBXTestEcho');

# Json
Route::get('/hostjson', 'ZBX\ZBXController@ZBXHostsJson');