<?php

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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



Route::group(['middleware' => ['changeLang',]], function () {
    Route::get('/locale/{locale}', function ($locale,Request $request) {
        Session::put('lang', $locale);
        return redirect()->back();
    })->name('locale');
    // add your all routes here to store session
    Route::get('/', function (Request $request) {
        //return print_r($request);
        return view('front.index');
    })->name('index');
    
    Route::get('/category/{id}/', 'FrontController@category' )->name('category');
    Route::get('/ads/{id}/', 'FrontController@ads' )->name('ads');
    Route::get('/contact-us', 'FrontController@contact' )->name('contact-us');
    Route::get('/about-us', 'FrontController@about' )->name('about-us');
    Route::get('/privcy', 'FrontController@privcy' )->name('privcyf');
    Route::get('/categories', 'FrontController@categories' )->name('categories');
    Route::get('/add', 'FrontController@add' )->name('add')->middleware('auth');
    Route::post('/addads', 'FrontController@addads' )->name('addads')->middleware('auth');
    Route::get('/search', 'FrontController@search' )->name('search');
    Route::get('/my-account', 'FrontController@account' )->name('my-account')->middleware('auth');
    Route::get('/edit-my-account', 'FrontController@editaccount' )->name('edit-my-account')->middleware('auth');
    Route::put('/edit-my-account2', 'FrontController@editaccount2' )->name('edit-my-account2')->middleware('auth');
    Route::get('/my-ads', 'FrontController@accountads' )->name('my-ads')->middleware('auth');
    Route::get('/show-user/{id}', 'FrontController@showuser' )->name('show-user');
    
});




Auth::routes();



Route::prefix('admin')->middleware(['auth','checkAdmin'])->group(function () {
    Route::get('dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
    Route::get('time-line', 'Admin\AdminController@log')->name('log');

    Route::resource('users', 'Admin\UserController',['as'=>'admin']);
    Route::resource('countries', 'Admin\CountryController',['as'=>'admin']);
    Route::resource('cities', 'Admin\CityController',['as'=>'admin']);
    Route::resource('players', 'Admin\PlayerController',['as'=>'admin']);
    Route::resource('reports', 'Admin\MedicalReportController',['as'=>'admin']);
    Route::resource('attendance', 'Admin\PlayerAttendanceController',['as'=>'admin']);
    Route::resource('quizzes', 'Admin\QuizController',['as'=>'admin']);
    Route::resource('notes', 'Admin\NoteController',['as'=>'admin']);
    Route::resource('quizzes/{id}/questions', 'Admin\QuestionController',['as'=>'admin']);
    Route::resource('questions/{id}/answers', 'Admin\AnswerController',['as'=>'admin']);

    Route::post('membership-add', 'Admin\PlayerController@addMembership')->name('admin.players.addmembership');


    Route::resource('groups', 'Admin\GroupController',['as'=>'admin']);
    Route::get('groups/{id}/add-users', 'Admin\GroupController@add_users')->name('admin.groups.add_users');
    Route::post('groups/{id}/save-users', 'Admin\GroupController@save_users')->name('admin.groups.save_users');
    Route::get('groups/{id}/view-users', 'Admin\GroupController@view_users')->name('admin.groups.view_users');
    Route::resource('games', 'Admin\GameController',['as'=>'admin']);




    Route::resource('settings', \Admin\SettingController::class,['as'=>'admin']);
    Route::get('users/activate/{user_id}', 'Admin\UserController@activate_user')->name('admin.users.activate');
    Route::get('users/block/{user_id}', 'Admin\UserController@block_user')->name('admin.users.block');
    Route::get('users/all/bulk-delete', 'Admin\UserController@users_delete')->name('admin.users.bulk_delete');
    Route::get('users/all/bulk-activate', 'Admin\UserController@bulk_activate')->name('admin.users.bulk_activate');


    Route::resource('/advertising','Admin\AdvertisingController',['as'=>'admin'] );
    Route::resource('/category','Admin\CategoryController',['as'=>'admin'] );

    Route::get('/pages/about','Admin\PageController@about',['as'=>'admin'] )->name('about');
    Route::post('/pages/about','Admin\PageController@aboutstore' )->name('storeabout');

    Route::get('/pages/privcy','Admin\PageController@privcy',['as'=>'admin'] )->name('privcy');
    Route::post('/pages/privcy','Admin\PageController@privcystore' )->name('storeprivcy');


    
});
Route::get('getSelectValue', 'HomeController@getSelectValue')->name('getSelectValue');

Route::get('send', 'Admin\FirebaseController@sendMessage');


