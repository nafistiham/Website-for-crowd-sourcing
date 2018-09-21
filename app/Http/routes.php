<?php

use App\Sentence;
use App\User;
use Illuminate\Support\Facades\Input as In;
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
    $sentences = Sentence::all();
    while(1)
    {
        $ran = rand(0, sizeof($sentences) - 1);
        $total = $sentences[$ran]['total_positive'] 
            + $sentences[$ran]['total_negative']
            + $sentences[$ran]['nutral']);
        if($total < 20 )
        {
            return view('crowdinput')
                ->with('s', $sentences[$ran]);
        }
    }
});

Route::get('/leaderboard', function () {

    $users = User::orderBy('tagged', 'DES')->get();
    // return $users;

    return view('leaderboard')
        ->with('users', $users);
});

Route::get('/hourly-leaderboard', function () {

    $users = User::orderBy('hourly_tag', 'DES')
        ->orderBy('tagged', 'DES')
        ->get();
    return view('hourly_leaderboard')
        ->with('users', $users);
});

Route::get('/crowdinput', function () {
    $sentences = Sentence::all();
    $ran = rand(0, sizeof($sentences) - 1);
    return view('crowdinput')
        ->with('s', $sentences[$ran]);
});

Route::post('/crowdinput', function () {

    $data = In::all();
    $currentuser = Auth::user();
    $sentences = Sentence::find($data['id']);

    if ($data['type'] == 'positive') {

        $sentences->positive++;
        $sentences->total_positive++;
    } else if ($data['type'] == 'slightly_positive') {
        $sentences->slightly_positive++;
        $sentences->total_positive++;
    } else if ($data['type'] == 'negative') {
        $sentences->total_negative++;
        $sentences->negative++;
    } else if ($data['type'] == 'slightly_negative') {
        $sentences->total_negative++;
        $sentences->negative++;
    } else {
        $sentences->nutral++;
    }

    if (Auth::user() != null) {
        $currentuser->tagged++;
        $currentuser->hourly_tag++;
        $currentuser->save();
    }

    $sentences->save();
    return redirect()->back();
});

Route::get('/home', 'HomeController@index')->name('home');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/calculate-hourly-winner', 'CalculateHourlyWinnerController@index');
