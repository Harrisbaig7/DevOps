<?php
use App\Models\Movies;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
return view('welcome');
});
Auth::routes();
Route::get('/home', 'App\Http\Controllers\HomeController@index');
// Route::get('/home', 'App\Http\Controllers\HomeController@adminindex');
//------------------------------------- ADMIN ---------------------------------
// Route::prefix('admin')->group(function () {
//     Route::get('/admin/home','App\Http\Controllers\HomeController@adminindex');
// });
Route::middleware(['auth', 'chkAdmin'])->group(function(){

    Route::get('/admin/home', 'App\Http\Controllers\HomeController@adminindex');
    Route::get('/admin/viewMovies', 'App\Http\Controllers\MovieController@show');
    Route::get('/admin/getMovies', 'App\Http\Controllers\MovieController@search');
    Route::get('/admin/{id}/edit', 'App\Http\Controllers\MovieController@edit');
    Route::put('/admin/{id}/update', 'App\Http\Controllers\MovieController@update');
    Route::get('/admin/{id}/delete', 'App\Http\Controllers\MovieController@delete');
    Route::get('/admin/{id}/review', 'App\Http\Controllers\MovieController@review');
    Route::post('/admin/addMovies', 'App\Http\Controllers\MovieController@addMovie');
    Route::get('/admin/addMovies', function(){
    return view('admin.addMovies');
    });
    Route::get('/admin/{id}/profile', 'App\Http\Controllers\UserController@viewprofile');
    Route::get('/admin/users', 'App\Http\Controllers\UserController@show');
    Route::get('/admin/feedbacks', 'App\Http\Controllers\UserController@feedbacks');
    Route::get('/admin/aboutUs', function(){
    return view('admin.aboutUs');
    });
    Route::post('/admin/{id}/addShows', 'App\Http\Controllers\MovieController@addshow');
    Route::get('/admin/{id}/deleteshow', 'App\Http\Controllers\MovieController@deleteshow');
    Route::get('/admin/{id}/show', 'App\Http\Controllers\MovieController@movie_show');
    Route::get('/admin/viewShows', 'App\Http\Controllers\MovieController@viewshow');
    Route::get('/admin/movieDetails/{id}', 'App\Http\Controllers\MovieController@adminmoviedetails');
    Route::post('/admin/movieDetails/{id}/{user_id}', 'App\Http\Controllers\MovieController@adminaddreview');
    Route::get('/admin/bookTickets/{id}', 'App\Http\Controllers\TicketController@adminbookticket');
});
//------------------------------------- USER ---------------------------------
Route::get('/aboutUs', function(){
return view('aboutUsUser');
});
Route::get('/{id}/profile', 'App\Http\Controllers\UserController@userviewprofile');
Route::get('/viewMovies/{id}', 'App\Http\Controllers\MovieController@moviedetails');
Route::get('/allMovies', 'App\Http\Controllers\MovieController@usershow');
Route::get('/bookTickets/{id}/{show_id}', 'App\Http\Controllers\TicketController@bookticket');
Route::post('/bookTickets/{m_id}/{id}/{show_id}', 'App\Http\Controllers\TicketController@addticket');
Route::post('/viewMovies/{id}/{user_id}', 'App\Http\Controllers\MovieController@addreview');
Route::post('/{user_id}/contactUs', 'App\Http\Controllers\UserController@addfeedback');
Route::get('/{user_id}/contactUs', 'App\Http\Controllers\UserController@contactus');
Route::get('layout', function(){
return view('layouts.layout');
});
