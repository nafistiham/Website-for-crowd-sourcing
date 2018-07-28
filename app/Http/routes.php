<?php

use App\Sentence;
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
	$ran = rand(0, sizeof($sentences)-1);
    return view('crowdinput')
    	->with('s', $sentences[$ran]);
});

Route::get('/crowdinput', function () {
	$sentences = Sentence::all();
	$ran = rand(0, sizeof($sentences)-1);
    return view('crowdinput')
    	->with('s', $sentences[$ran]);
});

Route::post('/crowdinput', function () {
	$data = In::all();

	$sentences = Sentence::find($data['id']);
	if($data['type']=='positive')
	{
		$sentences->positive++;
	}

	else if($data['type']=='negative')
	{
		$sentences->negative++;
	}

	else
	{
		$sentences->nutral++;
	} 


	$sentences->save();
	return redirect()->back();
});



Route::get('/home', 'HomeController@index')->name('home');

Route::auth();

Route::get('/home', 'HomeController@index');
