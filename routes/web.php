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
// default route
Route::get('/', function () {
    return view('welcome');
});

//just return hello world
Route::get('/hello', function () {
        return "Hello World";
    });

//return helloworld using a view
Route::get('/helloworld', function () {
        return view("helloworld");
    });

//return hello world from controller
Route::get('/test', 'TestController@Test');

//return view of hello world
Route::get('/test2', 'TestController@Test2');

//route mapped to /askme to render who am I view, WhatsMyNameController Controller
Route::get('/askme', function () {
    return view('WhoAmI');
});

//another route is mapped to the /whoami URI and will process the whats my name form POST Request
Route::post('/WhoAmI', 'WhatsMyNameController@index');


//Week 3 in class


Route::get('/login', function()
{
    return view('login');
});

Route::post('/dologin', 'loginController@onLogin');

Route::get('/login2', function()
{
    return view('login2');
});

Route::post('/dologin2', 'login2Controller@onLogin2');

//VALIDATION

Route::get('/login3', function()
{
    return view('login3');
});

Route::post('/dologin3', 'login3Controller@onLogin3');