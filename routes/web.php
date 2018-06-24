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

/*Route::get('/', function () {
    return view('home');
});*/




Auth::routes();

Route::get('/', function(){
	if (Auth::check()) {
		return redirect('/esps');
	} else {
		return view('auth.login');
	}
});

Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');//funcional
Route::post('register', 'Auth\RegisterController@register');//funcional
/*Route::get('/home',function(){
	return view('home');
});*/


//Rotas esp
Route::middleware('auth')->get('/esps','EspController@index')->name('esp.list');//funcional
Route::middleware('auth')->post('/esp/turnOn/{esp}', 'EspController@turnOn')->name('esp.turnOn'); //funcional
Route::middleware('auth')->post('/esp/turnOff/{esp}', 'EspController@turnOff')->name('esp.turnOff'); //funcional

//Rotas Sensores
Route::middleware('auth')->get('/sensor/{esp}','SensorController@index')->name('sensor.list');//funcional


