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
    \Illuminate\Support\Facades\Mail::to('test@example.com')
        ->queue(new \App\Mail\UserRegistered);
    return view('welcome');
});

Route::get('/jobs/{job}', function ($job) {
    $user = \App\User::find(1);

    for ($i = 0; $i < $job; $i++) {
        \App\Jobs\SomeJob::dispatch($user);
    }

    return ('
        <h1
            style="text-align: center;
                    margin-top: 3rem;">
                        Done
                        <span style="color: red !important;">
                            !
                        </span>
                    </h1>');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
