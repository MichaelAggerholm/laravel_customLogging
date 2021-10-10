<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('create-log', function () {

    \Log::channel('michael_log')->info('This is info log level for testing');
    \Log::channel('michael_log')->warning('This is warning log level for testing');
    \Log::channel('michael_log')->error('This is error log level for testing');
    \Log::channel('michael_log')->alert('This is alert log level for testing');
    \Log::channel('michael_log')->emergency('This is emergency log level for testing');
    \Log::channel('michael_log')->notice('This is notice log level for testing');

    dd('done');
});

Route::get('log-content', function () {
    $content = fopen(storage_path('logs/myCustomLogFile.log'), 'r');
    while(!feof($content)){
        $line = fgets($content);
        echo $line."<br>";
    }
});
